<?php 

class Catal_S_Model
{
    public $db;
   public function __construct($db)
   {
       $this->db = $db;
   }

    public function getArticles()
    {
        $req=("SELECT * FROM article ");
        $articles = $this->db->query($req);
        return $articles;
        
    }

    public function getArticle($id)
    {
        //if ($id!=''){
            $req=("SELECT * FROM article WHERE id_article=$id ");
            $article = $this->db->query($req);
            return $article;
            
       // }
       
    }
}