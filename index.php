<?php
    require_once 'bootstrap.php';

    $templateParams["title"] = "GameHub - Home";
    $templateParams["name"] = "template/template-home.php";

    /* Probabilmente nella versione finale il db restituirà gli id dei giochi e nel template ci sarà un ulteriore
        interrogazione al db per ottenere ogni singola informazioni partendo dall'id.
    */
    $templateParams["mostSold"][0]["imageName"] = "AnimalCrossing-Switch.jpg";
    $templateParams["mostSold"][0]["alt"] = "Animal Crossing Switch";
    $templateParams["mostSold"][1]["imageName"] = "GTA5-PS4.jpg";
    $templateParams["mostSold"][2]["imageName"] = "Fifa20-PS4.jpg";
    
    $templateParams["preorder"][0]["imageName"] = "FarCry6-PS5.jpg";
    $templateParams["preorder"][0]["alt"] = "Far Cry 6 PS5";
    $templateParams["preorder"][0]["name"] = "Far Cry 6";
    $templateParams["preorder"][0]["price"] = "69.99";

    $templateParams["preorder"][1]["imageName"] = "XIII-Switch.jpg";
    $templateParams["preorder"][1]["alt"] = "Thirteen Switch";
    $templateParams["preorder"][1]["name"] = "XIII";
    $templateParams["preorder"][1]["price"] = "59.99";

    require 'template/base.php';
?>