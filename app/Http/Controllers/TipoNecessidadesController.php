<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoNecessidadesController extends Controller
{
     //crie função para alterar necessidade e sua categoria, alterar tipo de necessidade
  public function altera_tipo_necessidade(Request $request) {

    $descricao = request('descricao');
    $descr_inic = request('descr_inic');
    $id_cat = request('categoria');
    $id_unid = request('unidade');
    $id_nec = request('id_nec');

   // dd($descricao,$id_cat,$id_unid);
   // se descr_inic é diferente de descricao então verifique se descricao já existe na tabela ofertas

    if($descr_inic != $descricao){
        $of = DB::table('necessidades')->where('descricao', $descricao)->first();
        if($of){
            return back()->with('fail','Tipo de Necessidade ja existente!');
        }
    }
       
    $r = DB::table('necessidades')
        ->where('id', $id_nec)
        ->update([
        'descricao' => $descricao ,
        'id_cat' => $id_cat,
        'id_unid' => $id_unid,
        ]);

    if($r){
        return back()->with('success','Tipo de Necessidade alterado com sucesso!');
    }else{
        return back()->with('fail','Tipo de Necessidade não foi alterado.');
    }
  }

  
  public function show_all( Request $request ) {
    $tipo_nec = DB::table('necessidades')
    ->join('categorias','necessidades.id_cat', '=', 'categorias.id')
    ->join('unidades','necessidades.id_unid', '=', 'unidades.id')

    ->select('necessidades.*',
     'categorias.descricao as categoria', 
     'unidades.descricao as unidade')

    ->orderBy('descricao', 'asc')
    ->paginate(10);

    $tipo_nec->appends($request->all());

    //consulte todas as categorias e unidades
    $categorias = DB::table('categorias')->orderBy('descricao', 'asc')->get();
    $unidades = DB::table('unidades')->orderBy('descricao', 'asc')->get();
  
    return view('tipos_necessidades', ['tipo_nec' => $tipo_nec,'cats' => $categorias, 'unids' => $unidades]);
  }

  //consulta tipos de necessidades usando filtragem por varias palavras separadas que buscam no campo descrição ou categoria ou unidade
  public function consultar_tipos_necessidades(Request $request) {

    $string = request('consulta');

    // split on 1+ whitespace & ignore empty (eg. trailing space)
    $searchValues = preg_split('/\s+/', $string, -1, PREG_SPLIT_NO_EMPTY);     

    $request->session()->put('criterio', request('consulta'));

    $tipo_nec = DB::table('ofertas')->where(function($query) use ($searchValues){
                                     foreach ($searchValues as $value) {
                                              $query->orwhere('necessidades.descricao','like','%'.($value).'%') 
                                                    ->orwhere('categorias.descricao','like','%'.($value).'%')
                                                    ->orwhere('unidades.descricao','like','%'.($value).'%')
                                              ;}                                                 
                                     })
    
    ->join('categorias','necessidades.id_cat', '=', 'categorias.id')
    ->join('unidades','necessidades.id_unid', '=', 'unidades.id')

    ->select('necessidades.descricao as descricao',
             'necessidades.id',
             'necessidades.status',
             'necessidades.id_cat',
             'necessidades.id_unid',
             'categorias.descricao as categoria',
             'unidades.descricao as unidade'
             )

    ->orderBy('necessidades.descricao', 'asc')
    ->paginate(10);

    $tipo_nec->appends($request->all());

    $categorias = DB::table('categorias')->orderBy('descricao', 'asc')->get();
    $unidades = DB::table('unidades')->orderBy('descricao', 'asc') ->get();

    return view('tipos_necessidades', ['tipo_of' => $tipo_nec , 'cats' => $categorias, 'unids' => $unidades]);
  

   }

   //deleta tipo de oferta
   public function deleta_tipo_necessidade($id) {

    //testa se o tipo de necessidade já foi usado por algum participante na tabela necessidades_part
    $nec = DB::table('necessidades_part')->where('id_nec', $id)->first();
    if($nec){
        return back()->with('fail','Tipo de Necessidade não pode ser excluído!');
    }

    //senão então pode deletar o tipo de necessidade
    $r = DB::table('necessidades')->where('id', $id)->delete();
    if($r){
        return back()->with('success','Tipo de Necessidade excluído com sucesso!');
    }else{
        return back()->with('fail','Tipo de Necessidade não foi excluído.');
    }
   }

}
