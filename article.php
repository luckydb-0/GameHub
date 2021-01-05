<?php
    require_once 'bootstrap.php';

    $templateParams["name"] = "template/template-article.php";
    $templateParams["js"]["input"] = "input.js";

    if(isUserLoggedIn()) {
        $userId = substr($_SESSION["userId"], 2);
    }

    $gameId = $_GET["game"];
    $templateParams["game"] = $dbr->getGameById($gameId)[0];
    $templateParams["genres"] = $dbr->getGenresFromGameId($gameId);
    $templateParams["copy"] = $dbr->getGameLowestPriceAndSeller($gameId);
    $templateParams["suggested"] = $dbr->getSuggestedGames($gameId);
    $templateParams["reviews"] = $dbr->getReviews($gameId);

    $templateParams["title"] = "GameHub - ".$templateParams["game"]["title"]." - ".$templateParams["game"]["name"];

    if(count($_POST) > 0) {
        if(isset($_POST["addToCart"])) {
            $dbi->addToCart($userId, $templateParams["copy"][0]["copyId"]);
        }

        if(isset($_POST["addToWishlist"])) {
            $dbi->addToWishlist($userId, $gameId);
        }

        if(isset($_POST["sendReview"])) {
            $dbi->addReview($userId, $gameId, $_POST["title"], $_POST["rating"], $_POST["description"]);
        }

        header("Location: article.php?game=$gameId");
    }

    require 'template/base.php';
?>