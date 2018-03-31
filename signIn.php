<!--#sessions and cookies stuff set here?-->
<title>sign in</title>
<?php
session_start();
require_once 'Dao.php';
$dao = new Dao();


$_SESSION["currUser"] = "";
$_SESSION["currId"] = "";
$_SESSION["currViewUser"] = "";
$_SESSION["currViewId"] = "";

//set the currently viewed picture to the first picture added
$picture = $dao->getImgFromId(1);
$_SESSION["currPic"] = 1;
$_SESSION["currAddress"] = $picture[0]['pic_address'];
$_SESSION["long"] = 0;
$_SESSION["lat"] = 0;



?>
<head>
    <link rel="stylesheet" href="stylesheets/main.css">
</head>

<body class="body">



    <div id="gmap" style="top:.5px">
      <div id="gmap-draw">
        <?php require_once 'map.php'; ?>
      </div>



    <!-- </div> -->
    <div id="gmap-content">
        <div class="signIn">
            <div id="container" >
                <div id="content">
                    <form action="login.php" method="POST">
                        <input type="text" placeholder="username" class="text_box" name="username" required="required"><br>
                        <input type="password" placeholder="password" class="text_box" name="password" required="required"><br>
                        <input type="submit" name="signin" class="submit" value="Sign In" action="browse.php" method="get">
                    </form>
                    <form action="index.php" method="POST">
                        <input type="submit" name="register" class="submit" value="switch to: register">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php
require_once "footer.php";
?>
