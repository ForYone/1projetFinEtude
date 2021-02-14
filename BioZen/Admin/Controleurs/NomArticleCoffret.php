<?php



class NomArticleCoffret extends ArticleModele
{
    public $db;
    public $id_coffret;


    public function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }

    public function getNomCoffretControleur()
    {
        $coffretVue = new CoffretVue();
        $showCoffret = $this->showNomCoffret();
        $coffretVue->nomArticleCoffet($showCoffret);
    }
}