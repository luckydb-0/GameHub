<?php
    require_once 'bootstrap.php';

    $templateParams["title"] = "GameHub - Carrello";
    $templateParams["name"] = "template/template-cart.php";
    $templateParams["js"]["input"] = "input.js";
    $templateParams["copies"] = $dbh->getCopiesInCart($_SESSION["userId"]);
    $templateParams["creditCards"] = $dbh->getUserCreditCards($_SESSION["userId"]);
    $templateParams["addresses"] = $dbh->getUserAddresses($_SESSION["userId"]);

    if(isset($_POST["saveMethod"])) {
        $dbh->addCreditCard($_SESSION["userId"], $_POST["accountHolder"], $_POST["ccnumber"], $_POST["expiration"], $_POST["cvv"]);
    }

    foreach($templateParams["copies"] as $copy) {
        $copyId = $copy["copyId"];
        $templateParams["c"."$copyId"] = $dbh->getGameFromCopy($copyId);
    }

    

    require 'template/base.php';
?>