// DATE

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
  
  // function SetPrices(){
  
  // }

$(document).ready(function (){
    editInputDate();
    
    $('#show-car-table tr').click(function (event) {
        if (event.target.type !== 'radio') {
            $(':radio', this).trigger('click');
        }
    });
});