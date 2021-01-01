<?php
    require_once 'bootstrap.php';

    $templateParams["js"]["slider"] = "slider.js";
    $templateParams["title"] = "GameHub - Ricerca";
    $templateParams["name"] = "template/template-search.php";

    if(!empty($_GET)) {
        $platforms = array();
        $categories = array();
        $price = 1000;
        $developer = "";

        if(isset($_GET["price"])) {
           $price = $_GET["price"];
        }

        if(isset($_GET["developer"])) {
            $developer = $_GET["developer"];
        }
        
        $plt = 0;
        $patternPlatform = "/plt-/i";
        $cat = 0;
        $patternCategory = "/cat-/i";

        foreach($_GET as $key => $value){
            if (preg_match($patternPlatform, $key)){
                $platforms[$plt] = $value;
                $plt++;
            } elseif (preg_match($patternCategory, $key)) {
                $categories[$cat] = $value;
                $cat++;
            }
        }

        $templateParams["games"] = $dbh->searchGames($platforms, $categories, $developer, $price);
        //var_dump($templateParams["games"]);

    }

    require 'template/base.php';
?>