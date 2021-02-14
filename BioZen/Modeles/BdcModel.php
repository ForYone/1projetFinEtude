<?php

class BdcModel
{


    public function getOneBdc($numCom)
    {

        $commEep = $this->db->query("SELECT * FROM commande_eep 
        INNER JOIN eep ON commande_eep.id_eep=eep.id_eep WHERE num_commande_eep='$numCom'")->fetchAll();

        $req = ("SELECT * FROM commande_salarie 
        INNER JOIN salarie ON commande_salarie.id_salarie=salarie.id_salarie
        INNER JOIN eep ON salarie.id_eep=eep.id_eep WHERE num_commande_salarie='$numCom'");
        $commSal = $this->db->query($req)->fetchAll();
        $comm = "";

        if ($commEep != array()) {
            $comm = $commEep;
        } else {
            $comm = $commSal;
        }
        return $comm;
       
    }


    public function getAllBdcEep()
    {
        $req = ("SELECT * FROM commande_eep");
        $commEep = $this->db->query($req)->fetchAll();

        return $commEep;
      
    }

    
    public function getAllBdcSal()
    {
        $req = ("SELECT * FROM commande_salarie");
        $commSal = $this->db->query($req)->fetchAll();

        return $commSal;
       
    }

}
