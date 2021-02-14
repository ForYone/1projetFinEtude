<?php
class ActuModel{
  
    public function getActu(){
        $actu=$this->db->query("SELECT * FROM actualite ORDER BY date_actu desc")->fetchAll();
        return $actu;
        
    }
}