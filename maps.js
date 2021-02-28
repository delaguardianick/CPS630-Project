var origin = "";
var destination = "";
var destCoords;

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

  // Initially map will be blank.
  // Press "Use my Current Location" and the input box will fill with users coordinates
  // Then press search
function initMap()
{
    var location = {lat: origin[0], lng: origin[1]};
    // location = {lat: 43.7575, lng: -79.3910};

    var destination = document.querySelector("#destination").value;

    geocode(destination).then(data => {
      var lat = data.results[0].geometry.location.lat;
      var lng = data.results[0].geometry.location.lng;
      destCoords =  [lat,lng];
      location2 = {lat: destCoords[0], lng: destCoords[1]};
    
    console.log(destCoords);  

    var map = new google.maps.Map(document.getElementById("map"),
        { zoom: 12, center: location});

    var marker = new google.maps.Marker(
        {position: location, map: map});    
    var infoWindow = new google.maps.InfoWindow(
        { content: "<h5> source </h5>"});
    marker.addListener("click", function()
        { infoWindow.open(map, marker); });

    if (typeof location2 !== 'undefined'){
      var marker2 = new google.maps.Marker(
          {position: location2, map: map});    
      var infoWindow2 = new google.maps.InfoWindow(
          { content: "<h5> dest </h5>"});
      marker2.addListener("click", function()
          { infoWindow2.open(map, marker2); });
        }
      console.log(destCoords);

    }
    ); 
}

async function geocode(address){
  address = address.replace(/\s/g, "+");
  url = `https://maps.googleapis.com/maps/api/geocode/json?address=${address}&key=AIzaSyCIumcSOTeP890tfGtNPajH0WmErIjAgcM`
  console.log(url);

  const request = await fetch(url);
  const data = await request.json();
  return data;


  // await $.get(url, function(data){

  //   return destCoords;
  // })
}

$(document).ready(function (){
    document.querySelector('#find-me').addEventListener('click', geoFindMe);
    document.querySelector('#show-map').addEventListener('click', initMap);
    document.querySelector('#test').addEventListener('click', geocode);
})