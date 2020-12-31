<?php
    require_once 'bootstrap.php';

    $templateParams["title"] = "GameHub - Profilo";
    $templateParams["name"] = "template/template-profile.php";

    if(!isset($_GET["page"])) {
        $templateParams["page"] = "data";
        $templateParams["header"] = "Dati personali";
        $templateParams["user"] = $dbh->getUserData($_SESSION["userId"]);
    } else {
        switch($_GET["page"]) {
            case "orders":
                $templateParams["page"] = "orders";
                $templateParams["header"] = "I miei ordini";
                $templateParams["orders"] = $dbh->getUserOrders($_SESSION["userId"]);
                foreach($templateParams["orders"] as $order) {
                    $orderId = $order["orderId"];
                    $templateParams["o"."$orderId"] = $dbh->getCopiesInOrder($orderId);
                    foreach($templateParams["o"."$orderId"] as $copy) {
                        $copyId = $copy["copyId"];
                        $templateParams["c"."$copyId"] = $dbh->getGameFromCopy($copyId);
                    }
                }
                break;
            case "wishlist":
                $templateParams["page"] = "wishlist";
                $templateParams["header"] = "La mia lista dei desideri";
                break;
            case "notifications":
                $templateParams["page"] = "notifications";
                $templateParams["header"] = "Le mie notifiche";
        }
    }

    require 'template/base.php';
?>