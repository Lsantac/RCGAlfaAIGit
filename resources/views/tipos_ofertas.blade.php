@extends('master')

@section('content')

<div class="container">

    <h2 style="color:rgb(98, 138, 25)">Tipos de Ofertas</h2> 
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

    <form class="row g-3" method="GET" action="consultar_tipos_ofertas">

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
            <th scope="col">Categoria</th>
            <th scope="col">Unidade</th>
            <th scope="col">Ações</th>
         
          </tr>
        </thead>
        <tbody>
          @if (count($tipo_of)>0)

              @foreach($tipo_of as $tipo)
                <div>
                  <tr>
                    <td>{{$tipo->descricao}}</td>
                    <td>{{$tipo->categoria}}</td>
                    <td>{{$tipo->unidade}}</td>

                    <td style="width: 100px">
                      <button class="btn btn-warning btn-sm bi bi-pencil-square" type="button" data-bs-toggle="modal" data-bs-target="#ModalAlteraTipo-{{$tipo->id}}"> Alterar</button>

                      <!-- Modal altera tipo de oferta-->
                      <div class="modal fade" id="ModalAlteraTipo-{{$tipo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Alterar Tipo de Oferta</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                            <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                              <textarea form="form_altera_oferta" class="form-control" id="exampleFormControlTextarea1" name="descricao" required>{{$tipo->descricao}}</textarea>
                            </div>
                        
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Selecione uma Categoria</label>
                              <select form="form_altera_oferta" type="text" name="categoria" id="categoria" class="form-select" aria-label="Default select example" required>
                                <option value = "{{$tipo->categoria}}"></option>
                                @foreach ($cats as $cat)
                                  <option value="{{$cat->id}}">
                                        {{$cat->descricao}}
                                  </option>
                                @endforeach
                              </select>

                              <br>

                              <label for="unidade" class="form-label">Selecione uma Unidade</label>
                              <select form="form_altera_oferta" type="text" name="unidade" id="unidade" class="form-select" aria-label="Default select example" required>
                                <option value = ""></option>
                                @foreach ($unids as $unid)
                                  <option value="{{$unid->id}}">
                                        {{$unid->descricao}}
                                  </option>
                                @endforeach

                              </select>
                            </div>

                            <div class="modal-footer">
                              <form action="" method="POST" name="form_alterar_oferta">
                                 @csrf
                                <input name="id" type="hidden" value="{{$tipo->id}}">

                                <button type="button" class="btn btn-sair" data-bs-dismiss="modal">Sair</button>
                                <button type="submit" class="btn btn-warning">Alterar</button>
                              </form>
                             
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
  
                    <td style="width: 100px">
                      <button class="btn btn-danger btn-sm bi bi-trash" type="button" data-bs-toggle="modal" data-bs-target="#ModalExcluiTipo-{{$tipo->id}}" > Excluir</button>

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
           {{$tipo_of->links('layouts.paginationlinks')}}
           
      </div>

    @endif 
  </div>

@endsection


