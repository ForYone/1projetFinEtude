<?php

include('../Vues/AjaxView.php');
include "../Modeles/ConnexionBdd.php";
include "../config/config.php";
include("../Modeles/Catal_S_Model.php");

class AjaxController
{
    public $db;
    function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }


    public function ajaxControl()
    {

        if (isset($_POST['artId'])) {
            $id = $_POST['artId'];

            $model = new Catal_S_Model($this->db);
            $article = $model->getArticle($id);


            $view = new AjaxView();
            $view->ajaxRender($article);
        }
    }
}

$action = new AjaxController();
$action->ajaxControl();
