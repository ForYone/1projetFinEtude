<?php

class ModifMdpVue
{
    public function vueEmail()
    {
        echo"<h2 class='titreProfil'>Mot de passe oublié</h2>

        <form method='post' class='formModif' action='index.php?page=modifMdp'>
            <div class='formalign'>
            
                <div class='inputlab'> <label class='labelmdp' for='email'>Entrez votre Email :</label>  <input class=' mdpmodif' type='mail' id='email' placeholder=' entrez votre email ici' name='email' ></div> 
            
                <button class='validermailO' type='submit'>Valider</button> </div>
                </form>
            </div>
        
        ";
    }

    public function EmailValid()
    {
        echo"<h2 class='titreProfil'>Mot de passe oublié</h2><br>
        <p class='mailEnvoyer'>un mail vous a ete envoyé contenant un lien afin de modifier votre mot de passe</p>
        ";


    }

    public function ValidCode()
    {
        echo"<h2 class='titreProfil'>Mot de passe oublié</h2>

        <form method='post' class='formModif' action='index.php?page=modifierMdp&code=".md5(444)."'>
            <div class='formalign'>
            
                <div class='inputlab'> <label class='labelmdp' for='code'>veuillez entrer votre code :</label>  <input class=' mdpmodif' placeholder=' entrez votre code de confirmation' type='text' id='code' name='code' ></div> 
            
                <button class='validermailO' type='submit'>Valider</button> </div>
                </form>
            </div>
        
        ";
    }

    public function vueModifMdp($email)
    {
        echo"
       
            <h2 class='titreProfil'>Modifiez votre mot de passe</h2>

            <p>Récuperation de mot de passe pour:<b> ".$_SESSION['recup_mail']."</b></p>
            
            <form method='post'  class='formModif' action='index.php?page=modifierMdp&code=".md5($email)."'>
               

               <div class='inputlab inputlabMdpo '> <label class='labelmdp oubliMdpL' for='nvxMdp'>Nouveau Mot de passe :</label>  <input class=' oublieMdp mdpmodif' type='password' id='nvxMdp' name='nvxMdp'></div> 

               <div class='inputlab inputlabMdpo'> <label class='labelmdp oubliMdpL' for='confirmMdp'>Confirmé Mot de passe :</label>   <input class='oublieMdp mdpmodif' type='password' id='confirmMdp' name='confirmMdp' !required></div> 
           
            <button class='validerOMdp' type='submit'>Valider</button> </div>
            </form>
     
        ";

    }
}