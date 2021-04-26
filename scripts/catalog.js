$(document).ready(function(){
    
    $(".car-block button").on("click", function(){
        //getting info about car 
        var carName = $(this).parent().find("h1").text();
        var carImg = $(this).parent().find("img").attr("src");
        var carDescription = $(this).parent().find(".description").text();
        
        $("#carInfoBlock").removeClass("hidden");
        
        //filling block with information needed
        $("#carInfoBlock button").attr("data-carName", carName);
        $("#carInfoBlock img").attr("src", carImg);
        $("#carInfoBlock h1").text(carName);
        $("#descriptionDiv").text(carDescription);
        $("#transparentDiv").removeClass("hidden");
    });
    
    $(document).on("click", function(event){
        if(event.target.localName != "button")
        {
            $("#carInfoBlock").addClass("hidden");
            $("#transparentDiv").addClass("hidden");
        }
        //else $("#transparentDiv").toggleClass("hidden");
    });
    
    $("#carInfoBlock button").on("click", function(){
        var carName = $(this).siblings("h1").text();
        window.location = "carpage.php?carName="+carName;
    })
    
    var carBlocksDisplayed = 5; //how much cars we want to see
    
    function updateCarBlocks( carBlockAddition)
    {
        carBlocksDisplayed += carBlockAddition; //adding more cars to display
        var carBlocks = document.getElementsByClassName("car-block"); //getting all car blocks
        if(carBlocksDisplayed > carBlocks.length) carBlocksDisplayed = carBlocks.length;

        for(var i = 0; i < carBlocksDisplayed; i++)
        {
            carBlocks[i].classList.remove('hidden');
        }
    }
    
    updateCarBlocks(0);
    $('#moreButton').on("click", function(){
        updateCarBlocks(6);
    })
    
    /*var manufacturerCheckBoxes = document.getElementsByName('manufacturer[]');
    console.log(manufacturerCheckBoxes[0].checked);*/
});


