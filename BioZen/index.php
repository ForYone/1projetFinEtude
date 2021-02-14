<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ob_start();
include "config/config.php";
include "Modeles/ConnexionBdd.php";
include "Controlleurs/Routers.php";


$route = new Routers();

$page = (isset($_GET['page'])) ? $_GET['page'] : '';

$route->route("header");
$route->route($page);
$route->route("footer");

ob_end_flush();


function title()
{
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case "accueil":
                echo "BioZen - Acceuil";
                break;
            case "p_entreprise":
                echo "BioZen - Catalogue Entreprise";
                break;
            case "panier":
                echo "BioZen - Votre Panier";
                break;
            case "commande":
                echo "BioZen - Votre Commende";
                break;
            case "a_propos";
                echo "BioZen - Notre Histoire";
                break;
            case "admin":
                echo "BioZen - Connexion Administrateur";
                break;
            case "pageAdmin":
                echo "BioZen - Administrateur";
                break;
            case "promo":
                echo "BioZen - Promotion";
                break;
            case "catalogueP":
                echo "BioZen - Catalogue Personnel";
                break;
            case "profil":
                echo "BioZen - Votre Profil";
                break;
            case "actu":
                echo"BioZen - Notre Actualités";
                break;
            default:
                echo "BioZen";
        }
    }
}
