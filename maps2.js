var origin = "";
var destination = "";

function geoFindMe() {
    const status = document.querySelector('#status');
    const mapLink = document.querySelector('#map-link');
  
    mapLink.href = '';
    mapLink.textContent = '';
  
    function success(position) {
      const latitude  = position.coords.latitude;
      const longitude = position.coords.longitude;
      origin = [latitude,longitude];
  
      status.textContent = '';
      mapLink.href = `https://www.openstreetmap.org/#map=18/${latitude}/${longitude}`;
      mapLink.textContent = `Latitude: ${latitude} °, Longitude: ${longitude} °`;
      document.querySelector('#origin').value = latitude + "," + longitude;
    }
  
    function error() {
      status.textContent = 'Unable to retrieve your location';
    }
    if(!navigator.geolocation) {
      status.textContent = 'Geolocation is not supported by your browser';
    } else {
      status.textContent = 'Locating…';
      navigator.geolocation.getCurrentPosition(success, error);
    }
  
  }

function initMap()
{
    var location = {lat: origin[0], lng: origin[1]};
    destination = document.querySelector("#destination");

    var location2 = {lat: 43.7575, lng: -79.3910};

    var map = new google.maps.Map(document.getElementById("map"),
        { zoom: 12, center: location});

    var marker = new google.maps.Marker(
        {position: location, map: map});    
    var infoWindow = new google.maps.InfoWindow(
        { content: "<h5> source </h5>"});
    marker.addListener("click", function()
        { infoWindow.open(map, marker); });


    var marker2 = new google.maps.Marker(
        {position: location2, map: map});    
    var infoWindow2 = new google.maps.InfoWindow(
        { content: "<h5> dest </h5>"});
    marker2.addListener("click", function()
        { infoWindow2.open(map, marker2); });

}

// function showMap(){
//   var lat            = origin[0];
//   var lon            = origin[1];
//   var zoom           = 15;
  
//   var fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
//   var toProjection   = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
//   var position       = new OpenLayers.LonLat(lon, lat).transform( fromProjection, toProjection);
  
//   map = new OpenLayers.Map("Map");
//   var mapnik         = new OpenLayers.Layer.OSM();
//   map.addLayer(mapnik);
  
//   var markers = new OpenLayers.Layer.Markers( "Markers" );
//   map.addLayer(markers);
//   markers.addMarker(new OpenLayers.Marker(position));
  
//   map.setCenter(position, zoom);
// }

$(document).ready(function (){
    document.querySelector('#find-me').addEventListener('click', geoFindMe);
    document.querySelector('#show-map').addEventListener('click', initMap);
})