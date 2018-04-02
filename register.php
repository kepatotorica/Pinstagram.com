<?php
session_start();
include_once 'Dao.php';
$dao = new Dao();

if(isset($_POST['signIn'])){
  header("Location: signIn.php");
}else {
// echo $_POST["username"];
  $nameUsedA = $dao->usedName($_POST["username"]);
  $emailUsedA = $dao->usedEmail($_POST["email"]);
  $nameUsed = $nameUsedA[0]["user_name"];
  $emailUsed = $emailUsedA[0]["user_email"];
  echo "<br>".$emailUsed."<br>".$nameUsed."<br>";
  if($emailUsed != "" && $nameUsed != ""){
    echo "<br>both used<br>";
    header("Location: index.php?error=0");
  }else if($nameUsed != ""){
    echo "<br>username used<br>";
    header("Location: index.php?error=1");
  }else if($emailUsed != ""){
    echo "<br>email used<br>";
    header("Location: index.php?error=2");
  }else{
    $dao->saveUser($_POST["email"],$_POST["username"],$_POST["password"]);
    $users = $dao->getUsers();
    echo 'printing the most recently created user\'s information<br>';
    echo("<pre>" . print_r($users[count($users) - 1],1) . "</pre>");
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
