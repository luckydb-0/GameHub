<?php
    require_once 'bootstrap.php';

    $templateParams["title"] = "GameHub - Venditore";
    $templateParams["name"] = "template/template-seller.php";

    if(!isset($_GET["page"])) {
        $templateParams["page"] = "seller-data";
        $templateParams["header"] = "Dati venditore";
        $templateParams["seller"] = $dbr->getSellerData(1);
    } else {
        switch($_GET["page"]) {
            case "catalogue":
                $templateParams["page"] = "catalogue";
                $templateParams["header"] = "Catalogo";
                break;
            case "orders":
                $templateParams["page"] = "orders";
                $templateParams["header"] = "Ordini in sospeso";
                $templateParams["seller-orders"] = $dbr->getSellerOrders(1);
                break;
            case "notifications":
                $templateParams["page"] = "notifications";
                $templateParams["header"] = "Le mie notifiche";
        }
    }

    require 'template/base.php';
?>