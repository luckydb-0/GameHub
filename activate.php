<?php
require_once 'bootstrap.php';
var_dump($_GET);
if(isset($_GET['id'])){
    $userId = decodeSubscription($_GET['id']);
    $activation_code = decodeSubscription($_GET['code']);
    echo $userId;
    echo $activation_code;
    $dbu->activateNewUser($userId,$activation_code);
}

require 'template/base.php';

?>
