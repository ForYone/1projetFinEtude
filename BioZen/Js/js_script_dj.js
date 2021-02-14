$(document).ready(function() {
    function test() {
        alert('test');
        return false


    }
    /* ouverture et fermeture du menu responsive**/
    $(".btnMenu").click(function() {


        /**ouvre le menu */
        if ($(".menu").hasClass("ouvertureMenu") != true) {
            $(".menu").css("display", "block");

            $(".menu").addClass("ouvertureMenu");

            $(".menu").removeClass("fermetureMenu");

        }

        /**ferme le menu */
        else {
            $(".menu").removeClass("ouvertureMenu");

            $(".menu ").addClass("fermetureMenu");
        }

    });


    //menu profil deco
    $("#menuCo").click(function() {

        $('.sous-menu').slideToggle();
    });

    //connexion modal
    $(".connexion").click(function() {

        var coEep = "<div class='coformulaire'>" +
            " <p class='paraentreprise'>Vous êtes une entreprise</p>" +
            "<form action='index.php?page=connexion' method='post' name='Eep'>" +
            "<div class='champsforms'>" +
            " <select id='mailEep' name='mailEep' class='inputco mailco '>" +
            "</select>" +
            "<div id='test'></div>" +
            "<input type='password' name='mdpEep' class='inputco passwordco' placeholder='Entrez votre mdp'>" +
            "</div>" +
            "<button class='validerCo' type='submit'>Valider</button>" +

            "</form>" +
            "<a class='mdpO' href='index.php?page=modifMdp'>Mot de passe oublié</a>"
        "</div>";
        var coSalarie = " <div class='coformulaire'>" +
            "<p> Vous êtes un(e) salarié(e)</p> " +
            "<form action='index.php?page=connexion' method='post' name='salarie'>" +
            " <div class='champsforms'> " +
            " <input type='mail' name='mailSalarie' class='inputco mailtco' placeholder='Adresse mail' >" +
            "<input type='password' name='mdpSalarie' class='inputco passwordco' placeholder='Mot de passe'>" +
            "</div>" +
            "<button class='validerCo' type='submit'>Valider</button>" +


            " </form>" +
            "<a class='mdpO' href='index.php?page=modifMdp'>Mot de passe oublié</a>" +
            " <a class='pInscription' href='index.php?page=inscription'>Pas encore inscrit</a>" +
            "</div>";

        $("#coEntreprise").html(coEep);
        $("#coSalarie").html(coSalarie);
        $.ajax({
            url: './Modeles/HeaderModele.php',
            type: 'GET',
            dataType: 'JSON',
            success: function(response) {
                var len = response.length;
                for (var i = 0; i < len; i++) {

                    var email = response[i].email_eep;

                    var option =
                        "<option>" + email + "</option>";
                    console.log(email);
                    $("#mailEep").append(option);
                }

            }
        });
        if ($(".modalContact").css("display", "flex")) {
            $(".modalContact").css("display", "none")
        }

        $(".modalConnexion").toggle().css('display');
        $(".div-hide").slideDown(900);

    })

    //fermeture modal connexion
    $("#fermetureCo").click(function() {
        $(".modalConnexion").css('display', 'none')
        $(".div-hide").slideUp(900);
    });



    //modal Contact modalContact
    $(".contact").click(function() {
        var contact = "<div class='contact'>" +
            "<div class='titreContact'>" +
            "<H2 > Contact </H2>" +
            "<hr class='hrContact'>" +
            "</div>" +
            "<div class='infoContact'>" +
            "<h4>EEP BIO & ZEN</h4>" +
            "<div class='textC'>" +
            "<div class='iconPara'> <i class='fas fa-map-marker-alt'></i>   <p class='pContact'>Espace lurçat<p> </div>" +
            "<div class='iconPara'>  <p class='pContact'>2 rue Diderot<p> </div>" +
            "<div class='iconPara'>  <p class='pContact'>93200 Saint-Denis<p> </div>" +
            "</div>" +
            "<br>" +
            "<h4>Contact</h4>" +
            "<div class='textC'>" +
            "<div class='iconPara'> <i class='fas fa-phone-alt'></i> <p class='pContact'>Tel fixe : 01 55 84 03 60<p> </div>" +
            "<div class='iconPara'> <i class='fas fa-phone-alt'></i> <p class='pContact'>Fax : 01 55 84 03 69<p> </div>" +
            "<div class='iconPara'> <i class='fas fa-envelope'></i> <p class='pContact'>Gmte93.saintdenis@ac-creteil.fr</p> </div>" +
            "</div>" +
            "<br>" +
            "<h4>Accès</h4>" +
            "<div class='textC'>" +
            "<div class='iconPara'>  <p class='pContact'> Bus 153 arrêt Romain Rolland</p></div>" +
            "<div class='iconPara'> <p class='pContact'> Tramway 1 arrêt les Cosmonautes</p></div>" +
            "<div class='iconPara'> <p class='pContact'> Autoroute A1 sortie Saint Denis</p></div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "<span class='border'> </span>" +
            "<div class='contact localisation'>" +
            "<div class='titreContact loca'>" +
            "<div class='xtitre' >" +
            "<H2 > Plan du site </H2>" +
            "<span id='fermetureContact'><a href='#' id='fermetureContact' class='fermetureModal fm2'>X</a></span>" +
            "</div>" +
            "<hr class='hrlocalisation'>" +
            "</div>" +
            "<iframe class='map' src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2620.9024985963015!2d2.3782185153490527!3d48.9362988792952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66b13adeca797%3A0x3ae946b7b9280136!2sCentre%20Greta%20MTE%2093%20de%20Saint-Denis!5e0!3m2!1sfr!2sfr!4v1585923695404!5m2!1sfr!2sfr' width='350' height='350'  frameborder='0' style='border:0;' allowfullscreen='' aria-hidden='false' tabindex='0'></iframe>" +
            "</div>";
        $('.modalContact').html(contact);


        if ($(".modalConnexion").css('display', 'flex')) {
            $(".modalConnexion").css('display', 'none');
        }

        if ($(".modalContact").css('display', 'none')) {
            $(".div-hide").slideDown(900);
            $(".modalContact").css('display', 'flex');
        } else {
            $(".modalContact").css('display', 'flex');
            $(".div-hide").slideDown(900);

        }





        //fermeture modal contact
        $("#fermetureContact").click(function() {
            $(".modalContact").css('display', 'none');
            $(".div-hide").slideUp(900);
        });

    });









});