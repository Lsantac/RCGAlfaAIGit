@extends('master')

@section('content')

<link rel="stylesheet" href="{{ asset('/css/mapa_part.css') }}">
<link rel="stylesheet" href="/css/ol.css">
 
<div class="container">

    @if($_SESSION['of_nec'] == 'Oferta')
        @if($_SESSION['part_selecionado'] <> '0')
            <h5><?php echo "Localização dos Participantes que tem Necessidades compativeis com a Oferta de : "; ?></h5>
        @else
            <h5><?php echo "Localização dos Participantes com as Ofertas consultadas : "; ?></h5>
        @endif
    @else
        @if($_SESSION['of_nec'] == 'Necessidade')
            @if($_SESSION['part_selecionado'] <> '0')
                <h5><?php echo "Localização dos Participantes que tem Ofertas compativeis com a necessidade de : "; ?></h5>
            @else
                <h5><?php echo "Localização dos Participantes com as Necessidades consultadas : "; ?></h5>
            @endif                
        @endif
    @endif
    @if($_SESSION['part_selecionado'] <> '0')
       <h4><?php echo $_SESSION['part_selecionado']; ?></h4>
    @endif
    <br>

</div>

<div class="container" id="map_part" style="width: 100%; height: 80%;">
    <div id="fullscreen_map_part">↕</div> <!-- Símbolo de maximização -->
</div>

<script src="/js/ol.js"></script>
<script src="/js/mapas_part.js"></script>

<script>
    var markers_part = @json($markers_part);

    // Chamando as funções para inicializar os mapas
    inicializarMapaPart(markers_part);
    
</script>



@endsection