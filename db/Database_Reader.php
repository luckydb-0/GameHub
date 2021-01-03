<?php

require_once("db/database.php");
class Database_Reader extends DatabaseHelper
{
    public function __construct(){
        parent::__construct("database.ozny.it", "prova", "prova", "gamehub", 3306);
    }

    public function checkLogin($email, $password){
        $value = "";
        if($tmp = $this->getCustomerLogin($email, $password))
            $value = "c:".$tmp[0]['userId'];
        if($tmp = $this->getSellerLogin($email,$password))
            $value = "s:".$tmp[0]['sellerId'];
        return $value;
    }

    public function getCustomerLogin($email, $password)
    {
        $query = "SELECT userId FROM customer 
                    WHERE email=? AND password=?;";
        return parent::executeRead($query,'ss',[$email,$password]);
    }

    public function getSellerLogin($email, $password)
    {
        $query = "SELECT sellerId FROM seller 
                    WHERE email=? AND password=?;";
        return parent::executeRead($query,'ss',[$email,$password]);

    }

    public function getUserData($id) {
        if(strpos($id,"c:")!== false)
            return $this->getCustomerData(substr($id,2));
        else return $this->getSellerData(substr($id,2));
    }

    private function getCustomerData($id){
        $query = "SELECT name, surname, birthDate, email, phone FROM customer WHERE userId = ?;";
        return parent::executeRead($query,'i',[$id]);
    }

    public function getSellerData($id){
        $query = "SELECT name, email, p_iva, phone 
                    FROM seller WHERE sellerId = ?;";
        return parent::executeRead($query,'i',[$id]);
    }

    public function getUserOrders($userId){
        $query = "SELECT orderId, total FROM _order O JOIN customer C ON C.userId = O.userId WHERE C.userId = ?;";
        return parent::executeRead($query,'i',[$userId]);
    }

    public function getCopiesInOrder($orderId) {
        $query = "SELECT copyId FROM copy_in_order WHERE orderId = ?;";
        return parent::executeRead($query,'i',[$orderId]);
    }

    public function getGameFromCopy($copyId) {
        $query = "SELECT V.image, V.title, P.name as platform, C.price
        FROM videogame V JOIN game_copy C ON V.gameId = C.gameId JOIN platform P ON V.platformId = P.platformId
        where C.copyId = ?;";
        return parent::executeRead($query,'i',[$copyId]);
    }

    public function getGameById($gameId) {
        $query = "SELECT V.image, V.title, P.name, V.releaseDate, V.description, V.suggestedPrice
        FROM videogame V JOIN platform P ON V.platformId = P.platformId
        WHERE V.gameId =?;";

        return parent::executeRead($query,'i',[$gameId]);
    }

    public function getSellerOrders($seller_id) {
        $query = "SELECT O.orderDate, O.total, O.userId, O.orderId FROM _order O JOIN order_seller OS
        ON O.orderId = OS.orderId JOIN seller S ON S.sellerId = OS.sellerId WHERE S.sellerId = ?;";
        return parent::executeRead($query,'i',[$seller_id]);
    }

    public function getCopiesInCart($userId){
        $query = "SELECT copyId FROM copy_in_cart CC join cart C ON CC.cartId = C.cartId 
        WHERE C.userId = ?;";
return parent::executeRead($query,'i',[$userId]);
    }

    public function getUserAddress($user_id) {
        $query = "SELECT A.country, A.city, A.street, A.postCode FROM address A JOIN
        shipping S ON A.addressId = S.addressId JOIN customer C ON C.userId = ?;";
        return parent::executeRead($query,'i', [$user_id]);
    }

    public function getGamesInWishlist($userId){
        $query = "SELECT gameId FROM game_in_wishlist CW join wishlist W ON CW.wishlistId = W.wishlistId 
        WHERE W.userId = ?;";
        return parent::executeRead($query,'i', [$userId]);
    }

    public function getPlatforms() {
        $query = "SELECT name FROM platform;";
        return parent::executeRead($query);
    }

    public function getUserNotifications($userId) {
        $query = "SELECT notificationId, timeReceived, description FROM notification WHERE userId = ?;";
        return parent::executeRead($query,'i', [$userId]);
    }

    public function getCategories() {
        $query = "SELECT categoryName FROM category;";
        return parent::executeRead($query);
    }

    public function getDevelopers() {
        $query = "SELECT name FROM developer;";
        return parent::executeRead($query);
    }

    public function getGameByCategory($category){
        $query = "SELECT V.gameId FROM videogame V JOIN game_category GC ON 
        V.gameId = GC.gameId JOIN category C ON C.categoryId = GC.categoryId WHERE C.categoryName = ?;";
        return parent::executeRead($query,'s', [$category]);
    }

    public function getGameByConsole($console){
        $query = "SELECT V.gameId FROM videogame V JOIN platform P ON
         P.platformId = V.platformId WHERE P.name = ?;";
        return parent::executeRead($query,'s', [$console]);
    }

    public function getUserCreditCards($userId) {
        $query = "SELECT accountHolder, ccnumber, expiration FROM credit_card WHERE userId = ?;";
        return parent::executeRead($query,'i', [$userId]);
    }

    public function getUserAddresses($userId) {
        $query = "SELECT A.addressId, country, city, street, postCode FROM address A join shipping S on A.addressId = S.addressId
        WHERE S.userId = ?;";
        return parent::executeRead($query,'i', [$userId]);

    }

    public function getGenresFromGameId($gameId) {
        $query = "SELECT categoryName FROM category C JOIN game_category GC on C.categoryId = GC.categoryId WHERE GC.gameId = ?;";
        return parent::executeRead($query,"i", [$gameId]);
    }

    public function getGameLowestPriceAndSeller($gameId) {
        $query = "SELECT MIN(GC.price) as lowestPrice, S.name as seller
                                    FROM game_copy GC JOIN copy_in_catalogue CC ON GC.copyId = CC.copyId JOIN seller S ON CC.catalogueId = S.sellerId
                                    WHERE GC.gameId = ?;";
        return parent::executeRead($query,'i', [$gameId]);
    }

    public function getGameByDeveloper($developer){
        $query = "SELECT V.gameId FROM videogame V JOIN developer D 
                                    ON D.developerId = V.developerId WHERE D.name = ?;";
        return parent::executeRead($query,'s', [$developer]);
    }

    public function searchGamesByName($name) {
        $query = "SELECT gameId from videogame WHERE title LIKE '%$name%';";
        return parent::executeRead($query);
    }

    public function searchGames($consoleNames, $categoryNames, $developerName, $maxPrice=1000, $name): array
    {
        $resultsArrays = array();
        $categoryResults = array();
        $consoleResults = array();
        $developerResults = array();

        $nameResults = disassemble_array($this->searchGamesByName($name)); // From functions.php
        if(!empty($nameResults)) {
            $resultsArrays[] = $nameResults;
        }

        foreach($categoryNames as $category) {
            $res = $this->getGameByCategory($category);
            foreach($res as $gameId) {
                $categoryResults[] = $gameId["gameId"];
            }
        }
        if(!empty($categoryResults)) {
            $resultsArrays[] = $categoryResults;
        }

        foreach($consoleNames as $console) {
            $res = $this->getGameByConsole($console);
            foreach($res as $gameId) {
                $consoleResults[] = $gameId["gameId"];
            }
        }
        if(!empty($consoleResults)) {
            $resultsArrays[] = $consoleResults;
        }

        $res = $this->getGameByDeveloper($developerName);
        foreach($res as $gameId) {
            $developerResults[] = $gameId["gameId"];
        }
        if(!empty($developerResults)) {
            $resultsArrays[] = $developerResults;
        }

        $result = array_intersect(...$resultsArrays);
        $result = disassemble_array($this->filterGamesByPrice($result, $maxPrice));

        return array_values($result);
    }

    public function filterGamesByPrice($gamesId, $price){
        $in = str_repeat('?,', count($gamesId) - 1).'?'; // To generate as many ? wildcards as the array length
        $query = "SELECT gameId FROM videogame WHERE suggestedPrice <= ? AND gameId IN ($in);";
        $types = 'i'.str_repeat('s', count($gamesId)); // To concatenate as many s needed
        return parent::executeRead($query,$types,[$price,...$gamesId]);
    }


    /* DA IMPLEMENTARE */

    // n = number of random games
    //TODO
    public function getGameSellers($game_name){
        return parent::executeRead("","",[$game_name]);
    }
    //TODO
    public function getRandomGames($n){
        return parent::executeRead("","",[$n]);
    }
    //TODO
    public function getSuggestedGames($n){
        return parent::executeRead("","",[$n]);

    }
    //TODO
    public function getNewestGames(){
        return parent::executeRead("","",[]);

    }
    //TODO
    public function getGamesToPreorder(){
        return parent::executeRead("","",[]);

    }
    //TODO
    public function getMostSoldGames(){
        return parent::executeRead("","",[]);

    }
    //TODO
    public function getImageNameById($id){
        return parent::executeRead("","",[$id]);
    }
    //TODO
    public function getGameNameById($id){
        return parent::executeRead("","",[$id]);
    }
    //TODO
    public function getGamePriceById($id){
        return parent::executeRead("","",[$id]);
    }
    //TODO
    public function getCategoryById($idcategory){
        return parent::executeRead("","",[$idcategory]);
    }
}