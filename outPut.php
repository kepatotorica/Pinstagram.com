<?php
require_once 'Dao.php';
$dao = new Dao();
$dao->saveUser($_POST["email"],$_POST["username"],$_POST["password"]);
$users = $dao->getUsers();
echo 'printing the most recently created user\'s information<br>';
echo("<pre>" . print_r($users[count($users) - 1],1) . "</pre>");
?>

<html>
<body>
  <?php
  //   // echo '<li><a href="#" class="loc_button glow_loc">Mexico</a></li><li><a href="#" class="loc_button glow_loc">Canada</a></li><li><a href="#" class="loc_button glow_loc">Spain</a></li>';
  //   $userId = 1;
  //   echo 'printing images for user 1:<br>';
  //   // echo ("<pre>" . print_r(getUserImgs($userId),1) . "</pre>");
  //   $userImgs = $dao->getUserImgs($userId);
  //   echo ("<pre>" . print_r($userImgs,1) . "</pre>");
  // for( $i = 0; $i<count($userImgs); $i++ ) {
  //   echo $user;
  //     // echo '<li><a href="#" class="loc_button glow_loc">'. $usersImgs['pic_date']  .'</a></li>';
  // }
  // unset($i);
  ?>

  <?php
    // echo '<li><a href="#" class="loc_button glow_loc">Mexico</a></li><li><a href="#" class="loc_button glow_loc">Canada</a></li><li><a href="#" class="loc_button glow_loc">Spain</a></li>';
    echo ("<pre>" . print_r(getUserImgs($userId),1) . "</pre>");
    $userImgs = $dao->getUserImgs($userId);
    for( $i = 0; $i<count($userImgs); $i++ ) {
        echo '<li><a href="#" class="loc_button glow_loc">'. $usersImgs[$i][pic_date]  .'</a></li>';
      }
      unset($i);
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

<form name="form" action="/photoUp.php" method="POST">
    <input type="submit" class="submit" value="photo uploader">
</form>

</body>
</html>
