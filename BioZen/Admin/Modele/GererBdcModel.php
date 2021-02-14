<?php

class GererBdcModel
{
    public $bdd;

    function __construct($bdd)
    {

        $this->bdd = $bdd;
    }

    public function getOneBdc($numComm)
    {

        $commEep = $this->bdd->query("SELECT * FROM commande_eep 
        INNER JOIN eep ON commande_eep.id_eep=eep.id_eep WHERE num_commande_eep='$numComm'")->fetchAll();

        $req = ("SELECT * FROM commande_salarie 
        INNER JOIN salarie ON commande_salarie.id_salarie=salarie.id_salarie
        INNER JOIN eep ON salarie.id_eep=eep.id_eep WHERE num_commande_salarie='$numComm'");
        $commSal = $this->bdd->query($req)->fetchAll();
        $commande = "";

        if ($commEep != array()) {
            $commande = $commEep;
        } else {
            $commande = $commSal;
        }
        return $commande;
    }


    public function getAllBdcEep()
    {
        $req = ("SELECT DISTINCT num_commande_eep, date_commande_eep FROM commande_eep WHERE valider=0 order by date_commande_eep desc");
        $commEep = $this->bdd->query($req)->fetchAll();

        return $commEep;
    }


    public function getAllBdcSal()
    {
        $req = ("SELECT DISTINCT num_commande_salarie, date_commande_salarie FROM commande_salarie  WHERE valider=0 order by date_commande_salarie desc");
        $commSal = $this->bdd->query($req)->fetchAll();

        return $commSal;
    }

    public function getAllBdcEepVal()
    {
        $req = ("SELECT DISTINCT num_commande_eep, date_commande_eep FROM commande_eep WHERE valider=1 order by date_commande_eep desc");
        $commEep = $this->bdd->query($req)->fetchAll();

        return $commEep;
    }


    public function getAllBdcSalVal()
    {
        $req = ("SELECT DISTINCT num_commande_salarie, date_commande_salarie FROM commande_salarie  WHERE valider=1 order by date_commande_salarie desc");
        $commSal = $this->bdd->query($req)->fetchAll();

        return $commSal;
    }

    public function supBdcModel($id)
    {

        $com = $this->bdd->query("SELECT num_commande_eep FROM commande_eep where num_commande_eep='$id'")->fetchAll();

        if ($com != array()) {
            $req = ("DELETE FROM commande_eep where num_commande_eep='$id'");
            $this->bdd->query($req);
            if ($this->bdd->query($req)) {
                return true;
            } else {
                return false;
            }
        } else {
            $req = ("DELETE FROM commande_salarie where num_commande_salarie='$id'");
            $this->bdd->query($req);
            if ($this->bdd->query($req)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function valBdcModel($numCom)
    {
        $req = $this->bdd->prepare("UPDATE commande_eep SET valider=? WHERE num_commande_eep=$numCom");
        $req->execute(array(1));
        if ($req) {
         
            $req = $this->bdd->prepare("UPDATE commande_salarie SET valider=? WHERE num_commande_salarie=$numCom");
            $req->execute(array(1));
            if ($req) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
