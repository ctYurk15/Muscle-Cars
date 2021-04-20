$(document).ready(function(){
    $("#hiddenPassText").on('click', switchPass);
    $("#passText").on('click', switchPass);
    
    function switchPass()
    {
        $("#hiddenPassText").toggleClass('hidden');
        $("#passText").toggleClass('hidden');
    }
});