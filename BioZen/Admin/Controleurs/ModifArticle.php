<?php
include "../../config/config.php";
include "../../Modeles/ConnexionBdd.php";
include "../Modele/Article_modele.php";
include "../Vues/Article_vue.php";


class ModifArticle extends ArticleModele
{
    public $db;
    public $id;
  

    public function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }

    public function getArticle()
    {
        $formModifArticle = new Article();
        if (isset($_POST['id_article_modif'])) {
            $this->id = $_POST['id_article_modif'];
            $getArticleForm = $this->getArticleForm($this->id);
            $cat = $this->getCat();
            $formModifArticle->formModifArticle($getArticleForm, $cat);
            $this->db=null;
        }
    }

  
}
$getArticleForm = new ModifArticle();
$getArticleForm->getArticle();

