<?php

    // CREATE categorie
    // ****************
    function createCategorie($nomCategorie, $description, $idCategorieParent, $codeCategorie, $ordreAffichage){
        try {
            $db = dbConnect();
            $mysql = "INSERT INTO categorie(nom, description, idCategorieParent, codeCategorie, ordreAffichage)";
            $mysql .= " VALUES(:nom, :description, :idCategorieParent, :codeCategorie, :ordreAffichage)";
            $req = $db->prepare($mysql);
            $req->bindValue(":nom", $nomCategorie, PDO::PARAM_STR);
            $req->bindValue(":description", $description, PDO::PARAM_STR);
            $req->bindValue(":idCategorieParent", $idCategorieParent, PDO::PARAM_INT);
            $req->bindValue(":codeCategorie", $codeCategorie, PDO::PARAM_STR);
            $req->bindValue(":ordreAffichage", $ordreAffichage, PDO::PARAM_INT);
            $req->execute();    
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }


    // READ categorie
    // **************
    function getCategories(){
        try {
            $db = dbConnect();
            $req = $db->query("SELECT * FROM categorie ORDER BY id");
            $reponse = $req->fetchAll();
            $req->closeCursor();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
        return $reponse;
    }

    function getCategorie($idCategorie){
        try {
            $db = dbConnect();
            $req = $db->query("SELECT * FROM categorie WHERE id = $idCategorie");
            $reponse = $req->fetch();
            $req->closeCursor();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
        return $reponse;
    }


    // UPDATE categorie
    // ****************
    function updateCategorie($idCategorie, $nomCategorie, $description, $idCategorieParent, $codeCategorie, $ordreAffichage){
        try {
            $db = dbConnect();
            $mysql = "UPDATE 
                        categorie 
                    SET 
                        categorie.nom = :nom, 
                        categorie.description = :description,
                        categorie.idCategorieParent = :idCategorieParent, 
                        categorie.codeCategorie = :codeCategorie,
                        categorie.ordreAffichage = :ordreAffichage
                    WHERE
                        categorie.id = :idCategorie";
            $req = $db->prepare($mysql);
            $req->bindValue(":idCategorie", $idCategorie, PDO::PARAM_INT);
            $req->bindValue(":nom", $nomCategorie, PDO::PARAM_STR);
            $req->bindValue(":description", $description, PDO::PARAM_STR);
            $req->bindValue(":idCategorieParent", $idCategorieParent, PDO::PARAM_INT);
            $req->bindValue(":codeCategorie", $codeCategorie, PDO::PARAM_STR);
            $req->bindValue(":ordreAffichage", $ordreAffichage, PDO::PARAM_INT);
            $req->execute();    
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }


    // DELETE categorie
    // ****************
    function deleteCategorie($idCategorie){
        try {
            $db = dbConnect();
            $req = $db->prepare("DELETE FROM categorie WHERE categorie.id = :id");
            $req->bindvalue(":id",$idCategorie, PDO::PARAM_INT);
            $req->execute();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }

?>