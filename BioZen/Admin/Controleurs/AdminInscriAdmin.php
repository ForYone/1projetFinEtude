<?php
include('Controlleurs/Securiter.php');

include('Admin/Vues/AdminUtilisateurVue.php');
include('Admin/Modele/AdminUtilModele.php');

class InscriptionAdminControleur extends AdminUtilisateurModele

{

   
    public $db;

    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }

    public function inscription()
    {
        $admin=$_SESSION['id_role']==3;
        
    if($admin)
    {


        $securite= new Security();
        $vue = new AdminUtilisateurVue();
        $vue->addAdmin();

        if(isset($_POST['mail']))
        {
            $nomAdmin=$_POST['nom'];
            $email=$_POST['mail'];
            $mdp=$_POST['mdp'];
            $cMdp=$_POST['cMdp'];
            

            if($securite->nom($nomAdmin) && $securite->securMail($email))
            {
                
                if($securite->securMdp($mdp) && $securite->securConfirmMdp($mdp,$cMdp))
                    {
                        $mdp=password_hash($mdp, PASSWORD_BCRYPT);

                        if($this->inscriptionAdmin($nomAdmin,$email,$mdp))
                        {
                            header('Refresh:0;URL=./index.php?page=lesUtilisateur');
                            return true; 
                        }
                        else
                        {
                            return false;
                        }
                    }
            }
        }
        

    }
    else
    {
        header('Refresh:0;URL=./index.php?page=accueil');
    }
        
    }
}

    
$inscription = new InscriptionAdminControleur();
$inscription->inscription();