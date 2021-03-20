var header = "<td width='14.28%'>"+
        "<img src='images/logo.png' width='35%'>"+
    "</td>"+
    "<td width='14.28%'>"+
        "<a href='index.html'>Головна</a>"+
    "</td>"+
    "<td width='14.28%'>"+
        "<a href='catalog.html'>Автомобілі</a>"+
    "</td>"+
    "<td width='14.28%'>"+
        "<a href='sales.html'>Акції</a>"+
    "</td>"+
    "<td width='14.28%'>"+
        "<a href='crediting.html'>Кредитування</a>"+
    "</td>"+
    "<td width='14.28%'>"+
        "<a href='about.html'>Про нас</a>"+
    "</td>"+
    "<td width='14.28%'>"+
        "<img src='images/account.png' width='35%' id='accountImg'>"+
    "</td>";

var footer = "<td width='14.28%''>"+
                    "<img src='images/logo.png' width='35%'>"+
                "</td>"+
                "<td width='28.56%' colspan='2'>"+
                    "<a href='footerPage.html?topic=Контакти'>Контакти</a>"+
                "</td>"+
                "<td width='28.56%' colspan='2'>"+
                    "<a href='footerPage.html?topic=Політика конфіденційності'>Політика конфіденційності</a>"+
                "</td>"+
                "<td width='28.56%' colspan='2'>"+
                    "<a href='footerPage.html?topic=Юридична інформація'>Юридична інформація</a>"+
                "</td>";

var accountDiv = "<div id='accountDiv'>"+
                        "<button onclick='location.replace("+'"account.html"'+")'>Аккаунт</button>"+
                        "<button onclick='location.replace("+'"truck.html"'+")'>Вантажівка</button>"+
                        "<button id='accountLeave'>Вийти</button>"+
                    "</div>";

//adding header and footer
document.getElementById("headerTR").innerHTML += header;
document.getElementById("footerTR").innerHTML += footer;

$(document).ready(function(){
    //showing account div
   $("#accountImg").on("click", function(){
       $("#accountDiv").toggleClass("slideHide");
   });
    
    $("#headerTR").next().append(accountDiv);
    
    $("#priceText").text("$"+numberWithSpaces($("#priceText").text()));
    
    function numberWithSpaces(x) 
    {
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        return parts.join(".");
    }
    
    //if we pressed on leave account button
    $("#accountLeave").on("click", function(){
        $("#dialogDiv").removeClass("hidden");
        $("#transparentDiv").removeClass("hidden");
    });
    
    //if we canceled it
    $("#no").on("click", function(){
        $("#dialogDiv").addClass("hidden");
        $("#transparentDiv").addClass("hidden");
    });
    
    //dialog div hiding
    $(document).on("click", function(event){
        if(event.target.id != "accountImg")
        {
            if( event.target.localName != "button")
            {
                $("#dialogDiv").addClass("hidden");
                $("#transparentDiv").addClass("hidden");
            }
        }
    });
});