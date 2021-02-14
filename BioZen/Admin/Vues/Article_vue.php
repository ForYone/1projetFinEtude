<?php
class Article
{
    /**Rempli le taleau avec tout les articles********* */
    public function getArticleVue($article)
    {
        foreach ($article as $val) {
            echo "<tr><td>" . $val['nom_article'] . "</td><td>" . $val['prix'] . "€</td><td>" . $val['categorie'] . "</td><td>" . $val['stock'] . "</td><td>" . $val['ref_article'] . "</td><td><input onclick='suppArticleAdmin(".$val['id_article'].");' type='button' class='js_article_supp btn-danger' value='Supprimer'  id_article_supp='" . $val['id_article'] . "'/><br><br><input type='button' onclick='getArticleForm(" . $val['id_article'] . ")' data-toggle='modal' data-target='#myModal' class='js_article_modif btn-primary' value='Modifier' id_article_modif='" . $val['id_article'] . "'/></td></tr>";
        }
    }
    /**Modification des données************ */
    public function formModifArticle($getArticle, $cat)
    {
        echo " 

        <label for='name'>Article</label>
        <input type='text' id='name' class='form-control mb-3' name='nom_article' value='" . $getArticle->nom_article . "'/>
        
        <label for='cat'>Categorie</label>
        <select id='cat' name='categorie' class='form-control mb-3'> 
        <option value='" . $getArticle->id_cat . "'>" . $getArticle->categorie . "</option>";

        foreach ($cat as $val) {
            echo "<option value='" . $val['id_cat'] . "'>" . $val['categorie'] . "</option>";
        }

        echo "  </select>
        
        <label for='prix'>Prix</label>
        <input type='text' id='prix' class='form-control mb-3' name='prix' value='" . $getArticle->prix . "'/>
        
        <label for='ref'>Reference Article</label>
        <input type='text' id='ref' class='form-control mb-3' name='ref_article' value='" . $getArticle->ref_article . "'/>
        
        <label for='stock'>Stock</label>
        <input type='text' id='stock' class='form-control mb-3' name='stock' value='" . $getArticle->stock . "'/>
        
       
        <label for='desc'>Description</label>
        <textarea id='desc' name='description' class='form-control mb-2'>" . $getArticle->description_article . "</textarea>

        
                <div class='modal-footer'>
                <input type='button' id='update' onclick='modifArticle(" . $getArticle->id_article . ")'  class='btn btn-primary'  value='Modifier'/>
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Fermer</button>
                </div>
        
        ";
    }


    /**Afichage photo article ************ */

    public function photoArticle($data)
    {
        foreach ($data as $val) {
            echo "
        <div class='card shadow mb-4 w-75 center recherchePhoto'>
        <div class='card-header py-3'>
            <h6 class='m-0 font-weight-bold text-primary'>" . $val['nom_article'] . "</h6>
        </div>

        <div class='card-body'>
        <img class='w-50' src='Photo/" . $val['photo_article'] . "'/>
<br><br>
        <form method='POST' action='index.php?page=modifPhoto'  enctype='multipart/form-data' >
        <input type ='file' name='photo'/><br><br>
        <input type='hidden' name='id_article' value='" . $val['id_article'] . "' />
        <input class='btn btn-primary' type ='submit' value ='OK' />
        </form>

        </div>
        
    </div>";
        }
    }
}
