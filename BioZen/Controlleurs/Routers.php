<?php



class Routers
{
    public $page;


    public function route($page)
    {
        $this->page = $page;

        switch ($this->page) {
            case "header":
                include("Controlleurs/PubActiveController.php");
                $action = new ActivePubController();
                $action->activerAction();
                include 'Vues/header.php';
                break;
            case "accueil":
                include "Vues/contenue.php";
                break;
            case "footer":
                include "Vues/footer.php";
                break;
            case "p_entreprise":
                include "Controlleurs/Offre_controlleur.php";
                break;
            case "panier":
                include "Controlleurs/PanierControlleur.php";
                break;
            case "commande":
                include "Controlleurs/CommandeControlleur.php";
                break;
            case "a_propos":
                include "Controlleurs/AProposControlleur.php";
                break;
            case "affiche-prod":
                include "Controlleurs/ModaleArticleControlleur.php";
                break;
                /**Administarteur route */

            case "admin":
                include "Controlleurs/AdminControleur.php";
                break;
            case "pageAdmin":
                include "Admin/Vues/index.php";
                break;
            case "gestion-articles":
                include "Admin/Vues/gestion-articles.php";
                break;
            case "gestion-coffres":
                include "Admin/Vues/gestion-coffres.php";
                break;
            case "ajoutArticleAdmin":
                include "Admin/Controleurs/AjoutArticleControleur.php";
                break;
            case "modifPhoto":
                include "Admin/Controleurs/PhotoModifControleur.php";
                break;
            case "ajout-article-coffret":
                include "Admin/Controleurs/CoffretControleur.php";
                break;
                /***** 2*/
            case 'lesUtilisateur':
                include('Admin/Controleurs/AdminVoirUtilisateur.php');
                break;
            case 'inscrieep':
                include('Admin/Controleurs/AdminInscriptionEep.php');
                break;
            case 'suppEep':
                include('Admin/Controleurs/AdminSuppEep.php');
                break;
            case 'suppSal':
                include('Admin/Controleurs/AdminSuppSal.php');
                break;
            case 'modifSal':
                include('Admin/Controleurs/AdminModifSal.php');
                break;
            case 'modifEep':
                include('Admin/Controleurs/AdminModifEep.php');
                break;
            case 'voirST':
                include('Admin/Controleurs/AdminVoirST.php');
                break;
            case 'suppST':
                include('Admin/Controleurs/AdminSuppST.php');
                break;
            case 'validST':
                include('Admin/Controleurs/AdminValidST.php');
                break;
            case 'suppAdmin':
                include('Admin/Controleurs/AdminSuppAdmin.php');
                break;
            case 'addAdmin':
                include('Admin/Controleurs/AdminInscriAdmin.php');
                break;
                /**3 */
            case "promo":
                include("Admin/Controleurs/GererMsgPromoController.php");
                $action = new GererMsgPromoController();
                $action->promoAction();
                break;

            case "pub":
                include("Admin/Controleurs/GererMsgPromoController.php");
                $action = new GererMsgPromoController();
                $action->pubAction();
                break;

            case "addPub":
                include("Admin/Controleurs/GererMsgPromoController.php");
                $action = new GererMsgPromoController();
                $action->addPubAction();
                break;

            case "activerPub":
                include("Admin/Controleurs/GererMsgPromoController.php");
                $action = new GererMsgPromoController();
                $action->activerPromoAction();
                break;

            case "desactiverPub":
                include("Admin/Controleurs/GererMsgPromoController.php");
                $action = new GererMsgPromoController();
                $action->desactiverPromoAction();
                break;

            case "modifPub":
                include("Admin/Controleurs/GererMsgPromoController.php");
                $action = new GererMsgPromoController();
                $action->modifPubAction();
                break;

            case "supPub":
                include("Admin/Controleurs/GererMsgPromoController.php");
                $action = new GererMsgPromoController();
                $action->supPubAction();
                break;

            case "gererActu":
                include("Admin/Controleurs/GererActuController.php");
                $action = new GererActuController();
                $action->gererAction();
                break;

            case "addActu":
                include("Admin/Controleurs/GererActuController.php");
                $action = new GererActuController();
                $action->addActuAction();
                break;

            case "modifActu":
                include("Admin/Controleurs/GererActuController.php");
                $action = new GererActuController();
                $action->modifAction();
                break;

            case "modifier":
                include("Admin/Controleurs/GererActuController.php");
                $action = new GererActuController();
                $action->modifActuAction();
                break;

            case "supActu":
                include("Admin/Controleurs/GererActuController.php");
                $action = new GererActuController();
                $action->supAction();
                break;

            case 'gererBdc':
                include("Admin/Controleurs/GererBdcController.php");
                $action = new GererBdcController();
                $action->OneBdcAction();
                break;

            case 'allbdc':
                include("Admin/Controleurs/GererBdcController.php");
                $action = new GererBdcController();
                $action->allBdcAction();
                break;


            case "valBdc":
                include("Admin/Controleurs/GererBdcController.php");
                $action = new GererBdcController();
                $action->valBdcAction();
                break;

            case "supBdc":
                include("Admin/Controleurs/GererBdcController.php");
                $action = new GererBdcController();
                $action->supBdc();
                break;

            case "bdcArchive":
                include("Admin/Controleurs/GererBdcController.php");
                $action = new GererBdcController();
                $action->allBdcArchive();
                break;

                /******************************************** */
            case 'catalogueP':
                include("Controlleurs/Catal_S_Controller.php");
                break;
            case 'commande':
                include("Controlleurs/BdcController.php");
                break;

            case 'actu':
                include("Controlleurs/ActuController.php");
                break;
            case 'addPanier':
                include("Controlleurs/AddPanierController.php");
                break;

                /***************************************** */
            case 'contact':
                include('Vues/ContactView.php');
                break;
            case 'connexion':
                include('Controlleurs/ConnexionControleur.php');
                break;

            case 'profil':
                include('Controlleurs/ProfilControleur.php');
                break;

            case 'inscription':
                include('Controlleurs/InscriptionControleur.php');
                break;

            case 'promotion':
                include('Controlleurs/PromotionControleur.php');
                break;
            case 'promoA':
                include('Controlleurs/PromoArticleControleur.php');
                break;
            case 'modifMdp':
                include('Controlleurs/EnvoiMailMdp.php');
                break;
            case 'deco':
                include('Controlleurs/DecoControleur.php');
                break;
            case 'modifierMdp':
                include('Controlleurs/ModifMdpControleur.php');
                break;


            default:
                header("Refresh:0.2;url=index.php?page=accueil");
        }
    }
}
