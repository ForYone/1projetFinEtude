<?php

include('Admin/Modele/AdminUtilModele.php');
include('Admin/Vues/AdminUtilisateurVue.php');
class VoirProfil extends AdminUtilisateurModele
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
        
        $eep= $this->voirEep();
        $salarie= $this->voirSalarie();
        $admin= $this->voirAdmin();
       
        $UtilisateurVue ->eepVue($eep);
        $UtilisateurVue ->salarieVue($salarie);
        $UtilisateurVue ->AdminVue($admin);

    }
    else
    {
        header('Refresh:0;URL=index.php?page=accueil');
    }
    }
}


$inscription = new VoirProfil();
$inscription->profil();


?>