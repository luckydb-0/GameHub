<?php
    require_once 'bootstrap.php';

    $templateParams["title"] = "GameHub - Videogioco"; /* Sarà da settare dinamicamente */
    $templateParams["name"] = "template/template-article.php";
    $templateParams["js"]["input"] = "input.js";

    $templateParams["game"] = $dbh->getGameById($_GET["game"])[0];
    $templateParams["genres"] = $dbh->getGenresFromGameId($_GET["game"]);
    $templateParams["price"] = $dbh->getGameLowestPriceAndSeller($_GET["game"]);

    require 'template/base.php';
?>