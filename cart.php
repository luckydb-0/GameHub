<?php
    require_once 'bootstrap.php';

    if(!isUserLoggedIn()) {
        header("Location: login.php");
    } else {
        $userId = substr($_SESSION["userId"], 2);
        $templateParams["title"] = "GameHub - Carrello";
        $templateParams["name"] = "template/template-cart.php";
        $templateParams["js"]["input"] = "input.js";
        $templateParams["copies"] = $dbr->getCopiesInCart($userId);
        $templateParams["creditCards"] = $dbr->getUserCreditCards($userId);
        $templateParams["addresses"] = $dbr->getUserAddresses($userId);

        if(count($_POST) > 0) {
            if(isset($_POST["remove"])) {
                $dbd->removeFromCart($userId, $_POST["remove"]);
            }

            if(isset($_POST["saveMethod"])) {
                $dbi->addCreditCard($userId, $_POST["accountHolder"], $_POST["ccnumber"], $_POST["expiration"], $_POST["cvv"]);
            }
    
            if(isset($_POST["saveAddress"])) {
                $dbi->addUserAddress($userId, $_POST["country"], $_POST["city"], $_POST["street"], $_POST["postCode"]);
            }
    
            if(isset($_POST["creditCard"]) && isset($_POST["addressId"])) {
                $dbi->placeOrder($userId, $_POST["addressId"], $_POST["total"]);
            }
            header("Location: cart.php");
        }
        

        foreach($templateParams["copies"] as $copy) {
            $copyId = $copy["copyId"];
            $templateParams["c"."$copyId"] = $dbr->getGameFromCopy($copyId);
        }

        require 'template/base.php';
    }   
?>