<?php

require_once("db/database.php");
class Database_Deleter extends DatabaseHelper
{

    public function __construct(){
        parent::__construct("database.ozny.it", "prova", "prova", "gamehub", 3306);
    }

    public function removeFromCart($userId, $copyId): bool
    {
        $query="DELETE FROM copy_in_cart WHERE copyId = ? AND userId = ?";
        return parent::executeDelete($query,'ii', [$copyId, $userId]);
    }

    public function removeFromWishlist($userId, $gameId): bool
    {
        $query="DELETE FROM game_in_wishlist WHERE gameId = ? AND userId = ?";
        return parent::executeDelete($query,'ii', [$gameId, $userId]);
    }

    public function deleteNotifyCustomer($notifyId): bool
    {
        $query="DELETE FROM notification_user WHERE notificationId = ?";
        return parent::executeDelete($query,'i', [$notifyId]);
    }
    public function deleteNotifySeller($notifyId): bool
    {
        $query="DELETE FROM notification_seller WHERE notificationId = ?";
        return parent::executeDelete($query,'i', [$notifyId]);
    }
    public function removeCopies($gameId, $sellerId, $n): bool
    {
        $query="delete from game_copy where copyId IN
                (select * from (select gc.copyId from game_copy gc inner join 
                 copy_in_catalogue cc on 
                 cc.copyId = gc.copyId 
                 where gc.gameId=? and cc.sellerId=? limit ?)as result);";
        return parent::executeDelete($query,"iii",[$gameId,$sellerId,$n]);
    }

}