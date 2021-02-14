<?php

class ModifModel
{


    function testEmail($email)
    {

        if ($utilisateur = $this->db->query("SELECT * FROM salarie   WHERE email_salarie='$email'")->fetch()) {

            return $utilisateur;
        }


        if ($utilisateur = $this->db->query("SELECT * FROM eep  WHERE email_eep='$email'")->fetch()) {
            return $utilisateur;
        }
    }


    function validationCode($code, $email)
    {

        $testCodePrep = "SELECT * FROM recuperation_mdp WHERE email='$email' AND code='$code'";

        if ($testCode = $this->db->query($testCodePrep)->fetch()) {
            $recupPrep = "DELETE FROM recuperation_mdp WHERE email='$email'";

            if ($recup = $this->db->query($recupPrep)) {
                return true;
            }
        } else {
            return false;
        }
    }

    function VerifieDate($email)
    {
        $dateRecupPrep = "SELECT date FROM recuperation_mdp WHERE email='$email'";
        if ($dateRecup = $this->db->query($dateRecupPrep)->fetch()) {
            return $dateRecup;
        }
    }

    function recuperationCode($email, $recupCode, $dateMtn)
    {
        $mailRecupTestPrep = "SELECT id FROM recuperation_mdp WHERE email='$email'";
        if ($mailRecupTest = $this->db->query($mailRecupTestPrep)->fetch()) {
            $recup = $this->db->prepare("UPDATE recuperation_mdp SET code=? , date=? WHERE email=? ");
            $recup->execute(array($recupCode, $dateMtn, $email));
            return true;
        } else {
            $recup = $this->db->prepare("INSERT INTO recuperation_mdp(email,code,date) VALUES(?,?,?) ");
            $recup->execute(array($email, $recupCode,$dateMtn));
            return true;
        }
    }

    function modifMdpModel($mdp, $email)
    {
        if ($utilisateur = $this->db->query("SELECT * FROM salarie WHERE email_salarie='$email'")->fetch(PDO::FETCH_OBJ)) {



            $sqlPrepare = "UPDATE salarie SET mdp_salarie='$mdp' WHERE email_salarie='$email'";
            if ($sql = $this->db->query($sqlPrepare)) {


                return true;
            }
        } else if ($utilisateur = $this->db->query("SELECT * FROM admin WHERE mail_admin='$email'")->fetch(PDO::FETCH_OBJ)) {



            $sqlPrepare = "UPDATE administrateur SET mdp_admin='$mdp' WHERE mail_admin='$email'";
            if ($sql = $this->db->query($sqlPrepare)) {


                return true;
            }
        } else if ($utilisateur = $this->db->query("SELECT * FROM eep WHERE email_eep='$email'")->fetchAll()) {


            $sqlPrepare = "UPDATE eep SET mdp_eep='$mdp' WHERE email_eep='$email'";
            if ($sql = $this->db->query($sqlPrepare)) {

                return true;
            }
        } else {
            echo "mauvaise tech";
        }
        return false;
    }
}
