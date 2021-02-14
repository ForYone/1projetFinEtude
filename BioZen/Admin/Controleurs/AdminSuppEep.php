<?php



include('Admin/Modele/AdminUtilModele.php');



class AdminSuppEep extends AdminUtilisateurModele
{
    public $db;
    

    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }

   
    public function supprimer()
    {
        @$admin=$_SESSION['id_role']==3;
        if($admin)
        {
       
            $id=$_GET['id'];

           if($supp=$this->suppEep($id))  
           {

            header('Refresh:0;URL=index.php?page=lesUtilisateur');
           }      
           else
           {
             
               echo"erreure de suppression";
               return false;
           }
                    
        }
        else
        {
            header('Refresh:0;URL=index.php?page=accueil');
        }      
    }
    
}


$SuppControleur=new AdminSuppEep();
$SuppControleur->supprimer();
?>