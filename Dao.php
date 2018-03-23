<?php
// require_once 'KLogger.php';
 class Dao {
     private $host = "us-cdbr-iron-east-05.cleardb.net";//us-cdbr-iron-east-05.cleardb.net
     private $db = "heroku_a3e918d71ac3a38";//heroku_a3e918d71ac3a38
     private $user = "bad427961f820d";//bad427961f820d
     private $pass = "75b5ec25";//75b5ec25
 //    protected $logger;

 //    public function __construct () {
 //        $this->logger = new KLogger('/Users/crk/projects/cs401/src/www', KLogger::DEBUG);
 //    }
 //
        private function getConnection () {
            try {
                $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,$this->pass);
                // $this->logger->logDebug("Established a database connection.");
                return $conn;
            } catch (Exception $e) {
                echo "connection failed: " . $e->getMessage();
                // $this->logger->logFatal("The database connection failed.");
            }
        }

    //this function just prints the three parameters you put into it. I am using it just to test
    public function print ($email, $name, $pass) {
      return $email . '<br>'
            . $name . '<br>'
            . $pass . '<br><br>';
    }
     public function saveUser ($email, $name, $pass) {
         $conn = $this->getConnection();
         $query = $conn->prepare("INSERT INTO users (user_email, user_name, user_pass) VALUES (:email, :name, :pass)");
         $query->bindParam(':email', $email);
         $query->bindParam(':name', $name);
         $query->bindParam(':pass', $pass);
//           $this->logger->logDebug(__FUNCTION__ . " name=[{$name}] comment=[{$comment}]");
         $query->execute();
     }
       public function getUsers () {
           $conn = $this->getConnection();
           $query = $conn->prepare("select * from users");
           $query->setFetchMode(PDO::FETCH_ASSOC);
           $query->execute();
           $results = $query->fetchAll();
//           $this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
           return $results;
       }
       //#TODO finish making this method with files stored on heroku filesystem
       public function saveImg ($title, $id, $long, $lat, $desc, $filePath) {
           $conn = $this->getConnection();
           $query = $conn->prepare("INSERT INTO pictures (pic_title, pic_user_id, pic_long, pic_lat, pic_desc, filePath) VALUES (:title, :id, :long, :lat, :desc, :filePath)");
           $query->bindParam(':title', $title);
           $query->bindParam(':id', $id);
           $query->bindParam(':long', $long);
           $query->bindParam(':lat', $lat);
           $query->bindParam(':desc', $desc);
           $query->bindParam(':filePath', $filePath);
           //           $this->logger->logDebug(__FUNCTION__ . " name=[{$name}] comment=[{$comment}]");
           $query->execute();
       }
         public function getImgs () {
             $conn = $this->getConnection();
             $query = $conn->prepare("select * from pictures");
             $query->setFetchMode(PDO::FETCH_ASSOC);
             $query->execute();
             $results = $query->fetchAll();
  //           $this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
             return $results;
         }
         public function getUserImgs ($id) {
             $conn = $this->getConnection();
             $query = $conn->prepare("select * from pictures WHERE pic_user_id=:id");
             $query->bindParam(':id', $id);
             $query->setFetchMode(PDO::FETCH_ASSOC);
             $query->execute();
             $results = $query->fetchAll();
  //           $this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
             return $results;
         }
         public function getUserId ($username) {
             $conn = $this->getConnection();
             $query = $conn->prepare("select * from users WHERE user_name=:username");
             $query->bindParam(':username', $username);
             $query->setFetchMode(PDO::FETCH_ASSOC);
             $query->execute();
             $results = $query->fetchAll();
  //           $this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
             return $results;
         }
 }
?>
