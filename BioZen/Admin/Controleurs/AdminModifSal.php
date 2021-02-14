<?php


include('Admin/Vues/AdminUtilisateurVue.php');
include('Admin/Modele/AdminUtilModele.php');
include('Controlleurs/Securiter.php');


class ModifSalControleur extends AdminUtilisateurModele
{
    public $db;
    public $nom;
    public $prenom;
    public $poste;
  

    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }

    public function profilController()
    {

        @$admin=$_SESSION['id_role']==3;
        if($admin)
        {

        $securite=new Security();
        $profilVue= new AdminUtilisateurVue();

        $id = $_GET['id'];

        
            if($utilisateur= $this->voirUnSalarie($id))
            {
                $profilVue->modifSalarie($utilisateur);
            }
         
        
        if (isset($_POST['nom'])) 
        {
            
           
            $this->nom = $_POST['nom'];
            $this->prenom = $_POST['prenom'];
            $this->poste = $_POST['poste'];
            $this->dfc = $_POST['dfc'];
            $this->cp = $_POST['cp'];
            $this->adresse = $_POST['adresse'];
            $this->ville = $_POST['ville'];
            $this->email = $_POST['mail'];

            if ($this->email != '' && $this->prenom != '' && $this->nom != '') 
            {  
                
                if($securite->nom($this->prenom) && $securite->nom($this->poste) && $securite->securVille($this->ville) && $securite->securAdresse($this->adresse) && $securite->securCp($this->cp) && $securite->securMail($this->email))
                 {
                    if ($this->modifSalarie($this->nom,$this->prenom,$this->poste,$this->dfc,$this->adresse,$this->cp,$this->ville,$this->email,$id)) 
                    {
                        
                        header('Refresh:0;URL=./index.php?page=lesUtilisateur');
                        return true;
                    }
                     else
                     {
                        
                        echo'Modification impossible';
                        return false;
                    }
                 }
                 else
            {
                echo" erreur de traitement";
            }



            }
            else
            {
                echo" erreur de traitement";
            }
                    
      

        }
    }
    else
    {
        header('Refresh:0;URL=./index.php?page=accueil');
    }
}
}


$ModifSal = new ModifSalControleur();
$ModifSal->profilController();
?>