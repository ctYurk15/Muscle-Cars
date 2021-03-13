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
        "<a href='#'>Акції</a>"+
    "</td>"+
    "<td width='14.28%'>"+
        "<a href='#'>Кредитування</a>"+
    "</td>"+
    "<td width='14.28%'>"+
        "<a href='#'>Про нас</a>"+
    "</td>"+
    "<td width='14.28%'>"+
        "<a href='#'><img src='images/account.png' width='35%'></a>"+
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

document.getElementById("headerTR").innerHTML += header;
document.getElementById("footerTR").innerHTML += footer;