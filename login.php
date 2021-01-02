<?php
    require_once 'bootstrap.php';

    $templateParams["title"] = "GameHub - Login";
    $templateParams["name"] = "template/template-login.php";

    if(isset($_POST["email"]) && isset($_POST["password"])){
        if($_POST["email"] != "" && $_POST["password"] != ""){
        $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
        echo $login_result;
        if($login_result  == ""){
            echo "debug";
            $templateParams["errorelogin"] = "Errore! Controllare email o password!";
        }
        else{
            registerLoggedUser($login_result);
        }
    }
    }
    
    if(isLoggedIn()){
        header("Location: profile.php");
    }

    require 'template/base.php';
?>