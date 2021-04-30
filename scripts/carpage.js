$(document).ready(function(){
    //$(this).preventDefault();
    
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    
    var carName = urlParams.get("carName");
    $("#labelText").text(carName);
    $(".formCarName").val(carName);
    $("title").text(carName);
    
    //slide buttons changes
    var left = 0;
    $("#rightBSlider").on("click",function(){
        slide(1);
    });
    $("#leftBSlider").on("click",function(){
        slide(-1);
    });
    
    
    $("#buyButton").on("click", function(){
        $("#optionsDiv").removeClass("hidden");
        $("#transparentDiv").removeClass("hidden");
    });
    
    $("#optionsForm").submit(function(event){
        event.preventDefault();
        
        //getting options values
        var carname = $('#labelText').text();
        var carcolor = $('input[name="carcolor"]:checked').val();
        var carengine = $('input[name="carengine"]:checked').val();
        var cardisk = $('input[name="cardisk"]:checked').val();
        
        $("#empty").load("phpScripts/addToTruckScript.php?mode=purchase", {
            carname: carname,
            carcolor: carcolor,
            carengine: carengine,
            cardisk: cardisk
        })
    });
    
    $(".optionRadio").on("click", getPriceOfOption);
    
    function getPriceOfOption()
    {
        //getting options values
        var carname = $('#labelText').text();
        var carcolor = $('input[name="carcolor"]:checked').val();
        var carengine = $('input[name="carengine"]:checked').val();
        var cardisk = $('input[name="cardisk"]:checked').val();
        
        if(carcolor != undefined && carengine != undefined && cardisk != undefined) //if all is set
        {
            $("#optionPrice").load("phpScripts/addToTruckScript.php?mode=getPrice", {
                carname: carname,
                carcolor: carcolor,
                carengine: carengine,
                cardisk: cardisk
            });
        }
        
    }
    
    
    $("#leaveCommentForm").submit(function(event){
        event.preventDefault();
        
        //getting values
        var comment = $("#comment").val();
        var positive = $("input[name='positiveComment']:checked").val();
        var carname = $("#carname").val();
        
        $('#commentsDiv').load('phpScripts/addCommentScript.php', {
            positiveComment: positive,
            commentText: comment,
            carname: carname
        }, function(){
            document.getElementById('leaveCommentForm').reset();
        });
        //alert(carname);
    });
    
    getPriceOfOption();
    $('#commentsDiv').load('phpScripts/addCommentScript.php', {carname: $("#carname").val()});
    
    function slide(i)
    {
        var line = document.getElementById('line');
        if(left == 0 && i == -1)
        {
            left = -7680;
        }
        else if(left > -7680)
        {
            left = left-(1280*i);
        }
        else 
        {
            left = 0;
            clearTimeout(timer);
        }
        line.style.left = left+'px';
        
    }

    
});


var timer = 0;

//autoSlider();

function autoSlider()
{
    timer = setTimeout(function()
    {
        
        autoSlider();
    
    }, 3000) //1000ms -> 1s
}