<?php
    require_once 'bootstrap.php';

    $templateParams["title"] = "GameHub - Profilo";
    $templateParams["name"] = "template/template-profile.php";

    if(isset($_POST['modifies']))
        if($_POST['modifies'] == 'perform')
            if($result = input_check_customer($_POST['name'],$_POST['surname'],
                $_POST['password'],$_POST['repeat_password'],$_POST['phone_number'],"")) {
                $dbu->updateCustomerInfo(substr($_SESSION['userId'], 2),
                    $result['name'], $result['surname'], $result['phone_number'], $result['password']);
                $_POST['modifies'] = 'updated';
            }

    if(!isUserLoggedIn()) {
        header("Location: login.php");
    } else {
        $userId = substr($_SESSION["userId"], 2);
        if(!isset($_GET["page"])) {
            $templateParams["page"] = "data";
            $templateParams["header"] = "Dati personali";
            $templateParams["user"] = $dbr->getUserData("c:".$userId);
        } else {
            switch($_GET["page"]) {
                case "orders":
                    $templateParams["page"] = "orders";
                    $templateParams["header"] = "I miei ordini";
                    $templateParams["orders"] = $dbr->getUserOrders($userId);
                    foreach($templateParams["orders"] as $order) {
                        $orderId = $order["orderId"];
                        $templateParams["o"."$orderId"] = $dbr->getCopiesInOrder($orderId);
                        foreach($templateParams["o"."$orderId"] as $copy) {
                            $copyId = $copy["copyId"];
                            $templateParams["c"."$copyId"] = $dbr->getGameFromCopy($copyId);
                        }
                    }
                    break;
                case "wishlist":
                    $templateParams["page"] = "wishlist";
                    $templateParams["header"] = "La mia lista dei desideri";
                    $templateParams["games"] = $dbr->getGamesInWishlist($userId);

                    foreach($templateParams["games"] as $game) {
                        $gameId = $game["gameId"];
                        $templateParams["g"."$gameId"] = $dbr->getGameById($gameId);
                    }

                    if(isset($_POST["remove"])) {
                        $dbd->removeFromWishlist($userId, $_POST["remove"]);
                        header("Location: profile.php?page=wishlist");
                    }
                    break;
                case "notifications":
                    $templateParams["page"] = "notifications";
                    $templateParams["header"] = "Le mie notifiche";
                    if(isset($_GET['read']))
                        $dbu->updateNotifyCustomerState($_GET['read'],1);
                    if(isset($_GET['unread']))
                        $dbu->updateNotifyCustomerState($_GET['unread'],0);
                    if(isset($_GET['delete']))
                        $dbd->deleteNotifyCustomer($_GET['delete']);
                    $templateParams["notifications"] = $dbr->getUserNotifications($userId);
                    break;
            }
        }

        require 'template/base.php';
    }
?>

