<?php

class Catal_S_View
{

    public function Catal_S_Render($articles)
    { ?>
        <div class="maPageCatalogue">
            <div class="catContenu">
                <h2 class="titreCat" style="text-align: center">Faites votre choix parmis nos offres catalogue</h2>
                <br><br>
                <div class="pageCat">
                    

                    <div class="liste_offres ">
                        <h3 class="ssTitreCat">Nos Produits </h3>
                        <?php
                        while ($row = $articles->fetchAll()) {
                            for ($i = 0; $i < count($row); $i++) {
                                if ($row[$i]['id_cat'] == 2) {
                                    $id = $row[$i]['id_article']; ?>
                                    <ul>
                                        <li>
                                            <div class="offre">
                                                <a href=""><img style="width:100px" class="imgCatal " src="Photo/<?php echo $row[$i]['photo_article'] ?>" /></a></td>
                                                <div class="offre_gch">
                                                    <p><a class="titreOffre" href=""><?php echo  $row[$i]['nom_article'] ?></a></p>
                                                    <button class="btnStd ouvrir" id="<?php echo $row[$i]['id_article'] ?>">voir plus</button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                        <?php global $row1;
                                    $row1 = $row + $row; //je reconstitue mon tableau car l'action précédente le vide au fur et à mesure
                                }
                            }
                        } ?>
                    </div>




                    <div class="liste_offres ">
                        <h3 class="ssTitreCat">Nos Cures </h3>
                        <?php for ($i = 0; $i < count($row1); $i++) {
                            if ($row1[$i]['id_cat'] == 1) {
                                $id = $row1[$i]['id_article']; ?>
                                <ul>
                                    <li>
                                        <div class="offre">
                                            <a href=""><img style="width:100px" class="imgCatal " src="Photo/<?php echo $row1[$i]['photo_article'] ?>" /></a></td>
                                            <div class="offre_gch">
                                                <p><a class="titreOffre" href=""><?php echo  $row1[$i]['nom_article'] ?></a></p>
                                                <button class="btnStd ouvrir" id="<?php echo $row1[$i]['id_article'] ?>">voir plus</button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                        <?php
                            }
                        }

                        ?>
                    </div>
                </div>


            </div>
        </div>
        </div>
        </div>
        <div class="overlay">
            <div class="ficheProduit">

            </div>
        </div>

        <script>
            $(".ficheProduit").on('click', '#qtePlus', function() {
                var qte = parseInt($("#qteInput").val());
                qte++;
                $("#qteInput").val(qte);

            })

            $(".ficheProduit").on('click', '#qteMoins', function() {
                var qte = parseInt($("#qteInput").val());
                if (qte > 0) {
                    qte--;
                    $("#qteInput").val(qte);
                }
            })

            $(".ouvrir").click(function() {

                var artId = $(this).attr("id");

                $.ajax({
                    url: "Controlleurs/AjaxController.php",
                    method: "POST",
                    data: {
                        artId: artId
                    },
                    success: function(data) {
                        $(".ficheProduit").html(data);
                        $(".overlay").css("display", "flex");




                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(chr.responseText); //Ce code affichera le message d'erreur, ici Message d'erreur.
                    }
                });
            })

            $(".ficheProduit").on("click", ".ferme", function() {
                $(".overlay").css("display", "none");

            });
        </script>
<?php

    }
}
