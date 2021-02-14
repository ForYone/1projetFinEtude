<?php
include "Vues/PanierVue.php";
include "Modeles/Offre_model.php";
include "Controlleurs/BdcController.php";



class CommandeControlleur extends OffreModel
{
    public $db;
    public $ttc;
    public $tva;
    public $idSession;
   

    public function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }

    public function setCommande()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 2) {
                if (isset($_POST)) {
                    $this->ttc = $_POST['ttc'];
                    $this->tva = $_POST['tva'];
                    $this->idSession = $_SESSION['id'];
                   
                }
                $action = new BdcController();
                $commandeSet = $this->setCommandeEep($this->ttc, $this->tva, $this->idSession);


                if ($commandeSet->execute()) {

                    if ($this->updateStockArticleEep($this->idSession)->execute()) {
                        $this->deleteAllArticlePanierEep($this->idSession);
                        include "Vues/testEnvoiMail.php";
                       $action->OneBdcAction($_SESSION['num_commande']);
                        
                        $this->db = null;
                    }
                } else {
                    echo "<p style ='color:red;text-align:center;'>Votre commande n'a pas été prsie en compte </p>";
                }
            }
            if ($_SESSION['id_role'] == 1) {
                if (isset($_POST)) {
                    $this->ttc = $_POST['ttc'];
                    $this->tva = $_POST['tva'];
                    $this->idSession = $_SESSION['id'];
                }
                $action = new BdcController();
                $commandeSet = $this->setCommandeSalarie($this->ttc, $this->tva, $this->idSession);


                if ($commandeSet->execute()) {

                    if ($this->updateStockArticleSalarie($this->idSession)->execute()) {
                        $this->deleteAllArticlePanierSalarie($this->idSession);
                        include "Vues/testEnvoiMail.php";
                        $action->OneBdcAction($_SESSION['num_commande']);
                        
                        $this->db = null;
                    }
                } else {
                    echo "<p style ='color:red;text-align:center;'>Votre commande n'a pas été prsie en compte </p>";
                }
            }
        }
    }
}

$commmande = new CommandeControlleur();
$commmande->setCommande();
