<?php
include "../../config/config.php";
include "../../Modeles/ConnexionBdd.php";
include "../Modele/Article_modele.php";
include "../Vues/CoffretVue.php";

class ListeArticleCoffret extends ArticleModele
{
    public $db;
    public $id_coffret;
    public $id_suppArticleCofffet;

    public function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }

    public function getListeCoffretControleur()
    {
        $coffreVue = new CoffretVue();
        if (isset($_POST['id_coffret'])) {
            $this->id_coffret = $_POST['id_coffret'];

            $getListe = $this->getListeArticleCoffret($this->id_coffret);
            $coffreVue->listeArticleCoffret($getListe);
        }
    }
    public function delete()
    {
        if(isset($_POST['id_article_supp_coffret'])){
            $this->id_suppArticleCofffet = $_POST['id_article_supp_coffret'];
            $this->deleteArticleCoffret($this->id_suppArticleCofffet);
        }
    }
}
$listeArticleCoffret = new ListeArticleCoffret();
$listeArticleCoffret->getListeCoffretControleur();
$listeArticleCoffret->delete();