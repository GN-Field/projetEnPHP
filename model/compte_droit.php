<?php

    // CREATE compte droit
    // *******************
    function createCompteDroit($nomDroit, $paramDroit, $valeur, $idCompteUtilisateur){
        try {
            $db = dbConnect();
            $mysql = "INSERT INTO comptedroit(nomDroit, paramDroit, valeur, idCompteUtilisateur)";
            $mysql .= " VALUES(:nomDroit, :paramDroit, :valeur, :idCompteUtilisateur)";
            $req = $db->prepare($mysql);
            $req->bindValue(":nomDroit", $nomDroit, PDO::PARAM_STR);
            $req->bindValue(":paramDroit", $paramDroit, PDO::PARAM_STR);
            $req->bindValue(":valeur", $valeur, PDO::PARAM_INT);
            $req->bindValue(":idCompteUtilisateur", $idCompteUtilisateur, PDO::PARAM_INT);
            $req->execute();    
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }


    // READ compte droit
    // *****************
    function getComptesDroit(){
        try {
            $db = dbConnect();
            $req = $db->query("SELECT * FROM comptedroit ORDER BY id");
            $reponse = $req->fetchAll();
            $req->closeCursor();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
        return $reponse;
    }

    function getCompteDroit($idCompteDroit){
        try {
            $db = dbConnect();
            $req = $db->query("SELECT * FROM comptedroit ORDER BY id");
            $reponse = $req->fetch();
            $req->closeCursor();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
        return $reponse;
    }


    // UPDATE compte droit
    // *******************
    function updateCompteDroit($idCompteDroit, $nomDroit, $paramDroit, $valeur, $idCompteUtilisateur){
        try {
            $db = dbConnect();
            $mysql = "UPDATE 
                        comptedroit 
                    SET 
                        comptedroit.nomDroit = :nomDroit, 
                        comptedroit.paramDroit = :paramDroit,
                        comptedroit.valeur = :valeur, 
                        comptedroit.idCompteUtilisateur = :idCompteUtilisateur
                    WHERE
                        comptedroit.id = :idComptedroit";
            $req = $db->prepare($mysql);
            $req->bindValue(":idCompteDroit", $idCompteDroit, PDO::PARAM_INT);
            $req->bindValue(":nomDroit", $nomDroit, PDO::PARAM_STR);
            $req->bindValue(":paramDroit", $paramDroit, PDO::PARAM_STR);
            $req->bindValue(":valeur", $valeur, PDO::PARAM_INT);
            $req->bindValue(":idCompteUtilisateur", $idCompteUtilisateur, PDO::PARAM_INT);
            $req->execute();    
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }


    // DELETE compte droit
    // *******************
    function deleteCompteDroit($idCompteDroit){
        try {
            $db = dbConnect();
            $req = $db->prepare("DELETE FROM comptedroit WHERE comptedroit.id = :id");
            $req->bindvalue(":id",$idCompteDroit, PDO::PARAM_INT);
            $req->execute();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }

?>