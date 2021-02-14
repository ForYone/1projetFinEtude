<?php

include "Admin/Modele/Article_modele.php";


class AjoutArticle extends ArticleModele
{
    public $db;
    public $nomArticle;
    public $prix;
    public $stock;
    public $description;
    public $categorie;
    public $refArticle;

    public function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }


    public function setArticleBdd()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                if (isset($_POST)) {
                    $this->nomArticle = $this->test($_POST['nom_article']);
                    $this->prix = $this->test($_POST['prix']);
                    $this->stock = $this->test($_POST['stock']);
                    $this->description = $this->test($_POST['description']);
                    $this->categorie = $this->test($_POST['categorie']);
                    $this->refArticle = $this->test($_POST['ref_article']);

                    $setArticle = $this->setArticle();
                    if ($setArticle->execute(array(
                        $this->nomArticle, $this->description, $this->prix, $this->stock, $this->categorie, $this->refArticle))) {
                        header("Refresh:0.1;url=index.php?page=gestion-articles");
                        $this->db = null;
                    } else {
                        header("Refresh:0.1;url=index.php?page=gestion-articles");
                        return false;
                    }
                }
            }
        } else {
            header("Refresh:0.2;url=index.php?page=accueil");
        }
    }

    private function test($dataTest)
    {
        $data = strip_tags($dataTest);
        $data1 = htmlspecialchars($data);
        $data2 = trim($data1);
        $data3 = stripslashes($data2);
        
        return $data3;
    }
}
$ajoutArticle = new AjoutArticle();
$ajoutArticle->setArticleBdd();
