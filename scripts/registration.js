$(document).ready(function(){
    $("form").submit(function(event){
        event.preventDefault(); //preventing default behaviour
        
        //getting logged data
        var login = $("#loginInput").val();
        var name = $("#nameInput").val();
        var email = $("#emailInput").val();
        var pass = $("#passInput").val();
        var rpass = $("#rpassInput").val();
        var agreed = $("#agreeBox").val();
        
        //if there will be any errors, write here
        $("#errorText").load("phpScripts/registrationScript.php", {
            login: login,
            name: name,
            email: email,
            pass: pass,
            rpass: rpass,
            agreed: agreed,
            pass: pass});
        });
});