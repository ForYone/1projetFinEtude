<?php

include('Modeles/Db.php');

include('Admin/Modeles/AdminUtilModele.php');



class AdminSuppSalarieTemp extends AdminUtilisateurModele
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

           if($supp=$this->suppST($id))  
           {

            header('Refresh:0;URL=./index.php?page=voirST');
           }      
           else
           {
             
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
$SuppControleur=new AdminSuppSalarieTemp($db);
$SuppControleur->supprimer();
?>