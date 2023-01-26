<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\AlterPassRequest;
use App\Http\Requests\ResetPassRequest;

/*use Illuminate\Http\Request;*/
use Illuminate\Support\Facades\Hash;
use App\Models\participantes;
/*use App\Models\users;*/
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;

/*use function PHPUnit\Framework\isNull;*/

class UserAuthController extends Controller
{
    function login(StoreUserRequest $request){

        if(session()->has('email')){
            return redirect('/home')->with('fail','Já existe um participante logado nessa maquina!');
        }else{

                $ident = DB::table('identidade')->first();
                $part = DB::table('participantes')->where('email','=',request('email'))->first();

                if(!$part){
                return redirect('/login')->with('fail','Voce é um Novo Participante! Faça seu cadastro primeiro.');
                }
                else{

                    /*dd($request->senha,$part->senha);*/

                    if(Hash::check($request->senha, $part->senha)){
                            $request->session()->put('nomelogado', $part->nome_part);
                            $request->session()->put('email', $part->email);
                            $request->session()->put('imagem_logado', $part->imagem);
                            $request->session()->put('id_logado', $part->id);
                            $request->session()->put('id_tipo_acesso_logado', $part->id_tipo_acesso);
                            $request->session()->put('latitude', $part->latitude);
                            $request->session()->put('longitude', $part->longitude);
                            $request->session()->put('logo',$ident->logo);
                            $request->session()->put('nome_ident',$ident->nome_ident);

                            /*$user = new users();

                            $user->email = request('email');
                            $user->senha = Hash::make(request('senha'));

                            $query = $user->save();*/

                            DB::table('users')->insertOrIgnore([
                                ['email' => request('email'),
                                 'senha' =>Hash::make(request('senha'))],
                            ]);

                            return redirect('inicio');

                            /*if($query){
                                return redirect('home');
                            }else{
                                return redirect('/')->with('fail','Aconteceu algum erro! Participante não foi registrado.');
                            }*/
                    }else{
                         return redirect('/login')->with('fail','Senha inválida!');
                    }

                }
        }

    }

    function create(StorePartRequest $request){

        $part = new participantes();

        if($request->hasFile('part_image')){
           $file = $request->file('part_image');
           $extension = $file->getClientOriginalExtension();

           $size = $file->getSize();

           if($size > 5000000){
             return back()->with('fail image','tamanho maior do que o permitido!');
           }

           $filename = request('nome_part').'_'.time().'.'.$extension;

           $file->move('uploads/participantes/',$filename);
           $part->imagem = $filename;
           $request->session()->put('imagem_logado', $part->imagem);
        }

        $part->nome_part = request('nome_part');
        $part->endereco = request('endereco');
        $part->cidade = request('cidade');
        $part->cep = request('cep');
        $part->estado = request('estado');
        $part->pais = request('pais');
        $part->email =request('email');
        $part->senha = Hash::make(request('senha'));

        $endereco_geocode = request('endereco').",".request('cidade').",".request('pais');
        $geo = helper::GetGeoCode($endereco_geocode);

        $part->latitude = $geo['lat'];
        $part->longitude = $geo['long'];

        $part->ranking = 0;
        $part->id_tipo_acesso = 1;

        $query = $part->save();

        if($query){
            return redirect('/')->with('success','Olá '.$part->nome_part.'! Voce foi incluído com successo! Bem Vindo ao Sistema Rede Colaborativa Global! Faça do Planeta um lugar melhor para se viver! ');
        }else{
            return back()->with('fail','Aconteceu algum erro! '.$part->nome_part.' não foi incluido.');
        }

    }

    public function logout(){

        $email = session('email');

        $user = DB::table('users')->where('email','=',$email);

        /*$user = users::FindOrfail($id);*/
        $user->delete();

        session()->pull('email');
        session()->pull('nomelogado');
        session()->pull('imagem_logado');
        session()->pull('id_logado');
        session()->pull('criterio');
        session()->pull('id_tipo_acesso_logado');
        session()->pull('latitude');
        session()->pull('longitude');

        return redirect('/home');
    }

    public function alterpass(){

        if(session('email')<> null){
           return redirect('alterpass');

        }else{
           return redirect('/')->with('podealterar','Para alterar a senha é preciso estar logado primeiro');

        }

    }

    public function alterpass_email($id){

        $part = participantes::FindOrfail($id);

        /*dd($part->email);*/

        if(!$part){
            return back()->with('fail','Participante não encontrado!');
        }else{

            if( $part->email <> null){
            return view('auth.alterpass_email')->with('email',$part->email);

            }else{
            return redirect('/')->with('podealterar','Para alterar a senha é preciso estar logado primeiro');

            }

        }

    }

    public function resetpass(){

        if(session('email')<> null){
           return redirect('resetpass');

        }else{
           return redirect('/')->with('poderesetar','Para resetar a senha é preciso estar logado primeiro');

        }

    }


    public function alterpassok(AlterPassRequest $request){

        $p = DB::table('participantes')->where('email','=',Session('email'))->first();

        if($p)
        {
           if(Hash::check($request->senha,$p->senha))
           {
            $ok = DB::table('participantes')
            ->where('email','=',Session('email'))
            ->update(['senha' => Hash::make(request('novasenha'))]);

             if($ok){
               return redirect('/')->with('success','Senha alterada com sucesso!');
             }else{
               return back()->with('fail','Erro ao salvar nova senha');
             }
           }
           else
           {
             return back()->with('fail','Senha inválida');
            }
        }else{
            return back()->with('fail','Erro ao consultar email');
        }
    }

    public function alterpassok_email(AlterPassRequest $request){

        $email = request('email');

        $p = DB::table('participantes')->where('email','=',$email)->first();

        if($p)
        {
           if(Hash::check($request->senha,$p->senha))
           {
            $ok = DB::table('participantes')
            ->where('email','=',$email)
            ->update(['senha' => Hash::make(request('novasenha'))]);

             if($ok){
               return redirect('/')->with('success','Senha alterada com sucesso!');
             }else{
               return back()->with('fail','Erro ao salvar nova senha');
             }
           }
           else
           {
             return back()->with('fail','Senha inválida');
            }
        }else{
            return back()->with('fail','Erro ao consultar email');
        }
    }

    public function resetpassok(ResetPassRequest $request){

        $p = DB::table('participantes')->where('email','=',request('email'))->first();

        if($p)
        {
            $ok = DB::table('participantes')
            ->where('email','=',request('email'))
            ->update(['senha' => Hash::make(request('novasenha'))]);

             if($ok){
               return redirect('/')->with('success','Senha resetada com sucesso!');
             }else{
               return back()->with('fail','Erro ao resetar senha');
             }

        }else{
            return back()->with('fail','Erro ao consultar email');
        }
    }
}
