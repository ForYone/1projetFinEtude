<?php
include('Modeles/Db.php');
include('Admin/Vues/AdminUtilisateurVue.php');
include('Admin/Modeles/AdminUtilModele.php');
include('Controleurs/Securiter.php');


class ModifEepControleur extends AdminUtilisateurModele
{
    public $db;
  

    public function __construct($db)
    {

        $this->db = $db;
    }

    public function profilControleur($id)
    {
        @$admin=$_SESSION['id_role']==3;
    if($admin)
    {
        $securite= new Security();
        $profilVue= new AdminUtilisateurVue();

      if($utilisateur= $this->voirUneEep($id));
       {
           $profilVue->modifEep($utilisateur);
       }

       if(isset($_POST['nomEep']))
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
            
         

            if($securite->nom($nomEep) && $securite->nom($nom) && $securite->nom($activite)  && $securite->nom($prenom) && $securite->nom($poste) && $securite->securVille($ville) && $securite->securAdresse($adresse) && $securite->securCp($cp) && $securite->securMail($email))
            {
                
                
                        

                        if($model=$this->modifEep($nomEep,$activite,$site,$dce,$adresse,$cplt,$cp,$ville,$region,$tel,$fax,$nom,$prenom,$poste,$email,$id))
                        {
                            header('Refresh:0;URL=./index.php?page=lesUtilisateur');
                            return true; 
                        }
                        else
                        {
                            echo'rater';
                            return false;
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

$id = $_GET['id'];
$db = Db::connectBdd();
$inscription = new ModifEepControleur($db);
$inscription->profilControleur($id);