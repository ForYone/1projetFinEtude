<?php

class CoffretVue
{

    public function getNameCoffret($coffret, $listArticle)
    {
        /**Nom Coffret**** */



        foreach ($coffret as $value) {

            echo "<div class='card mb-4 py-3 border-left-primary'>
        
            
              <div class='card-header py-3'>
                <h6 class='m-0 font-weight-bold text-primary text-center'>Ajouter un article dans le coffret : <span style='color:#1cc88a'>" . $value['nom_article'] . "</span></h6>
              </div>
             
            ";

            /**List Article ****/
            echo "
        <div class='card-body'>
        <form method='POST' action='index.php?page=ajout-article-coffret' name='selecList'>
        <select name='articlePourCoffret' class='form-control mb-3'>";

            foreach ($listArticle as $val) {

                echo "<option value='" . $val['id_article'] . "'>" . $val['nom_article'] . "</option>";
            }
            echo "</select>
            <input type='hidden' name='id_coffret' value='" . $value['id_article'] . "'/>
            <input type='hidden' name='nom_coffret' value='" . $value['nom_article'] . "'/>
            <input type='submit' value='Ajouter' class='btn btn-primary'/>
            </form>
            </div>";

            echo "</div>";
        }
    }

    public function nomArticleCoffet($showCoffret)
    {
        echo " <div class='card mb-4 py-3 border-left-primary'>

        <div class='card-header py-3'>
          <h6 class='m-0 font-weight-bold text-success text-center'>Voir la Composition du coffret</h6>
        </div>

        <div class='card-body'>
        <select id='selecteCoffret' class='form-control mb-3'>";

        foreach($showCoffret as $val){
            echo"<option value='".$val['id_coffret']."'>".$val['nom_coffret']."</option>";
        }

        echo "</select></div>
        <input type='button' id='btn-voirLIste' value='Voir' class='btn btn-primary' />
        
        <div class='card-body js-div-liste' style='display:none'>
        </div>

      </div>";
    }
    public function listeArticleCoffret($liste)
    {
        echo"<ul>";
        foreach($liste as $val){

            echo"<li>".$val['nom_article']." <input type='button' value='Enlever' onclick='suppArticleCoffret(".$val['id_article'].",".$val['id_coffret'].");' class='btn-danger js-btn_supparticleCoffret'/></li><br>";
        }
        echo"</ul>";
    }
}

