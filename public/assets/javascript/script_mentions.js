/*ACCORDEON*/
/*MENTIONS LEGALES*/


/*bloc 1*/

var titre1 = document.getElementById("titre1");
var contenu1 = document.getElementById("contenu1");

titre1.addEventListener("click", function () {
    if (contenu1.style.display == "none") {
        contenu1.style.display = "block"
    } else {
        contenu1.style.display = "none"
    }
});



/*bloc 2*/

var titre2 = document.getElementById("titre2");
var contenu2 = document.getElementById("contenu2");

titre2.addEventListener("click", function () {
    if (contenu2.style.display == "none") {
        contenu2.style.display = "block"
    } else {
        contenu2.style.display = "none"
    }
});



/*bloc 3*/

var titre3 = document.getElementById("titre3");
var contenu3 = document.getElementById("contenu3");

titre3.addEventListener("click", function () {
    if (contenu3.style.display == "none") {
        contenu3.style.display = "block"
    } else {
        contenu3.style.display = "none"
    }
});
