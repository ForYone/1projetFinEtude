<?php


class AdminUtilisateurModele
{

    public function inscriptionEep($nomEep,$activite,$site,$dce,$adresse,$cplt,$cp,$ville,$region,$tel,$fax,$nom,$prenom,$poste,$email,$mdp)
            {
             
                        $eep=$this->db->prepare("INSERT INTO eep(nom_eep,adresse_eep,cplt_adresse,cp_eep,ville_eep,region_eep,tel_eep,fax_eep,activite_eep,site_eep,date_creation_eep,nom_resp_eep,prenom_resp_eep,poste_resp,email_eep,mdp_eep,id_role) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
                        echo $nomEep;
                        if ($eep->execute(array($nomEep,$adresse,$cplt,$cp,$ville,$region,$tel,$fax,$activite,$site,$dce,$nom,$prenom,$poste,$email,$mdp,2)))
                        {
                            
                            return true;
                        }
                        else
                        {
                            echo "inscription erreur";

                        }
                
                
            }
            public function inscriptionAdmin($nomAdmin,$email,$mdp)
            {
             
                        $eep=$this->db->prepare("INSERT INTO administrateur(nom_admin,mail_admin,mdp_admin,id_role) VALUES(?,?,?,?) ");
                        
                        if ($eep->execute(array($nomAdmin,$email,$mdp,3)))
                        {
                            
                            return true;
                        }
                        else
                        {
                            echo "inscription erreur";
                            return false;

                        }
                
                
            }
    
    public function voirEep()
    {

        $eep=$this->db->query("SELECT * FROM eep ")->fetchAll();

        return $eep;
        
    }

    public function voirSalarie()
    {

        $salarie=$this->db->query("SELECT * FROM salarie INNER JOIN eep ON eep.id_eep=salarie.id_eep ")->fetchAll();

        return $salarie;
        
    }

    public function voirAdmin()
    {
        $admin=$this->db->query("SELECT * FROM administrateur")->fetchAll();
        return $admin;
    }

    public function voirUneEep($id)
    {
        $utilisateur=$this->db->query("SELECT * FROM eep WHERE id_eep='$id' ")->fetch(PDO::FETCH_OBJ);

        return $utilisateur;
    }

    public function voirUnSalarie($id)
    {
        $utilisateur=$this->db->query("SELECT * FROM salarie INNER JOIN eep ON eep.id_eep=salarie.id_eep where id_salarie='$id' ")->fetch(PDO::FETCH_OBJ);

        return $utilisateur;
    }
    
    public function modifSalarie($nom,$prenom,$poste,$dfc,$adresse,$cp,$ville,$email,$id)
    {
        
            $sqlPrepare="UPDATE salarie SET nom_salarie='$nom' , prenom_salarie='$prenom' , poste_salarie='$poste', date_fin_contrat='$dfc', adresse_salarie='$adresse', cp_salarie='$cp', ville_salarie='$ville', email_salarie='$email' WHERE id_salarie=$id";
                    if($sql =$this->db->query($sqlPrepare))
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
        
        
      
    }

    public function modifEep($nomEep,$activite,$site,$dce,$adresse,$cplt,$cp,$ville,$region,$tel,$fax,$nom,$prenom,$poste,$email,$id)
    {
        
        
            $sqlPrepare="UPDATE eep SET nom_eep='$nomEep' , activite_eep='$activite' , site_eep='$site', date_creation_eep='$dce',adresse_eep='$adresse', cplt_adresse='$cplt', cp_eep='$cp', ville_eep='$ville', region_eep='$region', tel_eep='$tel',fax_eep='$fax', nom_resp_eep='$nom', prenom_resp_eep='$prenom', poste_resp='$poste', email_eep='$email'  WHERE id_eep=$id";
                   if( $sql =$this->db->query($sqlPrepare))
                   {

                       return true;
                   }
                   else
                   {
                       echo"double";
                    return false;
                   }
        
        
      
    }

    public function SuppEep($id)
    {
         
            $supprimer="DELETE FROM eep WHERE id_eep=$id ";

            if ($sql=$this->db->query($supprimer))
            {
                return true; 
            } 
            else
             {
                 echo"rater";
             }
            
        
       
        
        
    }

    public function SuppSal($id)
    {
        
            $supprimer="DELETE FROM salarie WHERE id_salarie=$id ";

           if ($sql=$this->db->query($supprimer))
           {
               return true; 
           } 
           
       else
       {
           echo'rater';
       }
        
        
    }

    public function SuppAdmin($id)
    {
        
            $supprimer="DELETE FROM administrateur WHERE id_admin=$id ";

           if ($sql=$this->db->query($supprimer))
           {
               return true; 
           } 
           
       else
       {
           echo'rater';
       }
        
        
    }


    public function voirSalarieTemp()
    {
        $salarie=$this->db->query("SELECT * FROM salarietemp INNER JOIN eep ON eep.id_eep=salarietemp.id_eep ")->fetchAll();

        return $salarie;
    }

    public function suppST($id)
    {
        $supprimer="DELETE FROM salarietemp WHERE id_salarie=$id ";
           if ($sql=$this->db->query($supprimer))
           {
               return true; 
           } 
           
       else
       {
           echo'rater';
       }
    }

    public function ValidST($id)
    {
        $valider="INSERT INTO salarie SELECT * FROM salarietemp WHERE id_salarie=$id ";

        if($sql=$this->db->query($valider))
        {
            $supprimer="DELETE FROM salarietemp WHERE id_salarie=$id ";
            $sql=$this->db->query($supprimer);
            return true;
        }
        else{
            return false;
        }
        
    }



}


?>