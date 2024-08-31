
function inicializarMapaOF(markers_of) {

    //mostrar o conteudo de $markers_of
   // console.log(markers_of);

var iconStyles = {
    2: new ol.style.Style({
        image: new ol.style.Icon({
            anchor: [0.5, 30],
            anchorXUnits: 'fraction',
            anchorYUnits: 'pixels',
            src: '/mapas/icons/marcador_andamento.png'
        })
    }),
    3: new ol.style.Style({
        image: new ol.style.Icon({
            anchor: [0.5, 30],
            anchorXUnits: 'fraction',
            anchorYUnits: 'pixels',
            src: '/mapas/icons/marcador_parcial.png'
        })
    }),
    4: new ol.style.Style({
        image: new ol.style.Icon({
            anchor: [0.5, 30],
            anchorXUnits: 'fraction',
            anchorYUnits: 'pixels',
            src: '/mapas/icons/marcador_finalizado.png'
        })
    })
};

var features = []; // Array para armazenar os recursos (marcadores)

for (var i = 0; i < markers_of.length; i++) {
    var marker_of = markers_of[i];

    // Cria um novo recurso (marcador) e adiciona ao array de recursos
    var feature = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([marker_of.longitude, marker_of.latitude])),
        name: marker_of.nome_part, // Adiciona o nome como uma propriedade do recurso
        endereco:marker_of.endereco,
        cidade: marker_of.cidade,
        //testando click em url
        url: '/identidade'

    });

    feature.setStyle(iconStyles[marker_of.status]); // Aplica o estilo personalizado ao marcador

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
var map_of = new ol.Map({
    target: 'map_of',
    layers: [
        new ol.layer.Tile({
            source: new ol.source.OSM()
        }),
        vectorLayer // Adiciona a camada de vetor ao mapa
    ],
    view: new ol.View({
        center: ol.proj.fromLonLat([-46.656, -23.549]), //longitude e latitude
        zoom: 4
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
map_of.addOverlay(overlay);


// Adiciona um evento de clique ao mapa para mostrar o balão
map_of.on('click', function(evt) {
    var feature = map_of.forEachFeatureAtPixel(evt.pixel, function(feature) {
        return feature;
    });

    if (feature) {
        var coordinates = feature.getGeometry().getCoordinates();
        overlay.setPosition(coordinates);

        var content = `
            ${feature.get('name')} <br> 
            ${feature.get('endereco')} <br> 
            ${feature.get('cidade')} <br> 
            `;

        element.innerHTML = content;
     

    } else {
        element.innerHTML = '';
        overlay.setPosition(undefined);
       
    }
});

document.getElementById('fullscreen_map_of').addEventListener('click', function() {
    var mapElement = document.getElementById('map_of');
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

function inicializarMapaNEC(markers_nec) {
 
    //mostrar o conteudo de $markers_nec
    //console.log(markers_nec);

    var iconStyles_nec = {
        2: new ol.style.Style({
            image: new ol.style.Icon({
                anchor: [0.5, 30],
                anchorXUnits: 'fraction',
                anchorYUnits: 'pixels',
                src: '/mapas/icons/marcador_andamento.png'
            })
        }),
        3: new ol.style.Style({
            image: new ol.style.Icon({
                anchor: [0.5, 30],
                anchorXUnits: 'fraction',
                anchorYUnits: 'pixels',
                src: '/mapas/icons/marcador_parcial.png'
            })
        }),
        4: new ol.style.Style({
            image: new ol.style.Icon({
                anchor: [0.5, 30],
                anchorXUnits: 'fraction',
                anchorYUnits: 'pixels',
                src: '/mapas/icons/marcador_finalizado.png'
            })
        })
    };
    
    var features_nec = []; // Array para armazenar os recursos (marcadores)
    
    for (var i = 0; i < markers_nec.length; i++) {
        var marker_nec = markers_nec[i];
    
        // Cria um novo recurso (marcador) e adiciona ao array de recursos
        var feature_nec = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat([marker_nec.longitude, marker_nec.latitude])),
            name: marker_nec.nome_part, // Adiciona o nome como uma propriedade do recurso
            endereco:marker_nec.endereco,
            cidade: marker_nec.cidade
    
        });
    
        feature_nec.setStyle(iconStyles_nec[marker_nec.status]); // Aplica o estilo personalizado ao marcador
    
        features_nec.push(feature_nec);
    }
    
    // Cria uma nova fonte de vetor e adiciona os recursos a ela
    var vectorSource_nec = new ol.source.Vector({
        features: features_nec
    });
    
    // Cria uma nova camada de vetor e adiciona a fonte de vetor a ela
    var vectorLayer_nec = new ol.layer.Vector({
        source: vectorSource_nec
    });
    
    // Cria o mapa
    var map_nec = new ol.Map({
        target: 'map_nec',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            }),
            vectorLayer_nec // Adiciona a camada de vetor ao mapa
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([-46.656, -23.549]), //longitude e latitude
            zoom: 4
        })
    });
    
    // Cria um elemento HTML para o balão
    var element_nec = document.createElement('div');
    element_nec.className = 'overlay';
    document.body.appendChild(element_nec);
    
    // Cria um overlay para o balão e adiciona ao mapa
    var overlay_nec = new ol.Overlay({
        element: element_nec,
        positioning: 'bottom-center',
        stopEvent: false,
        offset: [0, -50]
    });
    map_nec.addOverlay(overlay_nec);
    
    // Adiciona um evento de clique ao mapa para mostrar o balão
    map_nec.on('click', function(evt) {
        var feature_nec = map_nec.forEachFeatureAtPixel(evt.pixel,
            function(feature_nec) {
                return feature_nec;
            });
        if (feature_nec) {
            var coordinates_nec = feature_nec.getGeometry().getCoordinates();
            overlay_nec.setPosition(coordinates_nec);
            element_nec.innerHTML = feature_nec.get('name') + '<br>' + feature_nec.get('endereco') + '<br>' + feature_nec.get('cidade');
        } else {
            element_nec.innerHTML = '';
            overlay_nec.setPosition(undefined);
        }
    });
    
    document.getElementById('fullscreen_map_nec').addEventListener('click', function() {
        var mapElement_nec = document.getElementById('map_nec');
        if (mapElement_nec.requestFullscreen) {
            mapElement_nec.requestFullscreen();
        } else if (mapElement_nec.mozRequestFullScreen) { // Firefox
            mapElement_nec.mozRequestFullScreen();
        } else if (mapElement_nec.webkitRequestFullscreen) { // Chrome, Safari and Opera
            mapElement_nec.webkitRequestFullscreen();
        } else if (mapElement_nec.msRequestFullscreen) { // IE/Edge
            mapElement_nec.msRequestFullscreen();
        }
    });

}
    
    