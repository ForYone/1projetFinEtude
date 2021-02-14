<?php
class PubActive{

    public $db;

    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }
    

    public function getPubActive(){
        $pub=$this->db->query("SELECT contenu_pub FROM pub where activer_pub=1")->fetch();
        return $pub;
        $this->db=null;
    }
}