<?php

include "Admin/Modele/Article_modele.php";
include "Admin/Vues/CoffretVue.php";


class CoffretControleur extends ArticleModele
{

    public $db;
    public $articlePourCoffret;
    public $id_coffret;
    public $nom_coffert;
    



    public function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }

    public function getACoffret()
    {
        $setCoffret = new CoffretVue();
        $getArticleCoffre = $this->getArticleCoffre();
        $listeArticle = $this->getListArticle();
        $setCoffret->getNameCoffret($getArticleCoffre, $listeArticle);
    }

    public function setArticleCoffre()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                if ($_POST) {
                    $this->articlePourCoffret = $_POST['articlePourCoffret'];
                    $this->id_coffret = $_POST['id_coffret'];
                    $this->nom_coffert = $_POST['nom_coffret'];

                    $setCoffre = $this->setCoffret();
                    $verrifArtileCoffret = $this->verufArticleCoffret();
                    if ($verrifArtileCoffret[0] == 0) {
                        if ($setCoffre->execute(array($this->articlePourCoffret, $this->id_coffret, $this->nom_coffert))) {
                            header("Refresh:0.2;url=index.php?page=gestion-coffres");
                        } else {
                            header("Refresh:0.2;url=index.php?page=gestion-coffres");
                            return false;
                        }
                    } else {
                        echo"<h2 style='color:red'<>Cette article existe déjà dans votre coffret</h2>";
                        header("Refresh:1.5;url=index.php?page=gestion-coffres");
                        
                        return false;
                    }
                }
            }
        } else {
            header("Refresh:0.2;url=index.php?page=accueil");
        }
    }
}

$coffretControleur = new CoffretControleur();
$coffretControleur->setArticleCoffre();
