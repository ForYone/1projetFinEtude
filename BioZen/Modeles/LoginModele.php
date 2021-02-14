<?php

class AuthentificationModele
{
    public $mdp;
    public $db;
    public function __construct($db, $mdp = "")
    {
        $this->db = $db;
        $this->mdp = $mdp;
    }




    public function connexionEep($email)
    {
        $utilisateurPrepare = "SELECT * FROM eep INNER JOIN role ON role.id_role=eep.id_role WHERE email_eep='$email' ";
        $utilisateur = $this->db->query($utilisateurPrepare)->fetch(PDO::FETCH_OBJ);

        if (isset($utilisateur->email_eep)) {

            if (password_verify($this->mdp, $utilisateur->mdp_eep)) {

                $_SESSION['nom'] = $utilisateur->nom_eep;
                $_SESSION['adresse'] = $utilisateur->adresse_eep;
                $_SESSION['cp'] = $utilisateur->cp_eep;
                $_SESSION['ville'] = $utilisateur->ville_eep;
                $_SESSION['tel'] = $utilisateur->tel_eep;
                $_SESSION['email'] = $utilisateur->email_eep;
                $_SESSION['id'] = $utilisateur->id_eep;
                $_SESSION['id_role'] = $utilisateur->id_role;
                $_SESSION['activite'] = $utilisateur->activite_eep;
                $_SESSION['token'] = sha1(time() * rand(0, 100));



                return true;
            }
        } else {
            return false;
        }
    }

    public function connexionsalarie($email)
    {


        $utilisateurPrepare = "SELECT * FROM salarie INNER JOIN  role ON role.id_role=salarie.id_role WHERE  email_salarie='$email'";
        $utilisateur = $this->db->query($utilisateurPrepare)->fetch(PDO::FETCH_OBJ);


        if (isset($utilisateur->email_salarie)) {

            if (password_verify($this->mdp, $utilisateur->mdp_salarie)) {

                $_SESSION['nom'] = $utilisateur->nom_salarie;
                $_SESSION['prenom'] = $utilisateur->prenom_salarie;
                $_SESSION['adresse'] = $utilisateur->adresse_salarie;
                $_SESSION['cp'] = $utilisateur->cp_salarie;
                $_SESSION['ville'] = $utilisateur->ville_salarie;
                $_SESSION['poste'] = $utilisateur->poste_salarie;
                $_SESSION['dfc'] = $utilisateur->date_fin_contrat;
                //$_SESSION['nom_eep']=$utilisateur->nom_eep; 
                $_SESSION['email'] = $utilisateur->email_salarie;
                $_SESSION['id'] = $utilisateur->id_salarie;
                $_SESSION['id_role'] = $utilisateur->id_role;
                $_SESSION['token'] = sha1(time() * rand(0, 100));

                return true;
            }
        } else {
            return false;
        }
    }



    public function inscriptionSalarie($nomEep, $nom, $prenom, $poste, $dfc, $adresse, $cp, $ville, $email, $mdp)
    {
        if ($eep = $this->db->query("SELECT * FROM eep WHERE nom_eep='$nomEep' ")->fetch(PDO::FETCH_OBJ)) {
            $id_eep = $eep->id_eep;
            $salarie = $this->db->prepare("INSERT INTO salarietemp(nom_salarie,prenom_salarie,poste_salarie,date_fin_contrat,adresse_salarie,cp_salarie,ville_salarie,email_salarie,mdp_salarie,id_role,id_eep) VALUES(?,?,?,?,?,?,?,?,?,?,?) ");
            if ($salarie->execute(array($nom, $prenom, $poste, $dfc, $adresse, $cp, $ville, $email, $mdp, 1, $id_eep))) {

                return true;
            } else {
                echo "inscription erreur";
            }
        } else {
            echo "cette entreprise n'existe pas";
        }
    }
}
