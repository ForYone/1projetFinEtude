<?php
include "Vues/page_entreprise.php";
include "Modeles/Offre_model.php";



class OffreControlleur extends OffreModel
{
    protected $db;
    protected $id;
    protected $id_2;
    protected $numCommandeGenerate;
    protected $nomArticle;
    protected $prix;
    protected $refArticle;
    protected $photoArticle;
    protected $qte;
    protected $stock;
    protected $prixArticleTotale;
    protected $idSession;
    protected $numcommandeSession;


    public function __construct()
    {
        $this->db =  ConnexionBdd::bdd();
    }

    public function offreControlleurFunc()
    {
        if (isset($_SESSION['id_role'])) {

            $pageEntreprise = new PageEntreprise();

            $prestation = $this->dataOffrePrestation();
            $seminaire = $this->dataOffreSeminaire();
            $produit = $this->dataOffreProduit();


            $pageEntreprise->pageEntrepriseFunc($prestation, $seminaire, $produit);

            $this->db = null;

            if ($_SESSION['id_role'] == 2) {
                if ($this->sendToPAnierEep()) {

                    header("Refresh:0.2;url=index.php?page=p_entreprise");
                }
            } else {
                return false;
            }
        } else {
            header("Refresh:0.2;url=index.php?page=accueil");
        }
    }

    private function sendToPAnierEep()
    {
        $pageEntreprise = new PageEntreprise();

        if (isset($_GET['id_2'])) {
            $this->nomArticle = $_POST['nom_article'];
            $this->prix = $_POST['prix'];
            $this->refArticle = $_POST['ref_article'];
            $this->photoArticle = $_POST['photo_article'];
            $this->qte = $_POST['qte'];
            $this->id_2 = $_GET['id_2'];
            $this->stock = $_POST['stock'];
            $this->idSession = $_SESSION['id'];
            $this->numCommandeGenerate = (RAND(1, 99999999999999) + time());
            $_SESSION['num_commande'] = $this->numCommandeGenerate;
            $this->__construct();
            $panierEep = $this->panierEep();
            $articlePanierExiste = $this->verifArticleEpp();



            if ($articlePanierExiste[0] == 1) {

                $pageEntreprise->erreurMessage();
                header("Refresh:2;url=index.php?page=p_entreprise");
                
                return false;
            } else {
                if ($this->qte != '' && $this->qte > 0 && $this->qte <= $this->stock) {
                    if (preg_match("#^[0-9]+$#", $this->qte)) {

                        $this->prixArticleTotale = ($this->prix * $this->qte);

                        if ($panierEep->execute(array(
                            $this->nomArticle, $this->refArticle, $this->prix, $this->prixArticleTotale, $this->photoArticle, $this->qte, $this->idSession))
                            and  $this->numCommande()->execute(array($this->numCommandeGenerate, $this->idSession))
                        ) {
                           
                            $this->db = null;
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            }
        }
    }
}

$offreControlleur = new OffreControlleur();
$offreControlleur->offreControlleurFunc();
