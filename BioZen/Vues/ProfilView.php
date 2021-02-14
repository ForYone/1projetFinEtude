<?php

class ProfilPersoView
{
    function monProfil($utilisateur)
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 1) {
                echo "
        <div class='profilMdp'>
            <div class='voirProfil'>

                <h2 class='titreProfil'>votre profil</h2>

                <div class='pProfil'>Nom / Prenom : " . $_SESSION['nom'] . "  " . $_SESSION['prenom'] . "</div>
                
                <div class='pProfil'>Email : " . $_SESSION['email'] . "</div><div class='pProfil'>
                Poste occupé : " . $_SESSION['poste'] . "</div><div class='pProfil'> 
                Nom de l'entreprise : " . $utilisateur['nom_eep'] . "</div>
              
                </div>";
            }
            if ($_SESSION['id_role'] == 2) {
                echo "
        <div class='profilMdp'>
            <div class='voirProfil'>

                <h2 class='titreProfil'>Votre profil</h2>

                <div class='pProfil'>Nom eep : " . $_SESSION['nom'] . "</div>
                <div class='pProfil'>Activité : " . $_SESSION['activite'] . "</div>
                <div class='pProfil'>Email : " . $_SESSION['email'] . "</div>
                <div class='pProfil'>Numero de telephone : " . $_SESSION['tel'] . "</div>
                
              
            
            </div>";
            }
            if ($_SESSION['id_role'] == 3) {
                echo "
            <div class='profilMdp'>
            <div class='voirProfil'>
                <h2 class='titreProfil'>Votre profil</h2>
                <div class='pProfil'>Nom admin : " . $_SESSION['nom_admin'] . "</div>
                <div class='pProfil'>Email : " . $_SESSION['mail_admin'] . "</div>
                
            </div>";
            }
        }

        //.$utilisateur["nom_eep"]."<br>"

        echo "
                <div class='modifMdp'>
                    <h2 class='titreProfil'>Modifiez votre mot de passe</h2>

                    <form method='post' action='index.php?page=profil'>
                    <div class='formalign'>
                        
                       <div class='inputlab '> <label class='labelmdp' for='mdp'>Mot de passe actuel :</label>  <input class=' mdpmodif ' type='password' id='mdp' name='mdp'></div>

                       <div class='inputlab'> <label class='labelmdp' for='nvxMdp'>Nouveau Mot de passe :</label>  <input class=' mdpmodif' type='password' id='nvxMdp' name='nvxMdp'></div> 

                       <div class='inputlab'> <label class='labelmdp' for='confirmMdp'>Confirmé mot de passe :</label>   <input class=' mdpmodif' type='password' id='confirmMdp' name='confirmMdp'></div> 
                    </div>
                    <button class='validerprofil' type='submit'>valider</button>
                    </form>
                </div>
        </div>
        
        ";
    }
}
