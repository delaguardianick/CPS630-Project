var ride1Raw;
var ride1;
var ride2;
var finalSelection;
// $(function() {
//     $('[data-toggle="tooltip"]').tooltip()
//     })


function setSummaryData(ride1, ride2){
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
    document.getElementById("pickup1").textContent = pickup;
    document.getElementById("destination1").innerHTML = destination;
    document.getElementById("date1").innerHTML = date + " " + time;
    document.getElementById("distance1").textContent = distance + "km" 
    document.getElementById("tripTime1").textContent = tripTime + " " + "minutes";
    document.getElementById("carModel1").textContent = carModel;
    document.getElementById("carId1").textContent = carId;
    document.getElementById("driver1").textContent = driver;
    document.getElementById("price1").innerHTML = "$CA " + price;

    var pickup = ride2.pickup;
    var destination = ride2.destination;
    var distance = ride2.distance;
    var price = ride2.price;
    var tripTime = ride2.tripTime;
    var tier = ride2.tier;
    var date = ride2.date.date;
    var time = ride2.date.time;
    var carId = ride2.carInfo.carId;
    var carModel = ride2.carInfo.carModel;
    var driver = ride2.carInfo.driver;

    //document.getElementById("userId").innerHTML = userID;
    document.getElementById("pickup2").textContent = pickup;
    document.getElementById("destination2").innerHTML = destination;
    document.getElementById("date2").innerHTML = date + " " + time;
    document.getElementById("distance2").textContent = distance + "km" 
    document.getElementById("tripTime2").textContent = tripTime + " " + "minutes";
    document.getElementById("carModel2").textContent = carModel;
    document.getElementById("carId2").textContent = carId;
    document.getElementById("driver2").textContent = driver;
    document.getElementById("price2").innerHTML = "$CA " + price;
}

function storeRecord(){
    var file = "ride" + finalSelection + "Raw"
    $.post("sql/storeTripRecord.php",
    {
      json: file,
    },
    function(data, status){
        // document.getElementById("payment-status").innerHTML = data;
        console.log("Data: " + data + "\nStatus: " + status);
    });
}

function hideUnselected(){
    console.log("WER GET HERER");
    console.log(document.getElementById('chooseRide1').checked);
    
    if (document.getElementById('chooseRide1').checked){
        $("#summary2").css('display','none');
        finalSelection = '1';
    }
    else if (document.getElementById('chooseRide2').checked){
        $("#summary1").css('display','none');
        finalSelection = '2';
        }
    else {
        finalSelection = null;
        alert("Please choose one of the two rides.");
    }   
    }

$(document).ready(function (){
    // document.getElementById("payment-status").innerHTML = '';
    var ride1Raw = localStorage.getItem("ride1");
    var ride1 = JSON.parse(ride1Raw);

    var ride2Raw = localStorage.getItem("ride2");
    ride2 = JSON.parse(ride2Raw);

    console.log(ride1);
    console.log(ride2);
    setSummaryData(ride1,ride2);

    $("input[type='radio']").click(function(){
        var sim = $("input[type='radio']:checked").val();
        //alert(sim);
        if (sim<3) { $('.myratings').css('color','red'); $(".myratings").text(sim); }else{ $('.myratings').css('color','green'); $(".myratings").text(sim); } 
        $('#thanks').html("Thank you!");
    });
        

    document.getElementById("confirm-pay").addEventListener('click', storeRecord)
    document.getElementById("confirm-pay").onclick = function (){
        hideUnselected();
        if (finalSelection != null){
            alert("Success! Trip added to DB");
            $("#payment").css("display","none");
            $("#payment-header").text("Please wait for your ride.");
            var id = '#summary-card' + finalSelection
            $(id).css("margin-right","auto");
            $(id).css("margin-left","auto");
            $(id).css("width","50%");
            $('#rating-all').css({'display':'flex',
            'flex-direction' : 'column',
            'align-items' : 'center',
            'padding' : 'inherit',
            'justify-content' : 'center'});
        }
        

    }
});