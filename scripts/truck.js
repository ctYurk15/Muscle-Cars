$(document).ready(function(){
    
    //for price text
    function updateSumPrice()
    {
        //calculating total price in truck
        var totalSum = 0;

        for(var i = 0; i < document.getElementsByName("priceText").length; i++)
        {
            totalSum += parseInt(document.getElementById("priceText"+i).innerHTML) * parseInt(document.getElementById("count"+i).innerHTML);
        }

        //writing it
        document.getElementById("sumPrice").innerHTML = "Загалом: $"+totalSum;

    }
    
    $("#truckForm").submit(function(event){
        event.preventDefault();
        
        var button = event.originalEvent.submitter;
        var action = $(button).val();
        
        $(this).load("phpScripts/truckScript.php", {action: action}, updateSumPrice);
    });
    
    $("#truckForm").load("phpScripts/truckScript.php", {action: ""}, updateSumPrice);
    //updateSumPrice();
});
