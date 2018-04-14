<!--#TODO make it so that dre a ms just resets to current view being you, maybe call it homepage  -->
<?php
session_start();
require_once 'sessionCheck.php';
include_once 'Dao.php';
$dao = new Dao();
$userId = 1;//left it here just incase
?>

<title>home</title>
<head>
  <link rel="icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="stylesheets/main.css">
    <script>
    function showUser(str,addy) {
      var el = document.getElementById('txtHint');
      el.innerHTML = '<div>' + str + '</div>';
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
      if($viewing === ""){
        $viewing = "last viewed";
      }
        //if this isn't the person logged in
        echo '<div><a href="user.php"class="button glow-button" title="user that you are currently viewing">' . $viewing .'</a></div><div><a href="browse.php"  class="button glow-button">Browse</a></div><div><a href="home.php" class="button_current" disabled>home</a></div><div><a href="signIn.php" class="button glow-button">sign out</a></div>';
        // echo '<div><a href="user.php" class="button_current" disabled>' . $_SESSION["currViewUser"] . '</a></div><div><a href="browse.php"  class="button glow-button">Browse</a></div><div><a href="home.php"  class="button glow-button">home</a></div><div><a href="signIn.php" class="button glow-button">' . $_SESSION['currUser'] . '</a></div>';
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
            <!-- <ul> -->

              <form>
              </form>

              <form>
                    <?php
                        $userId = $_SESSION["currId"];
                        $userImgs = $dao->getUserImgs($userId);
                        for( $i = 0; $i<count($userImgs); $i++ ) {
                          echo '<input type="button" class="loc_button glow_loc" value="' .  $userImgs[$i]['pic_title'] . '" name="'. $userImgs[$i]['pic_id'].'"title="'. $userImgs[$i]['pic_address'].'" onclick="showUser(this.name,this.title)"><br>';
                        }
                        unset($i);
                    ?>
              </form>
            <!-- </ul> -->
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
