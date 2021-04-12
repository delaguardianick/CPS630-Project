var item1Raw;
var item1;
var item2;
var finalSelection;
// $(function() {
//     $('[data-toggle="tooltip"]').tooltip()
//     })

function setSummaryData(item1, item2){
    //var userID = item1.userId;
    var pickup = item1.pickup;
    var destination = item1.destination;
    var itemId = item1.itemInfo.itemId;
    var item = item1.itemInfo.item;
    var storename = item1.itemInfo.storename;
    var price = item1.itemInfo.price;

    //document.getElementById("userId").innerHTML = userID;
    document.getElementById("pickup1").textContent = pickup;
    document.getElementById("destination1").innerHTML = destination;
    document.getElementById("itemId1").textContent = itemId;
    document.getElementById("item1").textContent = item;
    document.getElementById("address1").textContent = storename;
    document.getElementById("price1").innerHTML = price;
    var username = document.getElementById("userId").innerText;
    console.log("BITCH");
    console.log(username);
    console.log(pickup);
    console.log(item);
    console.log(storename);
    console.log(price);

    var pickup = item2.pickup;
    var destination = item2.destination;
    var itemId = item2.itemInfo.itemId;
    var item = item2.itemInfo.item;
    var storename = item2.itemInfo.storename;
    var price = item2.itemInfo.price;

    //document.getElementById("userId").innerHTML = userID;
    document.getElementById("pickup2").textContent = pickup;
    document.getElementById("destination2").innerHTML = destination;
    document.getElementById("itemId2").textContent = itemId;
    document.getElementById("item2").textContent = item;
    document.getElementById("address2").textContent = storename;
    document.getElementById("price2").innerHTML = price;
    var username = document.getElementById("userId").innerText;
}

function storeRecord(){
    var file = "item" + finalSelection + "Raw"
    $.post("sql/orderRecord.php",
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
    console.log(document.getElementById('chooseitem1').checked);
    
    if (document.getElementById('chooseitem1').checked){
        $("#summary2").css('display','none');
        finalSelection = '1';
    }
    else if (document.getElementById('chooseitem2').checked){
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
    var item1Raw = localStorage.getItem("jsonItems");
    var item1 = JSON.parse(item1Raw);

    var item2Raw = localStorage.getItem("jsonItems2");
    item2 = JSON.parse(item2Raw);

    console.log(item1);
    console.log(item2);
    setSummaryData(item1,item2);

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