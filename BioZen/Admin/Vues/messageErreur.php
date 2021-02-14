<?php

class MessageErreur
{

 
    public function messageActu($message)
    {
        switch ($message) {
            case "erreurSize":
                echo "Taille de fichier trop grande<br><a class='btn btn-primary' href='index.php?page=gererActu'>Retour</a>";
                break;
            case "erreurExtension":
                echo "Ce type d'extension n'est pas accepté<br><a class='btn btn-primary' href='index.php?page=gererActu'>Retour</a>";
                break;
            case "erreurTypeMime":
                echo "Ce type de fichier n'est pas accepté<br><a class='btn btn-primary' href='index.php?page=gererActu'>Retour</a>";
                break;
            case "post":
                echo "Article posté<br><a class='btn btn-primary' href='index.php?page=gererActu'>Retour</a>";
                break;
            case "noPost":
                echo "Votre article n'a pas été posté<br><a class='btn btn-primary' href='index.php?page=gererActu'>Retour</a>";
                break;
            case "noModif":
                echo "Votre article n'a pas été modifié<br><a class='btn btn-primary' href='index.php?page=gererActu'>Retour</a>";
                break;
            case "modif":
                echo "Votre article a été modifié<br><a class='btn btn-primary' href='index.php?page=gererActu'>Retour</a>";
                break;
            case "sup":
                echo "Votre article a été suprimé<br><a class='btn btn-primary' href='index.php?page=gererActu'>Retour</a>";
                break;
            case "noSup":
                echo "L'article n'a pas été modifié<br><a class='btn btn-primary' href='index.php?page=gererActu'>Retour</a>";
                break;

            default:
                echo "fichier non envoyer<br><a class='btn btn-primary' href='index.php?page=gererActu'>Retour</a>";
                break;
        }
    }

    public function messageBdc($message)
    {
        switch ($message) {

            case "val":
                echo "Bon de commande validé<br><a class='btn btn-primary' href='index.php?page=allbdc'>Retour</a>";
                break;
            case "noVal":
                echo "Le bon de commande n'a pas pu être validé<br><a class='btn btn-primary' href='index.php?page=allbdc'>Retour</a>";
                break;

            case "sup":
                echo "Bon de commande supprimé<br><a class='btn btn-primary' href='index.php?page=allbdc'>Retour</a>";
                break;
            case "noSup":
                echo "Le bon de commande n'a pas pu être supprimé<br><a class='btn btn-primary' href='index.php?page=allbdc'>Retour</a>";
                break;

            default:
                echo "<a class='btn btn-primary' href='index.php?page=allbdc'>Retour</a>";
                break;
        }
    }

    public function messagePromo($message)
    {
        switch ($message) {

            case "activer":
                echo "Promo activée<br><a class='btn btn-primary' href='index.php?page=promo'>Retour</a>";
                break;
            case "noActiver":
                echo "La promo n'a pas pu être activée<br><a class='btn btn-primary' href='index.php?page=promo'>Retour</a>";
                break;

            case "ajouter":
                echo "Nouvelle promo ajoutée<br><a class='btn btn-primary' href='index.php?page=promo'>Retour</a>";
                break;
            case "noAjouter":
                echo "La promo n'a pas pu être ajoutée<br><a class='btn btn-primary' href='index.php?page=promo'>Retour</a>";
                break;

            case "modif":
                echo " Promo modifiée<br><a class='btn btn-primary' href='index.php?page=promo'>Retour</a>";
                break;
            case "noModif":
                echo "La promo n'a pas pu être modifiée<br><a class='btn btn-primary' href='index.php?page=promo'>Retour</a>";
                break;

            case "sup":
                echo "Promo supprimé<br><br><a class='btn btn-primary' href='index.php?page=promo'>Retour</a>";
                break;
            case "noSup":
                echo "La promo n'a pas pu être supprimé<br><a class='btn btn-primary' href='index.php?page=promo'>Retour</a>";
                break;
                case "desactiver":
                    echo "Tous les messages promo on été desactivés<br><br><a class='btn btn-primary' href='index.php?page=promo'>Retour</a>";
                    break;
                case "noDesactiver":
                    echo "Les messages promo n'ont pas pu être supprimés<br><a class='btn btn-primary' href='index.php?page=promo'>Retour</a>";
                    break;

            default:
                echo "<a class='btn btn-primary' href='index.php?page=allbdc'>Retour</a>";
                break;
        }
    }
}
