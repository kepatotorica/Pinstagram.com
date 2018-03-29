<?php
session_start();
require_once 'Dao.php';
$dao = new Dao();
$userId = 1;//left it here just incase
?>
<!--do the sessions and cookies stuff-->
<head>
    <link rel="stylesheet" href="stylesheets/main.css">
</head>

<body class="body">
    <!-- style="overflow:hidden;"    background-color:black;-->


<div class="container">
    <?php
    $viewing = $_SESSION["currViewUser"];
    if($viewing === $_SESSION["currUser"]){
      echo '<div><a href="user.php" class="button_current" disabled>My pictures</a></div><div><a href="browse.php"  class="button glow-button">Browse</a></div><div><a href="dreams.php"  class="button glow-button">dream trips</a></div><div><a href="signIn.php" class="button glow-button">sign out</a></div>';
    }else{
      //if this isn't the person logged in
      echo '<div><a href="user.php" class="button_current" disabled>' . $_SESSION["currViewUser"] . '</a></div><div><a href="browse.php"  class="button glow-button">Browse</a></div><div><a href="dreams.php"  class="button glow-button">dream trips</a></div><div><a href="signIn.php" class="button glow-button">' . $_SESSION['currUser'] . '</a></div>';
    }
    ?>
</div>
    <div id="gmap">
      <div id="gmap-draw">
        <?php require_once 'map.php'; ?>
      </div>
    </div>

<body>

    <!-- HTML -->
    <div class="myBox glow-box">
        <ul>
<!--#sql this is where I need to add the sql to get all picture names where the id matches the current user id  -->
<?php
  // echo '<li><a href="#" class="loc_button glow_loc">Mexico</a></li><li><a href="#" class="loc_button glow_loc">Canada</a></li><li><a href="#" class="loc_button glow_loc">Spain</a></li>';
  $userId = $_SESSION["currViewId"];
  $userImgs = $dao->getUserImgs($userId);
  for( $i = 0; $i<count($userImgs); $i++ ) {
      echo '<li><a href="#" class="loc_button glow_loc">'. $userImgs[$i]['pic_title']  .'</a></li>';
    }
    unset($i);
?>

        </ul>
    </div>


    <div class="submit">
        <a href="submit.php" class="submit_button glow_submit">add a picture</a>
    </div>
    <?php
    require_once "footer.php";
    ?>
</body>
</html>
</body>
