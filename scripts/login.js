$(document).ready(function(){
    $("form").submit(function(event){
        event.preventDefault(); //preventing default behaviour
        
        //getting logged data
        var login = $("#loginInput").val();
        var pass = $("#passInput").val();
        
        //if there will be any errors, write here
        $("#errorText").load("phpScripts/loginScript.php", {login: login, pass: pass})
    });
});