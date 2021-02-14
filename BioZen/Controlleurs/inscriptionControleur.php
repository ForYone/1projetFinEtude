<?php

include('Securiter.php');
include('Vues/InscriptionView.php');
include('Modeles/LoginModele.php');

class InscriptionControleur

{

    public $email;
    public $mdp;
    public $db;

    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }

    public function inscription()
    {
        $securite = new Security();
        $LoginView = new inscriptionVue();
        $connexionModel = new AuthentificationModele($this->db);

        if ($_POST) {

            $this->nomEep = $_POST['nomEep'];
            $this->nom = $_POST['nom'];
            $this->prenom = $_POST['prenom'];
            $this->poste = $_POST['poste'];
            $this->dfc = $_POST['dfc'];
            $this->cp = $_POST['cp'];
            $this->adresse = $_POST['adresse'];
            $this->ville = $_POST['ville'];
            $this->email = $_POST['mail'];
            $this->mdp = $_POST['mdp'];
            $this->cMdp = $_POST['cMdp'];
            $this->cEmail = $_POST['cMail'];



            if ($this->email != '' && $this->mdp != '' && $this->prenom != '' && $this->nom != '') {

                if ($securite->nom($this->nomEep) && $securite->nom($this->prenom) && $securite->nom($this->poste) && $securite->securVille($this->ville) && $securite->securAdresse($this->adresse) && $securite->securCp($this->cp) && $securite->securMail($this->email) && $securite->securConfirmMail($this->email, $this->cEmail)) {
                    echo 'reussi';
                } else {
                    echo " erreur de traitement";
                }
                if ($securite->securMdp($this->mdp) && $securite->securConfirmMdp($this->mdp, $this->cMdp)) {
                    $this->mdp = password_hash($this->mdp, PASSWORD_BCRYPT);



                    if ($connexionModel->inscriptionSalarie($this->nomEep, $this->nom, $this->prenom, $this->poste, $this->dfc, $this->adresse, $this->cp, $this->ville, $this->email, $this->mdp)) {

                        header('Refresh:0;URL=./index.php');
                    } else {

                        $LoginView->vue();
                    }
                } else {

                    $LoginView->vue();;
                }
            }
        } else {
            $LoginView->vue();
        }
    }
}

$inscription = new InscriptionControleur();
$inscription->inscription();
