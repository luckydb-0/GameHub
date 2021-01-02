<?php

require_once 'bootstrap.php';

$templateParams["title"] = "GameHub - Registration Form";
$templateParams["name"] = "template/template-subscribe.php";
if(isset($_POST["email"]) && isset($_POST["password"])) {
    if ($_POST["email"] != "" && $_POST["password"] != "") {

    }
}


require 'template/base.php';
