<?php
    require_once 'bootstrap.php';

    $templateParams["js"]["slider"] = "slider.js";
    $templateParams["title"] = "GameHub - Ricerca";
    $templateParams["name"] = "template/template-search.php";

    if(!empty($_GET)) {
        if(isset($_GET["name"]) && count($_GET) == 1) {
            $templateParams["games"] = disassemble_array($dbr->searchGamesByName($_GET["name"]));
        } else {
            $platforms = array();
            $categories = array();
            $price = 1000;
            $developer = "";
            $name = "";

            if(isset($_GET["name"])) {
                $name = $_GET["name"];
            }
    
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
            
            $templateParams["games"] = $dbr->searchGames($platforms, $categories, $developer, $price, $name);
        }

    }

    require 'template/base.php';
?>