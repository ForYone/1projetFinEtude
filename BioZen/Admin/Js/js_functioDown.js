/*****************Supprime un article********** */
function suppArticleAdmin(id_article_supp) {

    $.ajax({
        url: 'Admin/Controleurs/ArticleControleurSuprime.php',
        method: 'POST',
        data: {
            id_article_supp: id_article_supp
        },
        beforeSend: function() {
            if (confirm('Cet article sera supprimé une fois validé')) {

                return true;
            } else {
                return false;
            }
        },
        success: function() {
            $(".js_article_refresh").slideUp(1000);
            $(".js_empty").empty();
            getArticle();

            $(".js_article_refresh").slideDown(1000);

        }

    });
}

/* ********************************************************************* */



/*************************Pré rempli les champs pour la modification************************************* */
function getArticleForm(id_article_modif) {
    $.ajax({
        url: 'Admin/Controleurs/ModifArticle.php',
        method: 'POST',
        data: 'id_article_modif=' + id_article_modif,

        success: function(data) {
            $(".js_modale_form").empty();
            $(".js_modale_form").append(data);

        }

    });
}
/********************************************************************************************* */

/***Envoie Modification*********************** */

function modifArticle(id_modif) {

    var nom_article = $("#name").val();
    var prix = $("#prix").val();
    var ref_article = $("#ref").val();
    var stock = $("#stock").val();
    var desc_article = $("#desc").val();
    var categorie = $("#cat").val();

    $.ajax({
        url: 'Admin/Controleurs/UpdateArticle.php',
        type: 'POST',
        data: {
            nom_article: nom_article,
            prix: prix,
            ref_article: ref_article,
            stock: stock,
            description: desc_article,
            categorie: categorie,
            id_article: id_modif
        },
        success: function() {

            alert("Votre modification a bien été prise en compte");

            $(".js_article_refresh").slideUp(1000);
            $(".js_empty").empty();
            getArticle();

            $(".js_article_refresh").slideDown(1000);

        }
    })

}


/*************Recherche *********** */

function recherche(inpute, param1) {

    $(inpute).on("keyup", function() {

        var value = $(this).val().toLowerCase();

        $(param1).filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

}
recherche(".recherche", ".tableau tbody tr");
recherche(".rechrcheNomArticle", ".divPhoto .recherchePhoto");

/* Liste des articles qui se trouve dans un coffret */
$("#btn-voirLIste").on("click", function() {
    var id_coffret = $("#selecteCoffret").val();

    $.ajax({
        url: 'Admin/Controleurs/ListeArticleCoffret.php',
        type: 'POST',
        data: 'id_coffret=' + id_coffret,
        success: function(data) {
            $(".js-div-liste").empty()
            $(".js-div-liste").slideDown(100);
            $(".js-div-liste").append(data);

        }
    })
})

$("#selecteCoffret").on('focus', function() {
    $(".js-div-liste").hide(100);
})

/**Suprimer l'article du coffret */
function suppArticleCoffret(id_supp, id_coffret) {

    $.ajax({
        url: 'Admin/Controleurs/ListeArticleCoffret.php',
        method: 'POST',
        data: 'id_article_supp_coffret=' + id_supp,
        beforeSend: function() {
            if (confirm('Cet article sera supprimé une fois validé')) {
                return true;
            } else {
                return false;
            }
        },
        success: function() {
            $.ajax({
                url: 'Admin/Controleurs/ListeArticleCoffret.php',
                type: 'POST',
                data: 'id_coffret=' + id_coffret,
                success: function(data) {
                    $(".js-div-liste").empty()
                    $(".js-div-liste").append(data);
                }
            })

        }

    });

}

/**Function Djaouad securiter fomrmulaire inscription */
function securinscriptionSal() {
    var
        site = $('#site'),
        dce = $('#dceep'),
        tel = $('#tel'),
        fax = $('#fax'),
        region = $('#region'),
        activite = $('#activite'),
        nomEep = $('#nomEep').val(),
        nom = $('#nom').val(),
        prenom = $('#prenom').val(),
        poste = $('#poste').val(),
        dfc = $('#dfc').val(),
        cp = $('#cp').val(),
        adresse = $('#adresse').val(),
        ville = $('#ville').val(),
        email = $('#mail').val(),
        mdp = $('#mdp').val(),
        cMdp = $('#cMdp').val(),
        cEmail = $('#cMail').val(),
        cpltAdresse = $('#cplt_adresse').val();

    if (testRegexUsername(nomEep)) {
        $("#nomEepError").css("display", "none");
        if (testRegexMail(email)) {
            $("#emailError").css("display", "none");
            if (testRegexUsername(nom)) {
                $("#nomError").css("display", "none");
                if (testRegexUsername(prenom)) {
                    $("#prenomError").css("display", "none");
                    if (testRegexUsername(poste)) {
                        $("#posteError").css("display", "none");
                        if (testRegexUsername(adresse)) {
                            $("#adresseError").css("display", "none");
                            if (testRegexUsername(ville)) {
                                $("#villeError").css("display", "none");
                                if (testNumberRegex(cp)) {
                                    $("#cpError").css("display", "none");
                                    if (testRegexPassword(mdp)) {
                                        ('#mdpError').css("display", "none")
                                        if (cMdp == mdp) {
                                            $("#cMdpError").css("display", "none");
                                            if (cEmail == email) {
                                                $("#cEmailError").css("display", "none");
                                                if (testNumberRegex(tel)) {
                                                    $("#telError").css("display", "none");
                                                    if (testNumberRegex(fax)) {
                                                        $("#faxError").css("display", "none");
                                                        if (testRegexUsername(region)) {
                                                            $("#regionError").css("display", "none");
                                                            if (testRegexUsername(activite)) {
                                                                $("#activiteError").css("display", "none");
                                                                return true;
                                                            } else {
                                                                $("#activiteError").css("display", "none");
                                                                return false;
                                                            }
                                                        } else {
                                                            $("#regionError").css("display", "none");
                                                            return false;
                                                        }
                                                    } else {
                                                        $("#faxError").css("display", "block");
                                                        return false;
                                                    }
                                                } else {
                                                    $("#telError").css("display", "block");
                                                    return false;
                                                }
                                            } else {
                                                $("#cEmailError").css("display", "block");
                                                return false
                                            }
                                        } else {
                                            $("#cMdpError").css("display", "block");
                                            return false;
                                        }
                                    } else {
                                        ('#mdpError').css("display", "block")
                                        return false;
                                    }
                                } else {
                                    $("#cpError").css("display", "block");
                                    return false;
                                }
                            } else {
                                $("#villeError").css("display", "block");
                                return false;
                            }
                        } else {
                            $("#adresseError").css("display", "block");
                            return false
                        }
                    } else {
                        $("#posteError").css("display", "block");
                        return false;
                    }
                } else {
                    $("#prenomError").css("display", "block");
                    return false;
                }
            } else {
                $("#nomError").css("display", "block");
                return false;
            }
        } else {
            $("#emailError").css("display", "block");
            return false;
        }
    } else {
        $("#nomEepError").css("display", "block");
        return false
    }
}