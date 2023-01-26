<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class IdentController extends Controller

{

    public static function consulta_logo(){
            
            $ident = DB::table('identidade')->first();

            $logo = $ident->logo;
    
            return $logo;
    

    }

    public static function consulta_nome_ident(){
            
            $ident = DB::table('identidade')->first();

            $nome = $ident->nome_ident;
    
            return $nome;
    

    }

    public function conf_ident(request $request){

        $ident = DB::table('identidade')->first();

       /* dd($ident);*/
        
        return view('conf_ident',['ident'=>$ident]);
    }   

    public function altera_ident(Request $request){

       /* dd(request('nome_ident'));*/

       $request->session()->put('nome_ident', request('nome_ident'));
       
        
        if($request->hasFile('sel_img')){
          $file = $request->file('sel_img');
    
          $size = $file->getSize();
    
          if($size > 500000){
             return back()->with('fail size','tamanho maior do que o permitido!');
          }
    
          $extension = $file->getClientOriginalExtension();
          
          if($extension == 'jpg' or $extension == 'jpeg' or $extension == 'png'){
    
            $filename = 'logo.'.$extension;
            File::delete(public_path('/imagens/'.$filename));
            $file->move('imagens/',$filename);
    
          }else{
              return back()->with('fail type','Tipo de imagem não permitido!');
          }

            $ident = DB::table('identidade')->where('id',1)             
                     ->update(['nome_ident' => request('nome_ident'),'logo'=>$filename]);

            $request->session()->put('logo', $filename);

            $ident = DB::table('identidade')->where('id',1)->first();                                              
            /*dd($ident);                      */

            return view('home',['ident'=>$ident]);
    

        }else{
           
            $ident = DB::table('identidade')->where('id',1)
                     ->update(['nome_ident' => request('nome_ident')]); 

            $ident = DB::table('identidade')->where('id',1)->first();                                              

            return view('home',['ident'=>$ident]);
            
        }
          
    }   

}
