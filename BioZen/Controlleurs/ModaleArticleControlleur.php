<?php
include "../Vues/page_entreprise.php";
include "../Modeles/Offre_model.php";
include "../Modeles/ConnexionBdd.php";
include "../config/config.php";


class ModaleArticleControlleur extends OffreModel
{

    protected $id;
    protected $db;

    public function __construct()
    {
        $this->db =  ConnexionBdd::bdd();
    }

    public function setModaleData()
    {
        $pageEntreprise = new PageEntreprise();
        if (isset($_POST['id_article'])) {
            $this->id = $_POST['id_article'];

            $allDatatOffre = $this->allDataOffre();
            $pageEntreprise->alimMOdaleEep($allDatatOffre);
            $this->db = null;
        }
    }
}
$setModaleData = new ModaleArticleControlleur();
$setModaleData->setModaleData();
