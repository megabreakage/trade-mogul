// Handles Globale JS Functions

$(document).ready( function () {
    
    $('.action-icon').mouseover(function(){
        $(this).addClass('fa-beat-fade');
    })
    $('.action-icon').mouseout(function(){
        $(this).removeClass('fa-beat-fade');
    })

});