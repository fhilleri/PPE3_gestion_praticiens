//Récupération des marqueurs
let markersDiv = document.getElementById("mapMarkers");
let markersInfo = JSON.parse(markersDiv.textContent);


//Création de la carte
var map = new ol.Map({
    target: 'map',
    layers: [
        new ol.layer.Tile({
            source: new ol.source.OSM()
        })
    ],
    view: new ol.View({
        center: ol.proj.fromLonLat([-0.881, 47.0608]),
        zoom: 8
    })
});
console.log("Map !");

//Création des markers
let features = new Array();

markersInfo.forEach(marker => {
    let feature = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([marker.longitude, marker.latitude])),
        name: marker.nom
    });
    features.push(feature)
    console.log(marker.nom + " : " + marker.longitude + "," + marker.latitude);
});

console.log(features);

var layer = new ol.layer.Vector({
    source: new ol.source.Vector({
        features: features
    })
});
map.addLayer(layer);