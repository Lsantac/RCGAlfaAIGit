@extends('master')

@section('content')

<div class="container">

  <div class="row">
    <div>
      <div class="col-auto d-block d-lg-none">
        <div class="row">
             <div class="col-auto">
                <h5 class="texto-oferta" style="color:rgb(91, 19, 207);">Detalhes da Transação</h5>      
             </div>
             <div class="col">
                <a class="btn btn-primary btn-sm" href="#mensagens" role="button">Mensagens</a>
             </div>
        </div>
        
      </div>
    </div>
    <div class="col-6 d-none d-lg-block">
         <h4 class="texto-oferta" style="color:rgb(91, 19, 207);">Detalhes da Transação</h4>      
    </div>
  </div>

  <br>

  <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-3">
    <div class="col">

        <div class="card">

              <div class="d-none d-lg-block">
                <h6 class="card-header header-oferta" style="padding-bottom: 0px;padding-left:10px;padding-top:10px;">
                  <span>
                    <figure class="figure">
                      @if(!@empty($ofps->imagem))
                          <img id="imagem_of_cons"  src="/uploads/of_img/{{$ofps->imagem}}" class="imagem-pequena">
                      @else
                          <img id="imagem_of_cons" src="/imagens/logo.jpg" class="imagem-pequena">
                      @endif 
                    </figure>
                    &nbsp
                  </span>Oferta : {{$ofps->desc_of}}</h6>
              </div>

              <div class="d-block d-lg-none">
                <h6 class="card-header header-oferta" style="font-size:smaller; padding-bottom: 0px;padding-left:10px;padding-top:10px;">
                  <span>
                    <figure class="figure">
                      @if(!@empty($ofps->imagem))
                          <img id="imagem_of_cons"  src="/uploads/of_img/{{$ofps->imagem}}" class="imagem-pequena">
                      @else
                          <img id="imagem_of_cons" src="/imagens/logo.jpg" class="imagem-pequena">
                      @endif 
                    </figure>
                    &nbsp
                  </span>Oferta : {{$ofps->desc_of}}</h6>                

              </div>

          <div class="card-body">
            <h6 class="card-title">{{$ofps->nome_part}}</h6>
            <div class="card-text texto_m">Categoria : {{$ofps->desc_cat}}</div>
            <div class="card-text texto_m">Quant inicial : {{$ofps->quant}}  {{$ofps->desc_unid}}</div>

            @if($disp_qt_of_trans > 0)
               <div style="color: blue;" class="card-text texto_m">Quant disponivel : {{$disp_qt_of_trans}}  {{$ofps->desc_unid}}</div>
            @else
               <div style="color: red;" class="card-text texto_m">Quant disponivel : {{$disp_qt_of_trans}}  {{$ofps->desc_unid}}</div>
            @endif
            
            <div class="card-text texto_m">Obs : {{$ofps->obs}}</div>
            <br>
            <div class="row">
                <div class="col-3">
                  <a href="/consultar_participante/{{$ofps->id_part}}" class="btn btn-primary btn-sm">Ver Perfil</a>    
                </div>
                <div class="col-9">
                  <div style="color:rgb(13, 122, 13); text-decoration:double;" class="card-text"> 
                    <div class=" texto_p d-block d-lg-none">
                        <strong> Confirmada em :
                          @php
                          if(isset($trans[0])){
                            if($trans[0]->data_final_of_part > 0){
                              $date = new DateTime($trans[0]->data_final_of_part);
                              echo $date->format('d-m-Y'). " (UTC: ".$date->format('H:i').")" ;
                            }
                          }
                          @endphp
                        </strong>
                        @if(isset($rating_of))  
                          <div>Avaliação : {{$rating_of->description}}</div>
                          <div>Obs : {{$rating_of->obs_rating}}</div>
                        @endif

                    </div>
                    <div class=" texto_m d-none d-lg-block">
                      <strong> Confirmada em :
                        @php
                        if(isset($trans[0])){
                          if($trans[0]->data_final_of_part > 0){
                            $date = new DateTime($trans[0]->data_final_of_part);
                            echo $date->format('d-m-Y'). " (UTC: ".$date->format('H:i').")" ;
                          }
                        }
                        @endphp
                      </strong>
                      @if(isset($rating_of))  
                          <div>Avaliação : {{$rating_of->description}}</div>
                          <div>Obs : {{$rating_of->obs_rating}}</div>
                      @endif
                  </div>

                  </div>
                  
                </div>
                
            </div>
            
          </div>
        </div>

    </div>

    <div class="col">
      <div class="card">
        @if(isset($necps))

        <div class="d-none d-lg-block">

            <h6 class="card-header header-necessidade" style="padding-bottom: 0px;padding-left:10px;padding-top:10px;">
              <span>
                <figure class="figure">
                  @if(!@empty($necps->imagem))
                      <img id="imagem_nec_cons"  src="/uploads/nec_img/{{$necps->imagem}}" class="imagem-pequena">
                  @else
                      <img id="imagem_nec_cons" src="/imagens/logo.jpg" class="imagem-pequena">
                  @endif 
                </figure>
                &nbsp
              </span>Necessidade : {{$necps->desc_nec}}
            </h6>
        </div>

        <div class="d-block d-lg-none">
          <h6 class="card-header header-necessidade" style="font-size:smaller; padding-bottom: 0px;padding-left:10px;padding-top:10px;">
            <span>
              <figure class="figure">
                @if(!@empty($necps->imagem))
                    <img id="imagem_nec_cons"  src="/uploads/nec_img/{{$necps->imagem}}" class="imagem-pequena">
                @else
                    <img id="imagem_nec_cons" src="/imagens/logo.jpg" class="imagem-pequena">
                @endif 
              </figure>
              &nbsp
            </span>Necessidade : {{$necps->desc_nec}}
          </h6>
        </div>  

            <div class="card-body">
              <h6 class="card-title">{{$necps->nome_part}}</h6>
              <div class="card-text texto_m">Categoria : {{$necps->desc_cat}}</div>
              <div class="card-text texto_m">Quant inicial : {{$necps->quant}}  {{$necps->desc_unid}}</div>
              @if($disp_qt_nec_trans > 0)
                <div style="color: blue;" class="card-text texto_m">Quant disponivel : {{$disp_qt_nec_trans}}  {{$necps->desc_unid}}</div>
              @else
                <div style="color: red;" class="card-text texto_m">Quant disponivel : {{$disp_qt_nec_trans}}  {{$necps->desc_unid}}</div>
              @endif
              <div class="card-text texto_m">Obs : {{$necps->obs}}</div>
              <br>
              <div class="row">
                <div class="col-3">
                  <a href="/consultar_participante/{{$necps->id_part}}" class="btn btn-primary btn-sm">Ver Perfil</a>    
                </div>
                <div class="col-9">
                  <div style="color:rgb(122, 66, 13); text-decoration:double;" class="card-text"> 
                    <div class=" texto_p d-block d-lg-none">
                        <strong> Confirmada em :
                            @php
                                if(isset($trans[0])){
                                  if($trans[0]->data_final_nec_part > 0){
                                    $date = new DateTime($trans[0]->data_final_nec_part);
                                    echo $date->format('d-m-Y'). " (UTC: ".$date->format('H:i').")" ;
                                  }
                                }
                            @endphp
                        </strong>
                    </div>
                    <div class=" texto_m d-none d-lg-block">
                      <strong> Confirmada em :
                          @php
                              if(isset($trans[0])){
                                if($trans[0]->data_final_nec_part > 0){
                                  $date = new DateTime($trans[0]->data_final_nec_part);
                                  echo $date->format('d-m-Y'). " (UTC: ".$date->format('H:i').")" ;
                                }
                              }
                          @endphp
                      </strong>
                  </div>

                  </div>
                </div>
            </div>
        @else

          <h6 class="card-header header-troca" style="padding-bottom: 0px;padding-left:10px;padding-top:10px;">
            <span>
              <figure class="figure">
                @if(!@empty($oftrps->imagem))
                    <img id="imagem_of_tr_cons"  src="/uploads/of_img/{{$oftrps->imagem}}" class="imagem-pequena">
                @else
                    <img id="imagem_of_tr_cons" src="/imagens/logo.jpg" class="imagem-pequena">
                @endif 
              </figure>
              &nbsp
            </span>Oferta Troca : {{$oftrps->desc_of}}</h6>

            <div class="card-body">
              <h6 class="card-title">{{$oftrps->nome_part}}</h6>
              <div class="card-text texto_m">Categoria : {{$oftrps->desc_cat}}</div>
              <div class="card-text texto_m">Quant inicial : {{$oftrps->quant}}  {{$oftrps->desc_unid}}</div>
              @if($disp_qt_of_tr_trans > 0)
                <div style="color: blue;" class="card-text texto_m">Quant disponivel : {{$disp_qt_of_tr_trans}}  {{$oftrps->desc_unid}}</div>
              @else
                <div style="color: red;" class="card-text texto_m">Quant disponivel : {{$disp_qt_of_tr_trans}}  {{$oftrps->desc_unid}}</div>
              @endif
              <div class="card-text texto_m">Obs : {{$oftrps->obs}}</div>
              <br>
              <div class="row">
                <div class="col-3">
                  <a href="/consultar_participante/{{$oftrps->id_part}}" class="btn btn-primary btn-sm">Ver Perfil</a>    
                </div>
                <div class="col-9">
                  <div style="color:rgb(13, 122, 107); text-decoration:double;" class="card-text"> 
                    <div class=" texto_p d-block d-lg-none">
                        <strong> Confirmada em :
                            @php
                                if(isset($trans[0])){
                                  if($trans[0]->data_final_of_tr_part > 0){
                                    $date = new DateTime($trans[0]->data_final_of_tr_part);
                                    echo $date->format('d-m-Y'). " (UTC: ".$date->format('H:i').")" ;
                                  }
                                }
                            @endphp
                        </strong>
                    </div>
                    <div class=" texto_m d-none d-lg-block">
                      <strong> Confirmada em :
                          @php
                              if(isset($trans[0])){
                                if($trans[0]->data_final_of_tr_part > 0){
                                  $date = new DateTime($trans[0]->data_final_of_tr_part);
                                  echo $date->format('d-m-Y'). " (UTC: ".$date->format('H:i').")" ;
                                }
                              }
                          @endphp
                      </strong>
                  </div>

                  </div>
                </div>
            </div>
        @endif

        </div>
      </div>
    </div>

    <div class="col">

      <div class="card">
        <h6 class="card-header header-trans">Definições</h6>
        <div class="card-body">

            <div class="row">
              <div class="col-auto">
                <label for="inputMoeda" class="">Fluxo :</label>
              </div>

              <div class="col-auto ">
                @if(isset($oftrps))
                    <input  class="form-control" value="Troca" name="Fluxo_tr" id="Fluxo_tr" readonly>
                    <input form="finalizar_transacao" value="1" name="Fluxo" id="Fluxo" type="hidden">
                @else 
                    <select form="finalizar_transacao" class="form-select texto_m" aria-label="Default select example" name="Fluxo" id="Fluxo" required>
                            @if (count($trans)>0)
                                 <option value="{{$trans[0]->id_moeda}}" selected>{{$trans[0]->desc_moeda}}</option>
                            @else
                              <option value = "" selected></option>
                            @endif
                            @foreach ($moedas as $moeda)
                              <option value="{{$moeda->id}}"> 
                                    {{$moeda->desc_moeda}} 
                              </option>
                            @endforeach
                    </select>
                @endif
              </div>
            </div>
              <br> 

              <div class="row texto_m">
                <div class="col-4">
                  <label for="inputQtMoeda" class="">Qt Fluxo :</label>
                </div>
  
                <div class="col-4 ">
                  @if (count($trans)>0)
                      <input onkeypress="return event.keyCode!=13" id="QtFluxo" form="finalizar_transacao" value="{{$trans[0]->quant_moeda}}"  type="" name="QtFluxo" class="form-control texto_m"  required>
                  @else
                      <input onkeypress="return event.keyCode!=13" id="QtFluxo" form="finalizar_transacao" value="1"  type="" name="QtFluxo" class="form-control texto_m"  required>
                  @endif
                </div>
              </div>


              <div class="row texto_m">
                <div class="col-4">
                  <label for="inputQtOf" class="">Qt Oferta :</label>
                </div>
  
                <div class="col-auto">
                  <div class="row">
                    <div class="col-7">
                         @if (count($trans)>0)
                             <input onkeypress="return event.keyCode!=13" id="QtOf" name="QtOf" onchange="verifica_quant({{$disp_qt_of_trans}},'of')"  form="finalizar_transacao"  value="{{$trans[0]->quant_of}}" type=""  class="form-control texto_m"  required>  
                         @else
                             <input onkeypress="return event.keyCode!=13" id="QtOf" name="QtOf" onchange="verifica_quant({{$disp_qt_of_trans}},'of')" form="finalizar_transacao"  value="{{$disp_qt_of_trans}}" type=""  class="form-control texto_m"  required>  
                         @endif    
                    </div>
                    <div class="col-3" style="padding: 5px 0;border: 3px;">{{$ofps->desc_unid}}</div>
                  </div>

                </div>
              </div>

              <div class="row texto_m">
                @if(isset($necps))
                    <div class="col-4">
                      <label for="inputQtNec" class="">Qt Necessidade :</label>
                    </div>
      
                    <div class="col-auto ">
                      <div class="row">
                          <div class="col-7 ">
                            @if (count($trans)>0)
                                <input  onkeypress="return event.keyCode!=13" id="QtNec" name="QtNec" onchange="verifica_quant({{$disp_qt_nec_trans}},'nec')" form="finalizar_transacao"  value="{{$trans[0]->quant_nec}}" type=""  class="form-control texto_m"  required>  
                            @else
                                <input  onkeypress="return event.keyCode!=13" id="QtNec" name="QtNec" onchange="verifica_quant({{$disp_qt_nec_trans}},'nec')" form="finalizar_transacao"  value="{{$disp_qt_nec_trans}}" type=""  class="form-control texto_m"  required>  
                            @endif  
                          </div>
                          <div class="col-3" style="padding: 5px 0;border: 3px;">{{$necps->desc_unid}}</div>
                          
                      </div>
                    </div>
                  </div>
                @else
                    <div class="col-4">
                      <label for="inputQtOfTr" class="">Qt Oferta troca :</label>
                    </div>
      
                    <div class="col-8 ">
                      <div class="row">
                          <div class="col-6 ">
                            @if (count($trans)>0)
                                <input  onkeypress="return event.keyCode!=13" id="QtOfTr" name="QtOfTr" onchange="verifica_quant({{$disp_qt_of_tr_trans}},'tr')" form="finalizar_transacao"  value="{{$trans[0]->quant_of_tr}}" type=""  class="form-control texto_m"  required>  
                            @else
                                <input  onkeypress="return event.keyCode!=13" id="QtOfTr" name="QtOfTr" onchange="verifica_quant({{$disp_qt_of_tr_trans}},'tr')" form="finalizar_transacao"  value="{{$disp_qt_of_tr_trans}}" type=""  class="form-control texto_m"  required>  
                            @endif  
                          </div>
                          <div class="col-3" style="padding: 5px 0;border: 3px;">{{$oftrps->desc_unid}}</div>
                          
                      </div>
                    </div>
                  </div>
                @endif

                <br>

                <div class="row">
                  <div class="col-auto">
                      <!-- Modal -->
                      <form id='finalizar_transacao'  action="{{route('finalizar_transacao')}}" method="get">
                        
                        @csrf

                        <!-- Button trigger modal Finalizar -->
                        <button  id="botao_finalizar" onclick="verifica_zeros('{{$origem}}')"  type="button" class="btn btn-finalizar btn-sm" >
                          Finalizar 
                        </button>

                        <div class="modal fade" id="finalizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Finalizar Transação?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                Concorda com os termos combinados nas mensagens e nas definições da transação? 
                                <br>
                                Para que a transação seja finalizada completamente, é preciso que as duas partes confirmem. 
                                <br><br>
                                <label for="id_rating" class="form-label">Selecione uma Avaliação</label>
                                <select required="required" name="id_rating" id="id_rating" style="width: 350px;" class="form-select" aria-label="Default select example">
                                  <option selected></option>
                                  <option value="5">Otimo</option>
                                  <option value="4">Bom</option>
                                  <option value="3">Regular</option>
                                  <option value="2">Ruim</option>
                                  <option value="1">Pessimo</option>
                                </select>
                                <br>
                                <label for="exampleFormControlTextarea1" class="form-label">Observações</label>
                                <textarea  name="obs_rating" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                              </div>

                              <input value="{{Session('id_logado')}}" name="id_logado" id="id_logado" type="hidden">
                              <input value="{{$ofps->id_part}}" name="id_part_of" id="id_part_of" type="hidden">
                              <input value="{{$ofps->id_of_part}}" name="id_of_part_t" id="id_of_part_t" type="hidden">

                              <input value="{{$disp_qt_of_trans}}" name="disp_qt_of_trans" id="disp_qt_of_trans" type="hidden">
                              <input value="{{$disp_qt_of_tr_trans}}" name="disp_qt_of_tr_trans" id="disp_qt_of_tr_trans" type="hidden">
                              <input value="{{$disp_qt_nec_trans}}" name="disp_qt_nec_trans" id="disp_qt_nec_trans" type="hidden">

                              @if(isset($oftrps))
                                <input value="{{$oftrps->id_part}}" name="id_part_of_tr" id="id_part_of_tr" type="hidden">
                                <input value="{{$oftrps->id_of_part}}" name="id_of_tr_part_t" id="id_of_tr_part_t" type="hidden">
                                <input value="0" name="id_nec_part_t" id="id_nec_part_t" type="hidden">
                              @else
                                <input value="{{$necps->id_part}}" name="id_part_nec" id="id_part_nec" type="hidden">
                                <input value="{{$necps->id_nec_part}}" name="id_nec_part_t" id="id_nec_part_t" type="hidden">
                                <input value="0" name="id_of_tr_part_t" id="id_of_tr_part_t" type="hidden">
                              @endif
                              
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                                <button type="submit" class="btn btn-finalizar">Confirmar</button>
                              </div>
                            </div>
                          </div>
                        </div>

                      </form>  

                  </div>

                  
                  <div class="col">
                    @if(isset($trans[0]))
                        <!-- Modal -->
                        <form id='cancelar_transacao'  action="{{route('cancelar_transacao')}}" method="get">
                          
                          @csrf
                          
                              @if(($origem == "of"  and $trans[0]->data_final_of_part > 0) or 
                                  ($origem == "nec" and $trans[0]->data_final_nec_part > 0) or 
                                  ($origem == "tr"  and $trans[0]->data_final_of_tr_part > 0)) 
                                      <button  id="botao_cancelar" type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#cancelar">
                                        Cancelar
                                      </button>      
                              @endif 
                            
                          <!-- Button trigger modal Cancelar -->
                     
                          <div class="modal fade" id="cancelar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Cancela confirmação da Transação?</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                  <div class="mb-3">
                                    <label for="mensagem_motivo" class="form-label">Motivo do cancelamento :</label>
                                    <textarea class="form-control" id="mensagem_motivo" name="mensagem_motivo" rows="3"></textarea>
                                  </div>
                                </div>
                                
                                <input value="{{Session('id_logado')}}" name="id_logado" id="id_logado" type="hidden">
                                <input value="{{$trans[0]->id}}" name="id_trans" id="id_trans" type="hidden">
                                <input value="{{$origem}}" name="origem" id="origem" type="hidden">

                                <input value="{{$ofps->id_part}}" name="id_part_of" id="id_part_of" type="hidden">

                                <input value="{{$disp_qt_of_trans}}" name="disp_qt_of_trans" id="disp_qt_of_trans" type="hidden">
                                <input value="{{$disp_qt_of_tr_trans}}" name="disp_qt_of_tr_trans" id="disp_qt_of_tr_trans" type="hidden">
                                <input value="{{$disp_qt_nec_trans}}" name="disp_qt_nec_trans" id="disp_qt_nec_trans" type="hidden">

                                @if(isset($oftrps))
                                   <input value="{{$oftrps->id_part}}" name="id_part_of_tr" id="id_part_of_tr" type="hidden">
                                @else
                                   <input value="{{$necps->id_part}}" name="id_part_nec" id="id_part_nec" type="hidden">
                                @endif
                                
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                                  <button type="submit" onclick="pega_valor_qtof()"   class="btn btn-warning">Cancelar</button>
                                </div>
                              </div>
                            </div>
                          </div>

                        </form> 

                     @endif     

                  </div>
              
                </div>

        </div>
      </div>

    </div>
  </div>

    <br>
    <div class="row">
        <div class="col-auto">
            <div class="d-block d-lg-none">
                 <h6 id="mensagens" class="texto-mensagens">Mensagens : </h6> 
            </div> 
            <div class="d-none d-lg-block">
              <h5 id="mensagens" class="texto-mensagens">Mensagens : </h5> 
            </div>         
        </div>
        <div class="col">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Nova Mensagem
              </button>

              <!-- Modal incluir Mensagem -->
              <form action="{{route('incluir_mensagem')}}" method="get">
                
                @csrf
               
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header cab-msg">
                        @if($origem == "of")
                            @if(isset($necps))
                               <h5 class="modal-title" id="staticBackdropLabel">Nova mensagem para : {{$necps->nome_part}}</h5>
                            @else
                               <h5 class="modal-title" id="staticBackdropLabel">Nova mensagem para : {{$oftrps->nome_part}}</h5>
                            @endif
                        @else
                            <h5 class="modal-title" id="staticBackdropLabel">Nova mensagem para : {{$ofps->nome_part}}</h5>
                        @endif
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="texto-oferta">Oferta : {{$ofps->desc_of}}</div>
                          @if(isset($necps))
                              <div class="texto-necessidade">Necessidade : {{$necps->desc_nec}}</div>
                          @else
                              <div class="texto-troca">Oferta Troca : {{$oftrps->desc_of}}</div>
                          @endif

                          <br>
                          <textarea name ="mensagem" class="form-control" id="mensagem" rows="3" required></textarea>
                          
                          <input value="{{Session('id_logado')}}" name="id_logado" id="id_logado" type="hidden">
                          <input value="{{$ofps->id_of_part}}" name="id_of_part_t" id="id_of_part_t" type="hidden">
                          <input value="{{$ofps->id_part}}" name="id_part_of" id="id_part_of" type="hidden">
                          <input value="{{$ofps->quant}}" name="qt_of_part_t" id="qt_of_part_t" type="hidden">
                        
                          @if(isset($oftrps) )
                             <input value="{{$oftrps->id_part}}" name="id_part_of_tr" id="id_part_of_tr" type="hidden">
                             <input value="{{$oftrps->id_of_part}}" name="id_of_tr_part_t" id="id_of_tr_part_t" type="hidden">
                             <input value="0" name="id_nec_part_t" id="id_nec_part_t" type="hidden">
                             <input value="{{$oftrps->quant}}" name="qt_of_tr_part_t" id="qt_of_tr_part_t" type="hidden">

                          @else
                             <input value="{{$necps->id_part}}" name="id_part_nec" id="id_part_nec" type="hidden">
                             <input value="{{$necps->id_nec_part}}" name="id_nec_part_t" id="id_nec_part_t" type="hidden">
                             <input value="0" name="id_of_tr_part_t" id="id_of_tr_part_t" type="hidden">
                             <input value="{{$necps->quant}}" name="qt_nec_part_t" id="qt_nec_part_t" type="hidden">   
                          @endif

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                      </div>
                    </div>
                  </div>
                </div>

              </form>
        </div>
    </div>
    <br>

    @if (isset($msgs)) 

    <table class="table table-sm">
        <thead class="cab-msg">
          <tr>
              <th scope="col">
                <div class="texto_m d-none d-lg-block">
                     Data
                </div>
                <div class="texto_p d-block d-lg-none">
                     Data
                </div>

              </th>
              <th scope="col">
                <div class="texto_m d-none d-lg-block">
                     Enviado por
                </div>
                <div class="texto_p d-block d-lg-none">
                     Enviado por
                </div>       
              </th>

              <th scope="col" class="texto_m">
                <div class="texto_m d-none d-lg-block">
                     Mensagem
                </div>
                <div class="texto_p d-block d-lg-none">
                     Mensagem
                </div>  
              </th>

              <th scope="col" colspan="3" >
                <div class="texto_m d-none d-lg-block">
                     Ação
                </div>
                <div class="texto_p d-block d-lg-none">
                     Ação
                </div>
              </th>  
              
          </tr>
        </thead>

        <tbody>
          @if (count($msgs)>0)

              @foreach($msgs as $msg)
                 
                 @if(!$msg->canc_conf)            
                    <tr>
                 @else
                    <tr style="background-color:rgb(243, 237, 156)">
                 @endif 
                 
                    <td>
                      @php
                        $date = new DateTime($msg->data);
                      @endphp
                      <div class="d-none d-lg-block texto_m">
                           @php
                             echo $date->format('d-m-Y'). " (UTC: ".$date->format('H:i').")" ;
                           @endphp
                      </div>
                      <div class="d-block d-lg-none texto_p">
                        @php
                          echo $date->format('d-m-Y'). " (UTC: ".$date->format('H:i').")" ;
                        @endphp
                   </div>

                    </td>

                    <td>
                      <div class="d-none d-lg-block texto_m">
                          {{$msg->nome_part_mens}}
                      </div>
                      <div class="d-block d-lg-none texto_p">
                        {{$msg->nome_part_mens}}
                      </div>
                    </td>

                    <td>
                      <div class="d-none d-lg-block texto_m">
                          {{$msg->mensagem}}
                      </div>
                      <div class="d-block d-lg-none texto_p">
                        {{$msg->mensagem}}
                      </div>
                    </td>

                    <td>
                        @if(Session::get('id_logado') == $msg->id_part and ($msg->canc_conf == false))  
                           @if(isset($trans[0])) 
                               @if(($trans[0]->data_final_of_part == null) AND ($trans[0]->data_final_nec_part == NULL) AND ($trans[0]->data_final_of_tr_part == NULL))
                                   <button class="btn btn-editar btn-sm bi bi-pencil texto_p" type="submit" data-bs-toggle="modal" data-bs-target="#EditarMensagem-{{$msg->id}}">
                                    Editar</button>
                               @endif 
                           @else     
                              <button class="btn btn-editar btn-sm bi bi-pencil texto_p" type="submit" data-bs-toggle="modal" data-bs-target="#EditarMensagem-{{$msg->id}}">
                               Editar</button>
                           @endif

                        @endif  

                        <form action="{{route('altera_mensagem')}}" method="post">
                          @csrf 
                            <!-- Modal Alterar Mensagem-->
                            <div class="modal fade" id="EditarMensagem-{{$msg->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Alterar mensagem de : <span class="texto-participante">{{$msg->nome_part_mens}}</span> </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                        <div class="modal-body">
                                          <div class="mb-3">
                                            <input value="{{$msg->id}}" name="id" type="hidden">
                                            
                                            <label for="mensagem" class="form-label">Mensagem :</label>
                                            <textarea type="text" class="form-control" id="mensagem" name="mensagem" value="">{{$msg->mensagem}}</textarea>
                                          </div>
                                          
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Sair</button>
                                        <button type="submit" class="btn btn-editar">Alterar</button>
                                      </div>
                                </div>
                              </div>
                            </div>
                          </form>
                    </td>    

                    <td>
 
                      @if(Session::get('id_logado') == $msg->id_part and ($msg->canc_conf == false))  
                           @if(isset($trans[0])) 
                               @if(($trans[0]->data_final_of_part == null) AND ($trans[0]->data_final_nec_part == NULL) AND ($trans[0]->data_final_of_tr_part == NULL))
                                   <button class="btn btn-danger btn-sm bi bi-trash texto_p" type="button" data-bs-toggle="modal" data-bs-target="#ModalExcluiMensagem-{{$msg->id}}" >
                                   Excluir</button>
                               @endif 
                           @else     
                              <button class="btn btn-danger btn-sm bi bi-trash texto_p" type="button" data-bs-toggle="modal" data-bs-target="#ModalExcluiMensagem-{{$msg->id}}" >
                              Excluir</button>
                           @endif

                      @endif  

                      <form class="" action="{{route('deleta_mensagem')}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <input value="{{$msg->id}}" name="id" type="hidden">

                            <!-- Modal -->
                            <div class="modal fade" id="ModalExcluiMensagem-{{$msg->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                       <h5 class="modal-title" id="staticBackdropLabel">Confirma Exclusão da mensagem de : <span class="texto-participante">{{$msg->nome_part_mens}}</span> ?</h5>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="mb-3">
                                      <input value="{{$msg->id}}" name="id" type="hidden">
                                      
                                      <label for="mensagem" class="form-label">Mensagem :</label>
                                      <textarea readonly="readonly" type="text" class="form-control" id="mensagem" name="mensagem" value="">{{$msg->mensagem}}</textarea>
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
              @endforeach

          @else
              <td class="texto_m">Nenhum registro encontrado</td>    
              <td></td>
              <td></td>
              <td></td>
          @endif 

        </tbody>
      </table>

      
    @endif 

    <div class="pagination">
        {{$msgs->links('layouts.paginationlinks')}}
    </div>
   
<div>
 
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
      <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header btn-finalizar">
          Mensagem
        </div>
        <div class="toast-body">
          @if(Session::has('code'))
              @if (Session::get('code') == 3) 
                  Transação Finalizada Parcialmente!
              @else
                  @if (Session::get('code') == 4)
                    Transação Finalizada Totalmente!
                  @else
                    @if (Session::get('code') == 1) 
                        Transação não pode ser finalizada ainda! Não existem ainda mensagens entre os participantes!
                    @endif    
                  @endif
              @endif
          @endif
             
        </div>
      </div>
  </div>

 <!-- Modal de alerta de quantidades -->
<div class="modal" id="ModalAlertQt">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Atenção!</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div  class="modal-body">
        <p id="ModalTextoQt">Quantidade maior do que a disponivel. </p> 
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Ok</button>
      </div>

    </div>
  </div>
</div>
 
  
@if (Session::has('code') && Session::get('code') > 0) 
    
    <script>
     $(document).ready(function(){
        $("#myToast").toast("show");
   
     });
     
    </script>
@endif 

@if(Session('id_logado') == $ofps->id_part )
   <script>
       document.getElementById("QtOf").readOnly = false ;
       document.getElementById("QtNec").readOnly = true;
   </script>
@else
   @if(isset($necps))
       @if(Session('id_logado') == $necps->id_part )
           <script>
               document.getElementById("QtOf").readOnly = true  ;
               document.getElementById("QtNec").readOnly = false ;
           </script>
       @endif
   @else
        @if(Session('id_logado') == $oftrps->id_part )
        <script>
            document.getElementById("QtOf").readOnly = true  ;
            document.getElementById("QtOfTr").readOnly = false ;
        </script>
        @endif 
   @endif    
@endif

@if (count($trans)>0)
    @if($trans[0]->desc_moeda == 'Troca' or $trans[0]->desc_moeda == 'Doação')
        <script>
              document.getElementById("QtFluxo").readOnly = true ;
        </script>
    @else
        <script>
          document.getElementById("QtFluxo").readOnly = false ;
        </script>
    @endif
@endif


<script>
  
  function verifica_quant(quant_disp,of_tr_nec) {

    var quant_of = document.getElementById("QtOf").value;
    var quant_nec = document.getElementById("QtNec").value;
        
    /*var quant_tr = document.getElementById("QtOf").value;*/
    
    if(of_tr_nec == 'of'){
      if(quant_of > quant_disp){
          document.getElementById("ModalTextoQt").innerHTML = "Quantidade digitada é maior do que a quantidade disponivel da oferta!";
          $("#ModalAlertQt").modal("show");
          document.getElementById("QtOf").value = 0;
      }   
    }else{
      if(of_tr_nec == 'nec'){
        if(quant_nec > quant_disp){
          document.getElementById("ModalTextoQt").innerHTML = "Quantidade digitada é maior do que a quantidade disponivel da necessidade!";
          $("#ModalAlertQt").modal("show");
          document.getElementById("QtNec").value = 0;
        }   
      }else{
        if(of_tr_nec == 'tr'){
          if(quant_of_tr > quant_disp){
            document.getElementById("ModalTextoQt").innerHTML = "Quantidade digitada é maior do que a quantidade disponivel da Oferta da troca!";
            $("#ModalAlertQt").modal("show");
            document.getElementById("QtOfTr").value = 0;
          }   
        }
      }
    }
    
  }
</script>

<script>
     function pega_valor_qtof(){
       document.getElementById("QtOf_canc").value = document.getElementById("QtOf").value;
     }

</script>

<script>
  function verifica_zeros(origem){

    var quant_fluxo = document.getElementById("QtFluxo").value;

    var pode_abrir_modal = true;

   /* alert(origem);*/

   if(quant_fluxo == 0){
      pode_abrir_modal = false;
      document.getElementById("ModalTextoQt").innerHTML = "Quantidade de Fluxo não pode ser zero!";
      $("#ModalAlertQt").modal("show");
   } 

    if(origem == 'nec'){
          var quant_nec = document.getElementById("QtNec").value; 
          if(quant_nec == 0){
                pode_abrir_modal = false;
                document.getElementById("ModalTextoQt").innerHTML = "Quantidade da Necessidade não pode ser zero!";
                $("#ModalAlertQt").modal("show");
          } 
    }else{
            if(origem == 'of'){
              var quant_of = document.getElementById("QtOf").value; 
                if(quant_of == 0){
                    pode_abrir_modal = false;
                    document.getElementById("ModalTextoQt").innerHTML = "Quantidade da Oferta não pode ser zero!";
                    $("#ModalAlertQt").modal("show");
                }   
            }
            else
            {
              if(origem == 'tr'){
                var quant_tr = document.getElementById("QtOfTr").value; 
                  if(quant_tr == 0){
                      pode_abrir_modal = false;
                      document.getElementById("ModalTextoQt").innerHTML = "Quantidade da Troca não pode ser zero!";
                      $("#ModalAlertQt").modal("show");
                  }   
              }  
                  
            }

    }  

    if(pode_abrir_modal){
       $("#finalizar").modal("show");
    }


  }
   
  </script>


@endsection


