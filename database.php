<?php
    function dbConnect(){
        $user = "root";
        $pass = "";

        try{
            $bd = new PDO('mysql:host=localhost;dbname=projet_php', $user, $pass);
            return $bd;
        }
        catch(PDOException $e){
            echo "Connexion échouée...";
        }
    }
?>