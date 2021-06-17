<?php

    // CREATE attribut
    // ***************
    function createAttribut($nomAttribut, $typeAttribut, $codeAttibut, $uniteAttribut){
        try {
            $db = dbConnect();
            $mysql = "INSERT INTO attribut(nomAttribut, typeAttribut, codeAttribut, uniteAttribut)";
            $mysql .= " VALUES(:nomAttribut, :typeAttribut, :codeAttribut, :uniteAttribut)";
            $req = $db->prepare($mysql);
            $req->bindValue(":nomAttribut", $nomAttribut, PDO::PARAM_STR);
            $req->bindValue(":typeAttribut", $typeAttribut, PDO::PARAM_INT);
            $req->bindValue(":codeAttribut", $codeAttibut, PDO::PARAM_STR);
            $req->bindValue(":uniteAttribut", $uniteAttribut, PDO::PARAM_STR);
            $req->execute();    
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }


    // READ attribut
    // *************
    function getAttributs(){
        try {
            $db = dbConnect();
            $req = $db->query("SELECT * FROM attribut ORDER BY id");
            $reponse = $req->fetchAll();
            $req->closeCursor();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
        return $reponse;
    }

    function getAttribut($idAttribut){
        try {
            $db = dbConnect();
            $req = $db->query("SELECT * FROM attribut WHERE id = $idAttribut");
            $reponse = $req->fetchAll();
            $req->closeCursor();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
        return $reponse;
    }


    // UPDATE attribut
    // ***************
    function updateAttribut($idAttribut, $nomAttribut, $typeAttribut, $codeAttibut, $uniteAttribut){
        try {
            $db = dbConnect();
            $mysql = "UPDATE 
                        attribut 
                    SET 
                        attribut.nomAttribut = :nomAttribut, 
                        attribut.typeAttribut = :typeAttribut,
                        attribut.codeAttribut = :codeAttribut, 
                        attribut.uniteAttribut = :uniteAttribut
                    WHERE
                        attribut.id = :idAttribut";
            $req = $db->prepare($mysql);
            $req->bindValue(":idAttribut", $idAttribut, PDO::PARAM_INT);
            $req->bindValue(":nomAttribut", $nomAttribut, PDO::PARAM_STR);
            $req->bindValue(":typeAttribut", $typeAttribut, PDO::PARAM_STR);
            $req->bindValue(":codeAttribut", $codeAttibut, PDO::PARAM_INT);
            $req->bindValue(":uniteAttribut", $uniteAttribut, PDO::PARAM_STR);
            $req->execute();    
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }


    // DELETE attribut
    // ***************
    function deleteAttribut($idAttribut){
        try {
            $db = dbConnect();
            $req = $db->prepare("DELETE FROM attribut WHERE attribut.id = :id");
            $req->bindvalue(":id",$idAttribut, PDO::PARAM_INT);
            $req->execute();
        } catch (Exception $sms) {
            echo "Ne pas pouvoir faire cette commande.", $sms->getMessage()." ".$sms->getFile()." ".$sms->getLine();
        }
    }
?>