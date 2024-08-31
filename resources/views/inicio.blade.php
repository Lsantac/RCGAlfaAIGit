
@extends('master')

@section('content')

<link rel="stylesheet" href="{{ asset('/css/inicio.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .overlay a {
    pointer-events: auto; /* Garante que os cliques nos links dentro do balão sejam capturados */
    }
</style>

<link rel="stylesheet" href="/css/ol.css">


    <div class="container">
        <div class="">
            <div class="row">

                <div class="col">
                    <div class="card card-inicio">
                        <h6 class="card-header header-oferta"><a style="text-decoration: none;" href="/ofertas_part/{{Session::get('id_logado')}}" class="texto-oferta bi-arrow-up-circle-fill"> Minhas Ofertas</a></h6>
                        <div class="card-body">

                        <a href="/cons_trans_ofertas_part/{{2}}/{{Session::get('id_logado')}}" style="text-decoration: none;">
                            <div class="row">
                            <div class="col-1">
                                <h4 class="bi bi-chat-left-dots-fill texto-em-andamento"></h4>
                            </div>
                            <div class="col-11">
                                <p class="card-text" style="color:black;">
                                @if(($num_mens_anda_of_tr > 1) or ($num_mens_anda_of_tr == 0))
                                    Existem <span style="color:rgb(197, 15, 233);"><b>{{$num_mens_anda_of_tr}}</b></span> transações em andamento.
                                @else
                                    Existe <span style="color:rgb(197, 15, 233);"><b>{{$num_mens_anda_of_tr}}</b></span> transação em andamento.
                                @endif
                                </p>
                            </div>
                            </div>
                        </a>

                        <a href="/cons_trans_ofertas_part/{{3}}/{{Session::get('id_logado')}}" style="text-decoration: none;">
                        <div class="row">
                            <div class="col-1">
                            <h4 class="bi bi-check-circle-fill texto-parc-finalizada"></h4>
                            </div>
                            <div class="col-11">
                            <p style="color:black;">
                                @if(($num_ofp_parc > 1) or ($num_ofp_parc == 0))
                                    Existem <span style="color:rgb(15, 135, 233);"><b>{{$num_ofp_parc}}</b></span> transações confirmadas parcialmente.
                                @else
                                    Existe <span style="color:rgb(15, 135, 233);"><b>{{$num_ofp_parc}}</b></span> transação confirmada parcialmente.
                                @endif
                            </p>
                            </div>
                        </div>
                        </a>

                        <a href="/cons_trans_ofertas_part/{{4}}/{{Session::get('id_logado')}}" style="text-decoration: none;">
                        <div class="row">
                            <div class="col-1">
                            <h4 class="bi bi-check-circle-fill texto-finalizada"></h4>
                            </div>
                            <div class="col-11">
                                @if(($num_ofp_final > 1) or ($num_ofp_final == 0))
                                    <p style="color:black;">
                                    Existem <span style="color:rgb(101, 12, 218);"><b>{{$num_ofp_final}}</b></span> transações já finalizadas.
                                    </p>
                                @else
                                    <p style="color:black;">
                                    Existe <span style="color:rgb(101, 12, 218);"><b>{{$num_ofp_final}}</b></span> transação já finalizada.
                                    </p>
                                @endif
                            </div>
                        </div>
                        </a>

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-inicio">
                        <h6 class="card-header header-necessidade"><a style="text-decoration: none;" href="/necessidades_part/{{Session::get('id_logado')}}" class="texto-necessidade bi-arrow-down-circle-fill"> Minhas Necessidades</a></h6>
                        <div class="card-body">

                        <a href="/cons_trans_necessidades_part/{{2}}/{{Session::get('id_logado')}}" style="text-decoration: none;">
                        <div class="row">
                            <div class="col-1">
                            <h4 class="bi bi-chat-left-dots-fill texto-em-andamento"></h4>
                            </div>
                            <div class="col-11">
                            <p class="card-text" style="color:black;">
                                @if($num_mens_anda_nec > 1 or $num_mens_anda_nec == 0)
                                Existem <span style="color:rgb(197, 15, 233);"><b>{{$num_mens_anda_nec}}</b></span> transações em andamento.
                                @else
                                Existe <span style="color:rgb(197, 15, 233);"><b>{{$num_mens_anda_nec}}</b></span> transação em andamento.
                                @endif
                            </p>
                            </div>
                        </div>
                        </a>

                        <a href="/cons_trans_necessidades_part/{{3}}/{{Session::get('id_logado')}}" style="text-decoration: none;">
                        <div class="row">
                            <div class="col-1">
                            <h4 class="bi bi-check-circle-fill texto-parc-finalizada"></h4>
                            </div>
                            <div class="col-11">
                            <p style="color:black;">
                                @if($num_nec_parc > 1 or $num_nec_parc == 0 )
                                Existem <span style="color:rgb(15, 135, 233);"><b>{{$num_nec_parc}}</b></span> transações confirmadas parcialmente.
                                @else
                                Existe <span style="color:rgb(15, 135, 233);"><b>{{$num_nec_parc}}</b></span> transação confirmada parcialmente.
                                @endif
                            </p>
                            </div>
                        </div>
                        </a>

                        <a href="/cons_trans_necessidades_part/{{4}}/{{Session::get('id_logado')}}" style="text-decoration: none;">
                        <div class="row">
                            <div class="col-1">
                            <h4 class="bi bi-check-circle-fill texto-finalizada"></h4>
                            </div>
                            <div class="col-11">
                                @if($num_nec_final > 1 or $num_nec_final == 0)
                                    <p style="color:black;">
                                    Existem <span style="color:rgb(101, 12, 218);"><b>{{$num_nec_final}}</b></span> transações já finalizadas.
                                    </p>
                                @else
                                    <p style="color:black;">
                                    Existe <span style="color:rgb(101, 12, 218);"><b>{{$num_nec_final}}</b></span> transação já finalizada.
                                    </p>
                                @endif
                            </div>
                        </div>
                        </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

         <div class="row">
  
                <div class="col">
                    <div class="card" >
                        <div style="height:30rem;" class="card-body" id="map_of" >
                            <div id="fullscreen_map_of">↕</div> <!-- Símbolo de maximização --> 
                           
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card" >
                        <div  style="height:30rem;" class="card-body" id="map_nec">
                            <div id="fullscreen_map_nec">↕</div> <!-- Símbolo de maximização --> 
                            
                        </div>

                        

                    </div>
                </div>

            </div>
       
        <br>
     
    </div>


<script src="/js/ol.js"></script>
<script src="/js/mapas_inicio.js"></script>

<script>
    var markers_of = @json($markers_of);
    var markers_nec = @json($markers_nec);

    // Chamando as funções para inicializar os mapas
    inicializarMapaOF(markers_of);
    inicializarMapaNEC(markers_nec);
</script>

@endsection
