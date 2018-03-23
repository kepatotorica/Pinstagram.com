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
            <iframe src="https://www.google.com/maps/embed?pb=!1m13!1m11!1m3!1d260.1932363710366!2d-116.20345709333175!3d43.61519156018316!2m2!1f14.991677054827663!2f0!3m2!1i1024!2i768!4f35!5e1!3m2!1sen!2sus!4v1518464907056" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div id="gmap-content">
            <!--
<h1>This is content</h1>
<p>This is some text</p>
-->
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

    <div class="spacedFooter">
        <span>&copy Kepa Totorica</span>
        <span>(208)599-5425</span>

    </div>

    <div class="submit">
        <a href="submit.php" class="submit_button glow_submit">add a picture</a>
    </div>

</body>
</html>
</body>
