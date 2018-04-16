<!--#sessions and cookies stuff-->
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
<title>add new picture</title>
<head>
  <link rel="icon" href="/images/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
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
        echo '<div><a href="user.php"class="button glow-button" title="user that you are currently viewing">' . htmlspecialchars($viewing) .'</a></div><div><a href="browse.php"  class="button glow-button">Browse</a></div><div><a href="home.php" class="button glow-button">home</a></div><div><a href="signIn.php" class="button glow-button">sign out</a></div>';
      ?>
        <!-- <div><a href="user.php"class="button glow-button" >My pictures</a></div><div><a href="browse.php"  class="button glow-button">Browse</a></div><div><a href="home.php" class="button glow-button">home</a></div><div><a href="signIn.php" class="button glow-button">sign out</a></div> -->
    </div>


    <body>

        <div id="gmap">
          <div id="gmap-draw">
            <?php require_once 'map.php'; ?>
          </div>
            <div id="gmap-content">
                <div class="mySubmitBox glow-box">


                  <!-- <form name="form" action="/register.php" method="POST"> -->
                    <?php
                    if($_GET['error'] != ""){
                      echo '<div id="error">';
                      echo $_GET['error'];
                      // if($_GET['error'] == 0){
                      //   echo 'email and username invalid';
                      // }else if($_GET['error'] == 1){
                      //   echo 'invalid username';
                      // }else if($_GET['error'] == 2){
                      //   echo 'invalid email';
                      // }
                      echo '</div>';
                    }
                    ?>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
                      <script>
                      t = setTimeout(function(){removeElement("error") }, 2000);
                      function removeElement(elementId) {
                        var element = document.getElementById(elementId);
                        element.parentNode.removeChild(element);
                      }
                      //
                      // $(document).ready(function(){
                      //         $("error").fadeOut()
                      // });

                      </script>
                      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->







                  <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <!-- I was going to add labels, but I think a placeholder looks better -->
              <?php
                    echo '
                    <label for="title"></label>
                    <div><input type="text" class="text_box" name="title" placeholder="title" onkeypress="return isNumberKey(event)" maxlength="100" required="required" title="max length of 100 characters" value="'.htmlspecialchars($_SESSION["enterTitle"]).'"></div>
                          <input id="locationTextField" type="text" class="text_box" name="address" onkeypress="return isNumberKey(event)" maxlength="255" required="required" title="max length of 255 characters" value="'.htmlspecialchars($_SESSION["enterAddress"]).'">
                          <textarea rows="4" cols="30" class="text_box" name="description" placeholder="description" onkeypress="return isNumberKey(event)" maxlength="255" required="required" title="max length of 255 characters" value="'.htmlspecialchars($_SESSION["enterDesc"]) .'">'.htmlspecialchars($_SESSION["enterDesc"]).'</textarea>';
              ?>
                    <!-- <div><a class="myPictureContainer"> -->
                        <!-- <div class="tx"> -->
                            <!-- browse to find a picture -->
                            <!-- or drag and drop -->
                        <!-- </div> -->
                        <!-- </a></div> -->

                    <input type="file" name="file" id="file" class="inputfile" required="required"/>
                    <label for="file" class="fileText">click to browse, or take a picture</label>
                        <input type="submit" class="submit" value="upload" name="submit">
                  </form>
                </div>
            </div>
        </div>
    </body>
    </html>
</body>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFHdhSSicB64ul8JDHCFZQkJeo1Na43hY&libraries=places"></script>
<script>
    function init() {
        var input = document.getElementById('locationTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);
    }

    google.maps.event.addDomListener(window, 'load', init);
</script>


        <?php
        require_once "footer.php";
        ?>
