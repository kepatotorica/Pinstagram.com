<?php
session_start();
require_once 'Dao.php';
$dao = new Dao();
// $_SESSION["currViewUser"] = $username;
// $_SESSION["currViewId"] = $username;
echo("<pre>" . print_r($_POST,1) . "</pre>");
$nameVal = $_POST["submit"];
echo $nameVal . " is the name <br>";
$_SESSION["currViewUser"] = $nameVal;
$user = $dao->getUserId($nameVal);
$_SESSION["currViewId"] = $user[0]['user_id'];
header("Location: user.php?viewing:" .".". $nameVal.".". $_SESSION["currViewId"] );
 ?>
