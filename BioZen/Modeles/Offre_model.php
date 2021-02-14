<?php

class OffreModel
{
    /**SElection des categories pour les afficher dans le catalogues */
    public function dataOffrePrestation()
    {

        $offre = $this->db->query("SELECT * FROM article WHERE id_cat=1");
        return $offre;
    }
    public function dataOffreSeminaire()
    {

        $offre = $this->db->query("SELECT * FROM article WHERE id_cat=2");
        return $offre;
    }

    public function dataOffreProduit()
    {

        $offre = $this->db->query("SELECT * FROM article WHERE id_cat=3");
        return $offre;
    }

    /*************************************************************************** */

    /***********Gestion du stock**************/
    /**Partie Entreprise** */
    public function article($id)
    {

        $offre = $this->db->query("SELECT article.stock FROM article WHERE id_article=$id");
        return $offre;
    }
    public function updateStockArticleEep($id)
    {
        $stock = $this->db->prepare("UPDATE article INNER JOIN panier_eep ON article.nom_article = panier_eep.article_panier SET article.stock=article.stock - panier_eep.qte where id_eep = $id");
        return $stock;
    }
    public function getQtePanierEep($id)
    {
        $qetPanierEep = $this->db->query("SELECT article.nom_article,article.stock,article.id_article,panier_eep.id_panier_eep,panier_eep.qte FROM article INNER JOIN panier_eep ON article.nom_article = panier_eep.article_panier WHERE id_panier_eep =$id ")->fetchAll();
        return $qetPanierEep;
    }
    public function resetStockEep()
    {
        $stock = $this->db->prepare("UPDATE article INNER JOIN panier_eep ON article.nom_article = panier_eep.article_panier SET article.stock=? WHERE id_panier_eep=? ");
        return $stock;
    }

    /**Partie Salarie** */
    public function updateStockArticleSalarie($id)
    {
        $stock = $this->db->prepare("UPDATE article INNER JOIN panier_salarie ON article.nom_article = panier_salarie.article_panier SET article.stock=article.stock - panier_salarie.qte where id_salarie = $id");
        return $stock;
    }
    public function getQtePanierSalarie($id)
    {
        $qetPaniersalarie = $this->db->query("SELECT article.nom_article,article.stock,article.id_article,panier_salarie.id_panier_salarie,panier_salarie.qte FROM article INNER JOIN panier_salarie ON article.nom_article = panier_salarie.article_panier WHERE id_panier_salarie =$id ")->fetchAll();
        return $qetPaniersalarie;
    }
    public function resetStockSalarie()
    {
        $stock = $this->db->prepare("UPDATE article INNER JOIN panier_eep ON article.nom_article = panier_eep.article_panier SET article.stock=? WHERE id_panier_eep=? ");
        return $stock;
    }
    /****************************************************************************** */


    /***Selection des articles avec leur categories *************************************/
    protected function allDataOffre()
    {

        $offre = $this->db->query(
            "SELECT article.*,categorie.categorie FROM article 
             INNER JOIN categorie on article.id_cat=categorie.id_cat  WHERE id_article=$this->id");
        return $offre;
    }
    /****************************************************************************** */

    /**Gestion du panier **************************************************************/
    /**Partie Entreprise** */
    protected function panierEep()
    {
        $panier = $this->db->prepare(
            "INSERT INTO panier_eep (article_panier,ref_article, prix_article,prix_article_total,photo_article, qte, id_eep) 
            VALUES(?,?,?,?,?,?,?)");
        return $panier;
    }
    public function getPanierEep($id)
    {

        $panier = $this->db->query("SELECT * FROM panier_eep WHERE id_eep = $id")->fetchAll();
        return $panier;
    }
    protected function verifArticleEpp()
    {
        $panier = $this->db->query("SELECT count(*) FROM panier_eep WHERE article_panier = '$this->nomArticle' 
        AND id_eep= $this->idSession")->fetch();
        return $panier;
    }
    public function deleteArticlePanierEep($id)
    {
        $deleteArticle = $this->db->query("DELETE FROM panier_eep WHERE id_panier_eep=$id");
        return $deleteArticle;
    }
    public function deleteAllArticlePanierEep($id)
    {
        $deleteAllArticle = $this->db->query("DELETE FROM panier_eep WHERE id_eep=$id");
        return $deleteAllArticle;
    }
    /**Partie salarie *******************/
    public function getPanierSalarie($id)
    {

        $panier = $this->db->query("SELECT * FROM panier_salarie WHERE id_salarie = $id")->fetchAll();
        return $panier;
    }
    public function verufArticleSalarie($article, $id)
    {

        $panier = $this->db->query("SELECT count(*) FROM panier_salarie WHERE article_panier = '$article' AND id_salarie= $id")->fetch();
        return $panier;
    }
    public function deleteArticlePanierSalarie($id)
    {
        $deleteArticle = $this->db->query("DELETE FROM panier_salarie WHERE id_panier_salarie=$id");
        return $deleteArticle;
    }
    public function deleteAllArticlePanierSalarie($id)
    {
        $deleteAllArticle = $this->db->query("DELETE FROM panier_salarie WHERE id_salarie=$id");
        return $deleteAllArticle;
    }

    /**************************************************************************** */


    /**Gestion de la commande ****************************************************/
    /**Partie Entreprise *****/
    public function setCommandeEep($ttc, $tva, $id)
    {
        $setCommendeEep = $this->db->prepare("INSERT INTO commande_eep (id_eep,qte,date_commande_eep,ref_article,nom_article,prix_article_total,prix_article,id_panier_eep,total_commande_ttc,total_commande_tva,num_commande_eep) SELECT id_eep,qte,NOW(),ref_article,article_panier,prix_article_total,prix_article,id_panier_eep,$ttc,$tva,num_commande_eep FROM panier_eep WHERE id_eep = $id");
        return $setCommendeEep;
    }

    public function prixTotal($id)
    {
        $prixTotale = $this->db->query("SELECT SUM(prix_article_total) FROM panier_eep WHERE id_eep = $id")->fetchAll();
        return $prixTotale;
    }
    public function numCommande()
    {
        $numCommande = $this->db->prepare("UPDATE panier_eep SET num_commande_eep=? WHERE id_eep=?");
        return $numCommande;
    }
    /*****Partie Salarie ********/
    public function setCommandeSalarie($ttc, $tva, $id)
    {
        $setCommendeSalarie = $this->db->prepare("INSERT INTO commande_salarie (id_salarie,qte,date_commande_salarie,ref_article,nom_article,prix_article_total,prix_article,id_panier_salarie,total_commande_ttc,total_commande_tva,num_commande_salarie) SELECT id_salarie,qte,NOW(),ref_article,article_panier,prix_article_total,prix_article,id_panier_salarie,$ttc,$tva,num_commande_salarie FROM panier_salarie WHERE id_salarie = $id");
        return $setCommendeSalarie;
    }

    public function prixTotalSalarie($id)
    {
        $prixTotal = $this->db->query("SELECT SUM(prix_article_total) FROM panier_salarie WHERE id_salarie = $id")->fetchAll();
        return $prixTotal;
    }
    public function numCommandeSalarie()
    {
        $numCommande = $this->db->prepare("UPDATE panier_salarie SET num_commande_salarie=? WHERE id_salarie=?");
        return $numCommande;
    }

    /****************************************************************************** */

    /**Connexion admin */

    public function connexionAdmin($mail, $mdp)
    {
        $connexionAdmin = $this->db->query("SELECT * FROM administrateur Where mail_admin='$mail'")->fetch(PDO::FETCH_OBJ);

        if (isset($connexionAdmin->mail_admin)) {
            if (password_verify($mdp,$connexionAdmin->mdp_admin)) {
                $_SESSION['id_role'] = $connexionAdmin->id_role;
                $_SESSION['id'] = $connexionAdmin->id_admin;
                $_SESSION['nom_admin'] = $connexionAdmin->nom_admin;
                $_SESSION['mail_admin'] = $connexionAdmin->mail_admin;
                

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
