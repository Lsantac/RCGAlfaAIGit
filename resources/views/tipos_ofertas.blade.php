@extends('master')

@section('content')

<div class="container">

    <h2 class="texto-categoria">Tipos de Ofertas</h2> 
    <br>

    <div class='results'>
      @if(Session::get('success'))
          <div class="alert alert-success">
              {{Session::get('success')}}
          </div>
      @endif

      @if(Session::get('fail'))
          <div class="alert alert-danger">
              {{Session::get('fail')}}
          </div>
      @endif

    </div>

    <form class="row g-3" method="GET" action="consulta_tipos_ofertas">

          @csrf
     
          <div class="col-sm-8">
               <input class="form-control texto_p" id="consulta"  name="consulta" value="{{Session::get('criterio')}}" type="search">
               <input name="id_logado" type="hidden" value="{{Session::get('id_logado')}}"> 
          </div>
      
        <div class="col-sm">
          <button style="margin-right: 20px" class="btn btn-sm btn-primary " type="submit">Procurar</button>
         
        </div>
        
    </form>
    
    <br>

    @if (isset($tipo_of)) 

    <table class="table table-sm texto_m">
        <thead>
          <tr>
            <th scope="col">Descrição</th>
            <th>Categoria</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          @if (count($tipo_of)>0)

              @foreach($tipo_of as $tipo)
                <div>
                  <tr>
                    
                    <td>{{$tipo->descricao}}</td>
                    
                    <td>
                      <button class="btn btn-danger btn-sm bi bi-trash" type="button" data-bs-toggle="modal" data-bs-target="#ModalExcluiTipo-{{$tipo->id}}" >Excluir</button>

                      <form class="" action="/deleta_tipo_oferta/{{$tipo->id}}" method="POST">
                          @csrf
                          @method('DELETE')
                      
                          <!-- Modal -->
                          <div class="modal fade" id="ModalExcluiTipo-{{$tipo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Confirma Exclusão do Tipo ? "{{$tipo->descricao}}" ?</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                               
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Sair</button>
                                  <button type="submit" class="btn btn-danger">Excluir</button>
                                </div>
                              </div>
                            </div>
                          </div>

                      </form>
                    </td>
                  </tr>
                </div> 
                
              @endforeach

          @else
              <td><td>Nenhum registro encontrado</td></td>    
          @endif 

        </tbody>
      </table>

      <div class="pagination">
           {{$cats->links('layouts.paginationlinks')}}
           
      </div>

    @endif 
  </div>

@endsection


