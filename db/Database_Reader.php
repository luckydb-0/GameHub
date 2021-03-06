<?php

require_once("db/database.php");
class Database_Reader extends DatabaseHelper
{
    public function __construct(){
        parent::__construct("database.ozny.it", "prova", "prova", "gamehub", 3306);
    }

    public function checkLogin($email, $password): string
    {
        if($hashed_password = $this->getCustomerPassword($email))
            if(password_check($password,$hashed_password))
                if ($tmp = $this->getCustomerLogin($email, $hashed_password))
                    return  "c:" . $tmp[0]['userId'];
        if($hashed_password = $this->getSellerPassword($email))
            if(password_check($password,$hashed_password))
                if ($tmp = $this->getSellerLogin($email, $hashed_password))
                    return "s:" . $tmp[0]['sellerId'];
        return "";
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
        $query = "SELECT orderId, total, deliverDate FROM _order O JOIN customer C ON C.userId = O.userId WHERE C.userId = ?;";
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

        return parent::executeRead($query,'s',[(string)$gameId]);
    }

    public function getSellerOrders($seller_id) {
        $query = "SELECT O.orderDate, O.total, O.userId, O.orderId FROM _order O JOIN order_seller OS
        ON O.orderId = OS.orderId JOIN seller S ON S.sellerId = OS.sellerId WHERE S.sellerId = ?;";
        return parent::executeRead($query,'i',[$seller_id]);
    }

    public function getCopiesInCart($userId){
        $query = "SELECT copyId FROM copy_in_cart 
        WHERE userId = ?;";
        return parent::executeRead($query,'i',[$userId]);
    }
    public function getSellerCatalogue($catalogueId){
        $query = "SELECT V.title, V.image, P.name,GC.copyId, GC.gameId, GC.price,COUNT(GC.gameId) - SUM(GC.sold) as copies, SUM(GC.sold) as sold
                    FROM videogame V JOIN game_copy GC ON V.gameId = GC.gameId 
                    JOIN copy_in_catalogue CC ON CC.copyId = GC.copyId 
                    JOIN seller S ON S.sellerId = CC.sellerId 
                    JOIN platform P ON V.platformId = P.platformId 
                    WHERE S.sellerId = ? GROUP BY GC.gameId ;";
        return parent::executeRead($query,'i', [$catalogueId]);
    }
    public function getUserAddress($user_id) {
        $query = "SELECT A.country, A.city, A.street, A.postCode FROM address A JOIN
        shipping S ON A.addressId = S.addressId JOIN customer C ON C.userId = ?;";
        return parent::executeRead($query,'i', [$user_id]);
    }

    public function getGamesInWishlist($userId){
        $query = "SELECT gameId FROM game_in_wishlist WHERE userId = ?;";
        return parent::executeRead($query,'i', [$userId]);
    }

    public function getPlatforms() {
        $query = "SELECT name FROM platform;";
        return parent::executeRead($query);
    }

    public function getUserNotifications($userId) {
        $query = "SELECT notificationId, timeReceived, description,isRead FROM notification_user WHERE userId = ? order by timeReceived desc;";
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
        $query = "SELECT MIN(GC.price) as lowestPrice, S.name as seller, GC.copyId
                  FROM game_copy GC JOIN copy_in_catalogue CC ON GC.copyId = CC.copyId JOIN seller S ON CC.sellerId = S.sellerId
                  WHERE GC.gameId = ? AND sold = 0;";
        return parent::executeRead($query,'i', [$gameId]);
    }

    public function getGameByDeveloper($developer) {
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
        $results = array();
        $resultsArrays = array();
        $categoryResults = array();
        $consoleResults = array();
        $developerResults = array();

        $nameResults = disassemble_array($this->searchGamesByName($name));
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

        if(count($resultsArrays) < 2) {
            $result = $resultsArrays[0];
        } else {
            $result = array_intersect(...$resultsArrays);
        }
        
        if(count($result) > 0) {
            $result = disassemble_array($this->filterGamesByPrice($result, $maxPrice));
        }
        return array_values($result);
    }


    public function filterGamesByPrice($gamesId, $price) {
        $in = str_repeat('?,', count($gamesId) - 1).'?';
        $query = "SELECT gameId FROM videogame WHERE suggestedPrice <= ? AND gameId IN ($in);";
        $types = 'i'.str_repeat('s', count($gamesId));
        return parent::executeRead($query,$types,[$price,...$gamesId]);
    }

    public function getGames() {
        $query = "SELECT V.title, V.image, P.name, V.gameId FROM videogame V JOIN platform P 
                  ON P.platformId = V.platformId ORDER BY V.gameId";
        return parent::executeRead($query);
    }
    
    public function getSuggestedGames($gameId) {
        $query = "SELECT V.gameId, V.title, V.image, P.name
                  FROM videogame V JOIN game_category GC ON V.gameId = GC.gameId JOIN developer D ON D.developerId = V.developerId JOIN platform P ON V.platformId = P.platformId
                  WHERE (GC.categoryId IN (SELECT GC.categoryId FROM videogame V JOIN game_category GC on V.gameId = GC.gameId WHERE V.gameId = ?)
                  OR D.developerId IN (SELECT developerId FROM videogame WHERE gameId = ?))
                  AND V.platformId IN (SELECT platformId FROM videogame WHERE gameId = ?)
                  AND V.gameId != ?
                  GROUP BY V.gameId";
        return parent::executeRead($query, "iiii", [$gameId, $gameId, $gameId, $gameId]);

    }

    public function getReviews($gameId) {
        $query = "SELECT R.title, R.description, R.rating, C.name, C.surname FROM review R JOIN customer C ON R.customerId = C.userId WHERE gameId = ?";
        return parent::executeRead($query, "i", [$gameId]);
    }

    public function getNewestGames($n){
        $query = "SELECT V.gameId, V.title, V.image, V.releaseDate FROM (SELECT * FROM videogame ORDER BY RAND()) as V
                  WHERE V.releaseDate <= CURDATE() GROUP BY V.title ORDER BY V.releaseDate DESC LIMIT ?";
        return parent::executeRead($query,"i",[$n]);
    }

    public function getGamesToPreorder($n){
        $query = "SELECT V.gameId, V.title, V.image, V.releaseDate FROM (SELECT * FROM videogame ORDER BY RAND()) as V
                  WHERE V.releaseDate > CURDATE() ORDER BY V.releaseDate ASC LIMIT ?";
        return parent::executeRead($query,"i",[$n]);
    }
  
    public function getMostSoldGames($n){
        $query = "SELECT soldCopies, gameId, title, image FROM videogame ORDER BY soldCopies DESC LIMIT ?";
        return parent::executeRead($query,"i",[$n]);
    }

    public function getAvailableCopy($sellerId,$gameId){
        $query="select count(gc.sold) as copies from game_copy gc join copy_in_catalogue cc ON
                cc.copyId=gc.copyId where cc.sellerId = ? and gc.gameId = ? and sold = 0;";
        return parent::executeRead($query,"ii",[$sellerId,$gameId])[0]['copies'];
    }

    public function getGameSellers($game_name){
        return parent::executeRead("","",[$game_name]);
    }

    public function getImageNameById($id){
        $query = "select image from videogame where gameId=?";
        return parent::executeRead($query,"i",[$id])[0]['image'];
    }
    public function getGameNameById($id){
        $query = "select title from videogame where gameId=?";
        return parent::executeRead($query,"i",[$id])[0]['title'];
    }
    public function getGamePriceById($gameId,$sellerId)
    {
        $query = "SELECT gc.price FROM game_copy gc join `copy_in_catalogue` cc ON
                    gc.copyId = cc.copyId
                    where gc.gameId= ? and cc.sellerId=? limit 1;";
        return parent::executeRead($query, "ii", [$gameId, $sellerId])[0]['price'];
    }

    public function getCategoryById($idcategory){
        return parent::executeRead("","",[$idcategory]);
    }

    private function getCustomerPassword($email)
    {
        if($result = parent::executeRead("SELECT password FROM customer WHERE email='$email';"))
            return $result[0]['password'];
        else
            return null;

    }
    private function getSellerPassword($email){
        if($result = parent::executeRead("SELECT password FROM seller WHERE email='$email';"))
            return $result[0]['password'];
        else return null;
    }
    public function getTotalPriceCart($userId): float{
        $query="SELECT SUM(gc.price)as total FROM `copy_in_cart` cc join game_copy gc on cc.copyId = gc.copyId where cc.userId= ? ";
        return doubleval(parent::executeRead($query,"i",[$userId])[0]['total']);
    }

    public function getSellerIdFromCopy($copyId):int
    {
        $query="SELECT sellerId from copy_in_catalogue WHERE copyId=?";
        return parent::executeRead($query,"i",[$copyId])[0]['sellerId'];
    }

    public function getUnreadNotifies($userId):int
    {
        $query = "SELECT count(*) as n FROM `notification_user` WHERE userId=? and isRead=0;";
        return parent::executeRead($query,"i",[$userId])[0]['n'];
    }
    public function getUnreadNotifiesSeller($sellerId):int{
        $query = "SELECT count(*) as n FROM `notification_seller` WHERE sellerId=? and isRead=0;";
        return parent::executeRead($query,"i",[$sellerId])[0]['n'];
    }

    public function getSellerNotification($userId)
    {
        $query = "SELECT notificationId, timeReceived, description,isRead FROM notification_seller WHERE sellerId = ? order by timeReceived desc;";
        return parent::executeRead($query,'i', [$userId]);
    }

    public function getUsersFromGameInWhishList($gameId)
    {
        $query="SELECT c.userId FROM customer c join game_in_wishlist gw on c.userId = gw.userId where gw.gameId=? ";
        return parent::executeRead($query,"i",[$gameId]);
    }
}