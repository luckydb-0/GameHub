<?php

require_once("db/database.php");
class Database_Updater extends DatabaseHelper
{
    public function __construct(){
        parent::__construct("database.ozny.it", "prova", "prova", "gamehub", 3306);
    }
    //TODO
    public function changeSeller($user_id, $game_id, $seller_id){
        return parent::executeUpdate("");
    }
    //TODO
    public function changeArticlePrice($seller_id, $article_id){
        return parent::executeUpdate("");
    }
    //TODO
    public function changeArticleCopies($seller_id, $article_id){
        return parent::executeUpdate("");
    }

}