<?php

include("Admin/Vues/GererPromoView.php");
include("Admin/Vues/messageErreur.php");
include("Admin/Modele/GererPromoModel.php");

class GererMsgPromoController
{
    public $bdd;

    function __construct()
    {
        $this->bdd = ConnexionBdd::bdd();
    }

    public function promoAction()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                $model = new GererPromoModel($this->bdd);
                $promo = $model->getPromo();
                $view = new GererPromoView();
                $view->promoRender($promo);
            }
        }
    }

    public function pubAction()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                $model = new GererPromoModel($this->bdd);
                $id = (isset($_GET['idPromo']) ? $_GET['idPromo'] : "");
                $pub = $model->getPub($id);
                $view = new GererPromoView();
                $view->pubRender($pub);
            }
        }
    }

    public function activerPromoAction()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                $model = new GererPromoModel($this->bdd);
                $id = (isset($_GET['id']) ? $_GET['id'] : "");
                $pub = $model->activerPromo($id);
                $erreur = new MessageErreur();
                if ($pub) {

                    $erreur->messagePromo('activer');
                } else {
                    $erreur->messagePromo('noActiver');
                }
            }
        }
    }

    public function desactiverPromoAction()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                $model = new GererPromoModel($this->bdd);

                $pub = $model->desactiverPromo();
                $erreur = new MessageErreur();
                if ($pub) {

                    $erreur->messagePromo('desactiver');
                } else {
                    $erreur->messagePromo('noDesactiver');
                }
            }
        }
    }

    public function addPubAction()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                $model = new GererPromoModel($this->bdd);
                $erreur = new MessageErreur();
                if (isset($_POST)) {

                    if (isset($_POST['nomPub'])) {

                        $taux = $_POST['taux'];
                        $dateDeb = $_POST['dateDeb'];
                        $dateFin = $_POST['dateFin'];
                        $message = $_POST['message'];
                        $nomPub = $_POST['nomPub'];
                        if ($model->addPub($nomPub, $dateDeb, $dateFin, $taux, $message)) {
                            $erreur->messagePromo('ajouter');
                        } else {
                            $erreur->messagePromo('noAjouter');
                        }
                    }
                }
            }
        }
    }

    public function modifPubAction()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                if (isset($_POST)) {
                    $erreur = new MessageErreur();

                    $id = (isset($_GET['id']) ? $_GET['id'] : "");

                    if (isset($_POST['message'])) {

                        $taux = $_POST['taux'];
                        $dateDeb = $_POST['dateDeb'];
                        $dateFin = $_POST['dateFin'];
                        $message = $_POST['message'];
                        $nomPub = $_POST['nomPub'];

                        $model = new GererPromoModel($this->bdd);

                        if ($model->modifPub($id, $nomPub,  $taux, $dateDeb, $dateFin, $message)) {
                            $erreur->messagePromo('modif');
                        } else {
                            $erreur->messagePromo('noModif');
                        }
                    } else {
                        echo "Un problème est survenu<br>";
                    }
                }
            }
        }
    }

    public function supPubAction()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                $erreur = new MessageErreur();
                if (isset($_POST)) {
                    $id = (isset($_GET['id']) ? $_GET['id'] : "");
                    $model = new GererPromoModel($this->bdd);
                    if ($model->supPub($id)) {
                        $erreur->messagePromo('sup');
                    } else {
                        $erreur->messagePromo('noSup');
                    }
                }
            }
        }
    }
}
