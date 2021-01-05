<?php

require_once("db/database.php");
class Database_Creater extends DatabaseHelper
{
    public function __construct(){
        parent::__construct("database.ozny.it", "prova", "prova", "gamehub", 3306);
    }
    public function insertNewCustomer($name, $surname, $birthdate, $phone, $email, $password): int
    {
        $password = hash_password($password);
        $query = "INSERT INTO customer(name,surname,birthDate,phone,email,password) VALUES (?, ?, ?, ?, ?, ?);";
        return parent::executeInsert($query, "ssssss", [$name,$surname,$birthdate,$phone,$email,$password]);
    }

    public function insertNewSeller($name, $p_iva, $phone, $email, $password): int
    {
        $password = hash_password($password);
        $query = "INSERT INTO seller(name,p_iva,phone,email,password) VALUES (?, ?, ?, ?, ?);";
        return parent::executeInsert($query, "sssss", [$name,$p_iva,$phone,$email,$password]);
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
        parent::executeInsert($query,'isisi', [$userId, $accountHolder, $ccnumber, $expiration, $cvv]);
    }
    
    public function addToCart($userId, $copyId): int
    {
        $query = "INSERT INTO copy_in_cart (userId, copyId) VALUES (?, ?)";
        return parent::executeInsert($query, "ii", [$userId, $copyId]);
    }

    public function addReview($userId, $gameId, $title, $rating, $description): int
    {
        $query = "INSERT INTO review (customerId, gameId, title, rating, description) VALUES (?, ?, ?, ?, ?);";
        return parent::executeInsert($query, "iisss", [$userId, $gameId, $title, $rating, $description]);
    }

    public function insertNewSellerArticle($gameId, $price, $catalogueId): int
    {
        // Devo creare nuova game copy, e conseguentemente copy in catalogue
        $query = "INSERT INTO game_copy (gameId, price) VALUES (?, ?)"; // Manca numero copie
        parent::executeInsert($query, 'id', [$gameId, $price]);

        $copyId = parent::executeRead("SELECT MAX(copyId) AS id FROM game_copy")[0]["id"];
        $query = "INSERT INTO copy_in_catalogue (copyId, sellerId) VALUES (?, ?)";

        return  parent::executeInsert($query, "ii", [$copyId, $catalogueId]);
    }

    public function insertNewOrder($addressId,$total,$userId): int
    {
        $today = date("Y-m-d");
        $query="INSERT INTO _order (addressId, orderDate, total, userId) VALUES (?, ?, ?, ?);";
        return parent::executeInsert($query, "isii", [$addressId, $today, $total, $userId]);

    }

    public function insertNewCopyOrder($copyId,$orderId): int
    {
        $query = "INSERT INTO copy_in_order (copyId, orderId) VALUES (?,?);";
        return parent::executeInsert($query,"ii",[$copyId,$orderId]);
    }

    public function insertNotifyForCustomer($userId,$string): int
    {
        return parent::executeInsert("INSERT INTO notification_user(userId, description, timeReceived) VALUES (?,?,?)"
        ,"iss",[$userId,$string,date("Y-m-d:h:i")]);
    }

    public function insertNotifyForSeller($sellerId,$string): int
    {
        return parent::executeInsert("INSERT INTO notification_seller(sellerId, description, timeReceived) VALUES (?,?,?)"
            ,"iss",[$sellerId,$string,date("Y-m-d:h:i")]);
    }

    public function addToWishlist($userId, $gameId): int
    {
        $query = "INSERT INTO game_in_wishlist (userId, gameId) VALUES (?, ?);";
        return parent::executeInsert($query, "ii", [$userId, $gameId]);
    }
}