<?php
    require_once 'bootstrap.php';

    if(!isUserLoggedIn()) {
        header("Location: login.php");
    } else {
        $userId = substr($_SESSION["userId"], 2);
        $templateParams["title"] = "GameHub - Carrello";
        $templateParams["name"] = "template/template-cart.php";
        $templateParams["js"]["input"] = "input.js";
        $templateParams["copies"] = $dbh->getCopiesInCart($userId);
        $templateParams["creditCards"] = $dbh->getUserCreditCards($userId);
        $templateParams["addresses"] = $dbh->getUserAddresses($userId);

        if(count($_POST) > 0) {
            if(isset($_POST["remove"])) {
                $dbh->removeFromCart($userId, $_POST["remove"]);
            }

            if(isset($_POST["saveMethod"])) {
                $dbh->addCreditCard($userId, $_POST["accountHolder"], $_POST["ccnumber"], $_POST["expiration"], $_POST["cvv"]);
            }
    
            if(isset($_POST["saveAddress"])) {
                $dbh->addUserAddress($userId, $_POST["country"], $_POST["city"], $_POST["street"], $_POST["postCode"]);
            }
    
            if(isset($_POST["creditCard"]) && isset($_POST["addressId"])) {
                $dbh->placeOrder($userId, $_POST["addressId"], $_POST["total"]);
            }
            header("Location: cart.php");
        }
        

        foreach($templateParams["copies"] as $copy) {
            $copyId = $copy["copyId"];
            $templateParams["c"."$copyId"] = $dbh->getGameFromCopy($copyId);
        }

        require 'template/base.php';
    }   
?>