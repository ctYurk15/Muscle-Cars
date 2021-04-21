$(document).ready(function(){
    //hiding or showing pass
    $("#hiddenPassText").on('click', switchPass);
    $("#passText").on('click', switchPass);
    
    function switchPass()
    {
        $("#hiddenPassText").toggleClass('hidden');
        $("#passText").toggleClass('hidden');
    }
    
    //changing stats
    var changeButtons = $(".changeButton"); //getting all buttons needed
    
    for(var i = 0; i < changeButtons.length; i++)
    {
        $(changeButtons[i]).on("click", function(){
            $(this).parent().prev().html("<input type='text' value='"+$(this).parent().prev().text()+"' name='"+$(this).attr("id")+"'>"); //changing type of the text to input
            $(this).unbind();
            
            var $this = $(this);
            setTimeout(function() //in order to avoid bugs
            { 
                $this.attr("type", "submit"); //chaning button type to submit
            }, 1);
        });
    }
});