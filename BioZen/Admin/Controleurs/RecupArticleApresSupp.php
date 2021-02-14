<?php
include "../../config/config.php";
include "../Modele/Article_modele.php";
include "../Vues/Article_vue.php";
include "../../Modeles/ConnexionBdd.php";

class ArticleControleurApresSupp extends ArticleModele
{
    public $db;
    public $idArticle;

    public function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }
    public function getArticleApresSupp()
    {
        $articlVue = new Article();

        if ($getArticleModele = $this->getArticleModele()) {
            $this->db = null;
            $articlVue->getArticleVue($getArticleModele);
        }
    }
}
$articleApresSupp = new ArticleControleurApresSupp ();
$articleApresSupp->getArticleApresSupp();
