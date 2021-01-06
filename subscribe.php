<?php

require_once 'bootstrap.php';

$templateParams["title"] = "GameHub - Registration Form";
$templateParams["name"] = "template/template-subscribe.php";
$templateParams["js"]["input"] = "input.js";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $activation_code = createActivationCode(0);
    if (!empty($_POST['subscriptionType']) && isset($_POST['fields'])) {
        switch ($_POST['subscriptionType']) {
            case "customer":
                if($result = input_check_customer($_POST['name'], $_POST['surname'],
                    $_POST['password'],$_POST['repeat_password'],$_POST['phone_number'],$_POST['email'])) {
                    if($result['result']) {
                        if ($userId = $dbi->insertNewCustomer($result['name'], $result['surname'], $_POST['birthdate'], $result['phone_number'],
                            $result['email'], $result['password'],$activation_code)) {
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
                        if($userId = $dbi->insertNewSeller($_POST['name'], $_POST['p_iva'], $_POST['phone_number'],
                            $_POST['email'], $_POST['password'],$activation_code)) {
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
        $activation_link = createActivationLink($userId,$activation_code);
        $content = 'You succesfully subscribed to our website! \r\n Click the link below:\r\n
                    http://localhost/gamehub/activate.php?'.$activation_link;
        sendEmail($_POST['email'],"Welcome To GameHub!",$content);
    }
}
require 'template/base.php';


