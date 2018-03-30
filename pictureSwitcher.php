<!-- this class is responsible for managing the current sessions
selected picture -->
<?php
session_start();
require_once 'Dao.php';
$dao = new Dao();
if(isset($_POST)){
  foreach($_POST as $key=>$each){
    $_SESSION["currPic"] = $key;
  }
}
$picture = $dao->getImgFromId($_SESSION["currPic"]);
$_SESSION["currAddress"] = $picture[0]['pic_address'];


// $nameVal = $_POST["submit"];
// echo $nameVal . " is the name <br>";
// $_SESSION["currViewUser"] = $nameVal;
// $user = $dao->getUserId($nameVal);
// $_SESSION["currViewId"] = $user[0]['user_id'];
// header("Location: user.php?viewing:" .".". $nameVal.".". $_SESSION["currViewId"].".". $_SESSION["currPic"] );
if($picture[0]['pic_user_id'] === $_SESSION["currId"]){
  header("Location: home.php?viewing:" .".". $nameVal.".". $_SESSION["currViewId"].".". $_SESSION["currPic"] );
}else{
  header("Location: user.php?viewing:" .".". $nameVal.".". $_SESSION["currViewId"].".". $_SESSION["currPic"] );
}

?>
