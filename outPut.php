<?php
require_once 'Dao.php';
// echo 'looks good<br><br>';
$dao = new Dao();
// // echo $dao->print($_POST["email"],$_POST["username"],$_POST["password"]);
// $dao->saveUser($_POST["email"],$_POST["username"],$_POST["password"]);
// // echo '<br><br><br><br><br>saved users<br>';
// $users = $dao->getUsers();
// echo count($users) . '<br><br><br>';
// // for( $i = 0; $i<count($users); $i++ ) {
//   // echo $users[$i]['user_email'] . '<br>';
//    // }
// // foreach( $users as $value]) {
// //   echo 'a';
// // }
// echo 'most recently added user';
// echo("<pre>" . print_r($users[count($users) - 1],1) . "</pre>");
//
// $email = $users[1]['user_email'];
// // <li><a href="#" class="loc_button glow_loc">Jen</a></li>
// // echo $email;

?>

<html>
<body>

<?php
  //   for( $i = 0; $i<count($users); $i++ ) {
  //     echo '<a href="#" class="loc_button glow_loc">' . $users[$i]['user_email']  . '</a><br>';
  // }
?>
<!-- Your name: <?php //echo $_POST["username"]; ?><br> -->
<!-- Your email: <?php //echo $_POST["email"]; ?><br> -->
<!-- Your pass: <?php //echo $_POST["password"]; ?><br> -->

<?php
 //echo $email . 'we could still ref it';
 ?>

<form name="form" action="/index.php" method="POST">
    <input type="submit" class="submit" value="Register">
</form>

</body>
</html>
