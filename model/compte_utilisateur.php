<?php

    // CREATE compte utilisateur
    // *************************
    function createCompteUtilisateur($email, $motsDePasses, $nomAffichage, $nom, $prenom, $photo, $compteActif, $telephone){
        try {
            $db = dbConnect();
            $mysql = "INSERT INTO compteutilisateur(email, motsDePasses, nomAffichage, nom, prenom, photo, compteActif, telephone)";
            $mysql .= " VALUES(:email, :motsDePasses, :nomAffichage, :nom, :prenom, :photo, :compteActif, :telephone)";
            $req = $db->prepare($mysql);
            $req->bindValue(":email", $email, PDO::PARAM_STR);
            $req->bindValue(":motsDePasses", $motsDePasses, PDO::PARAM_STR);
            $req->bindValue(":nomAffichage", $nomAffichage, PDO::PARAM_STR);
            $req->bindValue(":nom", $nom, PDO::PARAM_STR);
            $req->bindValue(":prenom", $prenom, PDO::PARAM_STR);
            $req->bindValue(":photo", $photo, PDO::PARAM_STR);
            $req->bindValue(":compteActif", $compteActif, PDO::PARAM_INT);
            $req->bindvalue(":telephone", $telephone, PDO::PARAM_INT);
            $req->execute();    
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }
    

    // READ annonce
    // ************
    function getCompteUtilisateurs(){
        try {
            $db = dbConnect();
            $req = $db->query("SELECT * FROM compteutilisateur ORDER BY id");
            $reponse = $req->fetchAll();
            $req->closeCursor();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
        return $reponse;
    }

    function getCompteUtilisateur($idCompteUtilisateur){
        try {
            $db = dbConnect();
            $req = $db->query("SELECT * FROM compteutilisateur WHERE id = $idCompteUtilisateur");
            $reponse = $req->fetch();
            $req->closeCursor();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
        return $reponse;
    }


    // UPDATE compte utilisateur
    // *************************
    function updateCompteUtilisateur($idCompteUtilisateur, $email, $motsDePasses, $nomAffichage, $nom, $prenom, $photo, $compteActif, $telephone){
        try {
            $db = dbConnect();
            $mysql = "UPDATE compteutilisateur";
            $mysql .= " SET compteutilisateur.email = :email, compteutilisateur.motsDePasses = :motsDePasses, compteutilisateur.nomAffichage = :nomAffichage, compteutilisateur.nom = :nom";
            $mysql .= " compteutilisateur.prenom = :prenom, compteutilisateur.photo = :photo, compteutilisateur.compteActif = :compteActif, compteutilisateur.telephone = :telephone";
            $mysql .= " WHERE compteutilisateur.id = :idCompteUtilisateur";
            $req = $db->prepare($mysql);
            $req->bindValue(":idCompteUtilisateur", $idCompteUtilisateur, PDO::PARAM_INT);
            $req->bindValue(":email", $email, PDO::PARAM_STR);
            $req->bindValue(":motsDePasses", $motsDePasses, PDO::PARAM_STR);
            $req->bindValue(":nomAffichage", $nomAffichage, PDO::PARAM_STR);
            $req->bindValue(":nom", $nom, PDO::PARAM_STR);
            $req->bindValue(":prenom", $prenom, PDO::PARAM_STR);
            $req->bindValue(":photo", $photo, PDO::PARAM_STR);
            $req->bindValue(":compteActif", $compteActif, PDO::PARAM_INT);
            $req->bindValue(":telephone", $telephone, PDO::PARAM_INT);
            $req->execute();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }


    // DELETE compte utilisateur
    // *************************
    function deleteCompteUtilisateur($idCompteUtilisateur){
        try {
            $db = dbConnect();
            $req = $db->prepare("DELETE FROM compteutilisateur WHERE compteutilisateur.id = :id");
            $req->bindvalue(":id",$idCompteUtilisateur, PDO::PARAM_INT);
            $req->execute();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }

?>