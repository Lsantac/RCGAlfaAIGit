@extends('master')

@section('content')

<link rel="stylesheet" href="{{ asset('/css/participantes.css') }}">

<div class="container">

    <h2 class="texto-participante">Participantes</h2> 
    <br>
    <div class='results'>
        @if(Session::get('fail_mapa'))
            <div class="alert alert-danger texto_p">
                {{Session::get('fail_mapa')}}
            </div>
        @endif
    </div>
    
    <form  class="d-flex" method="GET" action="{{route('procura')}}">

        @csrf

        <input class="form-control me-2 texto_m consulta" name="consulta" value="{{Session::get('criterio_cons_part')}}" type="search" placeholder="Digite palavras para consulta..." aria-label="Consultar">
                       
        <input class="form-control me-2 texto_m rede" list="rede-list" name="consulta_redes" value="{{Session::get('criterio_cons_rede')}}" id="consulta_redes" type="search" placeholder="Consulta por Rede...">
        <datalist id="rede-list" style="font-size: 12px;">
                  @foreach ($redes as $rede)
                           <option value="{{ $rede->nome }}"> 
                                  {{ $rede->nome }} 
                           </option> 
                  @endforeach
        </datalist> 
        
        <button class="btn btn btn-primary me-2 texto_p" type="submit">Procurar</button>
            
    </form>

    <!--<form class="d-flex" action="" method="post">
      @csrf
      <button type="submit" class="btn btn-mapa-geral btn-sm bi-globe no-margin">
        Mapa Geral
      </button>

    </form>-->
    

    <br>
    @if (isset($part)) 
    <table class="table table-sm texto_m table-responsive">
        <thead>
          <tr>
            <th class="col-foto" scope="col">Foto</th>
            <th class="col-part" scope="col">Participante</th>
            <th class="col-nome" scope="col">Nome</th>
            <th class="col-local" scope="col">Localização</th>
                        
            @if(Session::get('cons_rede'))
               <th class="col-rede" scope="col">Rede</th>
            @endif

            <th class="col-actions">Ações</th>
          </tr>
        </thead>
        <tbody>
          @if (count($part)>0)

              @foreach($part as $p)
                
                  <tr>
                    <!--<th scope="row">{{$p->id}}</th>-->
                    <td class="foto">
                      
                      @if(!@empty($p->imagem))
                          <img src="/uploads/participantes/{{$p->imagem}}" class="imagem-header">
                      @else
                          <img src="/imagens/logo.jpg" class="imagem-header">
                      @endif 

                    </td>
                    
                    <td class="nome">{{$p->nome_part}}</td>

                    <td class="end-vertical">
                        <strong>Endereço:</strong> {{$p->endereco}}<br>
                        <strong>Cidade:</strong> {{$p->cidade}}<br>
                        <strong>Estado:</strong> {{$p->estado}}<br>
                        <strong>Pais:</strong> {{$p->pais}}<br>
                        <strong>CEP:</strong> {{$p->cep}}<br>
                        <strong>Email:</strong> {{$p->email}}<br>
                    </td> 

                    <td class="end-tabela">
                      <table class="table-responsive">
                        <tr>
                          <td><b> Endereço : </b></td>
                          <td>{{ $p->endereco }}</td>
                          <td> </td>
                          <td><b>Cidade : </b></td>
                          <td>{{ $p->cidade }}</td>
                        </tr>
                       
                        <tr>
                          <td><b>Estado : </b></td>
                          <td>{{ $p->estado }}</td>
                          <td></td>
                          <td><b>País : </b> </td>
                          <td>{{ $p->pais }}</td>
                        </tr>
                                              
                        <tr>
                          <td><b>CEP : </b> </td>
                          <td>{{ $p->cep }}</td>
                          <td></td>
                          <td><b>Email : </b> </td>
                          <td>{{ $p->email }}</td>
                        </tr>
                        
                      </table>

                    </td>

                    @if(Session::get('cons_rede'))
                       <td>{{$p->nome_rede}}&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                    @endif

                    <td class="btn-group">
                      
                      <form class="col no-margin" action="/participantes/{{$p->id}}" method="POST">
                          <!--<a href="/alterar_participantes/{{$p->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil">Alterar</i></a>
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm bi bi-trash" type="submit">Excluir</button>  -->
                          
                          <a href="/consultar_participante/{{$p->id}}" class="btn btn-violeta btn-sm bi-card-text btn-detalhes texto_p"> Detalhes</a> 
                          
                       </form>   
                  
                       <form class="col" action="/mostramapa/{{$p->id}}" method="post">

                        @csrf

                        @if($p->latitude<>null)
                              <button type="submit" class="btn btn-mapa btn-sm bi-globe texto_p">
                        @else
                              <button type="submit" class="btn btn-mapa-disable btn-sm bi-globe texto_p">
                        @endif
                               Mapa
                              </button>

                        </form>

                      
                    </td>
                    
                  </tr>
                
                
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
            <td></td>
          </tr>    
          @endif 

        </tbody>
      </table>

      <div class="pagination">
           {{$part->links('layouts.paginationlinks')}}
           
      </div>

    @endif 

</div>



@endsection

