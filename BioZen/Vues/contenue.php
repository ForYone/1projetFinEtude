<!--Contenu de la page d'accueil-->

<?php
if (isset($_SESSION['id_role'])) {

  if ($_SESSION['id_role'] == 2) { ?>
    <div class="contenue-flex">

      <!-----------Espace entrprise-------------------------------------->
      <div class="contenue">
        <div class="div-img"> <img class='img-catalogue' src='image/image_sans_fond_blanc/logo_1_sans_bg_sans_bz.png'></div>
        <a href="index.php?page=p_entreprise" class="lien-style">Catalogue Entreprise</a>

      </div>

      <!----------------Espace salarie------------------>
      <div class="contenue">
        <div class="div-img"> <img class='img-catalogue' src='image/image_sans_fond_blanc/logo_2_sans_bg_sans_bz.png'></div>
        <a href="index.php?page=catalogueP" class="lien-style">Catalogue Personnel</a>

      </div>

    </div>
  <?php } elseif ($_SESSION['id_role'] == 1) {
  ?>
    <div class="contenue-flex">

      <!-----------Espace entrprise-------------------------------------->
      <div class="contenue">
        <div class="div-img"> <img class='img-catalogue' src='image/image_sans_fond_blanc/logo_1_sans_bg_sans_bz.png'></div>
        <button class="lien-style">Catalogue Entreprise</button>

      </div>

      <!----------------Espace salarie------------------>
      <div class="contenue">
        <div class="div-img"> <img class='img-catalogue' src='image/image_sans_fond_blanc/logo_2_sans_bg_sans_bz.png'></div>
        <a href="index.php?page=catalogueP" class="lien-style">Catalogue Personnel</a>

      </div>

    </div>
  <?php } elseif ($_SESSION['id_role'] == 3) {
  ?>
    <div class="contenue-flex">

      <!-----------Espace entrprise-------------------------------------->
      <div class="contenue">
        <div class="div-img"> <img class='img-catalogue' src='image/image_sans_fond_blanc/logo_1_sans_bg_sans_bz.png'></div>
        <a href="index.php?page=p_entreprise" class="lien-style">Catalogue Entreprise</a>

      </div>

      <!----------------Espace salarie------------------>
      <div class="contenue">
        <div class="div-img"> <img class='img-catalogue' src='image/image_sans_fond_blanc/logo_2_sans_bg_sans_bz.png'></div>
        <a href="index.php?page=catalogueP" class="lien-style">Catalogue Personnel</a>

      </div>

    </div>
  <?php
  }
} else {
  ?>
  <div class="contenue-flex">

    <!-----------Espace entrprise-------------------------------------->
    <div class="contenue">
      <div class="div-img"> <img class='img-catalogue' src='image/image_sans_fond_blanc/logo_1_sans_bg_sans_bz.png'></div>
      <button  class="lien-style connexion">Catalogue Entreprise</button>

    </div>

    <!----------------Espace salarie------------------>
    <div class="contenue">
      <div class="div-img"> <img class='img-catalogue' src='image/image_sans_fond_blanc/logo_2_sans_bg_sans_bz.png'></div>
      <button class="lien-style connexion">Catalogue Personnel</button>

    </div>

  </div>
<?php } ?>