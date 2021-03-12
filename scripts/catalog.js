$(document).ready(function(){
    
    $(".car-container button").on("click", function(){
        var carName = $(this).parent().find("h1").text();
        
        $("#carInfoBlock").removeClass("hidden");
        
        $("#carInfoBlock button").attr("data-carName", carName);
        $("#carInfoBlock h1").text(carName);
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
        window.location = "carpage.html?carName="+carName;
    })
});