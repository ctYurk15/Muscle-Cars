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

updateSumPrice();