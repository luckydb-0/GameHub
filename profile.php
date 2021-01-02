<?php
    require_once 'bootstrap.php';

    $templateParams["title"] = "GameHub - Profilo";
    $templateParams["name"] = "template/template-profile.php";

    if(!isUserLoggedIn()) {
        header("Location: login.php");
    } else {
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
                    $templateParams["games"] = $dbh->getGamesInWishlist($_SESSION["userId"]);

                    foreach($templateParams["games"] as $game) {
                        $gameId = $game["gameId"];
                        $templateParams["g"."$copyId"] = $dbh->getGameById($gameId);
                    }
                    break;
                case "notifications":
                    $templateParams["page"] = "notifications";
                    $templateParams["header"] = "Le mie notifiche";
                    $templateParams["notifications"] = $dbh->getUserNotifications($_SESSION["userId"]);
                    break;
            }
        }

        require 'template/base.php';
    }
?>