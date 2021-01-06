<?php
    require_once 'bootstrap.php';
    $templateParams["title"] = "GameHub - Venditore";
    $templateParams["name"] = "template/template-seller.php";
    if(isset($_POST['modifies'])) {
        if ($_POST['modifies'] == 'perform')
            if ($result = input_check_seller($_POST['name'], $_POST['password'],
                $_POST['repeat_password'], $_POST['phone_number'], $_POST['email'], $_POST['p_iva'])) {
                if (!isset($result['password_error']))
                    $dbu->updateSellerInfo(substr($_SESSION['userId'], 2),
                        $result['name'], $result['password'], $result['phone_number']);
                else $_POST['password_error'] = $result['password_error'];
        }
        $_POST['modifies'] = 'updated';
    }

    if(!isLoggedIn()) {
        header("Location: login.php");
    } else {
        $templateParams["sellerId"] = substr($_SESSION["userId"], 2);
        $sellerId = $templateParams["sellerId"] ;

        if(isset($_POST["gameId"]) && isset($_POST["price"]) && isset($_POST["copies"])) {
            $gameId = $_POST["gameId"];
            $price = $_POST["price"];
            $copies = $_POST["copies"];
            $catId = substr($_SESSION["userId"], 2);
            foreach(range(1,intval($copies)) as $copy) {
                $dbi->insertNewSellerArticle($gameId, $price, $catId);
            }
            $gameName = $dbr->getGameNameById($gameId);
            foreach($dbr->getUsersFromGameInWhishList($gameId) as $user)
                $dbi->insertNotifyForCustomer($user['userId'],"Il gioco: ".$gameName." è disponibile nel catalogo!");
        }
        if(isset($_POST["mod-gameId"]) && isset($_POST["mod-price"]) && isset($_POST["mod-copies"])) {
            $gameId = $_POST["mod-gameId"];
            $price = $_POST["mod-price"];
            $copies = $_POST["mod-copies"];
            $oldCopies = $dbr->getAvailableCopy($sellerId,$gameId);
            $oldPrice = $dbr->getGamePriceById($gameId,$sellerId);
            if($price != $oldPrice){
                $dbu->changeCopiesPrice($sellerId,$gameId,$price);
            }
            if(($n = $copies - $oldCopies ) > 0){
                foreach(range(0,$n - 1 ) as $i){
                    $dbi->insertNewSellerArticle($gameId,$price,$sellerId);
                }
                $gameName= $dbr->getGameNameById($gameId);
                foreach($dbr->getUsersFromGameInWhishList($gameId) as $user)
                    $dbi->insertNotifyForCustomer($user['userId'],"Il gioco: ".$gameName." è disponibile nel catalogo!");
            }
            else {
                $dbd->removeCopies($gameId,$sellerId,abs($n));
            }
        }

        if(isset($_POST["orderId"])) {
            $dbu->updateOrderDeliver($_POST["orderId"]);
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
                    $templateParams['js']['article'] = "modify-article.js";
                    $templateParams["page"] = "catalogue";
                    $templateParams["header"] = "Catalogo";
                    break;
                case "orders":
                    $templateParams["page"] = "orders";
                    $templateParams["header"] = "Storico ordini";
                    $templateParams["seller-orders"] = $dbr->getSellerOrders($templateParams["sellerId"]);

                    break;
                case "notifications":
                    $templateParams["page"] = "notifications";
                    $templateParams["header"] = "Le mie notifiche";
                    if(isset($_GET['read']))
                        $dbu->updateNotifySellerState($_GET['read'],1);
                    if(isset($_GET['unread']))
                        $dbu->updateNotifySellerState($_GET['unread'],0);
                    if(isset($_GET['delete']))
                        $dbd->deleteNotifySeller($_GET['delete']);
                    $templateParams["notifications"] = $dbr->getSellerNotification($sellerId);
            }
        }
    }

    require 'template/base.php';
?>