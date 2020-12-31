<?php 
    function reverseDate($date) {
        $reversed = date_create_from_format('Y-m-d', $date);
        $reversed = date_format($reversed, 'd-m-Y');
        return str_replace("-", "/", $reversed); 
    }

    function isUserLoggedIn(){
        return !empty($_SESSION['userId']);
    }

    function registerLoggedUser($user){
        $_SESSION["userId"] = $user["userId"];
    }
?>