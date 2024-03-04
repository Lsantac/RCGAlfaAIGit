@extends('master')

@section('content')

<!--<script src="/js/moment.js"></script> -->
<!--<link rel="stylesheet" type="text/css" href="/css/styles.css"> -->

<div class="container">
   
    <h4 class="texto-oferta" style="color:rgb(116, 72, 218);">Mensagens do Participante : {{Session::get('nomelogado')}}</h4> 
   
    <br>

    <form id="form_cons_mens" class="row g-3" method="get" action="/consultar_mensagens/{{Session::get('id_logado')}}">

          @csrf
     
        <div class="col-sm-4">
             <input class="form-control texto_m" name="cons_of_tela_inic" value="{{Session::get('cons_of_tela_inic')}}" placeholder="Digite palavras para consulta..." type="search">
        </div>
      
        <div class="col-sm-1">
          <button style="margin-right: 20px" class="btn btn-sm btn-primary " type="submit">Procurar</button>
        </div>

        <div class="col-sm">
          
          <select class="form-select texto_m" style="margin-left: 20px; width: 250px;" id="tipo_consulta" name="tipo_consulta" aria-label="Default select example">
            @if(isset($tipo_cons))
               
                @if($tipo_cons == 'sel')
                  <option value="sel" selected>Seletiva (E)</option>
                  <option value="incl">Inclusiva (Ou)</option>
                @else
                  @if($tipo_cons == 'incl')
                    <option value="incl" selected>Inclusiva (Ou)</option>
                    <option value="sel">Seletiva (E)</option>
                  @endif
                @endif
                
            @else 
                <option value="incl" selected>Inclusiva (Ou)</option>  
                <option value="sel">Seletiva (E)</option>
            @endif     
            
          </select>
        </div>

        <div class="col-sm">
          <select class="form-select texto_m" style="margin-left: 20px; width: 250px;" id="tipo_mensagem" name="tipo_mensagem" aria-label="Default select example">
            @if(isset($env_rec))
                @if($env_rec == 'env')
                  <option value="env" selected>Mensagens Enviadas</option>
                  <option value="rec">Mensagens Recebidas</option>
                @else
                  @if($env_rec == 'rec')
                     <option value="rec" selected>Mensagens Recebidas</option>
                     <option value="env">Mensagens Enviadas</option>
                  @endif
                @endif
            @endif     
          </select>
        </div>
        
    </form>

    <br>

    @if (isset($mens)) 

    <table  class="table table-sm">
        <thead style="border-bottom: 1px solid black;" class="texto_m">
          <tr>

             <th scope="col">Mensagem</th>
             <th scope="col">Data</th>
             <th scope="col">Ofertas</th>
             <th scope="col">Necessidades/Trocas</th>
             <th scope="col">Ações</th>
            
          </tr>
        </thead>

        <tbody>
          @if (count($mens)>0)

              @foreach($mens as $m)

                       <tr>
                        <td style='width: 400px' class="texto_m">{{$m->msg}}</td> 
                        <td style='width: 150px' class="texto_m">{{date('d/m/Y', strtotime($m->data_msg))}}</td>

                        <td>
                            <div class="card" >
                                  <div class="card-body" style="background-color:rgb(199, 245, 207) ">
                                      <div class="row align-items-start">
                                        <div class="col">
                                            <h6 class="texto-oferta">{{$m->desc_of}}</h6>       
                                        </div>
                                      </div>

                                      <div class="card-text texto_p">{{$m->nome_part_of}} </div>
                                  </div>
                            </div>
                        </td>

                        <td>
                            <div class="card" >
                              @if($m->fluxo == 'Troca')
                                  <div class="card-body" style="background-color:rgb(172, 240, 223) ">
                              @else
                                  <div class="card-body" style="background-color:rgb(238, 211, 194) ">
                              @endif   

                                <div class="row">
                                    
                                    <div class="col">
                                          <div class="row align-items-start">
                                            <div class="col">
                                                  @if($m->fluxo == 'Troca')
                                                     <div class="row">
                                                          <div class="col">
                                                               <h6 class="card-title texto-troca">{{$m->desc_tr}}</h6>       
                                                          </div>
                                                      </div>

                                                      <div class="card-text texto_p">{{$m->nome_part_tr}} </div>
                                                  @else
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="card-title texto-necessidade">{{$m->desc_nec}}</h6>       
                                                        </div>
                                                    </div>
                                            
                                                    <div class="card-text texto_p">{{$m->nome_part_nec}} </div>

                                                  @endif
                                              </div>

                                          </div>
                                      </div>

                                </div>
                                
                            </div>
                      
                        </td>

                        <td>
                          <form action="{{route('mens_transacoes_part')}}" method="get">
                        
                            @csrf 
                            <input value="{{Session::get('id_logado')}}" name="id_part_t" type="hidden">
                            <input value="{{$m->id_nec_part}}" name="id_nec_part_t" type="hidden">
                            <input value="{{$m->id_of_part}}" name="id_of_part_t" type="hidden"> 
                            <input value="{{$m->id_of_tr_part}}" name="id_of_tr_part_t" type="hidden"> 

                            @if($m->fluxo == 'Troca')
                               <input value="tr" name="origem" type="hidden"> 
                            @else
                               <input value="of" name="origem" type="hidden"> 
                            @endif 

                            <button type="submit" class="btn btn-sm btn-mensagem bi-arrow-repeat texto_p">Detalhes da Transação</button>   
                           
                          </form>
                           
                       </td>

                      </tr>
    
              @endforeach

          @else
              <td><td>Nenhum registro encontrado</td></td>    
              
          @endif 

        </tbody>
      </table>

      <div class="pagination">
           {{$mens->links('layouts.paginationlinks')}}
           
      </div>

    @endif 

<div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      let localTime = Array.from(document.getElementsByClassName("local-time-of"));
      
      localTime.forEach(function(el) {
        let utcTime = el.getAttribute("data-time");
        let time = moment.utc(utcTime).toDate();
        time = moment(time).local().format('DD-MM-YYYY HH:mm');
        
        if (moment(time, 'DD-MM-YYYY HH:mm', true).isValid()) {
          el.innerHTML = "Confirmada em : " + time;
        };
       
      });
    });

    document.addEventListener("DOMContentLoaded", function() {
      let localTime = Array.from(document.getElementsByClassName("local-time-inic"));
      
      localTime.forEach(function(el) {
        let utcTime = el.getAttribute("data-time-inic");
        let time = moment.utc(utcTime).toDate();
        time = moment(time).local().format('DD-MM-YYYY HH:mm');

        if (moment(time, 'DD-MM-YYYY HH:mm', true).isValid()) {
        el.innerHTML = "Data Inicio : " + time;
        };
       
      });
    });

    document.addEventListener("DOMContentLoaded", function() {
      let localTime = Array.from(document.getElementsByClassName("local-time-tr"));
      
      localTime.forEach(function(el) {
        let utcTime = el.getAttribute("data-time-tr");
        let time = moment.utc(utcTime).toDate();
        time = moment(time).local().format('DD-MM-YYYY HH:mm');

        if (moment(time, 'DD-MM-YYYY HH:mm', true).isValid()) {
           el.innerHTML = "Confirmada em : " + time;
        };   
       
      });
    });

    document.addEventListener("DOMContentLoaded", function() {
      let localTime = Array.from(document.getElementsByClassName("local-time-nec"));
      
      localTime.forEach(function(el) {
        let utcTime = el.getAttribute("data-time-nec");
        let time = moment.utc(utcTime).toDate();
        time = moment(time).local().format('DD-MM-YYYY HH:mm');
        
        if (moment(time, 'DD-MM-YYYY HH:mm', true).isValid()) {
        el.innerHTML = "Confirmada em : " + time;
        };
      });
    });

  </script>

<script>
   document.getElementById('tipo_mensagem').addEventListener('change', () => {
   document.querySelector('#form_cons_mens').submit();
   });

   document.getElementById('tipo_consulta').addEventListener('change', () => {
   document.querySelector('#form_cons_mens').submit();
   });

</script>


@endsection

