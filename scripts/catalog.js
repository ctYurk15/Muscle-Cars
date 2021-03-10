$(document).ready(function(){
    
    $(".car-container button").on("click", function(){
        var carName = $(this).parent().find("h1").text();
        
        $("#carInfoBlock").removeClass("hidden");
        
        $("#carInfoBlock button").attr("data-carName", carName);
        $("#carInfoBlock h1").text(carName);
    });
    
    $(document).on("click", function(event){
        if(event.target.localName != "button")
        {
            $("#carInfoBlock").addClass("hidden");
        }
    });
    
    $("#carInfoBlock button").on("click", function(){
        window.location = "carpage.html?carName="+$(this).attr("data-carName")
    })
});