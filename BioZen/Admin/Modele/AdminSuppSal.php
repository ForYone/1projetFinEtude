<?php

include('Modeles/Db.php');

include('Admin/Modeles/AdminUtilModele.php');



class AdminSuppSal extends AdminUtilisateurModele
{
    public $db;
    

    public function __construct($db)
    {

        $this->db = $db;
    }

   
    public function supprimer()
    {
        @$admin=$_SESSION['id_role']==3;
        if($admin)
        {
            $id=$_GET['id'];

           if($supp=$this->suppSal($id))  
           {

            header('Refresh:0;URL=./index.php?page=lesUtilisateur');
           }      
           else
           {
               echo $id;
               echo"erreure de suppression";
               return false;
           }
        }
        else
        {
            header('Refresh:0;URL=./index.php?page=accueil');
        }            
                
    }
    
}

$db = Db::connectBdd();
$suppControleur=new AdminSuppSal ($db);
$suppControleur->supprimer();
?>