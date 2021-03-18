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
        "<a href='#'>Кредитування</a>"+
    "</td>"+
    "<td width='14.28%'>"+
        "<a href='#'>Про нас</a>"+
    "</td>"+
    "<td width='14.28%'>"+
        "<img src='images/account.png' width='35%' id='accountImg'>"+
    "</td>";

var footer = "<td width='14.28%''>"+
                    "<img src='images/logo.png' width='35%'>"+
                "</td>"+
                "<td width='14.28%'>"+
                    "<a href='#'>Контакти</a>"+
                "</td>"+
                "<td width='28.56%' colspan='2'>"+
                    "<a href='#'>Політика конфіденційності</a>"+
                "</td>"+
                "<td width='28.56%' colspan='2'>"+
                    "<a href='#'>Юридична інформація</a>"+
                "</td>"+
                "<td width='14.28%'>"+
                    "<a href='#'>Про нас</a>"+
                "</td>";

var accountDiv = "<div id='accountDiv'>"+
                        "<button>Аккаунт</button>"+
                        "<button>Вантажівка</button>"+
                        "<button>Вийти</button>"+
                    "</div>";

//adding header and footer
document.getElementById("headerTR").innerHTML += header;
document.getElementById("footerTR").innerHTML += footer;

$(document).ready(function(){
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
});