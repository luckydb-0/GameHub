<?php

require_once 'bootstrap.php';

$templateParams["title"] = "GameHub - Registration Form";
$templateParams["name"] = "template/template-subscribe.php";


if($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['subscriptionType']) && isset($_POST['fields'])) {
        echo $_POST['subscriptionType'];
        switch ($_POST['subscriptionType']) {
            case "customer":
                if(input_check_customer())
                    if($dbi->insertNewCustomer($_POST['name'], $_POST['surname'], $_POST['birthdate'], $_POST['phone-number'],
                    $_POST['email'], $_POST['password']))
                        header("location:profile.php");
                break;
            case "seller":
                if(input_check_seller())
                    if($dbi->insertNewSeller($_POST['name'], $_POST['p_iva'], $_POST['phone-number'],
                    $_POST['email'], $_POST['password']))
                        header("location:seller.php");
                break;
        }
    }
}
require 'template/base.php';


function input_check_customer():bool{
        if( $_POST['password'] != $_POST['repeat-password']) {
            $_POST['password-error'] = "Password doesn't match";
            return false;
        }
            $_POST['password'] = check_input($_POST['password']);
            $_POST['name'] = check_input($_POST['name']);
            $_POST['surname'] = check_input($_POST['surname']);
            $_POST['phone-number'] = check_input($_POST['phone-number']);
            $_POST['email'] = check_input($_POST['email']);
            return strlen($_POST['phone-number']) == 10 && strlen($_POST['name']) <= 24 &&
                strlen($_POST['surname']) <= 24 && strlen($_POST['email']) <= 48;
}

function input_check_seller():bool{
    if( $_POST['password'] != $_POST['repeat-password']) {
        $_POST['password-error'] = "Password doesn't match";
        return false;
    }
    $_POST['name'] = check_input($_POST['name']);
    $_POST['phone-number'] = check_input($_POST['phone-number']);
    $_POST['p_iva'] = check_input($_POST['p_iva']);
    return strlen($_POST['phone-number']) == 10 && strlen($_POST['name']) <= 24 &&
        strlen($_POST['p_iva']) === 11 && strlen($_POST['email']) <= 48 ;
}
function check_input($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
