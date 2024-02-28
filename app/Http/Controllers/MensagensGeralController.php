<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MensagensGeralController extends Controller
{
  //consulta mensagens do participante na tabela mensagens_trans linkando com a tabela de participantes para os ids respectivos
  public function query($id_part,request $request){

    $env_rec = $request->tipo_mensagem;
    $mens = null;

    if($env_rec == "env"){
    $mens = DB::table('mensagens_trans')->where('mensagens_trans.id_part', '=', $id_part)
    
    ->join('participantes', 'participantes.id', '=', 'mensagens_trans.id_part')
    ->join('participantes as dest', 'dest.id', '=', 'mensagens_trans.id_part_dest')

    //conecte também com transacoes , ofertas e necessidades, consultando todos os campos de cada uma envolvida na transaçao
    ->join('transacoes', 'transacoes.id', '=', 'mensagens_trans.id_trans')
    ->leftJoin('ofertas_part', 'ofertas_part.id', '=', 'transacoes.id_of_part')
    ->leftJoin('ofertas', 'ofertas.id', '=', 'ofertas_part.id_of')
    ->leftJoin('ofertas_part as trocas_part', 'trocas_part.id', '=', 'transacoes.id_of_tr_part')
    ->leftJoin('ofertas as trocas', 'trocas.id', '=', 'trocas_part.id_of')
    ->leftJoin('necessidades_part', 'necessidades_part.id', '=', 'transacoes.id_nec_part')
    ->leftJoin('necessidades', 'necessidades.id', '=', 'necessidades_part.id_nec')
    


    //mostre os campos consultados
    ->select('mensagens_trans.*',
    'transacoes.*',

    'ofertas.descricao as desc_of',
    'trocas.descricao as desc_tr',
    'necessidades.descricao as desc_nec',

    'ofertas_part.obs as obs_of',
    'trocas_part.obs as obs_tr',
    'necessidades_part.obs as obs_nec',

    //o mesmo para o campo imagem da tabela ofertas_part
    'ofertas_part.imagem as imagem_of',
    'trocas_part.imagem as imagem_tr',
    'necessidades_part.imagem as imagem_nec',
        
    'participantes.nome_part as nome_part',
    'dest.nome_part as nome_dest')
    ->get();
   
    }
    else{

        if($env_rec == "rec"){        
        $mens = DB::table('mensagens_trans')->where('mensagens_trans.id_part_dest', '=', $id_part)
    
        ->join('participantes', 'participantes.id', '=', 'mensagens_trans.id_part')
        ->join('participantes as dest', 'dest.id', '=', 'mensagens_trans.id_part_dest')

        ->join('transacoes', 'transacoes.id', '=', 'mensagens_trans.id_trans')
        ->leftJoin('ofertas_part', 'ofertas_part.id', '=', 'transacoes.id_of_part')
        ->leftJoin('ofertas', 'ofertas.id', '=', 'ofertas_part.id_of')
        ->leftJoin('ofertas_part as trocas_part', 'trocas_part.id', '=', 'transacoes.id_of_tr_part')
        ->leftJoin('ofertas as trocas', 'trocas.id', '=', 'trocas_part.id_of')
        ->leftJoin('necessidades_part', 'necessidades_part.id', '=', 'transacoes.id_nec_part')
        ->leftJoin('necessidades', 'necessidades.id', '=', 'necessidades_part.id_nec')
        
        ->select('mensagens_trans.*',
        'transacoes.*',
        
        'ofertas.descricao as desc_of',
        'trocas.descricao as desc_tr',
        'necessidades.descricao as desc_nec',

        'ofertas_part.obs as obs_of',
        'trocas_part.obs as obs_tr',
        'necessidades_part.obs as obs_nec',

        //o mesmo para o campo imagem
        'ofertas_part.imagem as imagem_of',
        'trocas_part.imagem as imagem_tr',
        'necessidades_part.imagem as imagem_nec',
        
        'participantes.nome_part as nome_part',
        'dest.nome_part as nome_dest')

        ->get();

        }

    }

   // dd($mens);

    //retorna para a view cons_mensagem_geral com a variavel a consulta $mens
    if ($mens) {
        return view('cons_mensagens_geral', ['mens' => $mens]);
    } else {
        return view('cons_mensagens_geral', ['mens' => null]);
    }
   

  }

  //crie função show para mostrar apenas a view cons_mensagens_geral mas sem registros. 
  public function show(){
    return view('cons_mensagens_geral', ['mens' => null]);
  }

}
