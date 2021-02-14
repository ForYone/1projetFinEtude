<?php
include('Modeles/Db.php');
include('Admin/Vues/AdminUtilisateurVue.php');
include('Admin/Modeles/AdminUtilModele.php');

class ValidSalarieTemp extends AdminUtilisateurModele
{

    public $db;
  

    public function __construct($db)
    {

        $this->db = $db;
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
$db = Db::connectBdd();
$inscription = new ValidSalarieTemp($db);
$inscription->profil($id);


?>