$(document).ready(function() {







    //select integers only


    //securite SALARIE et eep
    var
    //var eep
        site = $('#site'),
        dce = $('#dceep'),
        tel = $('#tel'),
        fax = $('#fax'),
        region = $('#region'),
        activite = $('#activite'),
        //var salari
        nomEep = $('#nomEep'),
        nom = $('#nom'),
        prenom = $('#prenom'),
        poste = $('#poste'),
        dfc = $('#dfc'),
        cp = $('#cp'),
        adresse = $('#adresse'),
        ville = $('#ville'),
        email = $('#mail'),
        mdp = $('#mdp'),
        cMdp = $('#cMdp'),
        cEmail = $('#cMail'),
        cpltAdresse = $('#cplt_adresse'),
        form = $("form").attr('name') == 'Inscritption';







    function addError() {
        //affichage erreur coter salarie


        $(".erreurForms").css("border-color", "red")
        $('.erreurForms').css("color", "red");
        $(".erreurForms").css("display", "none");

        $(cEmail).parent().before('');
        $(".erreurForms").css("border-color", "red")
        $(".erreurForms").css("display", "none");

        $(email).parent().before('');
        $(".erreurForms").css("border-color", "red")
        $(".erreurForms").css("display", "none");

        $(cp).parent().before('<p id="cpError" class="erreurForms"> champ incorrect</p>');
        $(".erreurForms").css("border-color", "red")
        $(".erreurForms").css("display", "none");

        $(nomEep).parent().before('<p id="nomEepError" class="erreurForms"> champ incorrect</p>');
        $(".erreurForms").css("border-color", "red")
        $(".erreurForms").css("display", "none");

        $(nom).parent().before('<p id="nomError" class="erreurForms"> champ incorrect</p>');
        $(".erreurForms").css("border-color", "red")
        $(".erreurForms").css("display", "none");

        $(prenom).parent().before('<p id="prenomError" class="erreurForms"> champ incorrect</p>');
        $(".erreurForms").css("border-color", "red")
        $(".erreurForms").css("display", "none");

        $(poste).parent().before('<p id="posteError" class="erreurForms"> champ incorrect</p>');
        $(".erreurForms").css("border-color", "red")
        $(".erreurForms").css("display", "none");

        $(ville).parent().before('<p id="villeError" class="erreurForms"> champ incorrect</p>');
        $(".erreurForms").css("border-color", "red")
        $(".erreurForms").css("display", "none");

        $(mdp).parent().before('<p id="mdpError" class="erreurForms"> 7 caractères minimum</p>');
        $(".erreurForms").css("border-color", "red")
        $(".erreurForms").css("display", "none");

        $(cMdp).parent().before('<p id="cMdpError" class="erreurForms"> mdp non identitque</p>');
        $(".erreurForms").css("border-color", "red")
        $(".erreurForms").css("display", "none");

        //affichage erreur supp coter eep
        $(tel).parent().before('<p id="telError" class="erreurForms"> numéro incorrect</p>');
        $(".erreurForms").css("border-color", "red")
        $(".erreurForms").css("display", "none");

        $(fax).parent().before('<p id="faxError" class="erreurForms"> numéro incorrect</p>');
        $(".erreurForms").css("border-color", "red")
        $(".erreurForms").css("display", "none");

        $(activite).parent().before('<p id="activiteError" class="erreurForms"> champ incorrect</p>');
        $(".erreurForms").css("border-color", "red")
        $(".erreurForms").css("display", "none");

        $(region).parent().before('<p id="regionError" class="erreurForms">champ incorrect</p>');
        $(".erreurForms").css("border-color", "red")
        $(".erreurForms").css("display", "none");

        $(cpltAdresse).parent().before('<p id="cpltAdresseError" class="erreurForms"> champ incorrect</p>');
        $(".erreurForms").css("border-color", "red")
        $(".erreurForms").css("display", "none");

    }









    function securForms() {
        return false;
    }
    /*   if($(nomEep).val().match(usernameRegex))
     {
         $(nomEep).css({ // on rend le champ rouge
             borderColor : 'black',
         
         });   
         $("#nomEepError").css("display","none")
         
      $form.submit();
      return true


        
     }
     else
     {
         
         $(nomEep).css({ // on rend le champ rouge
             borderColor : 'red', 
         });
         $("#nomEepError").css("display","block")
         
         
         
         $(form).off('submit')
         return false;
       
         
     }   **/
    addError();










});