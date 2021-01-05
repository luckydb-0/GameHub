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
                $expiration_date = $_POST['exp_year']."-".$_POST['exp_month']."-"."28";
                $expiration_date = check_input($expiration_date);
                $_POST['accountHolder'] = check_input($_POST['accountHolder']);
                $_POST['ccnumber'] = check_input($_POST['ccnumber']);
                $_POST['cvv'] = check_input($_POST['cvv']);
                $dbi->addCreditCard($userId, $_POST["accountHolder"], $_POST["ccnumber"], $expiration_date, $_POST["cvv"]);
            }
    
            if(isset($_POST["saveAddress"])) {
                $_POST['country'] = check_input($_POST['country']);
                $_POST['street'] = check_input($_POST['street']);
                $_POST['postCode'] = check_input($_POST['postCode']);
                $dbi->addUserAddress($userId, $_POST["country"], $_POST["city"], $_POST["street"], $_POST["postCode"]);
            }
    
            if(isset($_POST["creditCard"]) && isset($_POST["addressId"])) {
                if(doubleval($_POST['total']) > $dbr->getTotalPriceCart($userId)){
                    $orderId = $dbi->insertNewOrder($_POST["addressId"],$_POST['total'],$userId);
                    if($copies = $dbr->getCopiesIncart($userId)) {
                        foreach ($copies as $copy) {
                            $dbi->insertNewCopyOrder($copy, $orderId);
                            $dbu->updateGameCopyAsSold($copy);
                            $dbd->removeFromCart($userId, $copy);
                        }
                        //TODO need notify seller that copies has been sold
                    }
                    $dbi->insertNotifyForCustomer($userId,"Il tuo ordine è stato completato con sucesso con codice ordine -> ".$idOrder);
                } else
                    echo "notify"; //TODO notification that order couldn't complete
            } elseif(isset($_POST["creditCard"]) || isset($_POST["addressId"])) {
                $templateParams["error"] = "Selezionare una carta ed un indirizzo di spedizione";
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