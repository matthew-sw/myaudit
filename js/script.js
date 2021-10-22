$(document).ready(function(){

    $('#keyword').on('keyup', function(){
        $('#container').load('ajax/item.php?keyword=' + $('#keyword').val());
    });
});