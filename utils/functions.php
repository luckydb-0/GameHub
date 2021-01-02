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

    function disassemble_array($matrix) {
        $result = array();
        $i = 0;

        foreach($matrix as $array) {
            foreach($array as $value) {
                $result[$i] = $value;
                $i++;
            }
        }

        return $result;
    }

    function notnull_array_intersect($array) {
        $values = disassemble_array($array);
        $result = array_unique($values);
        var_dump($result);

        return $result;

    }

?>