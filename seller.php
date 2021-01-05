<?php
    require_once 'bootstrap.php';

    $templateParams["title"] = "GameHub - Venditore";
    $templateParams["name"] = "template/template-seller.php";

    if(isset($_POST['modifies']))
        if($_POST['modifies']=='perform')
        if($result = input_check_seller($_POST['name'], $_POST['password'],
            $_POST['repeat_password'],$_POST['phone_number'],$_POST['email'],$_POST['p_iva'])) {
            $dbu->updateSellerInfo(substr($_SESSION['userId'], 2),
                $result['name'], $result['password'], $result['phone_number']);
            $_POST['modifies'] = 'updated';
        }
    if(!isLoggedIn()) {
        header("Location: login.php");
    } else {
        $templateParams["sellerId"] = substr($_SESSION["userId"], 2);
        if(isset($_POST["gameId"]) && isset($_POST["price"]) && isset($_POST["copies"])) {
            $gameId = $_POST["gameId"];
            $price = $_POST["price"];
            $copies = $_POST["copies"];
            $catId = substr($_SESSION["userId"], 2);
            foreach(range(1,intval($copies)) as $copy) {
                $dbi->insertNewSellerArticle($gameId, $price, $catId);
                //TODO if a customer has in whishlist a game that has no copy and game gets available again
            }
        }
        //TODO missing process modifies catalogue
        //TODO missing process selected order

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
    }

    require 'template/base.php';

    function notifyCustomerProductAvailable($gameId){
    }
    ?>