<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " .$this->db->connect_error);
        }        
    }

    /* IMPLEMENTATE */
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
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$email,$password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getSellerLogin($email, $password)
    {
        $query = "SELECT sellerId FROM seller 
                    WHERE email=? AND password=?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$email,$password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getUserData($id) {
        if(strpos($id,"c:")!== false)
            return $this->getCustomerData(substr($id,2));
        else return $this->getSellerData(substr($id,2));
    }

    private function getCustomerData($id){
        $stmt = $this->db->prepare(
            "SELECT name, surname, birthDate, email, phone 
                FROM customer WHERE userId = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getSellerData($id){
        $stmt = $this->db->prepare(
            "SELECT name, email, p_iva, phone 
                    FROM seller WHERE sellerId = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getUserOrders($userId){
        $stmt = $this->db->prepare("SELECT orderId, total FROM _order O JOIN customer C ON C.userId = O.userId WHERE C.userId = ?");
        $stmt->bind_param('i',$userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCopiesInOrder($orderId) {
        $stmt = $this->db->prepare("SELECT copyId FROM copy_in_order WHERE orderId = ?");
        $stmt->bind_param('i', $orderId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getGameFromCopy($copyId) {
        $stmt = $this->db->prepare("SELECT V.image, V.title, P.name as platform, C.price
        FROM videogame V JOIN game_copy C ON V.gameId = C.gameId JOIN platform P ON V.platformId = P.platformId
        where C.copyId = ?");
        $stmt->bind_param('i', $copyId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getGameById($gameId) {
        $stmt = $this->db->prepare("SELECT V.image, V.title, P.name, V.releaseDate, V.description, V.suggestedPrice
        FROM videogame V JOIN platform P ON V.platformId = P.platformId
        WHERE V.gameId = ?");
        $stmt->bind_param('i', $gameId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getSellerOrders($seller_id) {
        $stmt = $this->db->prepare("SELECT O.orderDate, O.total, O.userId, O.orderId FROM _order O JOIN order_seller OS
        ON O.orderId = OS.orderId JOIN seller S ON S.sellerId = OS.sellerId WHERE S.sellerId = ?");
        $stmt->bind_param('i', $seller_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
        
    public function getCopiesInCart($userId){
        $stmt = $this->db->prepare("SELECT copyId FROM copy_in_cart CC join cart C ON CC.cartId = C.cartId 
        WHERE C.userId = ?");
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserAddress($user_id) {
        $stmt = $this->db->prepare("SELECT A.country, A.city, A.street, A.postCode FROM address A JOIN
        shipping S ON A.addressId = S.addressId JOIN customer C ON C.userId = ?");
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getGamesInWishlist($userId){
        $stmt = $this->db->prepare("SELECT gameId FROM game_in_wishlist CW join wishlist W ON CW.wishlistId = W.wishlistId 
        WHERE W.userId = ?");
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPlatforms() {
        $stmt = $this->db->prepare("SELECT name FROM platform");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserNotifications($userId) {
        $stmt = $this->db->prepare("SELECT notificationId, timeReceived, description FROM notification WHERE userId = ?");
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategories() {
        $stmt = $this->db->prepare("SELECT categoryName FROM category");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDevelopers() {
        $stmt = $this->db->prepare("SELECT name FROM developer");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getGameByCategory($category){
        $stmt = $this->db->prepare("SELECT V.gameId FROM videogame V JOIN game_category GC ON 
        V.gameId = GC.gameId JOIN category C ON C.categoryId = GC.categoryId WHERE C.categoryName = ?");
        $stmt->bind_param('s', $category);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getGameByConsole($console){
        $stmt = $this->db->prepare("SELECT V.gameId FROM videogame V JOIN platform P ON
         P.platformId = V.platformId WHERE P.name = ?");
        $stmt->bind_param('s', $console);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
        
    public function getUserCreditCards($userId) {
        $stmt = $this->db->prepare("SELECT accountHolder, ccnumber, expiration FROM credit_card WHERE userId = ?");$stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addCreditCard($userId, $accountHolder, $ccnumber, $expiration, $cvv) {
        $stmt = $this->db->prepare("INSERT INTO credit_card (userId, accountHolder, ccnumber, expiration, cvv) VALUES (?, ?, ?, ?, ?)");
        $expDate = $expiration."-01";
        $stmt->bind_param('isisi', $userId, $accountHolder, $ccnumber, $expDate, $cvv);
        return $stmt->execute();
    }

    public function getUserAddresses($userId) {
        $stmt = $this->db->prepare("SELECT A.addressId, country, city, street, postCode FROM address A join shipping S on A.addressId = S.addressId
        WHERE S.userId = ?");
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function addUserAddress($userId, $country, $city, $street, $postCode) {
        $stmtAddr = $this->db->prepare("INSERT INTO address (country, city, street, postCode) VALUES (?, ?, ?, ?)");
        $stmtAddr->bind_param("sssi", $country, $city, $street, $postCode);
        $stmtAddr->execute();

        $stmtAddressId = $this->db->prepare("SELECT MAX(addressId) as id FROM address");
        $stmtAddressId->execute();
        $addressId = $stmtAddressId->get_result();
        $addressId = $addressId->fetch_all(MYSQLI_ASSOC);
        $addressId = $addressId[0]["id"];

        $stmtShip = $this->db->prepare("INSERT INTO shipping (userId, addressId) VALUES (?, ?)");
        $stmtShip->bind_param("ii", $userId, $addressId);
        $stmtShip->execute();
    }

    public function placeOrder($userId, $addressId, $total) {
        $stmtGetCart = $this->db->prepare("SELECT copyId FROM copy_in_cart WHERE cartId = ?");
        $stmtGetCart->bind_param("i", $userId);
        $stmtGetCart->execute();
        $copies = $stmtGetCart->get_result();
        $copies = $copies->fetch_all(MYSQLI_ASSOC);

        $stmtAddOrder = $this->db->prepare("INSERT INTO _order (addressId, orderDate, total, userId) VALUES (?, ?, ?, ?)");
        $today = date("Y-m-d");
        $stmtAddOrder->bind_param("isdi", $addressId, $today, $total, $userId);
        $stmtAddOrder->execute();

        $stmtOrderId = $this->db->prepare("SELECT MAX(orderId) as id FROM _order");
        $stmtOrderId->execute();
        $orderId = $stmtOrderId->get_result();
        $orderId = $orderId->fetch_all(MYSQLI_ASSOC);
        $orderId = $orderId[0]["id"];

        foreach($copies as $copy) {
            $copyId = $copy["copyId"];
            $stmtAddCopy = $this->db->prepare("INSERT INTO copy_in_order (copyId, orderId) VALUES (?, ?)");
            $stmtAddCopy->bind_param("ii", $copyId, $orderId);
            $stmtAddCopy->execute();
            $stmtCopySold->$this->db->prepare("UPDATE game_copy SET sold = 1 WHERE copyId = ?");
            $stmtCopySold->bind_param("i", $copyId);
            $stmtCopySold->execute();
        }

        $stmtClearCart = $this->db->prepare("DELETE FROM copy_in_cart WHERE cartId = ?");
        $stmtClearCart->bind_param("i", $userId);
        $stmtClearCart->execute();

    }

    public function removeFromCart($userId, $copyId) {
        $stmt = $this->db->prepare("DELETE FROM copy_in_cart WHERE copyId = ? AND cartId = ?");
        $stmt->bind_param('ii', $copyId, $userId);
        $stmt->execute();
    }

    public function getGenresFromGameId($gameId) {
        $stmt = $this->db->prepare("SELECT categoryName FROM category C JOIN game_category GC on C.categoryId = GC.categoryId WHERE GC.gameId = ?");
        $stmt->bind_param("i", $gameId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getGameLowestPriceAndSeller($gameId) {
        $stmt = $this->db->prepare("SELECT MIN(GC.price) as lowestPrice, S.name as seller
                                    FROM game_copy GC JOIN copy_in_catalogue CC ON GC.copyId = CC.copyId JOIN seller S ON CC.catalogueId = S.sellerId
                                    WHERE GC.gameId = ?");
        $stmt->bind_param('i', $gameId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getGameByDeveloper($developer){
        $stmt = $this->db->prepare("SELECT V.gameId FROM videogame V JOIN developer D 
                                    ON D.developerId = V.developerId WHERE D.name = ?");
        $stmt->bind_param('s', $developer);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function searchGamesByName($name) {
        $stmt = $this->db->prepare("SELECT gameId from videogame WHERE title LIKE '%$name%'");
        //$stmt->bind_param('s', $name);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function searchGames($consoleNames, $categoryNames, $developerName, $maxPrice=1000, $name) {
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
        $string = "SELECT gameId FROM videogame WHERE suggestedPrice <= ? AND gameId IN ($in)";
        $stmt = $this->db->prepare($string);
        $types = 'i'.str_repeat('s', count($gamesId)); // To concatenate as many s needed
        $stmt->bind_param($types, $price, ...$gamesId); // To bind all needed parameters
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    

    /* DA IMPLEMENTARE */
    
    // n = number of random games
    public function getRandomGames($n){
        $stmt = $this->db->prepare("");
        // $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSuggestedGames($n){
        $stmt = $this->db->prepare("");
        // $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNewestGames(){
        $stmt = $this->db->prepare("");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getGamesToPreorder(){
        $stmt = $this->db->prepare("");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getMostSoldGames(){
        $stmt = $this->db->prepare("");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getImageNameById($id){
        $stmt = $this->db->prepare("");
        // $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getGameNameById($id){
        $stmt = $this->db->prepare("");
        // $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getGamePriceById($id){
        $stmt = $this->db->prepare("");
        // $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategoryById($idcategory){
        $stmt = $this->db->prepare("");
        //$stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addGameToCart($user_id, $game_id, $seller_id){
        $stmt = $this->db->prepare("");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // To change game's seller if the game is already in the cart
    public function changeSeller($user_id, $game_id, $seller_id){
        $stmt = $this->db->prepare("");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertNewSellerArticle($article_img, $article_name, $article_platform, $article_price, $article_copies){
        $query = "";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param();
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function changeArticlePrice($seller_id, $article_id){
        $stmt = $this->db->prepare("");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function changeArticleCopies($seller_id, $article_id){
        $stmt = $this->db->prepare("");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function removeArticleFromCatalogue($seller_id, $article_id){
        $stmt = $this->db->prepare("");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function removeArticleFromCart($user_id, $article_id){
        $stmt = $this->db->prepare("");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function removeArticleFromWishlist($user_id, $article_id){
        $stmt = $this->db->prepare("");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getGameSellers($game_name){
        $stmt = $this->db->prepare("");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertNewCustomer($name, $surname, $birthdate, $phone, $email, $password)
    {
       return $this->executeInsert("INSERT INTO customer(name,surname,birthDate,phone,email,password) VALUES ('$name','$surname','$birthdate',$phone,'$email','$password');");
    }

    public function insertNewSeller($name, $p_iva, $phone, $email, $password)
    {
        return $this->executeInsert("INSERT INTO seller(name,p_iva,phone,email,password) VALUES ('$name',$p_iva,$phone,'$email','$password');");
    }

    private function executeInsert($query){
        $this->db->query($query);
        if($this->db->errno) {
            $file=   fopen("error.log","a");
            fwrite($file, time().$this->db->error);
            fwrite($file,"\n");
            fclose($file);
        }
        return $this->db->insert_id;
    }

}
?>