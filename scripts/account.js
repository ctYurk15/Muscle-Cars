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
            //removing previous block
            $(this).parent().prev().addClass('hidden');
            $(this).parent().addClass('hidden');
            
            //showing editable next block
            $(this).parent().next().removeClass('hidden');
            $(this).parent().next().next().removeClass('hidden');
            
        });
    }
});