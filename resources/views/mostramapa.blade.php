@extends('master')

@section('content')

<link rel="stylesheet" href="{{ asset('/css/mapa_part.css') }}">
<link rel="stylesheet" href="/css/ol.css">

<div class="container">

<h5 ><?php echo "Localização do Participante : ". $_SESSION['part_selecionado']; ?></h5>

<div id="map_part" style="width: 100%; height: 80%;">
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

</div>