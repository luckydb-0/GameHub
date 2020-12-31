<?php
    require_once 'bootstrap.php';

    $templateParams["title"] = "GameHub - Carrello";
    $templateParams["name"] = "template/template-cart.php";
    $templateParams["js"]["input"] = "input.js";
    $templateParams["copies"] = $dbh->getCopiesInCart($_SESSION["userId"]);
    $templateParams["creditCards"] = $dbh->getUserCreditCards($_SESSION["userId"]);

    var_dump($_POST);

    foreach($templateParams["copies"] as $copy) {
        $copyId = $copy["copyId"];
        $templateParams["c"."$copyId"] = $dbh->getGameFromCopy($copyId);
    }

    

    require 'template/base.php';
?>