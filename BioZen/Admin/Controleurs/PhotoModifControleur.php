<?php

include "Admin/Modele/Article_modele.php";
include "Admin/Vues/Article_vue.php";



class PhotoModifControleur extends ArticleModele
{

    public $db;
    public $id;
    public $dossier = 'Photo/';
    public $photo;
    public $tmp_name;
    public $nouveauNomFichier;

    public function __construct()
    {
        $this->db = ConnexionBdd::bdd();
    }


    public function modifPhoto()
    {

        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {

                if (isset($_POST)) {

                    $this->id = $_POST['id_article'];

                    if (isset($_FILES['photo'])) {

                        $this->photo = $_FILES['photo']['name'];
                        $this->tmp_name = $_FILES['photo']['tmp_name'];

                        $modifPhoto = $this->modifPhotoModel();

                        /**URL du fichier */
                        $url = $this->dossier . basename($_FILES['photo']["name"]);
                        /**Extention du ficher */
                        $extention = strtolower(pathinfo($url, PATHINFO_EXTENSION));

                        if ($_FILES['photo']['size'] < 4000000) {
                            if (in_array($extention, array('png', 'jpeg', 'bmp', 'jpg', 'gif'))) {
                                /**Type mine*** */
                                $typeMime = mime_content_type($_FILES['photo']["tmp_name"]);

                                if (in_array($typeMime, array('image/jpeg', 'image/png', 'image/bmp', 'image/jpg', 'image/gif'))) {

                                    $this->nouveauNomFichier = 'photo_' . basename($this->id . "." . $extention);
                                    if (move_uploaded_file($this->tmp_name, $this->dossier . $this->nouveauNomFichier)) {
                                        if ($modifPhoto->execute(array($this->nouveauNomFichier, $this->id))) {
                                            $this->db = null;
                                            header("Refresh:0.2;url=index.php?page=gestion-articles");
                                            return true;
                                        }
                                    }
                                } else {
                                    header("Refresh:0.2;url=index.php?page=gestion-articles");
                                    return false;
                                }
                            } else {
                                header("Refresh:0.2;url=index.php?page=gestion-articles");
                                return false;
                            }
                        } else {
                            header("Refresh:0.2;url=index.php?page=gestion-articles");
                            return false;
                        }
                    } else {
                        header("Refresh:0.2;url=index.php?page=gestion-articles");
                        return false;
                    }
                }
            }
        } else {
            header("Refresh:0.2;url=index.php?page=accueil");
        }
    }
}

$mofifPhoto = new PhotoModifControleur();
$mofifPhoto->modifPhoto();
