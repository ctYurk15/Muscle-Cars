$(document).ready(function(){
    $(this).preventDefault();
    
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    
    var carName = urlParams.get("carName");
    $("#labelText").text(carName);
    
    //slide buttons changes
    var left = 0;
    $("#rightBSlider").on("click",function(){
        slide(1);
    });
    $("#leftBSlider").on("click",function(){
        slide(-1);
    });
    
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