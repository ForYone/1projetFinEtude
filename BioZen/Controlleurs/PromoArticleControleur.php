<?php


include('Vues/PromotionView.php');
include('Modeles/PromotionModele.php');
include('Securiter.php');

class PromotionArticleControleur extends PromotionModele
{
    public $db;
    public $qte;
    public $stock;

    public function __construct()
    {

        $this->db =ConnexionBdd::bdd() ;
    }

   
    public function AjoutPanier()
    {
        $secu= new Security();
        $promotionVue= new PromotionVue();
        @$utilisateur=$_SESSION['id'];
        @$roleUtil=$_SESSION['id_role'];
        $article=$_GET['id'];
        $this->qte=$_POST['qteArticle'];
        $stock=$_POST['stock'];
        if(isset($_POST['qteArticle']))
        { 
echo $stock;
            
            if($this->qte>$stock)
            {
                echo'stock insuffisant veuillez reduire le nombre de produit';
            }
            else if($stock==0)
            {
                echo'produit indisponible';
            }
            
            else
            {
                if($secu->verifQte($this->qte))
                {
                    
                    
                    $stock=$stock - $this->qte;
                    $panier=$this->promotionPanier($utilisateur,$article,$roleUtil,$this->qte,$stock);
                    echo'ajout au panier';
                }
            }
            
            
            
           
            
            
            
        }
    
    }
    
}


$promotionControleur=new PromotionArticleControleur();
$promotionControleur->AjoutPanier();
