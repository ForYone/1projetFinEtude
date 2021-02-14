<?php


class AdminVue
{
    public function amdinForm()
    {
        echo "
        
<div class='div-flex-admin'>  
<h2 class='h2-admin'>Accéder à votre compte administrateur</h2>
    <div>
        <form method='POST' action='' onsubmit='return verficationAdminLog();'>
           <div> <input id='mailAdmin' class='input-form-admin' type='text' name='mail_admin' placeholder='Entrez votre mail'></div>
           <div> <input id='mdpAdmin' class='input-form-admin' type='password' name='mdp_admin' placeholder='Entrez votre mot de passe'></div>
            <div><input id='btn-sub-admin' type='submit' value= 'Valider'></div>
        </form> 
        <p id='messageA'></p>
        
    </div>
</div> 


        ";
    }

}
