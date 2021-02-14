<?php
include('Controlleurs/Securiter.php');

include('Admin/Vues/AdminUtilisateurVue.php');
include('Admin/Modele/AdminUtilModele.php');

class InscriptionEepControleur extends AdminUtilisateurModele

{

   
    public $db;

    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }

    public function inscription()
    {
        @$admin=$_SESSION['id_role']==3;
    if($admin)
    {


        $securite= new Security();
        $LoginView = new AdminUtilisateurVue();
        $LoginView->eep();

        if(isset($_POST['mail']))
        {
            $nomEep=$_POST['nomEep'];
            $activite=$_POST['activite'];
            $site=$_POST['site'];
            $dce=$_POST['dceep'];
            $adresse=$_POST['adresse'];
            $cplt=$_POST['cplt_adresse'];
            $cp=$_POST['cp'];
            $ville=$_POST['ville'];
            $region=$_POST['region'];
            $tel=$_POST['tel'];
            $fax=$_POST['fax'];
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $poste=$_POST['poste'];
            $email=$_POST['mail'];
            $cEmail=$_POST['cMail'];
            $mdp=$_POST['mdp'];
            $cMdp=$_POST['cMdp'];

            if($securite->nom($nomEep) && $securite->nom($nom) && $securite->nom($activite)  && $securite->nom($prenom) && $securite->nom($poste) && $securite->securVille($ville) && $securite->securAdresse($adresse) && $securite->securCp($cp) && $securite->securMail($email) && $securite->securConfirmMail($email,$cEmail))
            {
                
                if($securite->securMdp($mdp) && $securite->securConfirmMdp($mdp,$cMdp))
                    {
                        $mdp=password_hash($mdp, PASSWORD_BCRYPT);

                        if($this->inscriptionEep($nomEep,$activite,$site,$dce,$adresse,$cplt,$cp,$ville,$region,$tel,$fax,$nom,$prenom,$poste,$email,$mdp))
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

    
$inscription = new InscriptionEepControleur();
$inscription->inscription();


