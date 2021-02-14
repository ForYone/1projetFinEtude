<?php
include "Modeles/Offre_model.php";

class DeconnexionController extends OffreModel
{
    public $db;
    public $idSession;

    public function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }

    public function action()
    {
        $this->idSession = $_SESSION['id'];
        if(isset($_SESSION['id_role'])){

            if($_SESSION['id_role'] == 1){

                $this->deleteAllArticlePanierSalarie($this->idSession);
                $this->db=null;
                $_SESSION = array();
                header('Refresh:0;URL=./index.php');

            }elseif($_SESSION['id_role'] == 2){
                $this->deleteAllArticlePanierEep($this->idSession);
                $this->db=null;
                $_SESSION = array();
                header('Refresh:0;URL=./index.php');
            }else{
                $_SESSION = array();
                header('Refresh:0;URL=./index.php');
            }
        }
     
    }
}
$deconnexionController = new DeconnexionController();
$deconnexionController->action();


