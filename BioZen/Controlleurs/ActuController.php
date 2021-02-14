<?php
include("Vues/ActuView.php");
include("Modeles/ActuModel.php");

class ActuController extends ActuModel
{

    public $db;
    function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }

    public function actuAction()
    {
        
        $actu = $this->getActu();

        $view = new ActuView();
        $view->actuRender($actu);
    }
}
$action = new ActuController();
$action->actuAction();

