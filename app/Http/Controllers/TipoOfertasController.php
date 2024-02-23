<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoOfertasController extends Controller
{
    //crie função para alterar oferta e sua categoria
  public function altera_tipo_oferta(Request $request) {

    $descricao = request('descricao');
    $descr_inic = request('descr_inic');
    $id_cat = request('categoria');
    $id_unid = request('unidade');
    $id_of = request('id_of');

   // dd($descricao,$id_cat,$id_unid);
   // se descr_inic é diferente de descricao então verifique se descricao já existe na tabela ofertas

    if($descr_inic != $descricao){
        $of = DB::table('ofertas')->where('descricao', $descricao)->first();
        if($of){
            return back()->with('fail','Tipo de Oferta ja existente!');
        }
    }
       
    $r = DB::table('ofertas')
        ->where('id', $id_of)
        ->update([
        'descricao' => $descricao ,
        'id_cat' => $id_cat,
        'id_unid' => $id_unid,
        ]);

    if($r){
        return back()->with('success','Tipo de Oferta alterado com sucesso!');
    }else{
        return back()->with('fail','Tipo de Oferta não foi alterado.');
    }
  }

  
  public function show_all( Request $request ) {
    $tipo_of = DB::table('ofertas')
    ->join('categorias','ofertas.id_cat', '=', 'categorias.id')
    ->join('unidades','ofertas.id_unid', '=', 'unidades.id')

    ->select('ofertas.*',
     'categorias.descricao as categoria', 
     'unidades.descricao as unidade')

    ->orderBy('descricao', 'asc')
    ->paginate(10);

    $tipo_of->appends($request->all());

    //consulte todas as categorias e unidades
    $categorias = DB::table('categorias')->orderBy('descricao', 'asc')->get();
    $unidades = DB::table('unidades')->orderBy('descricao', 'asc')->get();
  
    return view('tipos_ofertas', ['tipo_of' => $tipo_of,'cats' => $categorias, 'unids' => $unidades]);
  }

  //consulta tipos de ofertas usando filtragem por varias palavras separadas que buscam no campo descrição ou categoria ou unidade
  public function consultar_tipos_ofertas(Request $request) {

    $string = request('consulta');

    // split on 1+ whitespace & ignore empty (eg. trailing space)
    $searchValues = preg_split('/\s+/', $string, -1, PREG_SPLIT_NO_EMPTY);     

    $request->session()->put('criterio', request('consulta'));

    $tipo_of = DB::table('ofertas')->where(function($query) use ($searchValues){
                                     foreach ($searchValues as $value) {
                                              $query->orwhere('ofertas.descricao','like','%'.($value).'%') 
                                                    ->orwhere('categorias.descricao','like','%'.($value).'%')
                                                    ->orwhere('unidades.descricao','like','%'.($value).'%')
                                              ;}                                                 
                                     })
    
    ->join('categorias','ofertas.id_cat', '=', 'categorias.id')
    ->join('unidades','ofertas.id_unid', '=', 'unidades.id')

    ->select('ofertas.descricao as descricao',
             'ofertas.id',
             'ofertas.status',
             'ofertas.id_cat',
             'ofertas.id_unid',
             'categorias.descricao as categoria',
             'unidades.descricao as unidade'
             )

    ->orderBy('ofertas.descricao', 'asc')
    ->paginate(10);

    $tipo_of->appends($request->all());

    $categorias = DB::table('categorias')->orderBy('descricao', 'asc')->get();
    $unidades = DB::table('unidades')->orderBy('descricao', 'asc') ->get();

    return view('tipos_ofertas', ['tipo_of' => $tipo_of , 'cats' => $categorias, 'unids' => $unidades]);
  

   }

   //deleta tipo de oferta
   public function deleta_tipo_oferta($id) {

    //testa se o tipo de oferta já foi usado por algum participante na tabela ofertas_part
    $of = DB::table('ofertas_part')->where('id_of', $id)->first();
    if($of){
        return back()->with('fail','Tipo de Oferta não pode ser excluído!');
    }

    //senão então pode deletar o tipo de oferta
    $r = DB::table('ofertas')->where('id', $id)->delete();
    if($r){
        return back()->with('success','Tipo de Oferta excluído com sucesso!');
    }else{
        return back()->with('fail','Tipo de Oferta não foi excluído.');
    }
   }


}
