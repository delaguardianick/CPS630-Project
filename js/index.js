function showBrowser() {
    var longstr = navigator.userAgent;
    var result = "";
    if (longstr.includes("Chrome")){
        result = "Chrome";
    }
    else if (longstr.includes("Firefox")){
        result = "Firefox";    
    }
    document.getElementById('browser').innerHTML = result ;
}

$(document).ready(function() {
    showBrowser();
})