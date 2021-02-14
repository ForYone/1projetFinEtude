<?php
include("../config/config.php");
include('../Modeles/ConnexionBdd.php');

include('../Modeles/PromotionModele.php');

class PromotionModal extends PromotionModele
{
    public $db;
    public $id;


    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }

    public function promotionUtilisateurC()
    {
        if (isset($_POST['articlePromo'])) {

            $this->id = $_POST['articlePromo'];

            $promos = $this->promotionCoffretUtilisateur($this->id);
            $promosArticles = $this->promotionArticleUtilisateur($this->id);



            echo " 
           <form action='index.php?page=promoA&id=" . $promos['id_article'] . "' method='post' name='panierPromo' >
            <div class='photo_descript'>
                <div class='imgForm'>
                    <img class='imgPromo' src='" . $promos['photo_article'] . "'>
                     <p class='prixPromo'>Prix H.T : " . $promos['prix'] . " €</p>
                    
                      
                    <div class='nbrArticle'>
                            
                        <span class='qteArticle'><label for='qteArticle'>Qté :</label>  <input type='number' class='inputartc' id='qteArticle'  value='1'  name='qteArticle'></span>
                        <span class='stock'> <input type='hidden' class='inputartc'  value='" . $promos['stock'] . "' name='stock'></span>
                           
                            </div>
                            
                            
                          
                </div>
                <div class='TP_descript'>
                    <div class='npPromo'> 
                                            <H4 class='Propmo'>Article : "  . $promos['nom_article'] . "</H4>
                                            
                                        
                                            
                    </div> 
            
                                <div class='descriptArticle'>

                                    <p class='pPromo'> Description du produit :<p>
                                    <p class='pPromo'> " . $promos['description_article'] . "</p>
                                    <p class='pPromo prixPromo'>Ref article : " . $promos['ref_article'] . "</p>

                                    <H4>Article présent dans ce coffret : </H4>";





            foreach ($promosArticles as $article) {
                echo "
                                    
               <p class='pPromo'>" . $article['nom_article'] . "</p>";
            }

            echo
                "  </div>  <button type='submit' class='validPromo'>Ajouter au panier</button> </div></div></form>";
        }
    }
}



$promotionControleur = new PromotionModal();
$promotionControleur->promotionUtilisateurC();
