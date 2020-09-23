// FAIRE DISPARAÎTRE MODAL NEWSLETTER

var modalNL = document.getElementById("modalNL");
console.log(modalNL);


function modalDisplay() {
    modalNL.style.display = "block";
}

btnNo.addEventListener("click", function () {
    modalNL.style.display = "none";
})


// VALIDATION MODAL NEWSLETTER 

var FormNL = document.getElementById("FormNL");
var emailNL = document.getElementById("emailNL");
var txtConfNewsletter = document.getElementById("txtConfNewsletter");

FormNL.addEventListener("submit", function (e) {

    e.preventDefault();

    var emailValue = emailNL.value;

    if (emailValue == "") {
        txtConfNewsletter.innerHTML = "Merci de renseigner votre email";

    } else {
        txtConfNewsletter.innerHTML = "Merci ! Votre inscription est bien prise en compte";
    }

    FormNL.reset();

});
