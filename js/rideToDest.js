var origin = "";
var destination = "";
var destCoords;
var originCoords;
var radius;

function geoFindMe() {
    const status = document.querySelector('#status');
    const mapLink = document.querySelector('#map-link');
  
    function success(position) {
      const latitude  = position.coords.latitude;
      const longitude = position.coords.longitude;
      origin = [latitude,longitude];
  
      status.textContent = '';
      document.querySelector('#origin').value = latitude + "," + longitude;
    }
  
    function error() {
      status.textContent = 'Unable to retrieve your location';
    }
    if(!navigator.geolocation) {
      status.textContent = 'Geolocation is not supported by your browser';
    } else {
      // status.textContent = 'Locating…';
      navigator.geolocation.getCurrentPosition(success, error);
    }
}

// Function to measure the distance of the polyline
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
    // Gets address inputted in 'origin' text box
    var origin = document.querySelector("#origin").value; 

    // Calls func geocode with the plain text address, returns coordinates
    // Since geocode has an asynchronous api call, 
    // Promise is used to wait for the data of geocode.
    geocode(origin).then(coords => {
      originCoords = coords;


        mapOrigin = {lat: originCoords[0], lng: originCoords[1]};

      // if (originCoords !== null){
      // }
      // else {mapOrigin = {lat: '43.653908', lng: '-79.384293'}}

      // Get plain text address from input box
      var destination = document.querySelector("#destination").value;
  
      // Repeat geocode
      geocode(destination).then(coords => {
        destCoords =  coords;
        mapDestination = {lat: destCoords[0], lng: destCoords[1]};
      
        var map = new google.maps.Map(document.getElementById("map"),
            { zoom: 12,
              center: mapOrigin,
            });
            
        var inputDest = document.getElementById('destination');
        var inputOrigin = document.getElementById('origin');
        var searchBoxDest = new google.maps.places.SearchBox(inputDest);
        var searchBoxOrigin = new google.maps.places.SearchBox(inputOrigin);
        
        map.addListener('bounds_changed', function(){
          searchBoxDest.setBounds(map.getBounds());
        });

        map.addListener('bounds_changed', function(){
          searchBoxOrigin.setBounds(map.getBounds());
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
          radius = haversine_distance(marker, marker2);
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

  var lat = await data.results[0].geometry.location.lat;
  var lng = await data.results[0].geometry.location.lng;
  return [lat,lng];
}

// END MAP

function editInputDate(){
    currDateAndTime = currDateAndTime();
    document.querySelector("#date").setAttribute("value", currDateAndTime[0]);
    document.querySelector("#date").setAttribute("min", currDateAndTime[0]);
    console.log(currDateAndTime[1]);
    document.querySelector("#time").setAttribute("value", currDateAndTime[1])
  }
  
  function currDateAndTime() {
    var d = new Date();
    var month = '' + (d.getMonth() + 1);
    var day = '' + d.getDate();
    var year = d.getFullYear();
  
    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;
    var date = [year, month, day].join('-')
  
    var hours = d.getHours();
    var min = d.getMinutes();
    var time = [hours,min].join(':')
    return [date,time]
  }
  
  // DATABASE
  function showTable(str) {
    if (str == "") {
      document.getElementById("show-car-table").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // console.log(this.responseText);
          document.getElementById("show-car-table").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","sql/carTable.php?q="+str,true);
      xmlhttp.send();
    }
  }
  

function SetPrice(){
  var tier = document.querySelector("#tier").value;
  var distance = radius.toFixed(2); // Distance in km
  console.log(distance);
  var price = 0;
  var tripDurInMins = radius / 0.300; // 0.675km/minute is average speed in downtown toronto acc to my calc
  // if (radius < 50) {
    if (tier == 'econ'){
      // Base: $2.50; Booking fee: $2.75; Minimum: $5.25; per Minute: $0.18; per Km: $0.81 
      price = (2.75 + 5.25 + (0.18 * tripDurInMins) + (0.81 * distance))
    }
    else if (tier == 'xl'){
      // Base: $5; Booking fee: $3; Minimum: $8; per Minute: $0.36 ; Per Km: $1.55
      price = (3 + 3 + 8 + (0.36 * tripDurInMins) + (1.55 * distance))
    }
    else if (tier == 'premium'){
      // Base: $8.75; Booking fee: $0; Minimum: $15.75; per Minute: $0.85; Per Km: $2.23
      price = (5 + 0 + 15.75 + (0.85 * tripDurInMins) + (2.23 * distance))
    }
    document.querySelector("#price").innerHTML = 'Price: CA$' + price.toFixed(2) + '\nTrip duration: ' + tripDurInMins.toFixed(0) + "minutes.";
  // }
  // else {
  //   document.querySelector("#price").innerHTML = '';
  // }
}
  
$(document).ready(function (){
  document.querySelector('#find-me').addEventListener('click', geoFindMe);
  document.querySelector('#show-map').addEventListener('click', initMap);  
  document.querySelector('#radius').addEventListener('change') = SetPrice();
  editInputDate();
    
    $('#car-table tr').click(function (event) {
        if (event.target.type !== 'radio') {
            $(':radio', this).trigger('click');
        }
    });
});