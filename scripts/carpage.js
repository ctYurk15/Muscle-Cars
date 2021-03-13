$(document).ready(function(){
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    
    var carName = urlParams.get("carName");
    $("#labelText").text(carName);
});
