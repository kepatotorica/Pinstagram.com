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
        echo '<div><a href="user.php"class="button glow-button"title="user that you are currently viewing" >' . $viewing .'</a></div><div><a href="browse.php"  class="button glow-button">Browse</a></div><div><a href="home.php" class="button glow-button">home</a></div><div><a href="signIn.php" class="button glow-button">sign out</a></div>';
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


                  <form action="upload.php" method="POST" enctype="multipart/form-data">
<!--key:  AIzaSyBFHdhSSicB64ul8JDHCFZQkJeo1Na43hY -->
                    <div><input type="text" class="text_box" name="title" placeholder="title" onkeypress="return isNumberKey(event)" maxlength="100" required="required" title="max length of 100 characters"></div>
                    <input id="locationTextField" type="text" class="text_box" name="address" onkeypress="return isNumberKey(event)" maxlength="255" required="required" title="max length of 255 characters">
                    <textarea rows="4" cols="30" class="text_box" name="description" placeholder="description" onkeypress="return isNumberKey(event)" maxlength="255" required="required" title="max length of 255 characters"></textarea>

                    <!-- <div><a class="myPictureContainer"> -->
                        <!-- <div class="tx"> -->
                            <!-- browse to find a picture -->
                            <!-- or drag and drop -->
                        <!-- </div> -->
                        <!-- </a></div> -->

                    <input type="file" name="file" id="file" class="inputfile" required="required"/>
                    <label for="file">drag or drop a file, or click to browse</label>
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
