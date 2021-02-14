<?php
include "../../config/config.php";
include "../Modele/Article_modele.php";
include "../Vues/Article_vue.php";
include "../../Modeles/ConnexionBdd.php";


class SuppArticleAdmin extends ArticleModele
{
    protected $idArticle;
    



    public function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }
    public function suppArticle()
    {

        if (isset($_POST['id_article_supp'])) {

            $this->idArticle = $_POST['id_article_supp'];

            $this->deleteArticle();
            $this->db = null;

        }

        
    }
}
$suppArticle = new SuppArticleAdmin();
$suppArticle->suppArticle();
