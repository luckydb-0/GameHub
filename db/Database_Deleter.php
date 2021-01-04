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

}