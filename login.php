<?php
    require_once 'bootstrap.php';

    $templateParams["title"] = "GameHub - Login";
    $templateParams["name"] = "template/template-login.php";

    if(isset($_POST["email"]) && isset($_POST["password"])){
        if($_POST["email"] != "" && $_POST["password"] != ""){
        $login_result = $dbr->checkLogin($_POST["email"], $_POST["password"]);
            if($login_result  == ""){
                $templateParams["errorelogin"] = "Errore! Controllare email o password!";
            }
            else{
                registerLoggedUser($login_result);
            }
        }
    }
    if(isset($_GET["logout"])) {
        unset($_SESSION["userId"]);
        header("Location: index.php");
    }

    if(isUserLoggedIn()){
        header("Location: profile.php");
    }
    else if(isLoggedIn()){
        header("Location: seller.php");
    }

    require 'template/base.php';
?>