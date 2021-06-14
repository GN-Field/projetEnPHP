<?php


    require "view/dbsql.php";


    // *****************************
    require "model/annonce.php";
    // *****************************

    // TEST CREATE annonce
    // *******************
    createAnnonce("citroen A8", "11-06-2021 00:00:00", 60000, 1, "lorem", 1, 1);

?>