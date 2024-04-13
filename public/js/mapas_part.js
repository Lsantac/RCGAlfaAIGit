
function inicializarMapaPart(markers_part) {

    var iconStyles = {
        1: new ol.style.Style({
            image: new ol.style.Icon({
                anchor: [0.5, 30],
                anchorXUnits: 'fraction',
                anchorYUnits: 'pixels',
                src: '/mapas/icons/participante.png'
            })
        }),
        
    };
    
    var features = []; // Array para armazenar os recursos (marcadores)
    
    for (var i = 0; i < markers_part.length; i++) {
        var marker_part = markers_part[i];
    
        // Cria um novo recurso (marcador) e adiciona ao array de recursos
        var feature = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat([marker_part.longitude, marker_part.latitude])),
            name: marker_part.nome_part, // Adiciona o nome como uma propriedade do recurso
            endereco: marker_part.endereco,
            cidade: marker_part.cidade
        });
    
        feature.setStyle(iconStyles[1]); // Aplica o estilo personalizado ao marcador
    
        features.push(feature);
    }
    
    // Cria uma nova fonte de vetor e adiciona os recursos a ela
    var vectorSource = new ol.source.Vector({
        features: features
    });
    
    // Cria uma nova camada de vetor e adiciona a fonte de vetor a ela
    var vectorLayer = new ol.layer.Vector({
        source: vectorSource
    });
    
    // Cria o mapa
    var map_part = new ol.Map({
        target: 'map_part',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            }),
            vectorLayer // Adiciona a camada de vetor ao mapa
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([marker_part.longitude, marker_part.latitude]), //longitude e latitude
            zoom: 5
        })
    });
    
    // Cria um elemento HTML para o balão
    var element = document.createElement('div');
    element.className = 'overlay';
    document.body.appendChild(element);
    
    // Cria um overlay para o balão e adiciona ao mapa
    var overlay = new ol.Overlay({
        element: element,
        positioning: 'bottom-center',
        stopEvent: false,
        offset: [0, -50]
    });
    map_part.addOverlay(overlay);
    
    // Adiciona um evento de clique ao mapa para mostrar o balão
    map_part.on('click', function(evt) {
        var feature = map_part.forEachFeatureAtPixel(evt.pixel,
            function(feature) {
                return feature;
            });
        if (feature) {
            var coordinates = feature.getGeometry().getCoordinates();
            overlay.setPosition(coordinates);
            element.innerHTML = feature.get('name') + '<br>' + feature.get('endereco') + '<br>' + feature.get('cidade');
        } else {
            element.innerHTML = '';
            overlay.setPosition(undefined);
        }
    });
    
    document.getElementById('fullscreen_map_part').addEventListener('click', function() {
        var mapElement = document.getElementById('map_part');
       if (mapElement.requestFullscreen) {
          mapElement.requestFullscreen();
      } else if (mapElement.mozRequestFullScreen) { // Firefox
           mapElement.mozRequestFullScreen();
       } else if (mapElement.webkitRequestFullscreen) { // Chrome, Safari and Opera
           mapElement.webkitRequestFullscreen();
       } else if (mapElement.msRequestFullscreen) { // IE/Edge
           mapElement.msRequestFullscreen();
       }
    });
    
    
    }
  



    
    