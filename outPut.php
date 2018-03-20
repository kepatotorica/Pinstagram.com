 <?php
require_once 'Dao.php';
echo 'looks good<br><br>';
$dao = new Dao();
echo $dao->print($_POST["email"],$_POST["username"],$_POST["password"]);
$dao->saveUser($_POST["email"],$_POST["username"],$_POST["password"]);
echo '<br><br><br><br><br>saved users<br>';
echo $dao->getUsers();
// echo $user;

?>

<html>
<body>

Your name: <?php echo $_POST["username"]; ?><br>
Your email: <?php echo $_POST["email"]; ?><br>
Your pass: <?php echo $_POST["password"]; ?>

<form name="form" action="/index.php" method="POST">
    <input type="submit" class="submit" value="Register">
</form>

</body>
</html>
