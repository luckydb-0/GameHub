<?php

class DatabaseHelper{

    /**
     * @var mysqli
     */
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " .$this->db->connect_error);
        }        
    }

    private function executeQuery($query,$types='',$values=null){
        $stmt = $this->db->prepare($query);
        if($types != '' && $values !=null)
            $stmt->bind_param($types,$values);
        $stmt->execute();
        if($stmt->errno){
            $this->writeError($stmt->error);
            return null;
        }
        return $stmt;
    }

    public function executeInsert($query, $types='', $values=null){
        $stmt = $this->executeQuery($query,$types,$values);
        if($stmt)
            return $stmt->insert_id;
        return -1;
    }
    public function executeRead($query, $types='', $values=null){
        $stmt = $this->executeQuery($query,$types,$values);
        if($stmt){
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }
    public function executeDelete($query,$types='', $values=null){
        $stmt = $this->executeQuery($query,$types,$values);
        return !is_null($stmt);
    }
    public function executeUpdate($query,$types='', $values=null){
        $stmt = $this->executeQuery($query,$types,$values);
        return !is_null($stmt);
    }
    private function writeError($string){
        $file=   fopen("error.log","a");
        fwrite($file,"[". date("Y-m-d - h:i:sa")."] : ".$string);
        fwrite($file,"\n");
        fclose($file);
    }

}
?>