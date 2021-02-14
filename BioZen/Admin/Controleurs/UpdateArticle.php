<?php
include "../../config/config.php";
include "../../Modeles/ConnexionBdd.php";
include "../Modele/Article_modele.php";



class UpdateArticle extends ArticleModele
{
    public $db;
    public $id;
    public $nameArticle;
    public $prix;
    public $ref_article;
    public $stock;
    public $photo_article;
    public $desc_article;
    public $cat;



    public function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }
    public function updateArticleFunct()
    {
        
    var_dump($_POST);
        if ($_POST) {
            
            $this->nameArticle = $_POST['nom_article'];
            $this->prix = $_POST['prix'];
            $this->ref_article = $_POST['ref_article'];
            $this->stock = $_POST['stock'];
            $this->desc_article = $_POST['description'];
            $this->cat = $_POST['categorie'];
            $this->id = $_POST['id_article'];

            $update = $this->uptdateArticle();

            if ($update->execute(array($this->nameArticle, $this->prix, $this->ref_article, $this->stock, $this->desc_article, $this->cat,$this->id))) {
                $this->db = null;
                return true;
            } else {
                return false;
            }
        }
    }
}

$updat = new UpdateArticle();
$updat->updateArticleFunct();
