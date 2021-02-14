<?php
class AddPanierModel{

    public $db;
   public function __construct($db)
   {
       $this->db = $db;
   }

    public function addPanierModel($id,$nom,$ref,$prix,$photo,$qte,$prixTot){

        $req=$this->db->prepare("INSERT INTO panier_salarie (id_salarie,article_panier,ref_article,prix_article,photo_article,qte,prix_article_total) VALUES(?,?,?,?,?,?,?)");
        if($req->execute(array($id,$nom,$ref,$prix,$photo,$qte,$prixTot))){
           
            return true;
        }else{
            return false;
        }
        return $req;        
    }


    public function recupQteComS($ref){

        $qte=$this->db->query("SELECT SUM(qte) FROM panier_salarie where ref_article=$ref ")->fetch();
         return $qte;
    }

    
    public function recupQteComE($ref){

        $qte=$this->db->query("SELECT SUM(qte) FROM panier_eep where ref_article=$ref ")->fetch();
         return $qte;

    }
}