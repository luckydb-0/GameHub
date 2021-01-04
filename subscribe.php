<?php

require_once 'bootstrap.php';

$templateParams["title"] = "GameHub - Registration Form";
$templateParams["name"] = "template/template-subscribe.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['subscriptionType']) && isset($_POST['fields'])) {
        echo $_POST['subscriptionType'];
        switch ($_POST['subscriptionType']) {
            case "customer":
                if($result = input_check_customer($_POST['name'], $_POST['surname'],
                    $_POST['password'],$_POST['repeat-password'],$_POST['phone-number'],$_POST['email'])) {
                    if($result['result'])
                    if ($id = $dbi->insertNewCustomer($result['name'], $result['surname'], $_POST['birthdate'], $result['phone-number'],
                        $result['email'], $result['password']))
                        $dbi->insertNewCustomerCart($id);
                        header("location:profile.php");
                    }
                else
                    foreach(key($result) as $key){
                        $_POST[$key] = $result[$key];
                    }
                break;
            case "seller":
                if($result = input_check_seller($_POST['name'],$_POST['password'],$_POST['repeat-password'],
                    $_POST['phone-number'],$_POST['email'],$_POST['p_iva']))
                    if($result['result'])
                        if($id = $dbi->insertNewSeller($_POST['name'], $_POST['p_iva'], $_POST['phone-number'],
                    $_POST['email'], $_POST['password'])) {
                            $dbi->insertNewCatalogueSeller($id);
                            header("location:seller.php");
                        }
                        else
                            foreach(key($result) as $key){
                                $_POST[$key] = $result[$key];
                            }
                break;
        }
    }
}
require 'template/base.php';


