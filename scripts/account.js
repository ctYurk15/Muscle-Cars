$(document).ready(function(){
    
    //checking about login status
    $.ajax({
        url: "../phpScripts/generalAPI.php",
        type: "POST",
        data: {
            action: "is_loggined"
        },
        success: function(data){
            var result = JSON.parse(data);
            
            if(!result) //if we`re not loggined
            {
                location.replace("../login.html");
            }
        }
    });
    
    function switchPass()
    {
        $("#hiddenPassText").toggleClass('hidden');
        $("#passText").toggleClass('hidden');
    }
    
    //changing stats
    var changeButtons = $(".changeButton"); //getting all buttons needed
    
    for(var i = 0; i < changeButtons.length; i++)
    {
        $(changeButtons[i]).on("click", function(){
            //removing previous block
            $(this).parent().prev().addClass('hidden');
            $(this).parent().addClass('hidden');
            
            //showing editable next block
            $(this).parent().next().removeClass('hidden');
            $(this).parent().next().next().removeClass('hidden');
            
        });
    }
    
    //getting info about account
    $.ajax({
        url: "../phpScripts/generalAPI.php",
        type: "POST",
        data: {
            action: "account_info"
        },
        success: function(data){
            var receivedData = JSON.parse(data);
            
            //console.log(receivedData);
            
            //filling table with data received
            $(".login_text").text(receivedData.login);
            $(".login").val(receivedData.login);
            
            $(".name_text").text(receivedData.name);
            $(".name").val(receivedData.name);

            $(".email_text").text(receivedData.email);
            $(".email").val(receivedData.email);
            
            $(".address_text").text(receivedData.address);
            $(".address").val(receivedData.address);
            
            $(".avatar_display").attr('src', 'images/'+receivedData.avatar);
            
            $(".orders_text").text(receivedData.orders);
        },
        error: function(data){
            console.log(data);
        }
    });
});