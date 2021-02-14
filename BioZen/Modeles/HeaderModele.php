<?php

include('ConnexionBdd.php');
include "../config/config.php";
class HeaderModele 
{
    
    public function recupEep()
        {
            $this->db=ConnexionBdd::bdd();

            $eep=$this->db->query("SELECT email_eep FROM eep ")->fetchAll();

            
            echo json_encode($eep);
           
        }

}

$test=new HeaderModele();
$test->recupEep();

?>