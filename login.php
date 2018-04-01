<?php
session_start();
include_once 'Dao.php';
$dao = new Dao();
$users = $dao->getUsers();
// echo("<pre>" . print_r($users,1) . "</pre>");
echo 'last person added<br>';
echo("<pre>" . print_r($users[count($users) - 1],1) . "</pre>");

echo 'what was in post<br>';
echo("<pre>" . print_r($_POST,1) . "</pre>");

if(isset($_POST['register'])){
  header("Location: index.php?newuser");
}

if(isset($_POST['signin'])){
  $found = false;
  $username = $_POST['username'];
  $password = $_POST['password'];
  for( $i = 0; $i<count($users); $i++ ) {
    echo "user at $i is ";
       if($users[$i]['user_name'] === $username){
         echo 'found<br>';
         if($users[$i]['user_pass'] === $password){
           echo "successful login $username <br>";
           $_SESSION["currUser"] = $username;
           $_SESSION["currId"] = $users[$i]['user_id'];
           $_SESSION["currViewUser"] = $username;
           $_SESSION["currViewId"] = $users[$i]['user_id'];
           $found = true;
           header("Location: user.php?cookie".".".$_SESSION["currUser"].".".$_SESSION["currUserId"]);
         }
       }else{
         echo 'not found<br>';
       }
  }
  if($found === false){
    header("Location: signIn.php?userValid=0");
  }
  unset($i);

}
// echo $_POST('username') .'<br>';
// echo $_POST('password') . '<br>';




// header("Location: user.php?cookie");
?>
<form name="form" action="/signin.php" method="POST">
    <input type="submit" class="submit" value="back to sign in">
</form>
