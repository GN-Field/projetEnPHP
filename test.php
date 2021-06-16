<?php


    require "view/dbsql.php";


    // *****************************
    require "model/annonce.php";
    // *****************************

    // TEST CREATE annonce
    // *******************
    // createAnnonce("citroen A8", "11-06-2021 00:00:00", 60000, 1, "lorem", 1, 1);


    // ***************************************
    require "model/compte_utilisateur.php";
    // ***************************************

    // TEST CREATE compte utilisateur
    // ******************************
    // createCompteUtilisateur("456@gmail.com", "123456789", "toti", "to", "ti", "photo magnifique", 1, 0000000000);

    // TEST READ compte utilisateur
    // ****************************
    // $test = getCompteUtilisateurs();
    // $test = getCompteUtilisateur(1);
    // echo "<pre>";
    // var_dump($test);
    // echo "</pre>";

    // TEST UPDATE compte utilisateur
    // ******************************
    // updateCompteUtilisateur(3, "456@gmail.com", "987654321", "toti", "to", "ti", "photo test", 1, "1212121212");

    // TEST DELETE compte utilisateur
    // ******************************
    // deleteCompteUtilisateur(2);


    // *********************************
    require "model/compte_droit.php";
    // *********************************

    // TEST CREATE compte droit
    // ************************
    // createCompteDroit("respect1", "test1", 200, 3);

    // TEST READ compte droit
    // **********************
    // $test = getComptesDroit();
    // $test = getCompteDroit(1);
    // echo "<pre>";
    // var_dump($test);
    // echo "</pre>";

    // TEST UPDATE compte droit
    // ************************
    // updateCompteDroit(1, "respect2", "test2", 300, 1);

    // TEST DELETE compte droit
    // ************************
    // deleteCompteDroit(3);

?>