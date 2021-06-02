var header = "<td width='14.28%'>"+
        "<img src='images/logo.png' width='35%'>"+
    "</td>"+
    "<td width='14.28%'>"+
        "<a href='index.html'>Головна</a>"+
    "</td>"+
    "<td width='14.28%'>"+
        "<a href='catalog.php'>Автомобілі</a>"+
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
                        "<button onclick='location.replace("+'"account.php"'+")'>Аккаунт</button>"+
                        "<button onclick='location.replace("+'"truck.html"'+")'>Вантажівка</button>"+
                        "<button id='accountLeave'>Вийти</button>"+
                    "</div>";

var exitAccountDiv = "<div class='transparent-div hidden' id='transparentDiv'></div>"+
                        "<div id='dialogDiv' class='hidden'>"+
                            "<h2>Ви справді хочете вийти з аккаунту?</h2><br>"+
                            "<span>"+
                                "<button id='leaveAcc'>Так</button>"+
                                "<button id='no'>Ні</button>"+
                                "</span>"+
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
    $("table").after(exitAccountDiv);
    
    $("#priceText").text("$"+numberWithSpaces($("#priceText").text()));
    
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
    
    //leaaving account    
    $("#leaveAcc").on("click", function(){
        location.replace("phpScripts/unloginScript.php");
    });
    
    //dialog div hiding
    $(document).on("click", function(event){
        if(event.target.id != "accountImg")
        {
            if( event.target.id == "transparentDiv")
            {
                $("#dialogDiv").addClass("hidden");
                $("#transparentDiv").addClass("hidden");
                $("#optionsDiv").addClass("hidden");
                //console.log(event);
            }
        }
    });
    
    function numberWithSpaces(x) 
    {
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        return parts.join(".");
    }
});