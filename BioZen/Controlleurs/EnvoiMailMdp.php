<?php

include('Vues/ModifMdpView.php');
include('Modeles/ModifMdpModel.php');
include('Securiter.php');
       

class ModifMdpControleur extends ModifModel

{
    public $db;
  

    public function __construct()
    {

        $this->db = ConnexionBdd::bdd();
    }

   
    public function modifMdp()
    {
        $modifVue= new ModifMdpVue();
        $securite = new Security();
        $modifVue->vueEmail();
        
        
        
        if(isset($_POST['email']))
        { 
            $email=$_POST['email'];
            
            if($securite->securMail($email))
            {
                if($utilisateur=$this->testEmail($email))
                {
                    
                    $date= new DateTime();
                     $dateMtn=$date->format("d-m-y h:i");
                    $recupCode="";
                    for($i=0; $i<8;$i++)
                    {
                        $recupCode .=mt_rand(0,9);
                    }
                    
                    ini_set('SMTP', SMTPMP);
                    ini_set('smtp_port', '25');
                    ini_set('sendmail_from', SEND_FROM);
                    $from = SEND_FROM;
                    $to = $email;
                    $subject = "Modification du mot de passe du compte BioZen";
                    $message = "
                    
                        Ne pas répondre à ce mail, il est géneré automatiquement
                        
                         Bonjour Madame,Monsieur,
                         
                          Vous avez demandé la réinitialisation de votre mot de passe.
                        
                          Voici votre code de confirmation:".$recupCode."
                        
                          Afin de finaliser la modification de votre mot de passe, nous vous invitons à cliquez
                          sur le lien suivant:
                          http://localhost/dwwwm/dossier-stage/function%20generique/bio%20zen/index.php?page=modifierMdp

                        Attention ce lien est actif 24heures, passé ce délai il faudra faire une nouvelle demande
                         de réinitialisation de mot de passe.

                         Cordialement,

                         L'equipe Bio & Zen
                        
                        ";
    
                    $headers = "From:" . $from;
                    
                    

                    


                    if($geneCode=$this->recuperationCode($email,$recupCode,$dateMtn))
                    {
                        $_SESSION['recup_mail']=$email;   
                        if(mail($to, $subject, $message, $headers))
                        {
                        echo"votre email a bien été envoyé.";
                        header('Refresh:0;URL=./index.php?page=modifierMdp');
                        
                        }
                        else
                        {
                            echo"pas envoyé";
                        }
                    }
                    else
                    {
                        echo'service indisponible contacter l\'agence pour plus de renseignement<br>information sur la page contact';
                    }

                    
                    
                  
                    
                        
                    

                   
                }
                else{echo'non';}
                
            }
            
        
        }
       

        

       

    }

}


$modifControleur=new ModifMdpControleur();

$modifControleur->modifMdp();


