<?php

include('Admin/Vues/AdminUtilisateurVue.php');
include('Admin/Modele/AdminUtilModele.php');
class VoirSalarieTemp extends AdminUtilisateurModele
{

    public $db;
  

    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }

    public function Profil()
    {
        @$admin=$_SESSION['id_role']==3;
    if($admin)
    {
        $UtilisateurVue= new AdminUtilisateurVue();

       
       
        $salarie= $this->voirSalarieTemp();

        $UtilisateurVue ->salarieTempVue($salarie);
    }
    else
    {
        header('Refresh:0;URL=index.php?page=accueil');
    }

    }
}


$inscription = new VoirSalarieTemp();
$inscription->profil();


?>