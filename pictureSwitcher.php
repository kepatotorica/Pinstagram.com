<!-- this class is responsible for managing the current sessions
selected picture -->
<?php 
session_start();

//this makes it so that we can ser our picture update, I should be able to remove this in the future with javascript hopefully
$_SESSION["currPic"] = $_POST['pic_id'];

// $picture_id = $_POST['pic_id'];
// $picture_path = $picture_id['filePath'];
// $picture_path = $picture_id['filePath'];

// $picture_id = $_POST['file location'];
$_SESSION
?>


