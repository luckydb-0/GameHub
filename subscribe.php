<?php

require_once 'bootstrap.php';

$templateParams["title"] = "GameHub - Registration Form";
$templateParams["name"] = "template/template-subscribe.php";
$templateParams["js"]["input"] = "input.js";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['subscriptionType']) && isset($_POST['fields'])) {
        switch ($_POST['subscriptionType']) {
            case "customer":
                if($result = input_check_customer($_POST['name'], $_POST['surname'],
                    $_POST['password'],$_POST['repeat_password'],$_POST['phone_number'],$_POST['email'])) {
                    if($result['result']) {
                        if ($dbi->insertNewCustomer($result['name'], $result['surname'], $_POST['birthdate'], $result['phone_number'],
                            $result['email'], $result['password'])) {
                            $login_result = $dbr->checkLogin($_POST["email"], $_POST["password"]);
                            registerLoggedUser($login_result);
                            header("Location: profile.php");
                        }
                    }
                } else {
                    foreach(key($result) as $key){
                        $_POST[$key] = $result[$key];
                    }
                }
                break;
            case "seller":
                if($result = input_check_seller($_POST['name'],$_POST['password'],$_POST['repeat_password'],
                    $_POST['phone_number'],$_POST['email'],$_POST['p_iva'])) {
                        var_dump($result);
                    if($result['result']) {
                        if($dbi->insertNewSeller($_POST['name'], $_POST['p_iva'], $_POST['phone_number'],
                            $_POST['email'], $_POST['password'])) {
                            $login_result = $dbr->checkLogin($_POST["email"], $_POST["password"]);
                            registerLoggedUser($login_result);
                            header("Location: profile.php");
                        }
                        else {
                            foreach(key($result) as $key) {
                                $_POST[$key] = $result[$key];
                            }
                        }
                    }
                }
                break;
        }
    }
}
require 'template/base.php';


