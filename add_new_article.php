<?php
    require_once 'bootstrap.php';
    var_dump($_POST);

    if(isset($_POST)) {
        $gameId = $_POST["gameId"];
        $price = $_POST["price"];
        $copies = $_POST["copies"];
        $catId = $dbr->getCatalogueId(substr($_SESSION["userId"], 2));
        $dbi->insertNewSellerArticle($gameId, $price, $copies, $catId);
    }

    require 'seller.php?page=catalogue';
?>