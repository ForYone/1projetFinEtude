<?php

include('Vues/ProfilView.php');
include('Modeles/ProfilModele.php');
include('Securiter.php');


class ProfilControleur extends ProfilModele
{
    public $db;
    public $mdp;
    public $nvxMdp;
    public $confirmMdp;


    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }

    public function profilController()
    {
        $profilVue = new ProfilPersoView();

        $id = $_SESSION['id'];


        $utilisateur = $this->monProfil($id);



        $profilVue->monProfil($utilisateur);
    }

    public function modifMdp()
    {
        $securite = new Security();
        if (isset($_POST['mdp'])) {
            @$this->mdp = $_POST['mdp'];
            @$this->nvxMdp = $_POST['nvxMdp'];
            @$this->confirmMdp = ($_POST['confirmMdp']);
            $id = $_SESSION['id'];
            if ($securite->securMdp($this->nvxMdp) && $securite->securConfirmMdp($this->nvxMdp, $this->confirmMdp)) {
                $this->nvxMdp = password_hash($this->nvxMdp, PASSWORD_BCRYPT);
                if ($this->modifMdpModel($this->nvxMdp, $id)) {
                    echo 'hey';
                }
            }
        }
    }
}


$profilControleur = new ProfilControleur();
$profilControleur->profilController();
$profilControleur->modifMdp();
