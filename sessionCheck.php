<?php
session_start();
if($_SESSION["currUser"] === ""){
  header("Location: signIn.php");
}
?>
