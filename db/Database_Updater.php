<?php

require_once("db/database.php");
class Database_Updater extends DatabaseHelper
{
    public function __construct(){
        parent::__construct("database.ozny.it", "prova", "prova", "gamehub", 3306);
    }

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
    public function updateGameCopyAsSold($copyId): bool
    {
        $query = "UPDATE game_copy SET sold = 1 WHERE copyId = ?";
        return parent::executeUpdate($query,"i",[$copyId]);
    }

    public function changeCopiesPrice($sellerId, $gameId, $price): bool
    {
        $query = "UPDATE game_copy join copy_in_catalogue 
        on game_copy.copyId= copy_in_catalogue.copyId 
        set price = ? where game_copy.gameId=? and 
        copy_in_catalogue.sellerId=? and game_copy.sold = 0";
        $types = "dii";
        return parent::executeUpdate($query, $types, [$price, $gameId, $sellerId]);
    }

    public function updateNotifyCustomerState($notifyId, $state): bool
    {
        $query= "UPDATE notification_user SET isRead=? WHERE notificationId=?";
        return parent::executeUpdate($query,"ii",[$state,$notifyId]);
    }
    public function updateNotifySellerState($notifyId, $state): bool
    {
        $query= "UPDATE notification_seller SET isRead=? WHERE notificationId=?";
        return parent::executeUpdate($query,"ii",[$state,$notifyId]);
    }

    public function updateOrderDeliver($orderId): bool
    {
        $now = date("Y-m-d");
        $query = "UPDATE _order SET deliverDate = ? WHERE orderId = ?";
        return parent::executeUpdate($query, "si", [$now, $orderId]);
    }

    public function activateNewUser($userId,$activation_code):bool
    {
        $query = "update customer set active=1 where activation_code=? and userId=?";
        if($result = parent::executeUpdate($query,"si",[$activation_code,$userId]))
            return $result;
        $query = "update seller set active=1 where activation_code=? and sellerId=?";
        if($result = parent::executeUpdate($query,"si",[$activation_code,$userId]))
            return $result;
        else return false;
    }
}