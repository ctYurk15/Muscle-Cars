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
    
    
    //sending ajax request in order to get comments for this car
    function updateComments()
    {
        $.ajax({
            type: "POST",
            url: "../phpScripts/carPageAPI.php",
            data: { 
                action: "get_comments",
                carname: carName 
            },
            success: function(responce)
            {
                var receivedData = JSON.parse(responce);
                var commentsDiv = $("#commentsDiv");
                var commentsCount = receivedData.comments.length;

                commentsDiv.html("");
                
                if(commentsCount > 0) //if there is some comments
                {
                    receivedData.comments.forEach(function(item){
                        var noteImg = item.positive == "1" ? "like.png" : "dislike.png";
                        var newComment = "<div class='commentDiv'>"+
                                            "<table>"+
                                                "<tr>"+
                                                    "<td width='10%' rowspan='2'>"+
                                                        "<h4 style='text-align: center; margin-top: 10px;'>"+item.login+"</h4>"+
                                                        "<img src='images/"+item.avatar+"'>"+
                                                    "</td>"+
                                                    "<td width='85%'>"+
                                                        "<b>Коментар було залишено"+item.date+"</b>"+
                                                    "</td>"+
                                                    "<td width='5%' rowspan='2' align='center'>"+
                                                        "<img src='images/"+noteImg+"'>"+
                                                    "</td>"+
                                                "</tr>"+
                                                "<tr>"+
                                                    "<td>"+
                                                        item.commentText+
                                                    "</td>"+
                                                "</tr>"+
                                            "</table>"+
                                        "</div>";
                        commentsDiv.append(newComment);
                    });
                }
                else
                {
                    commentsDiv.html("Наразі немає відгуків про цей автомобіль");
                }
            }
        });
    }
    
    //sending ajax request in order to get full car info
    function updateCarData()
    {
        $.ajax({
            type: "POST",
            url: "../phpScripts/carPageAPI.php",
            data: { 
                action: "get_carinfo",
                carname: carName 
            },
            success: function(responce)
            {
                var receivedData = JSON.parse(responce);
                //console.log(receivedData);

                //updating main info
                $(".mainImg").attr("src", "images/"+receivedData.img);
                $("#description").html(receivedData.description);
                $("#manufacturer").html("Виробник: "+receivedData.manufacturer);
                $("#year").html("Рік виходу: "+receivedData.year);

                //updating car avg score
                var score = receivedData.score;
                var scoreTag = $("#score");

                if(score == -1) //if there`s no comments for the car
                {
                    scoreTag.html("Вибачте, наразі немає відгуків");
                }
                else
                {
                    scoreTag.html(score + "% позитивних відгуків");
                }

                //updating slider
                for(var i = 0; i < 7; i++)
                {
                    $("#line").append("<img src='images/"+receivedData.gallery[i]+"' alt=''>");
                }
            }
        });
    }
    
    //leaving comment
    $("#leaveCommentForm").submit(function(event){
        event.preventDefault();
        
        //getting values
        var comment = $("#comment").val();
        var positive = $("input[name='positiveComment']:checked").val();
        
        $.ajax({
            type: "POST",
            url: "../phpScripts/carPageAPI.php",
            data: { 
                action: "leave_comment",
                carname: carName,
                comment: comment,
                positive: positive
            },
            success: function(responce)
            {
                var receivedData = JSON.parse(responce);
                console.log(receivedData);
                
                if(receivedData.success)
                {
                    updateComments();
                    updateCarData();
                    $("#errorText").html(""); //clearing previous errors
                    
                }
                else
                {
                    $("#errorText").html(receivedData.message);
                }
            }
        });
    });
    
    getPriceOfOption();
    updateComments();
    updateCarData();
    
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
