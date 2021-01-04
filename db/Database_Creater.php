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

    public function placeOrder($userId, $addressId, $total) {
        $query = "SELECT copyId FROM copy_in_cart WHERE userId = ?;";
        $copies = parent::executeRead($query,'i',[$userId]);

        $today = date("Y-m-d");
        $query="INSERT INTO _order (addressId, orderDate, total, userId) VALUES (?, ?, ?, ?);";
        parent::executeInsert($query, "isii", [$addressId, $today, $total, $userId]);

        $orderId = parent::executeRead("SELECT MAX(orderId) as id FROM _order");
        $orderId = $orderId[0]["id"];

        foreach($copies as $copy) {
            $copyId = $copy["copyId"];
            parent::executeInsert("INSERT INTO copy_in_order (copyId, orderId) VALUES ($copyId, $orderId);");
            parent::executeUpdate("UPDATE game_copy SET sold = 1 WHERE copyId = $copyId");
        }

        parent::executeDelete("DELETE FROM copy_in_cart WHERE userId = $userId");
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
        parent::executeInsert($query, 'ii', [$gameId, $price]);

        $copyId = parent::executeRead("SELECT MAX(copyId) AS id FROM game_copy")[0]["id"];
        $query = "INSERT INTO copy_in_catalogue (copyId, sellerId) VALUES (?, ?)";

        return  parent::executeInsert($query, "ii", [$copyId, $catalogueId]);
    }

    public function insertNewCatalogueSeller($sellerId): int
    {
        return parent::executeInsert("INSERT INTO catalogue(catalogueId, sellerId) VALUES (?,?)","ii",[$sellerId,$sellerId]);

    }

    public function insertNewCustomerCart(int $id): int
    {

        return parent::executeInsert("INSERT INTO cart(cartId, userId) VALUES (?,?)","ii",[$id,$id]);
    }

    public function insertNotifyForCustomer($userId,$string): int
    {
        return parent::executeInsert("INSERT INTO notification(userId, description, timeReceived) VALUES (?,?,?)"
        ,"iss",[$userId,$string,date("YY-m-d",time())]);
    }
    public function insertNotifyForSeller($sellerId,$string){
    }
}