


$(document).ready(function(){

    /* ouverture et fermeture du menu responsive**/
    $(".btnMenu").click(function()
    {
   
      
          /**ouvre le menu */
      if($(".menu").hasClass("ouvertureMenu")!=true)
          {
            $(".menu").css("display", "block"  );
  
            $(".menu").addClass("ouvertureMenu");
            
            $(".menu").removeClass("fermetureMenu");
          
          }
  
          /**ferme le menu */
          else
          {
            $(".menu").removeClass("ouvertureMenu");
  
            $(".menu").addClass("fermetureMenu");
          }
  
    });  
  
    //menu profil deco
    $("#menuCo").click(function()
    {
      
      $('.sous-menu').slideToggle();     
    });  
        
    //connexion modal
    $("#connexion").click(function()
      {
        var coEep="<div class='coformulaire'>"
  
        +" <p class='paraentreprise'>vous êtes une entreprise</p>"
         
         +"<form action='index.php?page=connexion'  method='post' name='Eep'>"
         +"<div class='champsforms'>"
            +" <select id='mailEep' name='mailEep' class='inputco mailco'>"
                 
                 +"</select>"
                 +"<div id='test'></div>"
             +"<input type='password' placeholder='entrez votre mdp' name='mdpEep' class='inputco passwordco'>"
         +"</div>"
        +" <br>"
        +" <a href='index.php?page=modifMdp'> mot de passe oublié </a>"
     
         +"<br>"
         +"<button class='validerCo' type='submit'>valider</button>"
     +"</form>"
     +"</div>";
  
        var coSalarie=" <div class='coformulaire'>"
        + "<p> vous êtes un salarié</p> "
  
            +"<form action='index.php?page=connexion' method='post' name='salarie'>"
               +" <div class='champsforms'> "
                       +" <input type='mail' placeholder='entrez votre adresse mail' name='mailSalarie' class='inputco mailtco'>"
                        
                        +"<input type='password' placeholder='entrez votre mdp' name='mdpSalarie' class='inputco passwordco'>"
                +"</div>"
                    +"<br>"
                    +"<a href='index.php?page=modifMdp'>mot de passe oublié</a>"
                +"<br> <br>"
                   +" <a class='pInscription' href='index.php?page=inscription'>pas encore inscrit</a>"
   
    
                +"<button class='validerCo' type='submit'>valider</button>"
  
           +" </form>"
        +"</div>";
        
    $("#coEntreprise").html(coEep);
    
    $.ajax({
     
      url:'./Modeles/HeaderModele.php',
      type: 'GET',
      dataType:'JSON',
      success: function(response){
          var len = response.length;
          for(var i=0; i<len; i++)
          {
              var email = response[i].email_eep;
              var option = 
              "<option>" + email + "</option>";
              console.log(email);
              $("#mailEep").append(option);
          }
      },
  
      error: function(response)
      {
        console.log('rater mais presque')
      }
    });
    
  
    $("#coSalarie").html(coSalarie);
  
    
        if($(".modalContact").css("display","flex"))
        {
          $(".modalContact").css("display","none")
        }
         
        $(".modalConnexion").toggle().css('display');
  
      })
  
      //fermeture modal connexion
    $("#fermetureCo").click(function()
    {
      $(".modalConnexion").css('display','none');
    });
   
    
    
  
    //modal Contact modalContact
    $("#contact").click(function()
    {
      var contact="<div class='contact'>"
      +"<div class='titreContact'>"
      +"<H2 > Contact </H2>"
      +"<hr class='hrContact'>"
      +"</div>"
  
      +"<div class='infoContact'>"
      +"<ul>"
      +"<div class='iconPara'> <i class='fas fa-phone-alt'></i> <p class='pContact'>telephone fixe<p> </div>"
      +"<div class='iconPara'> <i class='fas fa-envelope'></i> <p class='pContact'>email</p> </div>"
      +"<div class='iconPara'> <i class='fas fa-map-marker-alt'></i> <p class='pContact'> adresse contact</p></div>"
      +"<div class='iconPara'> <i class='fas fa-bus-alt'></i> <p class='pContact'> acces transport en commun/route</p></div>"
      +"</div>"
      +"</div>"
      +"<span class='border'> </span>"
      +"<div class='contact localisation'>"
      +"<div class='titreContact loca'>"
      +   "<div class='xtitre' >"
      +       "<H2 > plan du site </H2>"
      +       "<a href='#' id='fermetureContact' class='fermetureModal fm2'>X</a>"
      +   "</div>"
      +   "<hr class='hrlocalisation'>"
      +"</div>"
  
      +"<iframe class='map' src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2620.9024985963015!2d2.3782185153490527!3d48.9362988792952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66b13adeca797%3A0x3ae946b7b9280136!2sCentre%20Greta%20MTE%2093%20de%20Saint-Denis!5e0!3m2!1sfr!2sfr!4v1585923695404!5m2!1sfr!2sfr' width='350' height='200'  frameborder='0' style='border:0;' allowfullscreen='' aria-hidden='false' tabindex='0'></iframe>"
      +"</div>";
   $('.modalContact').html(contact);
  
  
      if($(".modalConnexion").css('display','flex'))
      {
        $(".modalConnexion").css('display','none');
      }
     
      if($(".modalContact").css('display','none'))
      {
        
        $(".modalContact").css('display','flex');
      }
      else
      {
        $(".modalContact").css('display','flex');
        
      }
  
  
  
  
  
    //fermeture modal contact
   $("#fermetureContact").click(function()
    {
      $(".modalContact").css('display','none');
    });
  
    });
  
   
  /**<--Promotion---> */
    $(".voirPromo").click(function()
    {
        

      if($(".modaleContact").css("display","flex"))
      {
        $(".modalContact").css("display","none")
      }
      if($(".modaleConnexion").css("display","flex"))
      {
        $(".modalConnexion").css("display","none")
      }
      

      

      var articlePromo=$(this).attr("id");
      

      $.ajax({
        url: 'Controleurs/ModalPromo.php',
        type: 'post',
        data:{articlePromo:articlePromo},
        success:function(data){
            
            $(".contenueModal").html(data);
            $(".modalePromo").css('display','block');
            $('.promotion').addClass('promotionClick'); 

            /** <----selection du nombre d'article----->*/

    /**boutton + */
             $("#articlePlus").click(function(){
          var article=$("#qteArticle").attr('value');
         
          article++;
          
          $("#qteArticle").attr('value',article);
          
        });
  /**boutton - */

  $("#articleMoins").click(function()
  {
    var article=$("#qteArticle").attr('value');
    article--;
    $("#qteArticle").attr('value',article);

  });

        }

    });


  

})
    //fermeture modal Promo
    $("#fermeturePromo").click(function()
    {
      $(".modalePromo").css('display','none')
      $('.promotion').removeClass('promotionClick');
    });
   
  
    
   
    
  });