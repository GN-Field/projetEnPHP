<?php
function dbConnect(){
        try {
            $db = new PDO(
                "mysql:host=localhost;dbname=siteannoncesgratuites;charset=utf8","root","",
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) 
            );    
        } catch (Exception $sms){    
            echo "Ne pas pouvoir connecter vers la base de données.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine(); 
        }
        return $db;
    }
?>