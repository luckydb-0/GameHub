<?php
    session_start();
    define("IMG_DIR", "./img/");
    require_once("utils/functions.php");
    require_once("db/Database_Deleter.php");
    require_once("db/Database_Creater.php");
    require_once("db/Database_Updater.php");
    require_once("db/Database_Reader.php");

    //$dbh = new DatabaseHelper("database.ozny.it", "prova", "prova", "gamehub", 3306);
    $dbr = new Database_Reader();
    $dbi = new Database_Creater();
    $dbu = new Database_Updater();
    $dbd = new Database_Deleter();

    ?>