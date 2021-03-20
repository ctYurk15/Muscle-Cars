$(document).ready(function(){
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);

    var topicName = urlParams.get("topic"); //getting topic name
    
    //changing variables
    $("title").text("Muscle cars shop - "+topicName);
    $("h1").text(topicName);
    
    var imgURL = "images/";
    
    if(topicName == "Контакти") imgURL += "phone.png";
    else if(topicName == "Політика конфіденційності") imgURL += "terms-and-conditions.png";
    else if(topicName == "Юридична інформація") imgURL += "legalinfo.png";
    
    $("#imgN").attr("src", imgURL);
});