<?php
session_start();
include_once 'Dao.php';
$dao = new Dao();

if(isset($_POST['signin'])){
  header("Location: signin.php");
}else {
echo $_POST["username"]."asfasdfsadf";
$nameUsed = $dao->usedName($_POST["username"]);
$emailUsed = $dao->usedEmail($_POST["email"]);
if($emailUsed != "" || $nameUsed != ""){
  echo "<br>both used<br>";
  header("Location: index.php?error=0");
}else if($nameUsed != ""){
  echo "<br>username used<br>";
  header("Location: index.php?error=1");
}else if($emailUsed != ""){
  echo "<br>email used<br>";
  header("Location: index.php?error=2");
}else{
// $nameUsed = $dao->getUserName("username");
// $emailUsed = $dao->getUserEmail($_POST["email"]);
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

<html>
<body>

<?php
echo '<br>printing ever users\' email<br>';
    for( $i = 0; $i<count($users); $i++ ) {
      echo '<a href="#" class="loc_button glow_loc">' . $users[$i]['user_email']  . '</a><br>';
  }
?>

<?php
 // echo $email . 'we could still ref it';
 ?>

<form name="form" action="/index.php" method="POST">
    <input type="submit" class="submit" value="back to register">
</form>

<form name="form" action="/.php" method="POST">
    <input type="submit" class="submit" value="photo uploader">
</form>

</body>
</html>
<?php
require_once "footer.php";
?>
