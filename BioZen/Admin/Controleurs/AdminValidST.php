<?php

include('Admin/Vues/AdminUtilisateurVue.php');
include('Admin/Modele/AdminUtilModele.php');

class ValidSalarieTemp extends AdminUtilisateurModele
{

    public $db;
  

    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }

    public function Profil($id)
    {
        @$admin=$_SESSION['id_role']==3;
    if($admin)
    {
        if($salarie= $this->ValidST($id))
        {
            header('Refresh:0;URL=./index.php?page=voirST');
            return true;
        }
        else
        {
            echo"impossible de valider ce salarié";
            return false;
        }
        
    }
    else
    {
        header('Refresh:0;URL=./index.php?page=accueil');
    }

    }
}
$id=$_GET['id'];

$inscription = new ValidSalarieTemp();
$inscription->profil($id);


?>