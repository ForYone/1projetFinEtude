<?php

class InscriptionVue
{

    public function vue()
    {

        echo
        "
            <h3 class='titreInscri'>inscrivez-vous</h3>
            <form action='index.php?page=inscription' method='post' name='Inscription'onsubmit='return securinscriptionSal();'>
                <div class='formInscri'>
                    <div class='blockGauche'>
                        <div class='champsInscri'><label for='nomEep'>Nom d'entreprise:</label> <input type='text' name='nomEep' class='champInscri' id='nomEep' required></div>
                        <div class='champsInscri'><label for='nom'>Nom:</label> <input type='text' class='champInscri' name='nom' id='nom' required ></div>
                        <div class='champsInscri'><label for='prenom'>Prénom:</label> <input type='text' class='champInscri' name='prenom'  id='prenom' required></div>
                        <div class='champsInscri'><label for='poste'>Poste d'entreprise:</label> <input type='text' class='champInscri' name='poste' id='poste' required></div>
                        <div class='champsInscri'><label for='dfc'>Date de fin de contrat:</label> <input type='date' min='01-03-2020' class='champInscri' name='dfc'id='dfc' placeholder=' exemple: 24/03/2020' required></div>
                        <div class='champsInscri'><label for='adresse'>Adresse complète:</label> <input type='text' class='champInscri' name='adresse' id='adresse' required></div>
                        
                    </div>
                    <div class='blockDroit'>
                        <div class='champsInscri'><label for='cp'>Code Postal:</label> <input type='text' name='cp' class='champInscri' id='cp' required></div>
                        <div class='champsInscri'><label for='ville'>Ville:</label> <input type='text' class='champInscri' name='ville' id='ville' required ></div>
                        <div class='champsInscri'><label for='mail'>Adresse mail:</label> <input type='mail' class='champInscri' name='mail'  id='mail' required></div>
                        <div class='champsInscri'><label for='cMail'>Confirmé mail:</label> <input type='text' class='champInscri' name='cMail' id='cMail' required></div>
                        <div class='champsInscri'><label for='mdp'>mot de passe:</label> <input type='password' class='champInscri' name='mdp'id='mdp' required></div>
                        <div class='champsInscri'><label for='cMdp'>confirmé mot de passe:</label> <input type='password' class='champInscri' name='cMdp' id='cMdp' required></div>
                        <button class='validerinscri' type='submit'>valider</button>
                    </div>
                
                </div>   
                
            </form>
        ";
    }
}

?>