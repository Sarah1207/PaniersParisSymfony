/*CE CODE PERMET D'AFFICHER LA DESCRIPTION COMPLETE DES PANIERS*/
/*PAGE PANIERS DU MOIS*/


/*panier 1*/
var ensavoirplus1 = document.getElementById("ensavoirplus1");
var descriptionpanier1 = document.getElementById("descriptionpanier1");

ensavoirplus1.addEventListener("click", function () {
    if (descriptionpanier1.style.display == "none") {
        descriptionpanier1.style.display = "block";
    } else {
        descriptionpanier1.style.display = "none"
    }
});




/*CE CODE PERMET D'AFFICHER UNE DIV MODAL  POUR CONFIRMER QUE LE PRODUIT A ETE AJOUTE A MA COMMANDE*/
/*PAGE PANIERS DU MOIS */

/*panier 1*/
var ajoutCommande1 = document.getElementById ("ajoutCommande1");
var alertAjoutPanier =document.getElementById ("alertAjoutPanier");

ajoutCommande1.addEventListener ("click",function() {
    if (alertAjoutPanier.style.display == "none") {
        alertAjoutPanier.style.display = "block"
    } else {alertAjoutPanier.style.display = "none"}
});





