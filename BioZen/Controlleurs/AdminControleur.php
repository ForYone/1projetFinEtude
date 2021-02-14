<?php
include "Vues/AdminVue.php";
include "Modeles/Offre_model.php";
include "Securiter.php";



class AdminControleur extends OffreModel
{
    public $id;
    public $mail_admin;
    public $mdp_admin;


    public function __construct()
    {
        $this->db =  ConnexionBdd::bdd();
    }
    public function adminC()
    {
        $securiter = new Security;
        $adminVue = new AdminVue();
        $adminVue->amdinForm();
        if (isset($_POST['mail_admin'])) {
            if ($securiter->securMail($_POST['mail_admin']) and $securiter->securMdp($_POST['mdp_admin'])) {
                $this->mail_admin = $_POST['mail_admin'];
                $this->mdp_admin = $_POST['mdp_admin'];

                if ($this->connexionAdmin($this->mail_admin, $this->mdp_admin)) {
                    header("Refresh:0.2;url=index.php?page=accueil");
                    $this->db = null;
                } else {

                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
$adminControleur = new AdminControleur();
$adminControleur->adminC();
