$(document).ready(function(){
    
    $(".car-container button").on("click", function(){
        $("#carInfoBlock").removeClass("hidden");
    });
    
    $(document).on("click", function(event){
        if(event.target.localName != "button")
        {
            $("#carInfoBlock").addClass("hidden");
        }
        /*else
        {
            $("#carInfoBlock").addClass("hidden");
        }*/
        console.log(event);
    });
});