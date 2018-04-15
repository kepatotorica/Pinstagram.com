<?php
session_start();
include_once 'Dao.php';
$dao = new Dao();
// $_SESSION["currViewUser"] = $username;
// $_SESSION["currViewId"] = $username;
$nameVal = $_POST["submit"];
$_SESSION["currViewUser"] = $nameVal;
$user = $dao->getUserId($nameVal);
$_SESSION["currViewId"] = $user[0]['user_id'];
header("Location: user.php?viewing:" .".". $nameVal.".". $_SESSION["currViewId"] );
 ?>
