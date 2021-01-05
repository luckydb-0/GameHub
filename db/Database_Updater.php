<?php

require_once("db/database.php");
class Database_Updater extends DatabaseHelper
{
    public function __construct(){
        parent::__construct("database.ozny.it", "prova", "prova", "gamehub", 3306);
    }
    //TODO
    public function changeSeller($user_id, $game_id, $seller_id): bool
    {
        return parent::executeUpdate("");
    }
    public function updateCustomerInfo($id,$name,$surname,$phone,$password): bool
    {
        $hashed_password = hash_password($password);
        return parent::executeUpdate("UPDATE customer 
            SET name=?, surname=?, phone=?, password=?
            WHERE userId=?;","ssssi",[$name,$surname,$phone,$hashed_password,$id]);
    }
    public function updateSellerInfo($id, $name, $password, $phone): bool
    {
        $hashed_password = hash_password($password);
        return parent::executeUpdate("UPDATE seller 
            SET name=?, phone=?, password=?
            WHERE sellerId=?;","sssi",[$name,$phone,$hashed_password,$id]);
    }
    public function updateGameCopyAsSold($copyId){
        $query = "UPDATE game_copy SET sold = 1 WHERE copyId = ?";
        parent::executeUpdate($query,"i",[$copyId]);
    }


    //TODO
    public function changeArticlePrice($seller_id, $article_id): bool
    {
        return parent::executeUpdate("");
    }
    //TODO
    public function changeArticleCopies($seller_id, $article_id): bool
    {
        return parent::executeUpdate("");
    }



}