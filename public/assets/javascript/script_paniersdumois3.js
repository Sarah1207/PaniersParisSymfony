/*CE CODE PERMET D'AFFICHER LA DESCRIPTION COMPLETE DES PANIERS*/
/*PAGE PANIERS DU MOIS*/

/*panier 3*/
var ensavoirplus3 = document.getElementById("ensavoirplus3");
var descriptionpanier3 = document.getElementById("descriptionpanier3");

ensavoirplus3.addEventListener("click", function () {
    if (descriptionpanier3.style.display == "none") {
        descriptionpanier3.style.display = "block";
    } else {
        descriptionpanier3.style.display = "none"
    }
});


/*CE CODE PERMET D'AFFICHER UNE DIV MODAL  POUR CONFIRMER QUE LE PRODUIT A ETE AJOUTE A MA COMMANDE*/
/*PAGE PANIERS DU MOIS */

/*panier 3*/
var ajoutCommande3 = document.getElementById ("ajoutCommande3");
var alertAjoutPanier =document.getElementById ("alertAjoutPanier");

ajoutCommande3.addEventListener ("click",function() {
    if (alertAjoutPanier.style.display == "none") {
        alertAjoutPanier.style.display = "block"
    } else {alertAjoutPanier.style.display = "none"}
});

