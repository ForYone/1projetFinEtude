<?php

class ConnexionView
{

    public function loginMessage($message)
    {

        if ($message) {
           
           echo'connexion ';
           header('Refresh');
        } else {
            echo "erreur de connexion";
        }
    }

}

?>