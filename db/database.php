<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    /* IMPLEMENTATE */

    public function checkLogin($email, $password){
        $query = "SELECT * FROM customer WHERE email = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserData($id) {
        $stmt = $this->db->prepare("SELECT name, surname, birthDate, email FROM customer WHERE userId = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserOrders($userId){
        $stmt = $this->db->prepare("SELECT orderId FROM _order O JOIN customer C ON C.userId = O.userId WHERE C.userId = ?");
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
        $stmt = $this->db->prepare("SELECT V.image, V.title, P.name, V.suggestedPrice
        FROM videogame V JOIN platform P ON V.platformId = P.platformId
        where V.gameId = ?");
        $stmt->bind_param('i', $gameId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
	
	public function getSellerData($seller_id) {
        $stmt = $this->db->prepare("SELECT name, email, p_iva, phone FROM seller WHERE sellerId = ?");
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

    public function getGamesInWishlist($userId){
        $stmt = $this->db->prepare("SELECT gameId FROM game_in_wishlist CW join wishlist W ON CW.wishlistId = W.wishlistId 
        WHERE W.userId = ?");
        $stmt->bind_param('i', $userId);
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

    public function getUserCreditCards($userId) {
        $stmt = $this->db->prepare("SELECT accountHolder, ccnumber, expiration FROM credit_card WHERE userId = ?");
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addCreditCard($userId, $accountHolder, $ccnumber, $expiration, $cvv) {
        $stmt = $this->db->prepare("INSERT INTO credit_card (userId, accountHolder, ccnumber, expiration, cvv) VALUES (?, ?, ?, ?, ?)");
        $expDate = $expiration."-01";
        $stmt->bind_param('isisi', $userId, $accountHolder, $ccnumber, $expDate, $cvv);
        $stmt->execute();
    }

    public function getUserAddresses($userId) {
        $stmt = $this->db->prepare("SELECT country, city, street, postCode FROM address A join shipping S on A.addressId = S.addressId
        WHERE S.userId = ?");
        $stmt->bind_param('i', $userId);
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

    // Useful for searches by category name
    public function getGameByCategory($category){
        $stmt = $this->db->prepare("");
        // $stmt->bind_param('i', $category);
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

    // For "search" option
    public function getGameByName($name){
        $stmt = $this->db->prepare("");
        // $stmt->bind_param('n',$name);
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

}
?>