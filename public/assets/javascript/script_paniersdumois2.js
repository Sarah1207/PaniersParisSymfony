 /*CE CODE PERMET D'AFFICHER LA DESCRIPTION COMPLETE DES PANIERS*/
/*PAGE PANIERS DU MOIS*/
 
 
 /*panier 2*/
 var ensavoirplus2 = document.getElementById("ensavoirplus2");
 var descriptionpanier2 = document.getElementById("descriptionpanier2");

 ensavoirplus2.addEventListener("click", function () {
     if (descriptionpanier2.style.display == "none") {
         descriptionpanier2.style.display = "block";
     } else {
         descriptionpanier2.style.display = "none"
     }
 });



 /*CE CODE PERMET D'AFFICHER UNE DIV MODAL  POUR CONFIRMER QUE LE PRODUIT A ETE AJOUTE A MA COMMANDE*/
 /*PAGE PANIERS DU MOIS */

 /*panier 2*/
 var ajoutCommande2 = document.getElementById ("ajoutCommande2");
 var alertAjoutPanier =document.getElementById ("alertAjoutPanier");

 ajoutCommande2.addEventListener ("click",function() {
     if (alertAjoutPanier.style.display == "none") {
         alertAjoutPanier.style.display = "block"
     } else {alertAjoutPanier.style.display = "none"}
 });

