<?php
session_start();
$imgUser = $_SESSION["currUser"];
$imgUserId = $_SESSION["currId"];
include_once 'Dao.php';
$dao = new Dao();
if(isset($_POST['submit'])){

  // $fileUser = $file['pic_user_id']; // should be based on session
   // $fileUser = $file['pic_user_id'];
   $imgAdd = $_POST['address'];
   $imgDesc = $_POST['description'];
   $imgTitle = $_POST['title'];
   $_SESSION["enterAddress"] = $_POST['address'];

   $_SESSION["enterDesc"] = $_POST['description'];
   echo  htmlspecialchars($_POST['description'])."<br>";
   echo htmlspecialchars($_SESSION["enterDesc"])."<br>";
   $_SESSION["enterTitle"] = $_POST['title'];
  // $fileLat = $file['pic_lat'];
  // $fileLong = $file['pic_long'];
  // $filePath = $file['filePath'];

  $file = $_FILES['file'];

  // echo("<pre>" . print_r($file,1) . "</pre>");
  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];
  $error = "";

  $fileExt = explode('.',$fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if(in_array($fileActualExt, $allowed)){
      if($fileError === 0){
        // if($fileSize < 3939841*3){
        if($fileSize < 3939841*3){
          $fileNameNew = uniqid('',true).".".$fileActualExt;
          $numImgs = count($dao->getImgs());
          // $folder = round(count($dao->getImgs()) / 1000));//this is probably really slow, maybe make a table that counts pictures?
          $val = round($numImgs/100);
          echo htmlspecialchars($val);
          if(is_dir("uploads")){
            // echo "<br>true<br>";
          }else{
            mkdir("uploads", 0777);
          }
          if(is_dir("uploads/$val")){
            echo "<br>true<br>";
          }else{
            mkdir("uploads/$val", 0777);
          }
          $fileDestination = 'uploads/'.$val.'/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          $dao->saveImg($imgTitle,$imgUserId,$imgAdd,$imgDesc,$fileDestination);
          $_SESSION["enterAddress"] ="";
          $_SESSION["enterDesc"] ="";
          $_SESSION["enterTitle"] ="";


          echo 'location: '.htmlspecialchars($fileNameNew).'"<br>';

          echo '<img src="'.htmlspecialchars($fileDestination).'" alt="'.htmlspecialchars($imgTitle).'" width="10%" height="10%">';

          header("Location: home.php?uploadsuccess" .".". $imgTitle .".". $imgAdd . ".".$imgDesc );
        }else{
          $error = "your file upload was too large";
          header("Location: submit.php?error=".$error);
        }
      }else{
        $error = "there was an error uploading your file";
        header("Location: submit.php?error=".$error);
      }
  }else{
    $error = "you can only upload files of extention .jpg, .jpeg, and .png";
    header("Location: submit.php?error=".$error);
  }
echo $error;
        echo '<form action="submit.php" method="POST">
                  <br><input type="submit" value="go back" name="'.htmlspecialchars($error).'">;
              </form>';

              //#TODO figure out how to give error messages
  // $fileName = $file['pic_id'];
  // $fileUser = $file['pic_user_id'];
  // $fileLat = $file['pic_lat'];
  // $fileLong = $file['pic_long'];
  // $filePath = $file['filePath'];

  //#TODO add user id as the current person in session
} //submit is out button name
?>
