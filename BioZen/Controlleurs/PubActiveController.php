
<?php
include("Modeles/activerPubModel.php");

class ActivePubController{

    public $db;

    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }
    

    public function activerAction(){
        $model=new PubActive();
        $pub=$model->getPubActive();
        $GLOBALS['messagePub']=$pub['contenu_pub'];
        

       
    }

}