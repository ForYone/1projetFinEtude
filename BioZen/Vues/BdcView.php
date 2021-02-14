<?php

class BdcView
{
    public function bdcRender($commande)
    {
        $nb = count($commande) - 1;
        $total = 0;
?>
        <div class="container">
            <div style="text-align:center;margin-bottom:10px" class="titreBDC">
                <h3 style="padding:0" class="titreBdc">
                    <?php if (isset($_SESSION['id_role'])) {
                        if ($_SESSION['id_role'] == 3) {
                            echo 'Bon de commande ';
                        } else {
                            echo ' Votre bon de commande <a onclick="imprimer_page()" id="print" class="print" href="#">à imprimer</a>';
                        }
                    ?> </h3><br>


                <?php if (isset($_SESSION['id_role'])) {
                            if ($_SESSION['id_role'] == 3) {
                                echo '<a onclick="imprimer_page()" id="print" class="print" href="#">imprimer</a> <a href="" class="print">Valider et supprimer</a>';
                            }
                        } ?>

            </div>
            <div id="BDC" class="BDC">
                <div class="logoBdc">
                    <div class="adresse1 violet">

                        <p> EEP BIO & ZEN</p>
                        <p>Espace Lurçat<br>2 rue Diderot<br>93200 Saint-Denis<p>
                    </div>
                    <div  class="imgLogoBdc">
                    <img  src="image/image_sans_fond_blanc/logo_sans_fond_blanc1.png">
                    </div>
                    <div class="enteteBDC">
                       
                        <p class="violet date">Date: <?php if (isset($commande[$nb]["num_commande_salarie"])) {
                                         echo date("d-m-Y", strtotime($commande[$nb]["date_commande_salarie"])); ;
                                    } else if (isset($commande[$nb]["num_commande_eep"])) {
                                        echo date("d-m-Y", strtotime($commande[$nb]["date_commande_eep"])); 
                                    } ?></p>

                    </div>
                </div>

                <div class="adresseBDC">
                <p class="violet"> Bon de commande <br> n°<span class="gras"><?php if (isset($commande[$nb]["num_commande_salarie"])) {
                                                    echo $commande[$nb]["num_commande_salarie"];
                                                } else if (isset($commande[$nb]["num_commande_eep"])) {
                                                    echo $commande[$nb]["num_commande_eep"];
                                                } ?></span></p>
                    <div class="adresse2">

                        <p> <?php if (isset($commande[$nb]["num_commande_salarie"])) {
                                echo '<span class="maj">'. $commande[$nb]["nom_salarie"] .'</span>'.' ' . $commande[$nb]["prenom_salarie"];
                            } else if (isset($commande[$nb]["num_commande_eep"])) {
                                echo '<span class="maj">'.$commande[$nb]["nom_eep"] .'</span>';
                            }  ?></p>
                        <p><?php if (isset($commande[$nb]["num_commande_salarie"])) {
                                echo $commande[$nb]["adresse_salarie"];
                            } else if (isset($commande[$nb]["num_commande_eep"])) {
                                echo $commande[$nb]["adresse_eep"];
                            } ?><br>
                            <?php if (isset($commande[$nb]["num_commande_salarie"])) {
                                echo $commande[$nb]["cp_salarie"] . " " . $commande[$nb]["ville_salarie"];
                            } else if (isset($commande[$nb]["num_commande_eep"])) {
                                echo $commande[$nb]["cp_eep"] . " " . $commande[$nb]["ville_eep"];
                            } ?><br>
                            <?php if ((isset($commande[$nb]["num_commande_eep"])) || (isset($commande[$nb]["num_commande_salarie"]))) {
                                echo "Tèl:" . $commande[$nb]["tel_eep"];
                            } ?><br><br>
                            <p>
                    </div>

                </div>
                <div class="articleBDC">
                    <table>
                        <thead>
                            <tr>
                                <th>Référence</th>
                                <th>Désignation</th>
                                <th>Prix unitaire</th>
                                <th>Quantité</th>
                                <th>Sous-total</th>
                            </tr>
                            <thead>
                            <tbody> <?php foreach ($commande as $key => $commande) {
                                    ?> <tr>
                                        <td><?php echo  $commande["ref_article"] ?></td>
                                        <td><?php echo $commande["nom_article"]  ?></td>
                                        <td><?php echo $commande["prix_article"] . " €" ?></td>
                                        <td><?php echo $commande["qte"] ?></td>
                                        <td><?php echo $commande["prix_article_total"]. " €"?></td>
                                            
                                    </tr>
                                <?php
                                        
                                        $total = $total + $commande["prix_article_total"];
                                    } ?>
                            </tbody>
                    </table>
                </div>
                <div class="totalBDC">
                    <table>
                        <tr>
                            <td></td>
                            <td></td>
                            <td> </td>
                            <td></td>
                            <th>Total de la commande</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td> </td>
                            <td>Total H.T</td>
                            <td><?php echo $total . " €";?></td>
                                  
                                

                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td> </td>
                            <td>Dont T.V.A</td>
                            <td><td><?php echo $commande["total_commande_tva"] . " €";?></td>
                                  
                                
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td> </td>
                            <td>Montant total</td>
                             <td><?php echo $commande["total_commande_ttc"] . " €";?></td>
                                
                        </tr>
                    </table>

                </div>

            </div>


        </div>
        <script type="text/javascript">
            function imprimer_page() {
                window.print();
            }
        </script>
    <?php
                    } else {
                        echo ("Page inaccessible <a href='#' class='print connexion'>se connecter</a>");
                    }
                }



            }
