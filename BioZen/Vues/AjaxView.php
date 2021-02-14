<?php

class AjaxView{

    public function ajaxRender($article){
        $opt = '';
        while ($row = $article->fetch()) {
            //var_dump($row);
            $prix_ttc=$row['prix']*1.2;
            $opt .= '
            <button class="btnStd btnFermer ferme">X</button>
            
            <div class="fProd">
            <div class="descr">
                <img style="width:300px" src="Photo/' . $row["photo_article"] . '">
            </div>
                <div class="description">
                    <h4 class="titreFiche">' . $row["nom_article"] . '</h4>
                    <p style="font-size: x-large; margin:0">' . $prix_ttc . " " . "€" . '</p>
                    <p style="margin-bottom: 0">Description du produit</p>
                    <p style="font-size: small;margin-top: 0">Réf:' . $row["ref_article"] . ' </p>
                    <p class="message">' . $row["description_article"] . '</p>
                    <div class="addPanier">
                    <form method="POST" action="index.php?page=addPanier&id='.$row["id_article"].'">

                    <input type="hidden" name="id" value="'.$row['id_article'].'" />
                    <input id="stock" type="hidden" name="stock" value="'. $row['stock'] .'" />

                    <input id="nom" type="hidden" name="nom" value="'.$row['nom_article'] .'" />
                    <input id="ref" type="hidden" name="ref" value="'. $row['ref_article'] .'" />
                    <input id="prix" type="hidden" name="prix" value="'. $row['prix'] .'" />
                    <input id="photo" type="hidden" name="photo" value="'. $row['photo_article'] .'" />
                        <input id="qteMoins" name="qteMoins" type="button" value="-" />
                        <input id="qteInput" name="qte" type="int" value="0" />
                        <input id="qtePlus" name="qtePlus" type="button" value="+" />
                        <br><br>
                        <input class="ajouterPanier" name="ajouterPanier" type="submit" value="Ajouter au panier" /> 
                      </form>
       
                </div>
   
            </div>';
    
            echo $opt;
        }
    }
}