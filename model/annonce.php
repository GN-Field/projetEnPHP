<?php

    // CREATE annonce
    // ****************
    function createAnnonce($titre, $dateDepot, $prix, $etatAnnonce, $description){ //$idCategorie, $idCompteUtilisateur){
        try {
            $db = dbConnect();
            $mysql = "INSERT INTO annonce(titre, date_depot, prix, etat_annonce, description, id_categorie, compteutilisateur_id)";
            $mysql .= " VALUES(:titre, :date_depot, :prix, :etat_annonce, :description, :id_categorie, :compteutilisateur_id)";
            $requete = $db->prepare($mysql);
            $requete->bindValue(":titre", $titre, PDO::PARAM_STR);
            $requete->bindValue("date_depot", $dateDepot, PDO::PARAM_STR);
            $requete->bindValue(":prix", $prix, PDO::PARAM_STR);
            $requete->bindValue(":etat_annonce", $etatAnnonce, PDO::PARAM_BOOL);
            $requete->bindValue(":description", $description, PDO::PARAM_STR);
            // $requete->bindValue("id_categorie", $idCategorie, PDO::PARAM_INT);
            // $requete->bindValue(":compteutilisateur_id", $idCompteUtilisateur, PDO::PARAM_INT);
            $requete->execute();    
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }


    // READ annonce
    // ************
    function getAnnonces(){
        try {
            $db = dbConnect();
            $requete = $db->query("SELECT * FROM annonce ORDER BY id");
            $reponse = $requete->fetchAll();
            $requete->closeCursor();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
        return $reponse;
    }

    function getAnnonce($idAnnonce){
        try {
            $db = dbConnect();
            $requete = $db->query("SELECT * FROM annonce WHERE id = $idAnnonce");
            $reponse = $requete->fetch();
            $requete->closeCursor();
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
            $requete = $db->prepare($mysql);
            $requete->bindValue(":idAnnonce", $idAnnonce, PDO::PARAM_INT);
            $requete->bindValue(":titre", $titre, PDO::PARAM_STR);
            $requete->bindValue(":date_depot", $dateDepot, PDO::PARAM_STR);
            $requete->bindValue(":prix", $prix, PDO::PARAM_STR);
            $requete->bindValue(":etat_annonce", $etatAnnonce, PDO::PARAM_BOOL);
            $requete->bindValue(":description", $description, PDO::PARAM_STR);
            $requete->execute();
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