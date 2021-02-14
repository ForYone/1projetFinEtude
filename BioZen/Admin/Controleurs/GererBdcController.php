<?php

include("Admin/Modele/GererBdcModel.php");
include("Admin/Vues/GererBdcView.php");
include("Admin/Vues/messageErreur.php");

class GererBdcController
{
    public $bdd;

    function __construct()
    {
        $this->bdd = ConnexionBdd::bdd();
    }

    public function allBdcAction()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                $model = new GererBdcModel($this->bdd);

                $commEep = $model->getAllBdcEep();
                $commSal = $model->getAllBdcSal();
                $view = new GererBdcView();
               // $view->allBdcRender($commEep, $commSal);
                $view->allBdc($commEep, $commSal);
            }
        }
    }

    public function allBdcArchive()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                $model = new GererBdcModel($this->bdd);

                $commEep = $model->getAllBdcEepVal();
                $commSal = $model->getAllBdcSalVal();
                $view = new GererBdcView();
                $view->allBdc($commEep, $commSal);
            }
        }
    }
    public function oneBdcAction()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                if (isset($_SESSION['id_role'])) {
                    $model = new GererBdcModel($this->bdd);
                    $numCom=(isset($_GET['numCom']))?$_GET['numCom']:$_SESSION['numCom'];
                    $commande = $model->getOneBdc($numCom);
                    //  var_dump($commande);
                    $view = new GererBdcView();
                    $view->bdcRender($commande);
                }
            }
        }
    }
    public function supBdc()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                if (isset($_POST)) {

                    $id = (isset($_GET['numCom']) ? $_GET['numCom'] : "");
                    $model = new GererBdcModel($this->bdd);
                    $erreur = new MessageErreur();
                    if ($model->supBdcModel($id)) {

                        $erreur->messageBdc('sup');
                    } else {
                        $erreur->messageBdc('noSup');
                    }
                }
            }
        }
    }

    public function valBdcAction()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                if (isset($_POST)) {

                    $numCom = (isset($_GET['numCom']) ? $_GET['numCom'] : "");
                    $model = new GererBdcModel($this->bdd);
                    $erreur = new MessageErreur();
                    if ($model->valBdcModel($numCom)) {

                        $erreur->messageBdc('val');
                    } else {
                        $erreur->messageBdc('noVal');
                    }
                }
            }
        }
    }
}
