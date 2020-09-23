$(document).ready(function(){
$('#texte-intro>div').slice(1).hide();



setInterval(function(){
        $('#texte-intro > div:first')
        .fadeOut(1000)
        .next(1100)
        .fadeIn(1000)
        .end(100)
        .appendTo('#texte-intro');
}, 8000)
        
})

