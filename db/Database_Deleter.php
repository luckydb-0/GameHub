<?php

require_once("db/database.php");
class Database_Deleter extends DatabaseHelper
{

    public function __construct(){
        parent::__construct("database.ozny.it", "prova", "prova", "gamehub", 3306);
    }


    public function removeFromCart($userId, $copyId) {
        $query="DELETE FROM copy_in_cart WHERE copyId = ? AND cartId = ?";
        return parent::executeDelete($query,'ii', [$copyId, $userId]);
    }
    public function removeArticleFromCatalogue($seller_id, $article_id){
        $query="DELETE FROM catalogue WHERE sellerId = ? AND  catalogueId = ?";
        return parent::executeDelete($query,'ii', [$seller_id, $article_id]);
    }
    public function removeArticleFromCart($user_id, $article_id){
        $query="DELETE FROM cart WHERE userId = ?";
        return parent::executeDelete($query,'ii', [$user_id, $article_id]);
    }
    public function removeArticleFromWishlist($user_id, $article_id){
        $query="DELETE FROM wishlist WHERE userId = ?";
        return parent::executeDelete($query,'ii', [$user_id, $article_id]);

    }

}