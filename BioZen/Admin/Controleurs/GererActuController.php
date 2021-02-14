<?php

include("Admin/Vues/GererActuView.php");
include("Admin/Vues/messageErreur.php");
include("Admin/Modele/GererActuModel.php");

class GererActuController
{
    public $bdd;
    public $class;

    function __construct()
    {
        $this->bdd = ConnexionBdd::bdd();
    }

    public function gererAction()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                $model = new GererActuModel($this->bdd);
                $actu = $model->getActu();
                $view = new GererActuView();
                $view->gererActuRender($actu);
            }
        }
    }

    public function modifAction()
    {

        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                $model = new GererActuModel($this->bdd);
                $id = (isset($_GET['id']) ? $_GET['id'] : "");
                $actu = $model->getAnActu($id);
                $view = new GererActuView();
                $view->modifActuRender($actu);
            }
        }
    }

    public function addActuAction()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                $model = new GererActuModel($this->bdd);
                if (isset($_POST)) {
                    if (isset($_POST['titreactu'])) {
                        $titre_actu = $_POST['titreactu'];
                        $contenu_actu = $_POST['contenu'];
                        $nlUrlPhoto = "";
                        $nlUrlVideo = "";

                        if (isset($_FILES['photo'])) {
                            $photo_actu = $_FILES['photo']['name'];
                            $video_actu = $_FILES['video']['name'];
                            $extImgVal = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
                            $extImg = strtolower(pathinfo($photo_actu, PATHINFO_EXTENSION));
                            @$typeMimeImg = mime_content_type($_FILES['photo']["tmp_name"]);

                            $typeMimeImgVal = array('image/gif', 'image/png', 'image/jpeg', 'image/bmp', 'image/jpg');
                            $extVidVal = array('mp4', 'webm', 'ogg');
                            $extVideo = strtolower(pathinfo($video_actu, PATHINFO_EXTENSION));
                            @$typeMimeVideo = mime_content_type($_FILES['video']["tmp_name"]);

                            $typeMimeVidVal = array('video/ogg', 'video/webm', 'video/mp4');

                            if ($photo_actu != "") {
                                if ($_FILES['photo']["size"] > 5000000) {
                                    echo ("fichier trop grand.");
                                    $this->gererAction();
                                    return false;
                                } else if (in_array($extImg,  $extImgVal) == false) {
                                    echo "Ce format n'est pas accepté";
                                    $this->gererAction();
                                    return false;
                                } else if (in_array($typeMimeImg, $typeMimeImgVal) == false) {
                                    echo "Ce type n'est pas accepté";
                                    $this->gererAction();
                                    return false;
                                } else {
                                    $nlUrlPhoto = 'Admin/upload/photos/' . $photo_actu;
                                    if (move_uploaded_file($_FILES['photo']['tmp_name'], $nlUrlPhoto)) {
                                        $nlUrlPhoto = 'Admin/upload/photos/' . $photo_actu;
                                    } else {
                                        echo "echec upload";
                                        return false;
                                    }
                                }
                            }


                            if ($video_actu != "") {
                                if ($_FILES['video']["size"] > 700000000) {
                                    echo ("fichier trop grand.");
                                    $this->gererAction();
                                    return false;
                                } else if (in_array($extVideo, $extVidVal) == false) {
                                    echo "Ce format n'est pas accepté";
                                    $this->gererAction();
                                    return false;
                                } else if (in_array($typeMimeVideo, $typeMimeVidVal) == false) {
                                    echo "Ce type n'est pas accepté";
                                    $this->gererAction();
                                    return false;
                                } else {

                                    $nlUrlVideo = 'Admin/upload/videos/' . $video_actu;
                                    if (move_uploaded_file($_FILES['video']['tmp_name'], $nlUrlVideo)) {
                                        $nlUrlVideo = 'Admin/upload/videos/' . $video_actu;
                                    } else {
                                        echo "echec upload";
                                        return false;
                                    }
                                }
                            }

                            if (($titre_actu !== "") && ($contenu_actu)) {
                                if ($model->addActu($titre_actu, $nlUrlPhoto, $nlUrlVideo, $contenu_actu)) {
                                    $erreur = new MessageErreur();
                                    $erreur->messageActu('post');
                                } else {
                                    $erreur->messageAct('noPost');
                                    return false;
                                }
                            } else {
                                echo "Veuillez renseigner les champs vides.";

                                $this->gererAction();
                            }
                        }
                    }
                }
            }
        }
    }
    public function modifActuAction()
    {
        $model = new GererActuModel($this->bdd);
        if (isset($_POST)) {

            $id = (isset($_GET['id']) ? $_GET['id'] : "");
            $actu = $model->getAnActu($id);

            if (isset($_POST['titreactu'])) {
                $titre_actu = $_POST['titreactu'];
                $contenu_actu = $_POST['contenu'];
                $nlUrlPhoto = $actu->photo_actu;
                $nlUrlVideo = $actu->video_actu;

                if (isset($_FILES['photo'])) {
                    $photo_actu = $_FILES['photo']['name'];
                    $video_actu = $_FILES['video']['name'];
                    $extImgVal = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
                    $extImg = strtolower(pathinfo($photo_actu, PATHINFO_EXTENSION));
                    @$typeMimeImg = mime_content_type($_FILES['photo']["tmp_name"]);

                    $typeMimeImgVal = array('image/gif', 'image/png', 'image/jpeg', 'image/bmp', 'image/jpg');
                    $extVidVal = array('mp4', 'webm', 'ogg');
                    $extVideo = strtolower(pathinfo($video_actu, PATHINFO_EXTENSION));
                    @$typeMimeVideo = mime_content_type($_FILES['video']["tmp_name"]);

                    $typeMimeVidVal = array('video/ogg', 'video/webm', 'video/mp4');

                    if ($photo_actu != "") {
                        if ($_FILES['photo']["size"] > 5000000) {
                            echo ("fichier trop grand.");
                            $this->gererAction();
                            return false;
                        } else if (in_array($extImg,  $extImgVal) == false) {
                            echo "Ce format n'est pas accepté";
                            $this->gererAction();
                            return false;
                        } else if (in_array($typeMimeImg, $typeMimeImgVal) == false) {
                            echo "Ce type n'est pas accepté";
                            $this->gererAction();
                            return false;
                        } else {
                            $nlUrlPhoto = 'Admin/upload/photos/' . $photo_actu;
                            if (move_uploaded_file($_FILES['photo']['tmp_name'], $nlUrlPhoto)) {
                                $nlUrlPhoto = 'Admin/upload/photos/' . $photo_actu;
                            } else {
                                echo "echec upload";
                                return false;
                            }
                        }
                    }


                    if ($video_actu != "") {
                        if ($_FILES['video']["size"] > 700000000) {
                            echo ("fichier trop grand.");
                            $this->gererAction();
                            return false;
                        } else if (in_array($extVideo, $extVidVal) == false) {
                            echo "Ce format n'est pas accepté";
                            $this->gererAction();
                            return false;
                        } else if (in_array($typeMimeVideo, $typeMimeVidVal) == false) {
                            echo "Ce type n'est pas accepté";
                            $this->gererAction();
                            return false;
                        } else {

                            $nlUrlVideo = 'Admin/upload/videos/' . $video_actu;
                            if (move_uploaded_file($_FILES['video']['tmp_name'], $nlUrlVideo)) {
                                $nlUrlVideo = 'Admin/upload/videos/' . $video_actu;
                            } else {
                                echo "echec upload";
                                return false;
                            }
                        }
                    }

                    if (($titre_actu !== "") && ($contenu_actu)) {
                        if ($model->modifActu($id, $titre_actu, $nlUrlPhoto, $nlUrlVideo, $contenu_actu)) {
                            $erreur = new MessageErreur();
                            $erreur->messageActu('post');
                        } else {
                            $erreur->messageAct('noPost');
                            return false;
                        }
                    } else {
                        echo "Veuillez renseigner les champs vides.";

                        $this->gererAction();
                    }
                } else {
                    echo "Un problème est survenu";
                }
            }
        }
    }


    public function supAction()
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) {
                if (isset($_POST)) {

                    $id = (isset($_GET['id']) ? $_GET['id'] : "");
                    $model = new GererActuModel($this->bdd);
                    if ($model->supActu($id)) {
                        $erreur = new MessageErreur();
                        $erreur->messageActu('sup');
                    } else {
                        $erreur->messageActu('noSup');
                    }
                }
            }
        }
    }
}
