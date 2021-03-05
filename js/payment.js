

$(function() {
    $('[data-toggle="tooltip"]').tooltip()
    })

function setSummaryData(obj){
    var userID = obj.userId;
    var pickup = obj.pickup;
    var destination = obj.destination;
    var distance = obj.distance;
    var price = obj.price;

    document.getElementById("userId").innerHTML = userID;
    document.getElementById("pickup").textContent = pickup;
    document.getElementById("destination").innerHTML = destination;
    document.getElementById("distance").textContent = "Distance: " + distance + "km";
    document.getElementById("price").innerHTML = price;
    // document.getElementById("userId")
}

$(document).ready(function (){
    var myJSON = localStorage.getItem("json");
    console.log(myJSON);

    var obj = JSON.parse(myJSON);
    setSummaryData(obj);
});