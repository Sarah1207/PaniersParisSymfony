/*CE CODE PERMET DE VALIDER LES CHAMPS DU FORMULAIRE 1*/

var form1 = document.getElementById("form1");

var email1 = document.getElementById("email1");

var password1 = document.getElementById("password1");

var p1 = document.getElementById("p1");

var email1Value = email1.value;
var password1Value = password1.value;

form1.addEventListener("submit", function (e) {
    e.preventDefault();

    if (email1Value == "" || password1Value == "") {
        p1.innerHTML = "Veuillez remplir les champs vides";
        throw "error";
        form.reset();
    }
});

/*CE CODE PERMET DE VALIDER LES CHAMPS DU FORMULAIRE 2*/

var form2 = document.getElementById("form2");
var prenom2 = document.getElementById("prenom2");
var nom2 = document.getElementById("nom2");
var tel2 = document.getElementById("tel2");
var start2 = document.getElementById("start");
var email2 = document.getElementById("email2");
var password2 = document.getElementById("password2");
var confirmation2 = document.getElementById("confirmation2");

var p2 = document.getElementById("p2");

/* phase 2 */

var prenom2Value = prenom2.value;
var nom2Value = nom2.value;
var tel2Value = tel2.value;
var start2Value = start2.value;
var email2Value = email2.value;
var password2Value = password2.value;
var confirmation2Value = confirmation2.value;

form2.addEventListener("submit", function (e) {
    e.preventDefault();

    if (
        prenom2Value == "" ||
        nom2Value == "" ||
        tel2Value == "" ||
        start2Value == "" ||
        email2Value == "" ||
        password2Value == "" ||
        confirmation2Value == ""
    ) {
        p2.innerHTML = "Veuillez remplir les champs vides";
        throw "error";
        form.reset();
    }
});
