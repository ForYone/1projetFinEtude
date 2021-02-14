<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="JQuery/jquery-3.4.1.js"></script>
  <script src="Js/js_script_dj.js"></script>
  <script src="Js/js_page_entreprise.js"></script>
  <script src="Js/js_requetteAjax.js"></script>
  <script src="Js/securiteForms.js"></script>
  <script src="Admin/Js/js_functionUp.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link rel="stylesheet" href="Css/style_contenue.css">
  <link rel="stylesheet" href="Css/media_contenue.css">
  <link rel="stylesheet" href="Css/style_footer.css">
  <link rel="stylesheet" href="Css/media_footer.css">
  <link rel="stylesheet" href="Css/style_page_entreprise.css">
  <link rel="stylesheet" href="Css/style_panier.css">
  <link rel="stylesheet" href="Css/style_Apropos.css">
  <link rel="stylesheet" href="Css/style_t.css">
  <link rel="stylesheet" href="Css/media_t.css">
  <link rel="stylesheet" href="Css/style_full.css">
  <link rel="stylesheet" href="Css/style_promo.css">
  <link rel="stylesheet" href="Css/style_bdc.css">
  <link rel="stylesheet" href="Css/style_admin.css">
  <link rel="stylesheet" href="Css/style_actu.css">
  <link rel="stylesheet" href="Css/style_ModifMdp.css">
  <link rel="stylesheet" href="Css/media_mdpOublie.css">
  <link rel="stylesheet" href="Bootstrap/sb-admin-2.css">
  <link rel="stylesheet" href="Css/style_modifAdminUser.css">

  <title><?php title(); ?></title>
</head>

<body>
  <!--Div Ecran-->
  <div class='div-hide'></div>
  <!---->
  <header>
    <?php if (isset($_SESSION['id_role'])) {
      if ($_SESSION['id_role'] != 3) {
    ?>
        <div class="marketing">
          <img class="logo" src="image/image_sans_fond_blanc/logo_biozen.png">

          <span class="panier"><a href="index.php?page=panier">
              <div class="pan"><i class="fas fa-2x fa-shopping-cart"></i>
                <div class="txtpanier">Votre panier de livraison<p class="pp">Livraison offerte</p>
                </div>
              </div>
            </a></span>
        </div>

        <div class="pub">
          <?php if (isset($_SESSION['id_role'])) { ?>
            <p class="txtpub defil-txt">
              <a href="?page=promotion">
                <?php

                if (isset($GLOBALS['messagePub'])) {
                  echo $GLOBALS['messagePub'];
                } else {
                  echo "Bienvenue sur le site biozen";
                }
                ?></a></p>
          <?php } else { ?>
            <p class="txtpub defil-txt connexion">
              <a href="#">
                <?php
                if (isset($GLOBALS['messagePub'])) {
                  echo $GLOBALS['messagePub'];
                } else {
                  echo "Bienvenue sur le site biozen";
                }
                ?></a></p>
          <?php } ?>
        </div>
      <?php
      }
    } else { ?>
      <div class="marketing">
        <img class="logo" src="image/image_sans_fond_blanc/logo_biozen.png">
      </div>
      <div class="pub">
        <?php if (isset($_SESSION['id_role'])) { ?>
          <p class="txtpub defil-txt">
            <a href="?page=promotion">
              <?php

              if (isset($GLOBALS['messagePub'])) {
                echo $GLOBALS['messagePub'];
              } else {
                echo "Bienvenue sur le site biozen";
              }
              ?></a></p>
        <?php } else { ?>
          <p class="txtpub defil-txt connexion">
            <a href="#">
              <?php
              if (isset($GLOBALS['messagePub'])) {
                echo $GLOBALS['messagePub'];
              } else {
                echo "Bienvenue sur le site biozen";
              }
              ?></a></p>
        <?php } ?>
      </div>

    <?php } ?>
    <!-------------------------------------->
    <div class="menu-cpt">

      <img class="icon-menu btnMenu" id="btnMenu" src="https://img.icons8.com/android/24/000000/menu.png" />

      <div id="nav" class="menu">


        <div class="sommaire">

          <div class="btn bar-icon"> <a href="index.php?page=accueil">Accueil</a> </div>

          <div class="btn prp bar-icon"> <a href="index.php?page=a_propos"> A propos </a> </div>

          <div class="btn bar-icon"> <a href="index.php?page=actu">Actualités</a> </div>



          <?php if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
          ?> 
              <div class="btn bar-icon"> <a id="header-pageA" href="index.php?page=pageAdmin">Page Administrateur</a> </div>
            <?php } elseif ($_SESSION['id_role'] == 2) {
            ?>
              <div class="btn bar-icon"> <a href="index.php?page=p_entreprise">Catalogue Entreprise</a></div>
            <?php } elseif ($_SESSION['id_role'] == 1) {
            ?>
              <div class="btn bar-icon"><a href="index.php?page=catalogueP">Catalogue Personnel</a></div>
            <?php } else { ?>
              <div class="btn bar-icon"> <a href="index.php?page=admin">Connexion Administrateur</a> </div>
            <?php }
          } else { ?>
            <div class="btn bar-icon"> <a href="index.php?page=admin">Connexion Administrateur</a> </div>
          <?php } ?>
        </div>

        <div class="acces">
          <?php
          if (isset($_SESSION['nom'])) {
            echo
              '
          <div class="userProfil">
                <div class="btn bar-icon" id="menuCo"> <input type="button" class="nomCo" value="'. $_SESSION['nom'] .'"/> </div>
                    <div class="sous-menu">
                    <div class="aprofil"><p><a href="index.php?page=profil">Mon Profil</a>
                    <a href="index.php?page=deco">Deconnexion</a></div>
                 </div>
          </div>      
                  ';
          }
          /******** */
          elseif (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
              echo
                '
          <div class="userProfil">
                <div class="btn bar-icon" id="menuCo"> <input type="button" class="nomCo" value="'. $_SESSION['nom_admin'] .'"/> </div>
                    <div class="sous-menu">
                    <div class="aprofil"><a href="index.php?page=profil">Mon Profil</a>
                    <a href="index.php?page=deco">Deconnexion</a></div>
                 </div>
          </div>      
                  ';
            }
          }
          /****** */
          else {
            echo '<div class="btn btn-accs bar-icon"> <a href="#" class="connexion">Connexion</a> </div>';
          }

          ?>
          <div class='btn btn-co bar-icon'> <a href='#' class='contact'>Contact</a></div>

        </div>
      </div>
    </div>
    

  </header>
  
  <!--modalConnexion-->

  <div id='modalConnexion' class='modalConnexion'>
    <div class='xtitre'>
      <h3 class='titreConnexion'>connexion</h4>
        <span><a href='#' id='fermetureCo' class='fermetureModal'>X</a></span>
    </div>
    <div class='sousModalConnexion'>
      <div class='entreprise' id='coEntreprise'>
      </div>
      <span class='borderContact'> </span>
      <div class='salarie' id='coSalarie'>
      </div>
    </div>

  </div>

  <!--Modal Contact-->

  <div id='modalContact' class='modalContact'>

  </div>
  <span id="page-top"></span>