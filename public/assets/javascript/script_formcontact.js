/*CE CODE PERMET VALIDER LES DONNÉES SAISIES DANS LE FORMULAIRE DE CONTACT DE LA PAGE CONTACT POUR OBTENIR DE L'ASSISTANCE*/
/*CONTACT*/

var formCtc = document.getElementById("formCtc");
console.log("formCtc")

var nomCtc = document.getElementById("nomCtc");
console.log("nomCtc")

var emailCtc = document.getElementById("emailCtc");
console.log("emailCtc")

var comCtc = document.getElementById("comCtc");
console.log("comCtc")

var erreurCtc = document.getElementById("erreurCtc");
console.log("erreurCtc")


/*** phase validation formulaire ***/

/*formCtc.addEventListener("submit", function (e) {
    console.log("submit")
    e.preventDefault();

    var nomValue = nomCtc.value;
    var emailValue = emailCtc.value;
    var comValue = comCtc.value;

    if (nomValue == "" || emailValue == "" || comValue == "") {
        erreurCtc.innerHTML = "Veuillez remplir les champs vides";

        formCtc.reset();
    }

})*/
