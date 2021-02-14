<?php


class PanierVue
{

    /**Vue Panier ****/
    public function vuePanier($panier, $prixTotale = '')
    {

        echo "<div><p id='titre-panier'>Votre panier</p>
        <br><br>
        
        
        <div class='table-panier'>
        <table class='panier-table'>

        <tr>
        <th id='th-vide'></th>
        <th>Article</th>
        <th>Prix unitaire </th>
        <th>QTE</th>
        <th>Sous-Total </th>
        </tr>";
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 2) {
                $tr = "<tr>";

                foreach ($panier as $val) {


                    $tr .= "<td><a class='sup-croix' href='index.php?page=panier&id_d=" . $val['id_panier_eep'] ."&token=". $_SESSION['token']. "'>×</a><img src='Photo/" . $val['photo_article'] . "'></td><td>" . $val['article_panier'] . " - " . $val['ref_article'] . "</td><td>" . $val['prix_article'] . "€</td><td>" . $val['qte'] . "</td><td>" . number_format(($val['prix_article'] * $val['qte']), 2) . "€</td></tr>";
                }
                echo $tr .= "</tr>";
            }
            if ($_SESSION['id_role'] == 1) {
                $tr = "<tr>";

                foreach ($panier as $val) {


                    $tr .= "<td><a class='sup-croix' href='index.php?page=panier&id_d=" . $val['id_panier_salarie'] ."&token=". $_SESSION['token']. "'>×</a><img src='Photo/" . $val['photo_article'] . "'></td><td>" . $val['article_panier'] . " - " . $val['ref_article'] . "</td><td>" . $val['prix_article'] . "€</td><td>" . $val['qte'] . "</td><td>" . number_format(($val['prix_article'] * $val['qte']), 2,'.', '') . "€</td></tr>";
                }
                echo $tr .= "</tr>";
            }
            
        }

        echo "</table></div><br>";
        /**Prix [H.t] [T.T.C] [T.V.A] *****/
        echo "<div class='totale-panier'>
        <h2>Montant de votre panier</h2>";
        $ttc = number_format(($prixTotale[0][0] + (($prixTotale[0][0] / 100) * TVA)), 2,'.', '');
        $tva = number_format((($prixTotale[0][0] / 100) * TVA), 2,'.', '');
        echo " <table class='table-MontantPanier'>
       <tr><td class='td-align'> Prix H.T :</td><td> <span class='font-montant'>" . $prixTotale[0][0] . " €</span></td></tr>
       
       <tr><td class='td-align'>  Montant T.V.A :</td><td> <span class='font-montant'>" . $tva . " €</span></td></tr>
       
       <tr><td class='td-align'> Prix T.T.C :</td><td> <span class='font-montant'>" . $ttc . " €</span></td></tr>";
        echo "</table>";
        if ($panier[0] != "") {

            echo "<form  name='taux' action='index.php?page=commande' method='POST'><br>
            <input type='hidden' name='tva' value='" . $tva . "' />
            <input type='hidden' name='ttc' value='" . $ttc . "' />
           <button class='view_data' type='submit' >Commander</button> 
            </form>";
        }


        echo " </div>";

        echo "</div> <br><br> <br><br> <br><br> <br><br><br><br> <br><br> <br><br> <br><br>";
    }

    public function monPanierVide()
    {

        echo "<p style='text-align:center;'>Votre panier est vide</p>";
        
    }
}
