<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoOfertasController extends Controller
{
    //crie função para alterar oferta e sua categoria
  public function altera_tipo_oferta(Request $request) {
    
    $oferta = DB::table('ofertas')->where('descricao',request('descricao'))                                      
                              ->first();
                    
    if(!$oferta){
        $r = DB::table('ofertas')->insert([
            'descricao' => request('descricao'),
            'status' =>  1,
            'id_cat' => request('categoria'),
            'id_unid' => request('unidade'),
        ]);
        return back()->with('success','Tipo de Oferta incluida com sucesso!');
    }else{
        return back()->with('fail','Tipo de Oferta-era existente!');
    }
  }

  
  public function show_all( Request $request ) {
    $tipo_of = DB::table('ofertas')
    ->join('categorias','ofertas.id_cat', '=', 'categorias.id')
    ->join('unidades','ofertas.id_unid', '=', 'unidades.id')

    ->select('ofertas.*', 'categorias.descricao as categoria', 'unidades.descricao as unidade')

    ->orderBy('descricao', 'asc')
    ->paginate(10);

    $tipo_of->appends($request->all());

    //consulte todas as categorias e unidades
    $categorias = DB::table('categorias')->orderBy('descricao', 'asc')->get();
    $unidades = DB::table('unidades')->orderBy('descricao', 'asc') ->get();
  
    return view('tipos_ofertas', ['tipo_of' => $tipo_of, 'cats' => $categorias, 'unids' => $unidades]);
  }

  //consulta tipos de ofertas usando filtragem por varias palavras separadas que buscam no campo descrição ou categoria ou unidade
  public function consultar_tipos_ofertas(Request $request) {

    $string = request('consulta');

    // split on 1+ whitespace & ignore empty (eg. trailing space)
    $searchValues = preg_split('/\s+/', $string, -1, PREG_SPLIT_NO_EMPTY);     

    $request->session()->put('criterio', request('consulta'));

    if(isset($_GET['consulta'])){
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
             'unidades.descricao as unidade')

    ->orderBy('ofertas.descricao', 'asc')
    ->paginate(10);

    $tipo_of->appends($request->all());

    $categorias = DB::table('categorias')->orderBy('descricao', 'asc')->get();
    $unidades = DB::table('unidades')->orderBy('descricao', 'asc') ->get();

    return view('tipos_ofertas', ['tipo_of' => $tipo_of , 'cats' => $categorias, 'unids' => $unidades]);
    }

   }


}
