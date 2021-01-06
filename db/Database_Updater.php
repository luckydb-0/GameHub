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
    public function updateGameCopyAsSold($copyId): bool
    {
        $query = "UPDATE game_copy SET sold = 1 WHERE copyId = ?";
        return parent::executeUpdate($query,"i",[$copyId]);
    }

    public function updateCopies($sellerId, $gameId, $newPrice, $newCopies): bool {
        $actualCopiesQuery = "SELECT R.gameId, COUNT(R.gameId) as num FROM (SELECT GC.gameId FROM game_copy GC JOIN copy_in_catalogue CC ON GC.copyId = CC.copyId WHERE CC.sellerId = ? AND GC.gameId = ?) as R";
        $actualCopies = parent::executeRead($actualCopiesQuery, "ii", [$sellerId, $gameId]);

        $queryCopies = "SELECT * FROM game_copy GC JOIN copy_in_catalogue CC ON GC.copyId = CC.copyId WHERE CC.sellerId = ? AND GC.gameId = ?";
        $diff = $actualCopies["num"] - $newCopies;
        $types = "";
        $query = "";
        if($diff < 0) {
            $line = "INSERT INTO game_copy (gameId, price) values (?, ?); INSERT INTO copy_in_catalogue (copyId, sellerId) values ((SELECT MAX(copyId) FROM game_copy), ?);";
            for($n = -$diff; $n > 0; $n--) {
                $query = $query.$line;
                $types = $types."idi";
            }
            parent::executeInsert($query, $types, [$gameId, $seller_id, $price, $seller_id]);
        } else if($diff > 0) {
            //$query = "DELETE FROM game_copy GC JOIN copy_in_catalogue CC ON CC.copyId = GC.copyId WHERE GC.gameId = ? LIMIT ?";
            $types = "ii";
            parent::executeDelete($query, $types, [$gameId, $diff]);
        }
        
        return parent::executeUpdate($query, "iidi", [$sellerId, $gameId, $newPrice, $newCopies]);
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

    public function updatePrice($gameId)
    {

    }


}