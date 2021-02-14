<?php

include('Vues/PromotionView.php');
include('Modeles/PromotionModele.php');

class PromotionControleur extends PromotionModele
{
    public $db;
  

    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }
    

    public function promotionUtilisateurC()
    {
        $promotionVue= new PromotionVue();
            
            $promos= $this->promotionUtilisateur();
           
            $promotionVue ->vueCataloguePromo($promos);
    
    }  
}


$promotionControleur=new PromotionControleur();
$promotionControleur->promotionUtilisateurC();
