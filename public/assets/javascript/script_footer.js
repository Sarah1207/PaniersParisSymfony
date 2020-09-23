/*CE CODE PERMET D'AFFICHER UN TEXTE DANS LE HTML POUR CONFIRMER L'INSCRIPTION A LA NEWSLETTER*/
/*FOOTER*/

var formRecevoirNewsletter = document.getElementById ("formRecevoirNewsletter");
var emailNewsletter = document.getElementById("emailNewsletter");
var txtConfNewsletter = document.getElementById("txtConfNewsletter");

formRecevoirNewsletter.addEventListener ("submit",function(e){
    
    e.preventDefault();
    
    var emailValue = emailNewsletter.value;

    if (emailValue == "") {
    txtConfNewsletter.innerHTML = "Merci de renseigner votre email";
    
    } else {
    txtConfNewsletter.innerHTML = "Merci ! Votre inscription est bien prise en compte";
    }

    formRecevoirNewsletter.reset();
  
});

