<?php

class Security
{


    public function nom($nom)
    {

        if (!preg_match("/^[A-Za-z éèàùç .'_+-]+$/", $nom)) {
            return false;
        } else {
            addslashes($nom);
            strtolower($nom);
            echo "<br>valid";
            return true;
        }
    }

    public function securMdp($mdp)
    {

        if (!preg_match("/^[A-Za-z0-9 ._+-]+$/", $mdp)) {
            echo "les caractere speciaux sont interdit";
            return false;
        } else {
            if (substr($mdp, 2, 30)) {
                return true;
            } else {
                echo "8 caractere minimun";
                return false;
            }
        }
    }
    public function securConfirmMdp($mdp, $confirmMdp)
    {

        if (isset($_POST)) {

            if ($mdp == $confirmMdp) {
                echo 'mdp  identique';
                return true;
            } else {
                echo "mot de passe incorrect";
                return false;
            }
        }
    }


    public function securVille($ville)
    {


        if (isset($_POST)) {

            if (!preg_match("/^[A-Za-z éèàùç ._+-]+$/", $ville)) {

                return false;
            } else {

                return true;
            }
        }
    }

    public function securAdresse($adresse)
    {

        if (isset($_POST)) {

            if (!preg_match("/^[A-Za-z0-9 éèàùç ._+-]+$/", $adresse)) {

                return false;
            } else {
                return true;
            }
        }
    }

    public function securCp($cp)
    {

        if (isset($_POST)) {

            if (!preg_match("/^[0-9]+$/", $cp)) {

                return false;
            } else {

                return true;
            }
        }
    }


    public function securMail($email)
    {

        if (isset($_POST)) {

            if (!preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,5}$/", $email)) {

                return false;
            } else {

                return true;
            }
        }
    }

    public function securConfirmMail($email, $confirmEmail)
    {

        if (isset($_POST)) {

            if ($email == $confirmEmail) {

                return true;
            } else {

                return false;
            }
        }
    }

    public function verifQte($qte)
    {
        if (preg_match("#^[0-9]+$#", $qte)) {
            if ($qte > 0) {
                return true;
            }
        } else {
            return false;
        }
    }
}
