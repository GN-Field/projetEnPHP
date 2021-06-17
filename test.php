<?php


    require "view/dbsql.php";


    // *****************************
    require "model/annonce.php";
    // *****************************

    // TEST CREATE annonce
    // *******************
    // createAnnonce("coca", "11-06-2021 00:00:00", 2, 1, "lorem", 1, 3);

    // TEST READ annonce
    // *****************
    // $test = getAnnonces();
    // $test = getAnnonce(5);
    // echo "<pre>";
    // var_dump($test);
    // echo "</pre>";

    // TEST UPDATE annonce
    // *******************
    // updateAnnonce(5, "7 ups", "11-06-2021 00:00:00", 2, 1, "lorem", 1, 3);

    // TEST DELETE annonce
    // *******************
    // deleteAnnonce(5);


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


    // ******************************
    require "model/categorie.php";
    // ******************************

    // TEST CREATE categorie
    // *********************
    // createCategorie("vehicule", "voiture, velo, moto", 2, 004, 203);

    // TEST READ categorie
    // *******************
    // $test = getCategories();
    // $test = getCategorie(2);
    // echo "<pre>";
    // var_dump($test);
    // echo "</pre>";

    // TEST UPDATE categorie
    // *********************
    // updateCategorie(2, "viande blanc", "poulet", 1, 1, 102);

    // TEST DELETE categorie
    // *********************
    // deleteCategorie(3);


    // *****************************
    require "model/attribut.php";
    // *****************************

    // TEST CREATE attribut
    // ********************
    // createAttribut("durable", 102, 10011, "sans unite");

    // TEST READ attribut
    // ******************
    // $test = getAttributs();
    // $test = getAttribut(2);
    // echo "<pre>";
    // var_dump($test);
    // echo "</pre>";

    // TEST UPDATE attribut
    // ********************
    // updateAttribut(2, "alimentaire", 103, 1001, "sans unite");

    // TEST DELETE attribut
    // ********************
    // deleteAttribut(3);

?>