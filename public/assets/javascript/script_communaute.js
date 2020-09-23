/*CE CODE PERMET D'ALTERNER LES MESSAGES AFFICHÉS DANS LA DIV "ANNONCES"*/
/*COMMUNAUTÉ*/

$(document).ready(function () {

    setInterval(function () {
        $("#annonces-slider > div:first")
            .fadeOut(1000)
            .next(8000)
            .fadeIn(1000)
            .end(3000)
            .appendTo("#annonces-slider");
        console.log("annonces");

    }, 10000);

})
