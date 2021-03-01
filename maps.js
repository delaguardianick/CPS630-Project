var origin = "";
var destination = "";
var destCoords;
var originCoords;

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
      // mapLink.href = `https://www.openstreetmap.org/#map=18/${latitude}/${longitude}`;
      // mapLink.textContent = `Latitude: ${latitude} °, Longitude: ${longitude} °`;
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

    
  function haversine_distance(mk1, mk2) {
    var R = 6371.0710; // Radius of the Earth in kilometers
    var rlat1 = mk1.position.lat() * (Math.PI/180); // Convert degrees to radians
    var rlat2 = mk2.position.lat() * (Math.PI/180); // Convert degrees to radians
    var difflat = rlat2-rlat1; // Radian difference (latitudes)
    var difflon = (mk2.position.lng()-mk1.position.lng()) * (Math.PI/180); // Radian difference (longitudes)

    var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
    return d;
  }

  function initMap()
  {
      // mapOrigin = {lat: 43.7575, lng: -79.3910};

      // Gets address inputted in 'origin' text box
      var origin = document.querySelector("#origin").value; 

      // Calls func geocode with the plain text address, returns coordinates
      // Since geocode has an asynchronous api call, 
      // Promise is used to wait for the data of the fetch.
      geocode(origin).then(data => {
        var lat = data.results[0].geometry.location.lat;
        var lng = data.results[0].geometry.location.lng;
        originCoords =  [lat,lng];

        console.log("Origin coods: " + originCoords);
        mapOrigin = {lat: originCoords[0], lng: originCoords[1]};
      
        var destination = document.querySelector("#destination").value;
    
        geocode(destination).then(data => {
          var lat = data.results[0].geometry.location.lat;
          var lng = data.results[0].geometry.location.lng;
          destCoords =  [lat,lng];
          mapDestination = {lat: destCoords[0], lng: destCoords[1]};
        
          console.log(destCoords);  
      
          var map = new google.maps.Map(document.getElementById("map"),
              { zoom: 12,
                center: mapOrigin,
              });
      
          if (typeof mapOrigin !== 'undefined'){
            var marker = new google.maps.Marker(
                {position: mapOrigin, map: map});    
            var infoWindow = new google.maps.InfoWindow(
                { content: "<h5> source </h5>"});
            marker.addListener("click", function()
                { infoWindow.open(map, marker); });
          }
      
          if (typeof mapDestination !== 'undefined'){
            var marker2 = new google.maps.Marker(
                {position: mapDestination, map: map});    
            var infoWindow2 = new google.maps.InfoWindow(
                { content: "<h5> dest </h5x>"});
            marker2.addListener("click", function()
                { infoWindow2.open(map, marker2); });
              }

            console.log(destCoords);
          
            // Line and distance between markers
            var line = new google.maps.Polyline({path: [mapOrigin, mapDestination], map: map});
            var radius = haversine_distance(marker, marker2);
            console.log(radius);
            document.getElementById('radius').innerHTML = "Distance: " + radius.toFixed(2) + " km.";

            // Has to be under 50km
            if (radius <= 50)
            {
              document.getElementById('radius').innerHTML += "<br>Locations within range. Proceed for checkout!";
            }
            else {
              document.getElementById('radius').innerHTML += "<br>Locations not within range. Please reduce distance!";
            }

        });
    });
  }
  
  async function geocode(address){
    address = address.replace(/\s/g, "+");
    url = `https://maps.googleapis.com/maps/api/geocode/json?address=${address}&key=AIzaSyCIumcSOTeP890tfGtNPajH0WmErIjAgcM`
    console.log(url);
  
    const request = await fetch(url);
    const data = await request.json();
    return data;
  }

$(document).ready(function (){
    document.querySelector('#find-me').addEventListener('click', geoFindMe);
    document.querySelector('#show-map').addEventListener('click', initMap);
    document.querySelector('#test').addEventListener('click', geocode);
})