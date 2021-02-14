<?php

include("Vues/Catal_S_View.php");
include("Modeles/Catal_S_Model.php");

class Catal_S_Controller extends Catal_S_Model
{
    public $db;

    function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }
    public function catal_S_Control()
    {
        if (isset($_SESSION['id_role'])) {
            $model = new Catal_S_Model($this->db);
            $articles = $model->getArticles();
            $view = new Catal_S_View();
            $view->Catal_S_Render($articles);
        }
        else{
            header("Refresh:0.2;url=index.php?page=accueil");
        }
    }
}
$action = new Catal_S_Controller();
$action->catal_S_Control();
