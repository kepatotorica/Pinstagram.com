<?php
session_start();
if($_SESSION["currUser"] === ""){
  header("Location: signin.php");
}
?>
