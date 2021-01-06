<?php 
    function reverseDate($date) {
        $reversed = date_create_from_format('Y-m-d', $date);
        $reversed = date_format($reversed, 'd-m-Y');
        return str_replace("-", "/", $reversed); 
    }

    function isUserLoggedIn(): bool
    {
        return isLoggedIn() && strpos($_SESSION['userId'],"c:")!==false;
    }

    function isLoggedIn(): bool
    {
        return !empty($_SESSION['userId']);
    }

    function registerLoggedUser($user){
        $_SESSION["userId"] = $user;
    }

    function disassemble_array($matrix): array
    {
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

    function notnull_array_intersect($array): array
    {
        $values = disassemble_array($array);
        $result = array_unique($values);
        var_dump($result);

        return $result;

    }
    function hash_password($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }
    function password_check($password,$hash): bool
    {
        return password_verify($password,$hash);
    }
    function check_input($data): string
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function input_check_customer($name,$surname,$password,$rep_password,$phone,$email):array{
        $result = array();
        if( $password != $rep_password) {
            $result['password_error'] = "Password doesn't match";
            return $result;
        }
        $result['password'] = check_input($password);
        $result['name'] = check_input($name);
        $result['surname'] = check_input($surname);
        $result['phone_number'] = check_input($phone);
        $result['email'] = check_input($email);
        $result['result'] = strlen($phone) == 10 && strlen($name) <= 24 && strlen($email) <= 48 ;
        return $result;
    }

    function input_check_seller($name,$password,$rep_password,$phone,$email,$p_iva):array{
        $result = array();
        if( $password != $rep_password) {
            $result['password_error'] = "Password doesn't match";
            return $result;
        }
        $result['password'] = check_input($password);
        $result['name'] = check_input($name);
        $result['phone_number'] = check_input($phone);
        $result['p_iva'] = check_input($p_iva);
        $result['result'] = strlen($phone) == 10 && strlen($name) <= 24 &&
            strlen($p_iva) === 11 && strlen($email) <= 48 ;
        return $result;
    }
?>