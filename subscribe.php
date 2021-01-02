<?php

require_once 'bootstrap.php';

$templateParams["title"] = "GameHub - Registration Form";
$templateParams["name"] = "template/template-subscribe.php";
var_dump($_POST);
if(!empty($_POST['subscriptionType']) && isset($_POST['fields'])) {
    echo $_POST['subscriptionType'];
    switch ($_POST['subscriptionType']) {
        case "customer":
            echo "debug";
            echo $dbh->insertNewCustomer($_POST['name'], $_POST['surname'], $_POST['birthdate'], $_POST['phone-number'],
                $_POST['email'], $_POST['password']);
            break;
        case "seller":
            echo $dbh->insertNewSeller($_POST['name'], $_POST['p_iva'], $_POST['phone-number'],
                $_POST['email'], $_POST['password']);
            break;
    }
}

require 'template/base.php';
