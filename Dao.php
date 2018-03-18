mysql://bad427961f820d:75b5ec25@us-cdbr-iron-east-05.cleardb.net/heroku_a3e918d71ac3a38?reconnect=true


<?php
class Dao {
    private $host = "us-cdbr-iron-east-05.cleardb.net";
    private $db = "heroku_a3e918d71ac3a38";
    private $user = "bad427961f820d";
    private $pass = "75b5ec25";

    if(!mysql_connect($host, $user,  $pass))
    {
        exit('Error: could not establish database connection');
    }
    if(!mysql_select_db($db)
       {
           exit('Error: could not select the database');
       }

    public function getConnection () {
        return
            new PDO("mysql:host={$this->host};dbname={$this->db}"
                    }
    }
?>
