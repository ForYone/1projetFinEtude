<?php
include "Vues/PanierVue.php";
include "Modeles/Offre_model.php";

class PanierControlleur extends OffreModel
{
    public $db;
    public $id;
    public $idD;
    public $idC;
    public $idSession;
    public function __construct()
    {
        $this->db =  ConnexionBdd::bdd();
    }

    public function panierControlleurFunc()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 2) {
                $this->idSession = $_SESSION['id'];
                $panierVue = new PanierVue();
                $prixTotale = $this->prixTotal($this->idSession);
                $getPanierEep = $this->getPanierEep($this->idSession);

                if ($getPanierEep) {
                    $panierVue->vuePanier($getPanierEep, $prixTotale);
                    
                    $this->db = null;
                } else {

                    $panierVue->monPanierVide();
                   
                }
                $this->supArticlePanierEep();
            } elseif ($_SESSION['id_role'] == 1) {

                $this->idSession = $_SESSION['id'];
                $panierVue = new PanierVue();
                $prixTotalS = $this->prixTotalSalarie($this->idSession);
                $getPanierSalarie = $this->getPanierSalarie($this->idSession);

                if ($getPanierSalarie) {
                    $panierVue->vuePanier($getPanierSalarie, $prixTotalS);
                    $this->db = null;
                } else {

                    $panierVue->monPanierVide();
                }
                $this->supArticlePaniersalarie();
            }
        } else {
            header("Refresh:0.2;url=index.php?page=accueil");
        }
    }

    public function supArticlePanierEep()
    {

        $this->__construct();
        if (isset($_SERVER['HTTP_REFERER'])) {
            if ($_SERVER['HTTP_REFERER'] == 'http://localhost/Bio&Zen/index.php?page=panier') {
                if (isset($_GET['id_d']) && $_SESSION['token']) {
                    if ($_SESSION['token'] == $_GET['token']) {

                        $this->idD = $_GET['id_d'];
                        $getQtePanier = $this->getQtePanierEep($this->idD);
                        $newStock = ($getQtePanier[0]['stock'] + $getQtePanier[0]['qte']);
                        $resteStock = $this->resetStockEep();
                        $resteStock->execute(array($newStock, $this->idD));

                        if ($this->deleteArticlePanierEep($this->idD)) {

                            header("Refresh:0.2;url=index.php?page=panier");
                            $this->db = null;
                            return true;
                        }
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public function supArticlePaniersalarie()
    {

        $this->__construct();
        if (isset($_SERVER['HTTP_REFERER'])) {

            if ($_SERVER['HTTP_REFERER'] == 'http://localhost/Bio&Zen/index.php?page=panier') {
                if (isset($_GET['id_d']) && $_SESSION['token']) {
                    if ($_SESSION['token'] == $_GET['token']) {

                        $this->idD = $_GET['id_d'];
                        $getQtePanier = $this->getQtePanierSalarie($this->idD);
                        $newStock = ($getQtePanier[0]['stock'] + $getQtePanier[0]['qte']);
                        $resteStock = $this->resetStockSalarie();
                        $resteStock->execute(array($newStock, $this->idD));

                        if ($this->deleteArticlePanierSalarie($this->idD)) {

                            header("Refresh:0.2;url=index.php?page=panier");
                            $this->db = null;
                            return true;
                        }
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
}

$panierControlleur = new PanierControlleur();
$panierControlleur->panierControlleurFunc();
