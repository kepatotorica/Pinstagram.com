<?php
require_once 'KLogger.php';
class testDao {
  private $host = "us-cdbr-iron-east-05.cleardb.net";//us-cdbr-iron-east-05.cleardb.net
  private $db = "heroku_a3e918d71ac3a38";//heroku_a3e918d71ac3a38
  private $user = "bad427961f820d";//bad427961f820d
  private $pass = "75b5ec25";//75b5ec25
  protected $logger;
  public function __construct () {
    $this->logger = new KLogger('../uploads/', KLogger::DEBUG);
    echo "logger made";
  }
  private function getConnection () {
    try {
      $conn =
        new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->pass);
      echo $this->logger->logDebug("Established a database connection.");
      return $conn;
    } catch (Exception $e) {
      echo "connection failed: " . $e->getMessage();
      $this->logger->logFatal("The database connection failed.");
    }
  }
  public function getComments () {
     $conn = $this->getConnection();
     $query = $conn->prepare("select * from comments");
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
     $results = $query->fetchAll();
     $this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
     return $results;
  }
  public function saveComment ($name, $comment, $imagePath) {
     $conn = $this->getConnection();
     $query = $conn->prepare("INSERT INTO comments (name, comment, image_path) VALUES (:name, :comment, :image_path)");
     $query->bindParam(':name', $name);
     $query->bindParam(':comment', $comment);
     $query->bindParam(':image_path', $imagePath);
     $this->logger->logDebug(__FUNCTION__ . " name=[{$name}] comment=[{$comment}]");
     $query->execute();
  }
  public function deleteComment ($id) {
     $conn = $this->getConnection();
     $query = $conn->prepare("DELETE FROM comments WHERE id = :id");
     $query->bindParam(':id', $id);
     $query->execute();
  }
}
