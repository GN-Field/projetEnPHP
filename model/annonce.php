<?php

    // CREATE annonce
    // ****************
    function createAnnonce($titre, $dateDepot, $prix, $etatAnnonce, $description, $idCategorie, $idCompteUtilisateur){
        try {
            $db = dbConnect();
            $mysql = "INSERT INTO annonce(titre, dateDepot, prix, etatAnnonce, description, idCategorie, idCompteUtilisateur)";
            $mysql .= " VALUES(:titre, :dateDepot, :prix, :etatAnnonce, :description, :idCategorie, :idCompteUtilisateur)";
            $req = $db->prepare($mysql);
            $req->bindValue(":titre", $titre, PDO::PARAM_STR);
            $req->bindValue("dateDepot", $dateDepot, PDO::PARAM_STR);
            $req->bindValue(":prix", $prix, PDO::PARAM_STR);
            $req->bindValue(":etatAnnonce", $etatAnnonce, PDO::PARAM_BOOL);
            $req->bindValue(":description", $description, PDO::PARAM_STR);
            $req->bindValue(":idCategorie", $idCategorie, PDO::PARAM_INT);
            $req->bindValue(":idCompteUtilisateur", $idCompteUtilisateur, PDO::PARAM_INT);
            $req->execute();    
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }


    // READ annonce
    // ************
    function getAnnonces(){
        try {
            $db = dbConnect();
            $req = $db->query("SELECT * FROM annonce ORDER BY id");
            $reponse = $req->fetchAll();
            $req->closeCursor();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
        return $reponse;
    }

    function getAnnonce($idAnnonce){
        try {
            $db = dbConnect();
            $req = $db->query("SELECT * FROM annonce WHERE id = $idAnnonce");
            $reponse = $req->fetch();
            $req->closeCursor();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
        return $reponse;
    }


    // UPDATE annonce
    // **************
    function updateAnnonce($idAnnonce, $titre, $dateDepot, $prix, $etatAnnonce, $description){
        try {
            $db = dbConnect();
            $mysql = "UPDATE annonce";
            $mysql .= " SET annonce.titre = :titre, annonce.date_depot = :date_depot, annonce.prix = :prix";
            $mysql .= " annonce.etat_annonce = :etat_annonce, annonce.description = :description";
            $mysql .= " WHERE annonce.id = :idAnnonce";
            $req = $db->prepare($mysql);
            $req->bindValue(":idAnnonce", $idAnnonce, PDO::PARAM_INT);
            $req->bindValue(":titre", $titre, PDO::PARAM_STR);
            $req->bindValue(":date_depot", $dateDepot, PDO::PARAM_STR);
            $req->bindValue(":prix", $prix, PDO::PARAM_STR);
            $req->bindValue(":etat_annonce", $etatAnnonce, PDO::PARAM_BOOL);
            $req->bindValue(":description", $description, PDO::PARAM_STR);
            $req->execute();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }

    // DELETE annonce
    // **************
    function deleteAnnonce($idAnnonce){
        try {
            $db = dbConnect();
            $req = $db->prepare("DELETE FROM annonce WHERE annonce.id = :idAnnonce");
            $req->bindvalue(":idAnnonce", $idAnnonce, PDO::PARAM_INT);
            $req->execute();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }

?>