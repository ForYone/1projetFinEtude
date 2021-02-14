<?php
include("Modeles/AddPanierModel.php");
include("Controlleurs/Verification.php");
include "Modeles/Offre_model.php";
include("Vues/AddPanierView.php");
class AddPanierController extends OffreModel
{

    public $db;
    public $idSession;
    public $numCommandeGenerate;

    function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }

    public function addPanierControl()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 1) {
                $verif = new Verification();
                $view = new AddPanierView();
                if (isset($_POST)) {

                    if (isset($_POST['qte'])) {

                        $nom = $_POST['nom'];
                        $ref = $_POST['ref'];
                        $prix = $_POST['prix'];
                        $photo = $_POST['photo'];
                        $qte = $_POST['qte'];
                        $stock = $_POST['stock'];
                        
                        $this->idSession = $_SESSION['id'];
                        $this->numCommandeGenerate = (RAND(1, 99999999999999) + time());
                        $_SESSION['num_commande'] = $this->numCommandeGenerate;

                        $articlePanierExiste = $this->verufArticleSalarie($nom, $this->idSession);
                        if ($articlePanierExiste[0] == 1) {
                            $msg = "<p style='color:red;'>Vous possedez déja cet article dans votre panier</p>";
                            $view->addPanierMsg($msg);

                            return false;
                        } else {

                            if ($verif->verifQte($qte)) {
                                $model = new AddPanierModel($this->db);


                                if ($stock == 0) {
                                    $msg = "cet article n'est plus en stock.";
                                    $view->addPanierMsg($msg);
                                } else if ($qte > $stock) {
                                    $msg = "Plus que " . $stock . " articles disponibles.";
                                    $view->addPanierMsg($msg);
                                } else if (($qte == 0) || ($qte == 1)) {
                                    $qte = 1;
                                    $prixTot = $prix * $qte;

                                    if ($model->addPanierModel($this->idSession, $nom, $ref, $prix, $photo, $qte, $prixTot) and $this->numCommandeSalarie()->execute(array($this->numCommandeGenerate, $this->idSession))) {
                                        $msg = "votre article a bien été ajouté au panier.";
                                        $view->addPanierMsg($msg);
                                    }
                                } else {

                                    if ($model->addPanierModel($this->idSession, $nom, $ref, $prix, $photo, $qte, $prixTot) and $this->numCommandeSalarie()->execute(array($this->numCommandeGenerate, $this->idSession))) {
                                        $msg = "Vos articles ont bien étés ajoutés au panier. ";
                                        $view->addPanierMsg($msg);
                                    }
                                }
                            } else {

                                $msg = "Saisie incorrecte.";
                                $view->addPanierMsg($msg);
                            }
                        }
                    }
                }
            }
        } else {
            header("Refresh:0.2;url=index.php?page=accueil");
        }
    }
}
$action = new AddPanierController();
$action->addPanierControl();
