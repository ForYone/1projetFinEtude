<?php
class AddPanierView{
    public function  addPanierMsg($msg){?>
        <div class="addpanierMsg">
        <div class="msgPanier">
          <?php  echo $msg; ?><br><br>
        <a class='btnStd' href='index.php?page=catalogueP'>Retour au catalogue</a><?php echo" "?> <a class='btnStd' href='index.php?page=panier'>Mon panier</a>
      
        </div>
        </div>
   <?php }
}