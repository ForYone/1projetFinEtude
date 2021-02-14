/**Recuperation des articles pour le tableau admin une fois un article suprimer */
function getArticle() {
    $.ajax({
        url: 'Admin/Controleurs/RecupArticleApresSupp.php',
        method: 'POST',
        data: 'get-article',
        success: function(resp) {
            $(".js_empty").append(resp)

        }
    });
}

/**Expression reguliere */

function expressionsReguliereMail(testMail) {
    var regMail = /^[a-zA-Z0-9._-éàè]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,4}$/;

    return regMail.test(testMail);
}

function expressionsReguliereMotDePasse(testMdp) {
    var regMdp = /^[a-zA-Z0-9._-éàè]+$/;

    return regMdp.test(testMdp);
}
/**Message d'erreur******/

function messageErruer(contentMessage, input) {

    $(contentMessage).empty();
    $(contentMessage).append("*Veuillez remplir ce champs correctement").css("color", "red");
    $(input).css("border-color", "red");

}


/********* */
//match email address
function testRegexMail(testMail) {
    var emailRegex = /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/;
    return emailRegex.test(testMail);
}
//match username
function testRegexUsername(testnom) {
    var usernameRegex = /^[a-zA-Z0-9- _']{0,32}$/;
    return usernameRegex.test(testnom);
}
//match password
function testRegexPassword(testPassword) {
    var passwordRegex = /^[a-zA-Z0-9- _']{7,18}$/;
    return passwordRegex.test(testPassword)
}
//Match 8 to 15 character string with at least one upper case letter, one lower case letter, and one digit (useful for passwords).
//match elements that could contain a phone number
function testNumberRegex(nombre) {
    var NumberRegex = /[0-9 -()+]+$/;
    return NumberRegex.test(nombre)
}