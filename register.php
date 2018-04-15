<?php
session_start();
include_once 'Dao.php';
$dao = new Dao();

if(isset($_POST['signIn'])){
  header("Location: signIn.php");
}else {
// echo $_POST["username"];
  $_SESSION["enterUser"] = $_POST["username"];
  $_SESSION["enterEmail"] = $_POST["email"];
  $_SESSION["enterPassword"] = $_POST["password"];
  $_SESSION["enterConfirmPassword"] = $_POST["confirm_password"];

  $nameUsedA = $dao->usedName($_POST["username"]);
  $emailUsedA = $dao->usedEmail($_POST["email"]);
  $nameUsed = $nameUsedA[0]["user_name"];
  $emailUsed = $emailUsedA[0]["user_email"];

  $email = $_POST["email"];
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailUsed = "Invalid email format";
  }
  echo "<br>".$emailUsed."<br>".$nameUsed."<br>";

  $passVaild = 1;

  $uppercase = preg_match('@[A-Z]@', $_POST["password"]);
  $lowercase = preg_match('@[a-z]@', $_POST["password"]);
  $number    = preg_match('@[0-9]@', $_POST["password"]);

  if(!$uppercase || !$lowercase || !$number || strlen($_POST["password"]) < 8 || $_SESSION["enterPassword"] != $_SESSION["enterConfirmPassword"]) {
    $passVaild = 0;
  }

  // echo $passVaild ."<br>";
  if($emailUsed != "" && $nameUsed != "" && $passVaild === 0){
    header("Location: index.php?error=3");
  }else if($emailUsed != "" && $passVaild === 0){
    header("Location: index.php?error=4");
  }else if($nameUsed != "" && $passVaild === 0){
    header("Location: index.php?error=5");
  }else if($passVaild === 0){
    header("Location: index.php?error=6");
  }else if($emailUsed != "" && $nameUsed != ""){
    echo "<br>both used<br>";
    header("Location: index.php?error=0");
  }else if($nameUsed != ""){
    echo "<br>username used<br>";
    header("Location: index.php?error=1");
  }else if($emailUsed != ""){
    echo "<br>email used<br>";
    header("Location: index.php?error=2");
  }else{
    $dao->saveUser($_POST["email"],$_POST["username"],md5(md5($_POST["username"]."#46525235$&!^%(")."asdfpi67980115".$_POST["password"]));
    $_SESSION["enterUser"] = "";
    $_SESSION["enterEmail"] = "";
    $_SESSION["enterPassword"] = "";
    $_SESSION["enterConfirmPassword"] = "";
    $users = $dao->getUsers();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION["currUser"] = $users[count($users) - 1]['user_name'];
    $_SESSION["currId"] = $users[count($users) - 1]['user_id'];
    $_SESSION["currViewUser"] = $_SESSION["currUser"];
    $_SESSION["currViewId"] = $_SESSION["currId"];
    header("Location: user.php?user:".$_SESSION["currUser"]."id:".$_SESSION["currId"]);
    }
}
?>
