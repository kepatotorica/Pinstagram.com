<?php
require_once 'Dao.php';
$dao = new Dao();
if(isset($_POST['submit'])){

//#TODO make it so that the imgUser is based on who is currently logged into the session
  $imgUser = 1;
  // $fileUser = $file['pic_user_id']; // should be based on session
   // $fileUser = $file['pic_user_id'];
   $imgLat = $_POST['longitude'];
   $imgLong = $_POST['latitude'];
   $imgDesc = $_POST['description'];
   $imgTitle = $_POST['title'];
  // $fileLat = $file['pic_lat'];
  // $fileLong = $file['pic_long'];
  // $filePath = $file['filePath'];

  $file = $_FILES['file'];

  echo("<pre>" . print_r($file,1) . "</pre>");
  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];

  $fileExt = explode('.',$fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if(in_array($fileActualExt, $allowed)){
      if($fileError === 0){
        if($fileSize < 3939841*3){
          $fileNameNew = uniqid('',true).".".$fileActualExt;
          $fileDestination = 'uploads/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          $dao->saveImg($imgTitle,$imgUser,$imgLong,$imgLat,$imgDesc,$fileDestination);

          header("Location: user.php?uploadsuccess" .".". $imgTitle .".". $imgLat .".". $imgLong . ".".$imgDesc );
        }else{
          echo "your file upload was too large";
        }
      }else{
        echo "there was an error uploading your file";
      }
  }else{
    echo "you can only upload files of extention .jpg, .jpeg, and .png'";
  }

  // $fileName = $file['pic_id'];
  // $fileUser = $file['pic_user_id'];
  // $fileLat = $file['pic_lat'];
  // $fileLong = $file['pic_long'];
  // $filePath = $file['filePath'];

  //#TODO add user id as the current person in session
} //submit is out button name
?>
