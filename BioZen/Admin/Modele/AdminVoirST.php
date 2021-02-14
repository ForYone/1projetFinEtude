<?php
include('Modeles/Db.php');
include('Admin/Vues/AdminUtilisateurVue.php');
include('Admin/Modeles/AdminUtilModele.php');
class VoirSalarieTemp extends AdminUtilisateurModele
{

    public $db;
  

    public function __construct($db)
    {

        $this->db = $db;
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
        header('Refresh:0;URL=./index.php?page=accueil');
    }

    }
}

$db = Db::connectBdd();
$inscription = new VoirSalarieTemp($db);
$inscription->profil();


?>