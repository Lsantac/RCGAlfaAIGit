<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class MensagensGeralController extends Controller
{
  //consulta mensagens do participante na tabela mensagens_trans linkando com a tabela de participantes para os ids respectivos
  public function query($id_part,request $request){

    $env_rec = $request->tipo_mensagem;
    $mens = null;

    //se $env_rec for null então seta para 'rec'
   if(!$env_rec){
    $env_rec = "rec";
   }

  // dd($env_rec);
  
    $query = DB::table('mensagens_trans')
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

    //consulta nome participante das ofertas, trocas e necessidades
    ->leftJoin('participantes as part_of', 'part_of.id', '=', 'ofertas_part.id_part')
    ->leftJoin('participantes as part_tr', 'part_tr.id', '=', 'trocas_part.id_part')
    ->leftJoin('participantes as part_nec', 'part_nec.id', '=', 'necessidades_part.id_part')

    //consulta descricao da moeda da transaçao
    ->leftJoin('moedas', 'moedas.id', '=', 'transacoes.id_moeda')

    //mostre os campos consultados
    ->select('mensagens_trans.*',
    'transacoes.*',

    //mostra mensagem
    'mensagens_trans.mensagem as msg',
    'mensagens_trans.data as data_msg',

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

    //mostra os nomes das ofertas, trocas e necessidades
    'part_of.nome_part as nome_part_of',
    'part_tr.nome_part as nome_part_tr',
    'part_nec.nome_part as nome_part_nec',
        
    //mostra nome da moeda
    'moedas.desc_moeda as fluxo',
    
    'dest.nome_part as nome_dest');

    if ($env_rec == "env") {

      $query->where('mensagens_trans.id_part', '=', $id_part);

    } elseif ($env_rec == "rec") {

      $query->where('mensagens_trans.id_part_dest', '=', $id_part);

    }
    
    $query->orderBy('mensagens_trans.data', 'desc');
    $mens = $query->paginate(10)->appends($request->all());

    //dd($mens->get());     
   
    //retorna para a view cons_mensagem_geral com a variavel a consulta $mens
    if ($mens) {
        return view('cons_mensagens_geral', ['mens' => $mens,'env_rec'=>$env_rec]);
    } else {
        return view('cons_mensagens_geral', ['mens' => null,'env_rec'=>$env_rec]);
    }
   

  }

  public function query_old($id_part,request $request){

    $env_rec = $request->tipo_mensagem;
    $mens = null;

    //se $env_rec for null então seta para 'rec'
   if(!$env_rec){
    $env_rec = "rec";
   }

  // dd($env_rec);

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

    //consulta nome participante das ofertas, trocas e necessidades
    ->leftJoin('participantes as part_of', 'part_of.id', '=', 'ofertas_part.id_part')
    ->leftJoin('participantes as part_tr', 'part_tr.id', '=', 'trocas_part.id_part')
    ->leftJoin('participantes as part_nec', 'part_nec.id', '=', 'necessidades_part.id_part')

    //consulta descricao da moeda da transaçao
    ->leftJoin('moedas', 'moedas.id', '=', 'transacoes.id_moeda')

    //mostre os campos consultados
    ->select('mensagens_trans.*',
    'transacoes.*',

    //mostra mensagem
    'mensagens_trans.mensagem as msg',
    'mensagens_trans.data as data_msg',

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

    //mostra os nomes das ofertas, trocas e necessidades
    'part_of.nome_part as nome_part_of',
    'part_tr.nome_part as nome_part_tr',
    'part_nec.nome_part as nome_part_nec',
        
    //mostra nome da moeda
    'moedas.desc_moeda as fluxo',
    
    'dest.nome_part as nome_dest')
    
    ->orderBy('mensagens_trans.data', 'desc')
    ->paginate(10)
    ->appends($request->all());
   
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

        ->leftJoin('participantes as part_of', 'part_of.id', '=', 'ofertas_part.id_part')
        ->leftJoin('participantes as part_tr', 'part_tr.id', '=', 'trocas_part.id_part')
        ->leftJoin('participantes as part_nec', 'part_nec.id', '=', 'necessidades_part.id_part')

        ->leftJoin('moedas', 'moedas.id', '=', 'transacoes.id_moeda')
        
        ->select('mensagens_trans.*',
        'transacoes.*',

        'mensagens_trans.mensagem as msg',
        'mensagens_trans.data as data_msg',
        
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

        'part_of.nome_part as nome_part_of',
        'part_tr.nome_part as nome_part_tr',
        'part_nec.nome_part as nome_part_nec',

        'moedas.desc_moeda as fluxo',

        'dest.nome_part as nome_dest')

        //ordenar por data decrescente e pagina com 10 linhas e depois faz o append geral
        ->orderBy('mensagens_trans.data', 'desc')
        ->paginate(10)
        ->appends($request->all());

        }

    }

   // dd($mens);

   

   //dd($env_rec);

    //retorna para a view cons_mensagem_geral com a variavel a consulta $mens
    if ($mens) {
        return view('cons_mensagens_geral', ['mens' => $mens,'env_rec'=>$env_rec]);
    } else {
        return view('cons_mensagens_geral', ['mens' => null,'env_rec'=>$env_rec]);
    }
   

  }

  //crie função show para mostrar apenas a view cons_mensagens_geral mas sem registros. 
  public function show(){
    return view('cons_mensagens_geral', ['mens' => null]);
  }

}
