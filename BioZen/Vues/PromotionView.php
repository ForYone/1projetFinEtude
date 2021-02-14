<?php

class PromotionVue
{
    
    public function vueCataloguePromo($promos)
    {
       echo
        "
        <div class='toutPromo'>
        <h3 class='titrePromotion'>Catalogue Promotion</h3>

        <div class='promotion'>";

            foreach ($promos as $promo)
            {


                echo
                 " <div class='unePromo'>  
                        <img class='imgPromos' src='Photo/".$promo['photo_article']."'> 
                        <a class='nav-link voirPromo' id='".$promo['id_article']."' style='text-decoration:none'>
                        
                            <div class='npPromo'>
                                <p class='pPromo'>". $promo['nom_article'] . "</p>
                                
                                
                            </div> 
                            <div class='prix_voir'>   
                                <button class='voirLaPromo'> Voir plus</button>
                            </div>    
                        </a>

                        

                    </div> ";
            }

            
echo
"
        </div>
        </div>
    
    
                <div class='modalePromo'> 
                  
                        <div class='fermTitreM'>
                            <a href='#' id='fermeturePromo'> x</a>
                            <H3 class='titreModP'>Promotion</H3>
                        </div> 
                        <div class='contenueModal'>

                            
                                     
       
                        </div>
                        
                </div>            
        ";
    }
}
