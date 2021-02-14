

/* fonticion ouverture et fermeture du menu responsive**/
$(document).ready(function(){


  $(".btnMenu").click(function(){
 
    
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
});
 

 


