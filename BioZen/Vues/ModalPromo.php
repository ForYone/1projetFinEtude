<?php


include('Modeles/PromotionModele.php');

class PromotionModal extends PromotionModele
{
    public $db;
    
  

    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }

    public function promotionUtilisateurC($id)
    { 
        
        
        if(isset($id))
        {
         
           
           
        $promos=$this->promotionCoffretUtilisateur($id);
        $promosArticles=$this->promotionArticleUtilisateur($id);
     
         
        
           echo" 
           
            <div class='photo_descript'>
                <div class='imgForm'>
                    <img class='imgPromo' src='Photo/".$promos['photo_article']."'> 
                    <form action='index.php?page=promoA&id='".$promos['id_article']."' method='post' name='panierPromo' >
                            <div class='nbrArticle'>
                            <p class='buttonArtc' id='articleMoins'>-</p>
                        <span class='qteArticle'> <input type='text' class='inputartc'  value='1'  name='qteArticle'></span>
                            <p class='buttonArtc' id='articlePlus'>+</p>
                            </div>
                            
                            <button type='submit' class='voirPromo'>ajouter au panier</button> 
                            </form>
                </div>
                <div class='TP_descript'>
                    <div class='npPromo'> 
                                            <H4 class='Propmo'>"  .$promos['nom_article']. "</H3>
                                            <p class='pPromo'> " .$promos['prix']. " €</p>
                                        
                                            
                    </div> 
            
                                <div class='descriptArticle'>

                                    <p class='pPromo'> description du produit:<p>
                                    <p class='pPromo'> ". $promos['description_article'] . "</p>
                                    <p class='pPromo'>ref article: ".$promos['ref_article']."</p>
                                    <H4>article présent dans ce coffret: </H4>";
                


                                   

            foreach ( $promosArticles as $article)
            {
                                    echo"
                                    
                                    <p class='pPromo'>".$article['nom_article']."</p>";
            }    
        
                                 echo 
                                 "</div></div></div>";
        }
        
        
        
    
    }



}

$id=$_POST['articlePromo'];

$promotionControleur=new PromotionModal();
$promotionControleur->promotionUtilisateurC($id);
