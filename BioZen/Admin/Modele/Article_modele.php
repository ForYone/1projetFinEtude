<?php

class ArticleModele
{


    public function getArticleModele()
    {

        $article = $this->db->query("SELECT * FROM article INNER JOIN categorie ON article.id_cat = categorie.id_cat");
        return $article;
    }
    public function getArticleForm($id)
    {
        $article = $this->db->query("SELECT * FROM article INNER JOIN categorie ON article.id_cat = categorie.id_cat WHERE id_article=$id")->fetch(PDO::FETCH_OBJ);
        return $article;
    }
    public function deleteArticle()
    { 
     
        $dArticle =$this->db->query("DELETE FROM article WHERE article.id_article = $this->idArticle");

        return $dArticle;
    }
  

    public function uptdateArticle()
    {
        $uArticle = $this->db->prepare("UPDATE article SET nom_article=?,prix=?,ref_article=?,stock=?,description_article=?,id_cat=? WHERE id_article=?");
        return $uArticle;
    }
    public function modifPhotoModel()
    {
        $photo = $this->db->prepare("UPDATE article SET photo_article=? WHERE id_article = ?");
        return $photo;
    }

    public function getCat()
    {
        $cat = $this->db->query("SELECT * FROM categorie")->fetchAll();
        return $cat;
    }

    public function setArticle()
    {
        $insertArticle = $this->db->prepare("INSERT INTO article (nom_article,description_article,prix,stock ,id_cat,ref_article) VALUES(?,?,?,?,?,?)");
        return $insertArticle;
    }
    public function setCoffret()
    {
        $coffret = $this->db->prepare("INSERT INTO coffret (id_article,id_coffret,nom_coffret) VALUES (?,?,?)");
        return $coffret;
    }
    public function getArticleCoffre()
    {
        $article = $this->db->query("SELECT * FROM article WHERE id_cat = 4")->fetchAll();
        return $article;
    }
    public function getListArticle()
    {
        $article = $this->db->query("SELECT nom_article,id_article FROM article WHERE NOT id_cat = 4")->fetchAll();
        return $article;
    }
   public function showNomCoffret()
   {
       $article = $this->db->query("SELECT DISTINCT nom_coffret,id_coffret FROM coffret")->fetchAll();
       return $article;
   }
   public function getListeArticleCoffret($id)
   {
       $article = $this->db->query("SELECT article.nom_article,article.id_article,coffret.* FROM coffret INNER JOIN article on coffret.id_article = article.id_article Where id_coffret = $id")->fetchAll();
       return $article;
   }
   public function deleteArticleCoffret($id)
   {
       $article = $this->db->query("DELETE FROM coffret WHERE id_article = $id");
       return $article;
   }
   public function verufArticleCoffret()
   {

       $coffret = $this->db->query("SELECT count(*) FROM coffret WHERE id_article = $this->articlePourCoffret AND id_coffret= $this->id_coffret")->fetch();
       return $coffret;
   }
   
}
