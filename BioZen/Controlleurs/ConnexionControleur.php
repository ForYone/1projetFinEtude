<?php
include('Securiter.php');
include('Vues/ConnexionView.php');
include('Modeles/LoginModele.php');

class ConnexionControleur

{



    public $db;

    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }


    public function connexion()
    {
        $securite = new Security();
        $LoginVue = new ConnexionView();

        if ($_POST) {
            if (isset($_POST['mailEep'])) {


                $this->email = $_POST['mailEep'];
                $this->mdp = $_POST['mdpEep'];
                echo $this->email;
                if ($this->email != '' && $this->mdp != '') {


                    $securite->securMdp($this->mdp);
                    $LoginModel = new AuthentificationModele($this->db, $this->mdp);

                    if ($LoginModel->connexionEep($this->email)) {

                        $LoginVue->loginMessage(true);
                        header('Refresh:0;URL=./index.php');
                    } else {
                        $LoginVue->loginMessage(false);
                    }
                } else {
                    $LoginVue->loginMessage(false);
                }
            }

            if (isset($_POST['mailSalarie'])) {

                $this->email = $_POST['mailSalarie'];
                $this->mdp = $_POST['mdpSalarie'];

                if ($this->email != '' && $this->mdp != '') {

                    if ($securite->securMail($this->email) && $securite->securMdp($this->mdp)) 
                    {

                        $LoginModel = new AuthentificationModele($this->db, $this->mdp);

                        if ($LoginModel->connexionSalarie($this->email)) {
                            header('Refresh:0;URL=./index.php');
                            $LoginVue->loginMessage(true);
                        } else {
                            $LoginVue->loginMessage(false);
                        }
                    }
                } else {
                    $LoginVue->loginMessage(false);
                }
            }
        } else {
            echo"<h2>erreur de la page</h2>";
        }
    }
}


$connexion = new ConnexionControleur();
$connexion->connexion();
