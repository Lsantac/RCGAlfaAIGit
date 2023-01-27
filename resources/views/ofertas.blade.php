@extends('master')

@section('content')

<link rel="stylesheet" href="{{ asset('/css/ofertas.css') }}">

<div class="container">

    <h2 class="texto-oferta">Ofertas</h2>
    
    <div class="row">
        <div class="col-12">

            <form id="form-consultar"  class="d-flex" method="GET" action="{{route('consultar_ofertas')}}">
                @csrf

                <input class="form-control me-2 texto_p consulta" name="consulta_of" value="{{Session::get('criterio_of')}}" type="search" placeholder="Digite palavras para consulta..." aria-label="Consultar">

                <input class="form-control me-2 texto_p" list="rede-list" name="consulta_redes" value="{{Session::get('criterio_cons_rede')}}" id="consulta_redes" type="search" placeholder="Consulta por Rede...">
                <datalist id="rede-list">
                            @foreach ($redes as $rede)
                                    <option value="{{ $rede->nome }}"> 
                                            {{ $rede->nome }} 
                                    </option>
                            @endforeach
                </datalist>                         

                <button class="btn btn btn-primary me-3 btn-procurar" type="submit">Procurar</button>                        
                
            </form>
        </div>
        <br><br>

        <button form="form-consultar" class="btn btn btn-primary me-3 btn-procurar-cel" type="submit">Procurar</button>

        <div class="col-auto">
            <form action="mostra_varios_parts" method="post">
                @csrf

                @if (isset($ofps_map))
                    <button class="btn btn-mapa btn-sm bi-globe btn-mapa-geral-tam" type="submit"> Mapa Geral</button>

                    <input value="0" name="nome_part" type="hidden">
                    <input value="Oferta" name="of_nec" type="hidden">
                    <input value="{{Session::get('latitude')}}" name="latitude" type="hidden">
                    <input value="{{Session::get('longitude')}}" name="longitude" type="hidden"> 
                    @if (count($ofps_map)>0) 
                        @foreach($ofps_map as $ofp)
                            <input value="{{$ofp->id_part}}" name="parts[{{ $loop->index }}][id]" type="hidden">
                            <input value="{{$ofp->latitude}}" name="parts[{{ $loop->index }}][latitude]" type="hidden">
                            <input value="{{$ofp->longitude}}" name="parts[{{ $loop->index }}][longitude]" type="hidden">
                            <input value="{{$ofp->nome_part}}" name="parts[{{ $loop->index }}][nome_part]" type="hidden">
                            <input value="{{$ofp->endereco}}" name="parts[{{ $loop->index }}][endereco]" type="hidden"> 
                        @endforeach 
                    @endif 
                @endif
                
            </form>

        </div>

    </div>
    <br>
    @if (isset($ofps))

    <table class="table table-sm">
        <thead class="texto_m"> 
            <tr>
                <th scope="col" class="col-img">Imagem</th>
                <th scope="col" class="col-descr">Descrição</th>
                <th scope="col" class="col-data">Data</th>
                <th scope="col" class="col-quant">Quant</th>
                <th scope="col" class="col-unid">Unidade</th>
                <th scope="col" class="col-rede">Rede</th>
                <th scope="col" class="col-status">Status</th>
                <th scope="col" class="col-sugest" colspan="2">Transações</th>
                <th scope="col" class="col-mapa">Local</th>

            </tr>
        </thead>
        <tbody>
            @if (count($ofps)>0)
            @foreach($ofps as $ofp)
            <div>
                <td>
                    <div class="col-1">
                        <figure class="figure col-img">
                                @if(!@empty($ofp->imagem))
                                   <img id="imagem_of_cons" src="/uploads/of_img/{{$ofp->imagem}}" class="imagem-of-nec-cons">
                                @else
                                   <img id="imagem_of_cons" src="/imagens/logo.jpg" class="imagem-of-nec-cons">
                                @endif
                        </figure>
                    </div>
                </td>
                <td>
                    <div style="width: auto;">
                        <div>
                            <div class="row align-items-start">
                                <figure class="figure figure-img">
                                    @if(!@empty($ofp->imagem))
                                       <img id="imagem_of_cons" src="/uploads/of_img/{{$ofp->imagem}}" class="imagem-of-nec-cons card-img-top center-img">
                                    @else
                                       <img id="imagem_of_cons" src="/imagens/logo.jpg" class="imagem-of-nec-cons center-img">
                                    @endif
                                </figure>
                                <div class="col">
                                    <h5 class="card-title descr-oferta">{{$ofp->desc_of}}</h5>
                                    <h6 style="color:rgb(4, 97, 97)" class="card-subtitle mb-2 texto_m">Categoria : {{$ofp->desc_cat}} </h6>
                                    <p class="texto_m mostra-data"><strong> Data : </strong>
                                       @php $date = new DateTime($ofp->data); echo $date->format('d/m/Y'); @endphp
                                    </p> 
                                    
                                    <div class="mostra-obs">
                                        <p class="texto_m"><strong> Observações : </strong> {{$ofp->obs}} </p>
                                    </div>
                                </div>
                                <div class="d-lg-none">
                                    <p class="texto_m"><strong> Nome : </strong> {{$ofp->nome_part}} </p>
                                    <p class="texto_m"><strong>Endereço : </strong> {{$ofp->endereco}} , {{$ofp->cidade}} {{$ofp->estado}} - {{$ofp->pais}}</p>
                                </div>
                                
                                <div class="col d-none d-sm-none d-sx-none d-md-none d-lg-block">
                                    <p class="texto_m"><strong> Nome : </strong> {{$ofp->nome_part}} </p>
                                    <p class="texto_m"><strong>Endereço : </strong> {{$ofp->endereco}} , {{$ofp->cidade}} {{$ofp->estado}} - {{$ofp->pais}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="cols-vert texto_m">
                            
                            <strong>Quant :</strong> {{$ofp->quant}}
                            <strong>Unidade :</strong> {{$ofp->desc_unid}}<br>
                            <strong>Rede :</strong> {{$ofp->nome_rede}}<br>
                            <strong>Status :</strong>
                                   
                                    <div class="texto-em-andamento texto_m" style="display: inline-block">
                                        <span>
                                    @php
                                        echo App\Http\Controllers\IniciaController::consulta_status_transacoes_of_anda($ofp->id_of_part)
                                    @endphp  
                                    </span>
                                    </div>
                                    
                                    <div class="texto-parc-finalizada texto_m" style="display: inline-block">
                                        <span>
                                    @php
                                        echo App\Http\Controllers\IniciaController::consulta_status_transacoes_of_parc($ofp->id_of_part)
                                    @endphp  
                                    </span>
                                    </div>
            
                                    <div class="texto-finalizada texto_m" style="display: inline-block">
                                            <span>
                                        @php
                                            echo App\Http\Controllers\IniciaController::consulta_status_transacoes_of_final($ofp->id_of_part)
                                        @endphp  
                                        </span>
                                         
                                    </div>
                                    <br><br>
                                                                        
                                    <div class="row row-sug-map">
                                        
                                        <div class="col-4">
                                            @if($ofp->id_part <> Session::get('id_logado'))
                                                <form action="{{route('trans_trocas_part')}}" method="get">
                                                    @csrf
                                                    <input value="{{$ofp->id_part}}" name="id_part_t" type="hidden">
                                                    <input value="{{$ofp->id_of_part}}" name="id_of_part_t" type="hidden">
                                                    <input value="0" name="filtra_id_logado" type="hidden">
                                                    <input value="{{Session::get('id_logado')}}" name="id_logado" type="hidden">
                
                                                    <p><button type="submit" class="btn btn-sm btn-trocar bi-arrow-repeat texto_p btn-sug">&nbspTrocar</button></p>
                                                </form>
                                            @else
                                                <form action="{{route('trans_ofertas_part')}}" method="get">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-sugestoes bi-arrow-down-up texto_p btn-sug">
                                                        Sugestões <span class="badge sugestao-of-nec">
                                                                    {{App\Http\Controllers\OfertasController::verifica_sugestoes_of(Session::get('id_logado'),$ofp->desc_cat,$ofp->desc_of,$ofp->obs,1)}}
                                                                    </span>
                                                        </button>
                                                    <input value="1" name="filtra_id_logado" type="hidden">
                                                    <input value="{{$ofp->id_part}}" name="id_part_t" type="hidden">
                                                    <input value="{{$ofp->id_of_part}}" name="id_of_part_t" type="hidden">
                
                                                </form>
                                            @endif
                                        </div>
                                
                                        <div class="col">
                                            @if($ofp->latitude
                                            <>null)
                                                <form action="/mostramapa/{{$ofp->id_part}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-mapa btn-sm bi-globe texto_p btn-mapa-tam">
                                                        Mapa
                                                        </button>
                                                </form>
                                                @else
                                                <form action="/mostramapa/{{$ofp->id_part}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-mapa-disable btn-sm bi-globe texto_p btn-mapa-tam">
                                                    Mapa
                                                    </button>
                                                </form>
                                                @endif
                                        </div>
                                 </div>
                        </div> 

                    </div>
                </td>

                <td class="data col-data">
                      @php $date = new DateTime($ofp->data); echo $date->format('d/m/Y'); @endphp
                </td>
           
                <td class="texto_m col-quant">{{$ofp->quant}}</td>
                <td class="texto_m col-unid">{{$ofp->desc_unid}}</td>
                <td class="texto_m col-rede">{{$ofp->nome_rede}}</td>

                <td class="col-status">
                    <div class="row">
                        <div class="col-1 texto-em-andamento texto_m">
                            <span>
                          @php
                             echo App\Http\Controllers\IniciaController::consulta_status_transacoes_of_anda($ofp->id_of_part)
                          @endphp  
                        </span>
                        </div>
                       
                        <div class="col-1 texto-parc-finalizada texto_m">
                            <span>
                          @php
                             echo App\Http\Controllers\IniciaController::consulta_status_transacoes_of_parc($ofp->id_of_part)
                          @endphp  
                        </span>
                        </div>

                        <div class="col-1 texto-finalizada texto_m">
                            <span>
                          @php
                             echo App\Http\Controllers\IniciaController::consulta_status_transacoes_of_final($ofp->id_of_part)
                          @endphp  
                        </span>
                        </div>

                       

                    </div>
                </td>

                <td class="mostra-btn-sugest">
                    <div class="row">

                        <div class="col">
                            @if($ofp->id_part <> Session::get('id_logado'))
                                <form action="{{route('trans_trocas_part')}}" method="get">
                                    @csrf
                                    <input value="{{$ofp->id_part}}" name="id_part_t" type="hidden">
                                    <input value="{{$ofp->id_of_part}}" name="id_of_part_t" type="hidden">
                                    <input value="0" name="filtra_id_logado" type="hidden">
                                    <input value="{{Session::get('id_logado')}}" name="id_logado" type="hidden">

                                    <p><button type="submit" class="btn btn-sm btn-trocar bi-arrow-repeat texto_p btn-sug">&nbspTrocar</button></p>
                                </form>
                            @else
                                <form action="{{route('trans_ofertas_part')}}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-sugestoes bi-arrow-down-up texto_p btn-sug">
                                        Sugestões <span class="badge sugestao-of-nec">
                                                  {{App\Http\Controllers\OfertasController::verifica_sugestoes_of(Session::get('id_logado'),$ofp->desc_cat,$ofp->desc_of,$ofp->obs,1)}}
                                                  </span>
                                      </button>
                                    <input value="1" name="filtra_id_logado" type="hidden">
                                    <input value="{{$ofp->id_part}}" name="id_part_t" type="hidden">
                                    <input value="{{$ofp->id_of_part}}" name="id_of_part_t" type="hidden">

                                </form>
                            @endif
                        </div>

                    </div>
                </td>
                <td></td>

                <td class="mostra-btn-mapa">
                    <div class="col">
                        @if($ofp->latitude
                        <>null)
                            <form action="/mostramapa/{{$ofp->id_part}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-mapa btn-sm bi-globe texto_p btn-mapa-tam">
                                    Mapa
                                    </button>
                            </form>
                            @else
                            <form action="/mostramapa/{{$ofp->id_part}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-mapa-disable btn-sm bi-globe texto_p btn-mapa-tam">
                                  Mapa
                                </button>
                            </form>
                            @endif
                    </div>

                </td>

                </tr>
            </div>

            @endforeach
            @else
            <tr>
                <td>Nenhum registro encontrado</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endif

        </tbody>
    </table>
   

<!--    <div class="card-columns">
        @if (count($ofps)>0)
            <div class="row">
                @foreach($ofps as $ofp)
                <div class="col-12 col-md-3 col-sm-5">
                    <div class="card">
                    <img class="card-img-top mx-auto img-responsive" src="/uploads/of_img/{{$ofp->imagem}}" alt="Imagem da oferta">
                    <div class="card-body">
                        <h5 class="card-title">{{ $ofp->desc_of }}</h5>
                        <p class="card-text small-margin-bottom"><strong>Categoria:</strong> {{ $ofp->desc_cat }}</p>
                        <p class="card-text small-margin-bottom"><strong>Observações:</strong> {{ $ofp->obs }}</p>
                        <p class="card-text small-margin-bottom"><strong>Nome:</strong> {{ $ofp->nome_part }}</p>

                        <p class="card-text small-margin-bottom"><strong>Endereço : </strong> {{$ofp->endereco}} , {{$ofp->cidade}} {{$ofp->estado}} - {{$ofp->pais}}</p>

                        <p class="card-text small-margin-bottom"><strong>Data:</strong> @php $date = new DateTime($ofp->data); echo $date->format('d/m/Y'); @endphp </p>
                        
                        <p class="card-text small-margin-bottom"><strong>Quantidade:</strong> {{ $ofp->quant }}</p>
                        <p class="card-text small-margin-bottom"><strong>Unidade:</strong> {{ $ofp->desc_unid }}</p>
                        <p class="card-text small-margin-bottom"><strong>Rede:</strong> {{ $ofp->nome_rede }}</p>
                        <br>
                        <button class="btn btn-primary" onclick="rotinaEspecifica({{ $ofp->id }})">Transações</button>
                        <button class="btn btn-secondary" onclick="rotinaEspecifica({{ $ofp->id }})">Status</button>
                        <a href="" class="btn btn-info" target="_blank">Mapa</a>
                    </div>
                    </div>

                </div>
                @endforeach
            </div>
        @endif
      </div>
    -->  

    <div class="pagination">
        {{$ofps->links('layouts.paginationlinks')}}

    </div>

    @endif

</div>

@endsection