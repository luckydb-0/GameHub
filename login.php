<?php
    require_once 'bootstrap.php';

    $templateParams["title"] = "GameHub - Login";
    $templateParams["name"] = "template/template-login.php";

    if(isset($_POST["email"]) && isset($_POST["password"])){
        $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
        if(count($login_result) == 0){
            $templateParams["errorelogin"] = "Errore! Controllare email o password!";
        }
        else{
            registerLoggedUser($login_result[0]);
        }
    }
    
    if(isUserLoggedIn()){
        header("Location: profile.php");
    }

    require 'template/base.php';
?>