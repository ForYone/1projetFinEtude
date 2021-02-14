<?php

class GererPromoModel{

    public $bdd;

    public function __construct($bdd){

        $this->bdd=$bdd;

    }
    
    public function getPromo(){

        $req=("SELECT * FROM pub");
        $promo=$this->bdd->query($req)->fetchAll(PDO::FETCH_OBJ);
        return $promo;
        
    }

    public function activerPromo($id){

        $req=("UPDATE pub SET activer_pub=0");
        $this->bdd->query($req);

        $req=("UPDATE pub SET activer_pub=1 WHERE id_pub='$id'");
       if($this->bdd->query($req)){
        return true;

       }else{return false;}

           
    }

    public function desactiverPromo(){

        $req=("UPDATE pub SET activer_pub=0");
       if($this->bdd->query($req)) {
            return true;
            
        }else{
            return false;
           
        }
        }   
        
    

    public function getPub($id){

        $req=("SELECT * FROM pub WHERE id_pub='$id'");
        $pub=$this->bdd->query($req)->fetch(PDO::FETCH_OBJ);
        return $pub;
        
    }

    public function addPub($nomPub,$tauxPub,$dateDeb,$dateFin,$message){

        $req=("INSERT INTO pub  (nom_pub,taux,date_debut,date_fin,contenu_pub) VALUES(?,?,?,?,?)");
        $pub=$this->bdd->prepare($req);
        if($pub->execute(array($nomPub,$dateFin,$dateDeb,$tauxPub,$message))){
            return true;
            
        }else{
            return false;
           
        }
        
    }

    
    public function modifPub($id,$nomPub,$tauxPub,$dateDeb,$dateFin,$message){


        $req=$this->bdd->prepare("UPDATE pub SET nom_pub=?,taux=?,date_debut=?,date_fin=?,contenu_pub=? WHERE id_pub=$id");
        if($req->execute(array($nomPub,$tauxPub,$dateDeb,$dateFin,$message))){
            return true;
        }else {
            return false;
        }
        
    }

    
    public function supPub($id){

        $req=("DELETE FROM pub where id_pub=$id");
        if($this->bdd->query($req)){
            return true;
        }else {return false;}        
    }
}