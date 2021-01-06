<?php
require_once 'bootstrap.php';
$templateParams["title"] = "GameHub - Attivazione";
$templateParams["name"] = "template/template-confirmation.php";
if(isset($_GET['id'])){
    $userId = decodeSubscription($_GET['id']);
    $activation_code = decodeSubscription($_GET['code']);
    $dbu->activateNewUser($userId,$activation_code);
}

require 'template/base.php';

?>
