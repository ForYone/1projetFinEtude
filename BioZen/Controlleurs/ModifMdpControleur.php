<?php

include('Vues/ModifMdpView.php');
include('Modeles/ModifMdpModel.php');
include('Securiter.php');


class EmailMdpControleur extends ModifModel

{
    public $db;
    public $mdp;


    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }

    public function modifMdp()
    {
        $modifVue = new ModifMdpVue();
        $modifVue = new ModifMdpVue();
        $securite = new Security();
        $tdyDate = new DateTime();


        $email = $_SESSION['recup_mail'];

        $tdyDate->format("d-m-y h:i");
        $dateCompare = date_modify($tdyDate, '-1 day');

        if ($date = $this->VerifieDate($email)) {
            if ($date['date'] <= $dateCompare) {

                if (isset($_POST['code'])) {
                    if (!empty($_POST['code']) && $securite->securCp($_POST['code'])) {

                        $code = $_POST['code'];

                        if ($validCode = $this->validationCode($code, $email)) {
                            $modifVue->vueModifMdp($email);
                        } else {
                            echo "code de confirmation incorrect";
                        }
                    } else {
                        echo 'veuillez entrer votre code de confirmation';
                    }
                } else {
                    $modifVue->ValidCode();
                }


                if (isset($_POST['nvxMdp'])) {

                    $nvxMdp = $_POST['nvxMdp'];
                    $confirmMdp = $_POST['confirmMdp'];

                    if ($securite->securMdp($nvxMdp) && $securite->securConfirmMdp($nvxMdp, $confirmMdp)) {
                        $this->mdp = password_hash($nvxMdp, PASSWORD_BCRYPT);


                        if ($modifModel = $this->modifMdpModel($this->mdp, $email)) {
                            echo 'mot de passe modifier';
                            header('Refresh:0;URL=./index.php');
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        echo 'mot de passe incorect';
                    }
                }
            }
        } else {
            header('Refresh:0;URL=./index.php');
        }
    }
}


$modifControleur = new EmailMdpControleur();

$modifControleur->modifMdp();
