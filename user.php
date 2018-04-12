<?php
session_start();
include_once 'Dao.php';
require_once 'sessionCheck.php';
$dao = new Dao();
$userId = 1;//left it here just incase
?>
<!--do the sessions and cookies stuff-->
    <!-- <span id="txtHint"></span> -->
<head>
    <link rel="stylesheet" href="stylesheets/main.css">

  <script>
  function showUser(str,addy) {
    var el = document.getElementById('txtHint');
    el.innerHTML = '<div>' + addy + '</div>';
      if (str == "") {
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtHint").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","picDisplay.php?q="+str,true);
          xmlhttp.send();
          codeAddress(addy);
      }
  }
  </script>
</head>

<body class="body">
    <!-- style="overflow:hidden;"    background-color:black;-->


<div class="container">
    <?php
    $viewing = $_SESSION["currViewUser"];
    // if($viewing === $_SESSION["currUser"]){
      // echo '<div><a href="user.php" class="button_current" disabled>My pictures</a></div><div><a href="browse.php"  class="button glow-button">Browse</a></div><div><a href="home.php"  class="button glow-button">home</a></div><div><a href="signIn.php" class="button glow-button">sign out</a></div>';
    // }else{
      //if this isn't the person logged in
      echo '<div><a href="user.php" class="button_current" title="user that you are currently viewing" disabled>' . $_SESSION["currViewUser"] . '</a></div><div><a href="browse.php"  class="button glow-button">Browse</a></div><div><a href="home.php"  class="button glow-button">home</a></div><div><a href="signIn.php" class="button glow-button">sign out</a></div>';
    // }
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
  // // echo '<li><a href="#" class="loc_button glow_loc">Mexico</a></li><li><a href="#" class="loc_button glow_loc">Canada</a></li><li><a href="#" class="loc_button glow_loc">Spain</a></li>';
  // $userId = $_SESSION["currViewId"];
  // $userImgs = $dao->getUserImgs($userId);
  // for( $i = 0; $i<count($userImgs); $i++ ) {
  //     echo '<li><a href="#" class="loc_button glow_loc">'. $userImgs[$i]['pic_title']  .'</a></li>';
  //   }
  //   unset($i);
?>


<form>
  <?php
      $userId = $_SESSION["currViewId"];
      echo $_SESSION['currViewUser'];
      $userImgs = $dao->getUserImgs($userId);
      $userImgs = $dao->getImgs();
      for( $i = 0; $i<count($userImgs); $i++ ) {
        echo '<li><input type="button" class="loc_button glow_loc" value="' .  $userImgs[$i]['pic_title'] . '" name="'. $userImgs[$i]['pic_id'].'" title="'. $userImgs[$i]['pic_address'].'" onclick="showUser(this.name,this.title)">';
      }
      unset($i);
  ?>
</form>

        </ul>
    </div>


    <div class="submit">
        <a href="submit.php" class="submit_button glow_submit">add a picture</a>
    </div>
</body>
</html>
</body>
<span id="txtHint"></span>
<?php
require_once "footer.php";
// require_once "picDisplay.php";
?>
