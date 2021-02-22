var origin = "";

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
  function showMap(){
    var lat            = origin[0];
    var lon            = origin[1];
    var zoom           = 15;
    
    var fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
    var toProjection   = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
    var position       = new OpenLayers.LonLat(lon, lat).transform( fromProjection, toProjection);
    
    map = new OpenLayers.Map("Map");
    var mapnik         = new OpenLayers.Layer.OSM();
    map.addLayer(mapnik);
    
    var markers = new OpenLayers.Layer.Markers( "Markers" );
    map.addLayer(markers);
    markers.addMarker(new OpenLayers.Marker(position));
    
    map.setCenter(position, zoom);
  }

  // function showMap(){
  //   var orig = document.querySelector("#origin").value;
  //   var dest = document.querySelector("#destination").value;

  //   orig = encodeURI(orig);
  //   dest = encodeURI(dest);
  //   key = 'AIzaSyCIumcSOTeP890tfGtNPajH0WmErIjAgcM';
  //   url = "https://maps.googleapis.com/maps/dir/?api=1&origin=" + orig + "&destination=" + dest + "&key=" + key;
  //   console.log(url);

  //   document.querySelector("#static-map").src= url;
  // }


$(document).ready(function (){
    document.querySelector('#show-map').addEventListener('click', showMap);
    document.querySelector('#find-me').addEventListener('click', geoFindMe);
})
