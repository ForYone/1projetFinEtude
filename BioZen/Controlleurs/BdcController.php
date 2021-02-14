<?php

include("Vues/BdcView.php");
include("Modeles/BdcModel.php");



class BdcController extends BdcModel
{

    public $db;
    function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }

    public function OneBdcAction($numComGenere)
    {

        $comm = $this->getOneBdc($numComGenere);
        $view = new BdcView();
        $view->bdcRender($comm, $numComGenere);
    }
}
