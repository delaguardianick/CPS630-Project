var myJSON;
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
    })

function setSummaryData(obj){
    //var userID = obj.userId;
    var pickup = obj.pickup;
    var destination = obj.destination;
    var distance = obj.distance;
    var price = obj.price;
    var tripTime = obj.tripTime;
    var tier = obj.tier;
    var date = obj.date.date;
    var time = obj.date.time;
    var carId = obj.carInfo.carId;
    var carModel = obj.carInfo.carModel;
    var driver = obj.carInfo.driver;

    //document.getElementById("userId").innerHTML = userID;
    document.getElementById("pickup").textContent = pickup;
    document.getElementById("destination").innerHTML = destination;
    document.getElementById("date").innerHTML = date + " " + time;
    document.getElementById("distance").textContent = distance + "km" 
    document.getElementById("tripTime").textContent = tripTime + " " + "minutes";
    document.getElementById("carModel").textContent = carModel;
    document.getElementById("carId").textContent = carId;
    document.getElementById("driver").textContent = driver;
    document.getElementById("price").innerHTML = "$CA " + price;
    var username = document.getElementById("userId").innerText;
    console.log(username);
    console.log("FINCKSLA");
}

function storeRecord(){
    $.post("sql/storeTripRecord.php",
    {
      json: myJSON,
    },
    function(data, status){
        document.getElementById("payment-status").innerHTML = data;
        console.log("Data: " + data + "\nStatus: " + status);
    });
}

$(document).ready(function (){
    // document.getElementById("payment-status").innerHTML = '';
    myJSON = localStorage.getItem("json");
    // console.log(myJSON);

    var obj = JSON.parse(myJSON);
    // console.log(obj);
    setSummaryData(obj);

    document.getElementById("confirm-pay").addEventListener('click', storeRecord)
});