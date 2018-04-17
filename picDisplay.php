<?php
session_start();
include_once 'Dao.php';
$dao = new Dao();
//this makes it so that we can see our picture update, I should be able to remove this in the future with javascript hopefully
// $id = $_SESSION["currPic"];
$id = $_GET["q"];
$_SESSION["currPic"] = $id;


//get the picture
$picture = $dao->getImgFromId($_SESSION["currPic"]);



$_SESSION["currAddress"] = $picture[0]['pic_address'];
$filePath = $picture[0]['filePath'];
$imgTitle = $picture[0]['pic_title'];
$imgDesc = $picture[0]['pic_desc'];
$imgTitle = $picture[0]['pic_title'];
$imgId = $picture[0]['pic_id'];
$imgUserId = $picutre[0]['pic_user_id'];


//display the picture

$edit = false;
// if($imgUserId == $_SESSION["currId"]){
  $edit = true;
// }



?>

<head>

    <link rel="stylesheet" href="stylesheets/picture.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


</head>




<div class="gallery">
  <?php

  // echo '<div class="desc"><pre>'.$_SESSION['currId'].'</pre></div>';
// echo '<div class="desc"><pre>'.$_SESSION["currPic"].'</pre></div>';
  echo '<div class="desc"><pre>'.print_r($picutre[0],1).'</pre></div>';
    // echo '<div class="desc">id= '.$id.'</div>';
    echo '<div class="desc">'.
    htmlspecialchars($imgTitle).
    // '<button>make private</button>'.
    '</div>';
    echo '<img src="'.htmlspecialchars($filePath).'" alt="'.htmlspecialchars($imgTitle).'" width="10%" height="10%">';
    echo '<div class="desc">'.htmlspecialchars($imgDesc).'</div>';
  ?>
</div>
<!-- echo '<input type="button" class="loc_button glow_loc" value="' .  htmlspecialchars($userImgs[$i]['pic_title']) . '" name="'. htmlspecialchars($userImgs[$i]['pic_id']) .'"title="'. htmlspecialchars($userImgs[$i]['pic_address']) .'" onclick="showUser(this.name,this.title)"><br>'; -->
  <!-- <form name="form" action="/edit.php" method="POST"> -->
<?php
    // echo'<input type="submit" class="editButton" value="edit" name="'.htmlspecialchars($imgId).'">edit</input>';
    if($edit){
      echo '<a href="edit.php?id='.htmlspecialchars($imgId).'" class="button2">edit</a>';
    }
?>
<!-- </form> -->
