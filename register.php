<?php
session_start();
require_once 'Dao.php';
$dao = new Dao();

if(isset($_POST['signin'])){
  header("Location: signin.php");
}else {
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
?>

<html>
<body>
  <?php
    // echo '<li><a href="#" class="loc_button glow_loc">Mexico</a></li><li><a href="#" class="loc_button glow_loc">Canada</a></li><li><a href="#" class="loc_button glow_loc">Spain</a></li>';
    $userId = 1;
    echo 'printing images for user 1:<br>';
    // echo ("<pre>" . print_r(getUserImgs($userId),1) . "</pre>");
    $userImgs = $dao->getUserImgs($userId);
  for( $i = 0; $i<count($userImgs); $i++ ) {
          echo $userImgs[$i]['pic_id']  .'<br>';
  }
  unset($i);
  ?>

  <?php
    // echo '<li><a href="#" class="loc_button glow_loc">Mexico</a></li><li><a href="#" class="loc_button glow_loc">Canada</a></li><li><a href="#" class="loc_button glow_loc">Spain</a></li>';
    // $userImgs = $dao->getUserImgs($userId);
    // for( $i = 0; $i<count($userImgs); $i++ ) {
    //     echo $usersImgs[$i]['pic_date']  .'<br>';
    //   }
    //   unset($i);
  ?>
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
