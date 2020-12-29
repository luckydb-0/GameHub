<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }
    
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

    public function getGameById($id){
        $query = "";
        $stmt = $this->db->prepare($query);
        //$stmt->bind_param('i',$id);
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

    public function getUserWishlist($user){
        $stmt = $this->db->prepare("");
        // $stmt->bind_param('i',$user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserOrders($user){
        $stmt = $this->db->prepare("");
        // $stmt->bind_param('i',$user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserCart($user){
        $stmt = $this->db->prepare("");
        // $stmt->bind_param('i',$user);
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

    public function checkLogin($username, $password){
        $query = "SELECT idautore, username, nome FROM autore WHERE attivo=1 AND username = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}
?>