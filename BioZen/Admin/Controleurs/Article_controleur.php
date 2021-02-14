<?php

include "Admin/Modele/Article_modele.php";
include "Admin/Vues/Article_vue.php";

class ArticleControleur extends ArticleModele
{
    public $db;
    

    public function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }
    public function controleurArticle()
    {
        $articlVue = new Article();

        if ($getArticleModele = $this->getArticleModele()) {
            $this->db = null;
            $articlVue->getArticleVue($getArticleModele);
            
            
        }

    }

   
}


