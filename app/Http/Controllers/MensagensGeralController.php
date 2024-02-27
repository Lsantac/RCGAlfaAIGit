<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MensagensGeralController extends Controller
{
  //consulta mensagens do participante na tabela mensagens_trans linkando com a tabela de participantes para os ids respectivos
  public function query($id_part,request $request){

    $env_rec = $request->env_rec;
    $mens = null;

    if($env_rec == "env"){
    $mens = DB::table('mensagens_trans')->where('id_part', '=', $id_part)
    
    ->join('participantes', 'participantes.id', '=', 'mensagens_trans.id_part')
    ->join('participantes as dest', 'dest.id', '=', 'mensagens_trans.id_part_dest')

    //conecte também com transacoes , ofertas e necessidades, consultando todos os campos de cada uma envolvida na transaçao
    ->join('transacoes', 'transacoes.id', '=', 'mensagens_trans.id_trans')
    ->leftJoin('ofertas', 'ofertas.id', '=', 'transacoes.id_of_part')
    ->leftJoin('ofertas as trocas', 'trocas.id', '=', 'transacoes.id_of_tr_part')
    ->leftJoin('necessidades', 'necessidades.id', '=', 'transacoes.id_nec_part')

    //mostre os campos consultados
    ->select('mensagens_trans.*', 'participantes.nome_part as nome_part', 'dest.nome_part as nome_dest')
    ->get();
   
    }
    else{

        if($env_rec == "rec"){        
        $mens = DB::table('mensagens_trans')->where('id_part_dest', '=', $id_part)
    
        ->join('participantes', 'participantes.id', '=', 'mensagens_trans.id_part')
        ->join('participantes as dest', 'dest.id', '=', 'mensagens_trans.id_part_dest')

        ->join('transacoes', 'transacoes.id', '=', 'mensagens_trans.id_trans')
        ->leftJoin('ofertas', 'ofertas.id', '=', 'transacoes.id_of_part')
        ->leftJoin('ofertas as trocas', 'trocas.id', '=', 'transacoes.id_of_tr_part')
        ->leftJoin('necessidades', 'necessidades.id', '=', 'transacoes.id_nec_part')

        
        ->select('mensagens_trans.*', 'participantes.nome_part as nome_part', 'dest.nome_part as nome_dest')
        ->get();

        }

    }

    //retorna para a view cons_mensagem_geral com a variavel a consulta $mens
    if ($mens) {
        return view('cons_mensagens_geral', ['mens' => $mens]);
    } else {
        return view('cons_mensagens_geral', ['mens' => null]);
    }
   

  }
}
