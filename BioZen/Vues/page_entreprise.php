<?php

class PageEntreprise
{

    /**Affiche les categories avec leur articles */
    public function pageEntrepriseFunc($prestation, $seminaire, $produit)
    {

        echo "
     <p class='page-titre-entreprise'>Catalogue Entreprise</p>

<br><br><br>
<div class='style-grid'>

<div class='flex-page-entreprise'>
    <div id='cats' class='contenu-offre'>
    
    <p class='style-cat'>Prestations</p>
    <div class='parent-div-cat-cont'>
        <div class='div-cat-cont'>";


        foreach ($prestation as $val) {

            echo " 
<div class='article'> 
    <div><img src='Photo/" . $val['photo_article'] . "'/></div>
    <div class='preview-articl'>" . $val['nom_article'] . "<br><br>
    <span class='span-btn-voir'><input type='button' class='view_data' name='voir_prod' value='Voir' id='" . $val['id_article'] . "'/></span> 
    </div>
</div>";
        }
        echo "</div></div>";



        echo "<p class='style-cat'>Séminaires</p>
        <div class='parent-div-cat-cont'>
        <div class='div-cat-cont'>";


        foreach ($seminaire as $val) {

            echo " <div class='article'> <div><img src='Photo/" . $val['photo_article'] . "'/></div>
                   <div class='preview-articl'>" . $val['nom_article'] . "<br><br>
                <span class='span-btn-voir'><input type='button' class='view_data' name='voir_prod' value='Voir' id='" . $val['id_article'] . "'/></span> 
                </div>
                </div>";
        }
        echo "</div></div>";

        echo "<p class='style-cat'>Produits</p>
        <div class='parent-div-cat-cont'>
        
        <div class='div-cat-cont'>";

        foreach ($produit as $val) {

            echo "<div class='article'><div><img src='Photo/" . $val['photo_article'] . "'/></div><div class='preview-articl'>" . $val['nom_article'] . "<br><br>
                <span class='span-btn-voir'><input type='button' class='view_data' name='voir_prod' value='Voir' id='" . $val['id_article'] . "'/></span></div></div>";
        }

        echo "</div></div>
        </div></div>";

        /** MODALE ***/
        echo "<div id='produit' class='modale-offre'>


        </div> </div>";
    }

    /**Modale de l'article cliqué */
    public function alimMOdaleEep($article)
    {
        foreach ($article as $val) {

            /**Affiche l'article cliquer */
            echo "<form method ='POST' action ='index.php?page=p_entreprise&id_2=" . $val['id_article'] . "'>";
            echo "<span id='supp-croix' class='sup-croix'>×</span>
            <h2>" . $val['categorie'] . "</h2><hr><h4> " . $val['ref_article'] . " - " . $val['nom_article'] . "</h4><br>";
            echo "<div class='flex-modale-produit'><div><img class='img-modale' src='Photo/" . $val['photo_article'] . "'></div>";
            echo "<div class='content-description'> <h4>Description :</h4>
            <p class='padding-description'>" . $val['description_article'] . "</p></div></div><br>";
            echo " <div class='div-prix-qte'><div><span><b> Prix H.T : " . $val['prix'] . "€</b></span><br><br>
            <label for='qte' class='qte-eep'><b>Quantité</b> :</label>
            <input id='input-qte' type='number' name='qte' id='qte' required><br><br></div></div>";
            echo "<div id='input-aj-panier'><input class='view_data' type = 'submit' value='Ajouter au panier'></div>";

            /**Recuperation des données pour le panier */
            echo "
            <input type='hidden' name='nom_article' value='" . $val['nom_article'] . "' >
            <input type='hidden' name='prix' value='" . $val['prix'] . "' >
            <input type='hidden' name='photo_article' value='" . $val['photo_article'] . "' >
            <input type='hidden' name='ref_article' value='" . $val['ref_article'] . "' >
            <input type='hidden' name='stock' value='" . $val['stock'] . "' >";
            echo "</form>";
        }
    }


    public function erreurMessage()
    {

        echo "<p class='msge'>Vous posedez déjà cet article dans votre panier</p>";
    }
}
