<?php

require_once("db/database.php");
class Database_Creater extends DatabaseHelper
{
    public function __construct(){
        parent::__construct("database.ozny.it", "prova", "prova", "gamehub", 3306);
    }
    public function insertNewCustomer($name, $surname, $birthdate, $phone, $email, $password): int
    {
        return parent::executeInsert("INSERT INTO customer(name,surname,birthDate,phone,email,password) VALUES ('$name','$surname','$birthdate',$phone,'$email','$password');");
    }

    public function insertNewSeller($name, $p_iva, $phone, $email, $password): int
    {
        return parent::executeInsert("INSERT INTO seller(name,p_iva,phone,email,password) VALUES ('$name',$p_iva,$phone,'$email','$password');");
    }

    public function placeOrder($userId, $addressId, $total) {
        $query = "SELECT copyId FROM copy_in_cart WHERE cartId = ?;";
        $copies = parent::executeRead($query,'i',[$userId]);

        $today = date("Y-m-d");
        $query="INSERT INTO _order (addressId, orderDate, total, userId) VALUES ($addressId, '$today', $total, $userId);";
        parent::executeInsert($query);

        $orderId = parent::executeRead("SELECT MAX(orderId) as id FROM _order");
        $orderId = $orderId[0]["id"];

        foreach($copies as $copy) {
            $copyId = $copy["copyId"];
            parent::executeInsert("INSERT INTO copy_in_order (copyId, orderId) VALUES ($copyId, $orderId);");
            parent::executeUpdate("UPDATE game_copy SET sold = 1 WHERE copyId = $copyId");
        }

        parent::executeDelete("DELETE FROM copy_in_cart WHERE cartId = $userId");
    }

    public function addUserAddress($userId, $country, $city, $street, $postCode) {
        $query= "INSERT INTO address (country, city, street, postCode) VALUES (?, ?, ?, ?)";
        parent::executeInsert($query,"sssi", [$country, $city, $street, $postCode]);

        $query="SELECT MAX(addressId) as id FROM address";
        $addressId = parent::executeRead($query);
        $addressId = $addressId[0]["id"];

        $query = "INSERT INTO shipping (userId, addressId) VALUES (?, ?)";
        parent::executeInsert($query,"ii", [$userId, $addressId]);
    }

    public function addCreditCard($userId, $accountHolder, $ccnumber, $expiration, $cvv) {
        $query = "INSERT INTO credit_card (userId, accountHolder, ccnumber, expiration, cvv) VALUES (?, ?, ?, ?, ?)";
        $expDate = $expiration."-01";
        parent::executeInsert($query,'isisi', [$userId, $accountHolder, $ccnumber, $expDate, $cvv]);
    }
    
    public function addToCart($userId, $copyId) {
        $query = "INSERT INTO copy_in_cart (cartId, copyId) VALUES (?, ?)";
        return parent::executeInsert($query, "ii", [$userId, $copyId]);
    }

    public function addReview($userId, $gameId, $title, $rating, $description) {
        $query = "INSERT INTO review (customerId, gameId, title, rating, description) VALUES (?, ?, ?, ?, ?);";
        return parent::executeInsert($query, "iisss", [$userId, $gameId, $title, $rating, $description]);
    }
    //TODO
    public function insertNewSellerArticle($article_img, $article_name, $article_platform, $article_price, $article_copies): int
    {
        return  parent::executeInsert("");
    }
}