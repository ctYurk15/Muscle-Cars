$(document).ready(function(){
    
    var carBlocksDisplayed = 5; //how much cars we want to see
    
    function updateCarBlocks(carBlockAddition, refresh=false)
    {
        if(!refresh) 
        {
            carBlocksDisplayed += carBlockAddition; //adding more cars to display
        }
        else
        {
            carBlocksDisplayed = carBlockAddition;
        }

        var carBlocks = document.getElementsByClassName("car-block"); //getting all car blocks
        if(carBlocksDisplayed > carBlocks.length) carBlocksDisplayed = carBlocks.length;

        for(var i = 0; i < carBlocksDisplayed; i++)
        {
            carBlocks[i].classList.remove('hidden');
        }
    }

    function bindCarBlocks()
    {
        $("#carInfoBlock button").on("click", function(){
            var carName = $(this).siblings("h1").text();
            window.location = "carpage.html?carName="+carName;
        })

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
    }

    function reload_js(src) 
    {
        $('script[src="' + src + '"]').remove();
        $('<script>').attr('src', src).appendTo('head');
    }

    function showCars(minPrice, maxPrice, minWS, maxWS, minHP, maxHP, manufacturers, orderBy)
    {

        $.ajax({
            url: "../phpScripts/catalogAPI.php",
            type: "POST",
            data: {
                action: "show_cars",
                minPrice: minPrice,
                maxPrice: maxPrice,
                minWS: minWS,
                maxWS: maxWS,
                minHP: minHP,
                maxHP: maxHP,
                manufacturers: manufacturers,
                orderBy: orderBy
            },
            success: function(data){
                var receivedData = JSON.parse(data);

                if(receivedData.result == true)
                {
                    var carDiv = $("#carsDiv");
                    carDiv.html("");

                    receivedData.cars.forEach(function(car) {
                        carDiv.append("<div class='car-container car-block hidden'>"+
                                            "<br><h1>"+car.carName+"</h1>"+
                                            "<img src='images/"+car.carImg+"' value='1'><br>"+
                                            "<button>Детальніше</button>"+
                                            "<i style='display: none' class='description'>"+car.carDesription+"</i>"+
                                        "</div>");
                    });

                    //updating pagination
                    updateCarBlocks(5, true);
                    
                    //rebinging js code
                    bindCarBlocks();
                    
                }
                
            },
            error: function(data){
                console.log(data);
            }
        });
    }
    
    $('#moreButton').on("click", function(){
        updateCarBlocks(6);
    })

    $(document).on("click", function(event){
        if(event.target.localName != "button")
        {
            $("#carInfoBlock").addClass("hidden");
            $("#transparentDiv").addClass("hidden");
        }
    });

    updateCarBlocks(0);

    //getting filtration parameters
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    
    var orderBy = urlParams.get("orderBy");
    var manufacturers = urlParams.getAll("manufacturers[]");
    var minPrice = urlParams.get("minPrice");
    var maxPrice = urlParams.get("maxPrice");
    var minWS = urlParams.get("minWS");
    var maxWS = urlParams.get("maxWS");
    var minHP = urlParams.get("minHP");
    var maxHP = urlParams.get("maxHP");

    //applying it on filters

    if(orderBy != null) //sorting
    {
        $("#sortingSelect").children("[value='"+orderBy+"']").prop("selected", true); //selecting option needed
    }

    //price
    if(minPrice != null && !isNaN(minPrice))
    {
        $("#minPrice").val(minPrice);
    } 
    if(maxPrice != null && !isNaN(maxPrice))
    {
        $("#maxPrice").val(maxPrice);
    }

    //wheels
    if(minWS != null && !isNaN(minWS))
    {
        $("#minWS").val(minWS);
    } 
    if(maxWS != null && !isNaN(maxWS))
    {
        $("#maxWS").val(maxWS);
    }

    //horsepowers
    if(minHP != null && !isNaN(minHP))
    {
        $("#minHP").val(minHP);
    } 
    if(maxHP != null && !isNaN(maxHP))
    {
        $("#maxHP").val(maxHP);
    }

    //calling show cars with set parameters
    showCars(minPrice, maxPrice, minWS, maxWS, minHP, maxHP, manufacturers, orderBy);

    bindCarBlocks();
    
    //getting all manufacturers
    $.ajax({
        url: "../phpScripts/catalogApi.php",
        type: "POST",
        data: {
            action: "get_manufacturers"
        },
        success: function(data)
        {
            var receivedData = JSON.parse(data);
            var div = $("#manufacturerDiv");
            
            //deleting loading text
            $("#manufacturerDiv").text("");

            receivedData.forEach(function(manufacturer)  {
                div.append("<input type='checkbox' id='"+manufacturer.Name+"' name='manufacturer[]' value='"+manufacturer.Name+"' class='manufacturerCB'><lable for='"+manufacturer.Name+"'>"+manufacturer.Name+"</lable><br>");
            });

            //checking manufacturers
            //manufacturers
            if(manufacturers.length > 0)
            {
                manufacturers.forEach(function(item){
                    $(".manufacturerCB[value='"+item+"']").prop("checked", true);
                });
            }
        },
        error: function(data)
        {
            console.log(data);
        }
    });

    //refresh cars with filters
    $("#filtersForm").submit(function(event){
        event.preventDefault();

        //collecting user preferences
        var minPrice = $("#minPrice").val();
        var maxPrice = $("#maxPrice").val();
        var minWS = $("#minWS").val();
        var maxWS = $("#maxWS").val();
        var minHP = $("#minHP").val();
        var maxHP = $("#maxHP").val();
        var manufacturers = $("input[name='manufacturer[]']:checked").map(function(idx, item){
            return $(item).val();
        }).get();
        var orderBy = $("#sortingSelect").val();

        showCars(minPrice, maxPrice, minWS, maxWS, minHP, maxHP, manufacturers, orderBy);

        //changing url 
        let positionParameters = location.pathname.indexOf('?');
        let url = location.pathname.substring(positionParameters, location.pathname.length);
        let newUrl = url + '?';
        
        //sorting param
        newUrl += 'orderBy='+orderBy;

        //price
        if(minPrice != '')
        {
            newUrl += '&minPrice='+minPrice;
        }  
        if(maxPrice != '')
        {
            newUrl += '&maxPrice='+maxPrice;
        }  

        //wheel size
        if(minWS != '')
        {
            newUrl += '&minWS='+minWS;
        }  
        if(maxWS != '')
        {
            newUrl += '&maxWS='+maxWS;
        } 

        //horsepowers
        if(minHP != '')
        {
            newUrl += '&minHP='+minHP;
        }  
        if(maxHP != '')
        {
            newUrl += '&maxHP='+maxHP;
        } 

        //manufacturers
        manufacturers.forEach(function(item){
            newUrl += "&manufacturers[]="+item;
        });

        //forming url & pushing it
        history.pushState({}, '', newUrl);

        //checking manufacturers back
        if(manufacturers != [])
        {
            manufacturers.forEach(function(item){
                console.log($(".manufacturerCB[value='"+item+"']").prop("checked"));
            })
        }

        /*console.log(minPrice + " " + maxPrice + " " + minWS + " " + maxWS + " " 
        + minHP + " " + maxHP + " " + manufacturers  + " " +  orderBy + " ");*/
        
    });
});


