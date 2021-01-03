<?php
    require_once 'bootstrap.php';

    $templateParams["title"] = "GameHub - Videogioco"; /* Sarà da settare dinamicamente */
    $templateParams["name"] = "template/template-article.php";
    $templateParams["js"]["input"] = "input.js";

    $templateParams["game"] = $dbr->getGameById($_GET["game"])[0];
    $templateParams["genres"] = $dbr->getGenresFromGameId($_GET["game"]);
    $templateParams["price"] = $dbr->getGameLowestPriceAndSeller($_GET["game"]);

    require 'template/base.php';
?>