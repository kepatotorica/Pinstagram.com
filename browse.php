<!--sessions and cookies stuff-->
<?php
session_start();
include_once 'Dao.php';
require_once 'sessionCheck.php';
$dao = new Dao();
$dao->saveUser($_POST["email"],$_POST["username"],$_POST["password"]);
$users = $dao->getUsers();
$id = $users[1]['user_id'];
$email = $users[1]['user_email'];
$name = $users[1]['user_name'];
?>
<head>
    <link rel="stylesheet" href="stylesheets/main.css">
</head>

<body class="body">
    <!-- style="overflow:hidden;"    background-color:black;-->


    <div class="container">
      <?php
      $viewing = $_SESSION["currViewUser"];
      if($viewing === ""){
        $viewing = "last viewed";
      }
          echo '<div><a href="user.php" class="button glow-button">' . $_SESSION["currViewUser"] . '</a></div><div><a href="browse.php"  class="button_current" disabled>Browse</a></div><div><a href="home.php"  class="button glow-button">home</a></div><div><a href="signIn.php" class="button glow-button">sign out</a></div>';
      ?>

    </div>

    <div id="gmap">
      <div id="gmap-draw">
        <?php require_once 'map.php'; ?>
      </div>
    </div>

    <body>

        <div class="myBox glow-box">
            <ul>
<!--#TODO make it by image not by user, or maybe both. I am not sure
      we could show browse as lit if you click a user only if session id user !match
      the name you click on then it could just propogate the mypictures page
      and have the separate header with browse lit up. It would be much esier to just make
      it pictures. I think that is what I will do-->
<!--#sql                find and list all users by name, later try to implement a search function-->

<form action="viewswitch.php" method="POST">
      <?php
          for( $i = 0; $i<count($users); $i++ ) {
            if($users[$i]['user_id'] !== $_SESSION["currId"]){
            echo '<li><input type="submit" class="loc_button glow_loc" value="' . $users[$i]['user_name'] . '" name="submit"></li>';
          }
          }
          unset($i);
      ?>
</form>
                <!-- <li><a href="#" class="loc_button glow_loc">Jen</a></li><li><a href="#" class="loc_button glow_loc">Tucker</a></li><li><a href="#" class="loc_button glow_loc">Randy</a></li> -->

            </ul>
        </div>
        <div class="submit">
            <a href="submit.php" class="submit_button glow_submit">add a picture</a>
        </div>

        <?php
        require_once "footer.php";
        // require_once "picDisplay.php";
        ?>

    </body>
    </html>
</body>
