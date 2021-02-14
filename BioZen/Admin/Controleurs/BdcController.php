<?php

include("Vues/BdcView.php");
include("Modeles/BdcModel.php");



class BdcController
{

    public $bdd;

    function __construct()
    {
        $this->bdd =ConnexionBdd::bdd();;
    }


    public function allBdcAction()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                $model = new BdcModel($this->bdd);

                $commEep = $model->getAllBdcEep();
                $commSal = $model->getAllBdcSal();
                $view = new BdcView();
                $view->allBdcRender($commEep, $commSal);
            }
        }
    }

    public function oneBdcAction()
    {
        if (isset($_SESSION['id_role'])) {
            $model = new BdcModel($this->bdd);
            $numComm = (isset($_GET['numCom']) ? $_GET['numCom'] : "");
            $commande = $model->getOneBdc($numComm);
            //  var_dump($commande);
            $view = new BdcView();
            $view->bdcRender($commande);
        }
    }
}
