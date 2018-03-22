<?php
require_once 'Dao.php';
$dao = new Dao();
$dao->saveUser($_POST["email"],$_POST["username"],$_POST["password"]);
$users = $dao->getUsers();
echo 'printing the most recently created user\'s information<br>';
echo("<pre>" . print_r($users[count($users) - 1],1) . "</pre>");
$email = $users[1]['user_email'];
?>

<html>
<body>

<?php
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

</body>
</html>
