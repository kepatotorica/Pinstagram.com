<?php
// require_once 'KLogger.php';
 class Dao {
     private $host = "us-cdbr-iron-east-05.cleardb.net";
     private $db = "heroku_a3e918d71ac3a38";
     private $user = "bad427961f820d";
     private $pass = "75b5ec25";
 //    protected $logger;

 //    public function __construct () {
 //        $this->logger = new KLogger('/Users/crk/projects/cs401/src/www', KLogger::DEBUG);
 //    }
 //
    if(!mysql_connect($host, $user,  $pass))
    {
        exit('Error: could not establish database connection');
    }
    if(!mysql_select_db($db)
       {
           exit('Error: could not select the database');
       }

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
       public function saveImg () {
           $conn = $this->getConnection();
           $query = $conn->prepare("INSERT INTO pictures () VALUES ()");
           // $query->bindParam(':email', $email);
           //           $this->logger->logDebug(__FUNCTION__ . " name=[{$name}] comment=[{$comment}]");
           $query->execute();
       }
         public function getImg () {
             $conn = $this->getConnection();
             $query = $conn->prepare("select * from pictures");
             $query->setFetchMode(PDO::FETCH_ASSOC);
             $query->execute();
             $results = $query->fetchAll();
  //           $this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
             return $results;
         }
 }
?>
