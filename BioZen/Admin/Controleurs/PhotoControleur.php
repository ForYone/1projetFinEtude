<?php




class PhotoControleur extends ArticleModele
{

    public $db;

    public function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }

    public function getPhoto()
    {
        $photoVue = new Article();
        $photoData = $this->getArticleModele();
        $photoVue->photoArticle($photoData);
    }
}
