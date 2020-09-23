/*CE CODE PERMET D'AFFICHER LE MENU COMPLET EN CLIQUANT SUR L ICONE HAMBURGER */
/*UNIQUEMENT POUR LA VERSION MOBILE DU HEADER */

var menuHamburger = document.getElementById("menuHamburger");
var navHeader = document.getElementById ("navHeader");
var connexion = document.getElementById ("connexion");


menuHamburger.addEventListener ("click",function (){
    if (navHeader.style.display == "none" && connexion.style.display =="none") {
        navHeader.style.display = "block";
        connexion.style.display ="block";
    } else {
        navHeader.style.display = "none"; 
        connexion.style.display ="none";
    }

});


