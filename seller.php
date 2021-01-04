<?php
    require_once 'bootstrap.php';

    $templateParams["title"] = "GameHub - Venditore";
    $templateParams["name"] = "template/template-seller.php";

    if(isLoggedIn()) {
        $templateParams["sellerId"] = substr($_SESSION["userId"], 2);
        if(isset($_POST["gameId"]) && isset($_POST["price"]) && isset($_POST["copies"])) {
            $gameId = $_POST["gameId"];
            $price = $_POST["price"];
            $copies = $_POST["copies"];
            $catId = $dbr->getCatalogueId(substr($_SESSION["userId"], 2));
            $dbi->insertNewSellerArticle($gameId, $price, $copies, $catId);
        }
    }

    if(!isset($_GET["page"])) {
        $templateParams["page"] = "seller-data";
        $templateParams["header"] = "Dati venditore";

        if(isLoggedIn()) {
            $templateParams["seller"] = $dbr->getSellerData($templateParams["sellerId"])[0];
        }
    } else {
        switch($_GET["page"]) {
            case "catalogue":
                $templateParams["page"] = "catalogue";
                $templateParams["header"] = "Catalogo";
                break;
            case "orders":
                $templateParams["page"] = "orders";
                $templateParams["header"] = "Ordini in sospeso";
                $templateParams["seller-orders"] = $dbr->getSellerOrders($templateParams["sellerId"]);
                break;
            case "notifications":
                $templateParams["page"] = "notifications";
                $templateParams["header"] = "Le mie notifiche";
        }
    }

    require 'template/base.php';
?>