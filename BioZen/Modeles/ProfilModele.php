<?php

class ProfilModele
{

    function monProfil($id)
    {

        if ($utilisateur = $this->db->query("SELECT * FROM salarie INNER JOIN eep ON eep.id_eep=salarie.id_eep  WHERE id_salarie='$id'")->fetch()) {

            return $utilisateur;
        }


        if ($utilisateur = $this->db->query("SELECT * FROM eep  WHERE id_eep='$id'")->fetch()) {
            return $utilisateur;
        }
    }

    function modifMdpModel($nvxMdp, $id)
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 1) {
                $sqlPrepare = "UPDATE salarie SET mdp_salarie='$nvxMdp' WHERE id_salarie='$id'";
                $sql = $this->db->query($sqlPrepare);
                return $sql;
            } elseif ($_SESSION['id_role'] == 2) {
                $sql = $this->db->query("UPDATE eep SET mdp_eep='$nvxMdp' WHERE id_eep='$id'");
                return $sql;
            }elseif($_SESSION['id_role']==3){
                $sql = $this->db->query("UPDATE administrateur SET mdp_admin='$nvxMdp' WHERE id_admin='$id'");
                return $sql;
            }
            else{
                return false;
            }
        }

        
    }
}
