var ride1Raw;
var ride1;
var ride2;
var dual = false;
// $(function() {
//     $('[data-toggle="tooltip"]').tooltip()
//     })


function setSummaryData(ride1){
    //var userID = ride1.userId;
    var pickup = ride1.pickup;
    var destination = ride1.destination;
    var distance = ride1.distance;
    var price = ride1.price;
    var tripTime = ride1.tripTime;
    var tier = ride1.tier;
    var date = ride1.date.date;
    var time = ride1.date.time;
    var carId = ride1.carInfo.carId;
    var carModel = ride1.carInfo.carModel;
    var driver = ride1.carInfo.driver;

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
}

function storeRecord(){
    $.post("sql/storeTripRecord.php",
    {
      json: ride1Raw,
    },
    function(data, status){
        // document.getElementById("payment-status").innerHTML = data;
        console.log("Data: " + data + "\nStatus: " + status);
    });
}

$(document).ready(function (){
    // document.getElementById("payment-status").innerHTML = '';
    var ride1Raw = localStorage.getItem("ride1");
    var ride1 = JSON.parse(ride1Raw);

    // var ride2Raw = localStorage.getItem("ride2");
    // ride2 = JSON.parse(ride2Raw);

    console.log(ride1);
    console.log(ride2);
    setSummaryData(ride1);
    console.log(dual);

    $("input[type='radio']").click(function(){
        var sim = $("input[type='radio']:checked").val();
        //alert(sim);
        if (sim<3) { $('.myratings').css('color','red'); $(".myratings").text(sim); }else{ $('.myratings').css('color','green'); $(".myratings").text(sim); } 
        $('#thanks').html("Thank you!");
    });

    document.getElementById("confirm-pay").addEventListener('click', storeRecord)
    document.getElementById("confirm-pay").onclick = function (){
        alert("Success! Trip added to DB");
        $("#payment").css("display","none");
        $("#payment-header").text("Please wait for your ride.");
        $("#summary").css("margin-right","auto");
        $("#summary").css("margin-left","auto");

        $('#rating-all').css({'display':'flex',
            'flex-direction' : 'column',
            'align-items' : 'center',
            'padding' : 'inherit',
            'justify-content' : 'center'});

    }
});