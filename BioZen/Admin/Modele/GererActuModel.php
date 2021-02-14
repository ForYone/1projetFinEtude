<?php

class GererActuModel{

    public $bdd;

    public function __construct($bdd){

        $this->bdd=$bdd;

    }
    
    public function getActu(){

        $req=("SELECT * FROM actualite ORDER BY date_actu desc");
        $actu=$this->bdd->query($req)->fetchAll(PDO::FETCH_OBJ);
        return $actu;
        
    }

    public function getAnActu($id){

        $req=("SELECT * FROM actualite WHERE id_actu=$id");
        $actu=$this->bdd->query($req)->fetch(PDO::FETCH_OBJ);
        return $actu;
        
    }

    public function addActu($titre_actu,$photo_actu,$video_actu,$contenu_actu){

        $req=("INSERT INTO actualite  (titre_actu,photo_actu,video_actu,date_actu,contenu_actu) VALUES(?,?,?,NOW(),?)");
        $actu=$this->bdd->prepare($req);
        if($actu->execute(array($titre_actu,$photo_actu,$video_actu,$contenu_actu))){
            return true;
            
        }else{
            return false;
           
        }
        
    }

    
    public function modifActu($id,$titre_actu,$photo_actu,$video_actu,$contenu_actu){


        $req=$this->bdd->prepare("UPDATE actualite SET titre_actu=?,photo_actu=?,video_actu=?,date_actu=Now(),contenu_actu=? WHERE id_actu=$id");
        $req->execute(array($titre_actu,$photo_actu,$video_actu,$contenu_actu));
        return $req;
    }

    
    public function supActu($id){

        $req=("DELETE FROM actualite where id_actu=$id");
        if($this->bdd->query($req)){
            return true;
        }else {return false;}        
    }
}