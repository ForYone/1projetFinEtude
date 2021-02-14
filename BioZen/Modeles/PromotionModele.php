<?php


class PromotionModele
{
    
    public function promotionUtilisateur()
    {

        $lesCoffret=$this->db->query("SELECT * FROM article WHERE id_cat=4 ")->fetchAll();

        return $lesCoffret;
        
    }

   

    public function promotionCoffretUtilisateur($id)
    {
        $promos=$this->db->query("SELECT * FROM article WHERE id_article='$id' ")->fetch();

         return $promos;   
         
        
    }

    public function promotionArticleUtilisateur($id)
    {

        if($promosArticles=$this->db->query("SELECT * FROM article INNER JOIN coffret ON coffret.id_article=article.id_article WHERE id_coffret='$id' ")->fetchAll())
        {
           
            
         return $promosArticles;   
        }

        
    }

    public function promotionPanier($utilisateur,$article,$roleUtil,$qte,$stock)
    {
        
            if($voirArticle=$this->db->query("SELECT * FROM article WHERE id_article=$article")->fetch(PDO::FETCH_OBJ))
            {
                $prix=$voirArticle->prix;
                $nom_article=$voirArticle->nom_article;
                $ref=$voirArticle->ref_article;
                $photo=$voirArticle->photo_article;
                $prix_total=$prix*$qte;
                

                 if($roleUtil==2)
                {
                        $promo=$this->db->prepare("INSERT INTO panier_eep(id_eep,article_panier,ref_article,prix_article,photo_article,qte,prix_article_total) VALUES(?,?,?,?,?,?,?) ");

                        $promo->execute(array($utilisateur,$nom_article,$ref,$prix,$photo,$qte,$prix_total));
                        if($promo->execute(array($utilisateur,$nom_article,$ref,$prix,$photo,$qte,$prix_total)))
                        {
                            $sqlPrepare="UPDATE article SET stock='$stock' WHERE id_article='$article'";
                            $sql =$this->db->query($sqlPrepare);
                        }
                }
            }
    }

} 

