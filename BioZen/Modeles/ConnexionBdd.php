<?php



class ConnexionBdd
{

    public static function bdd()
    {


        try {

            $bdd = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=UTF8", ID, MDP);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bdd;
        } catch (Exception $e) {
            die("<p style='color:red;'><b>FATALE ERROR</b></p> <br> $e");
        }
    }
}
