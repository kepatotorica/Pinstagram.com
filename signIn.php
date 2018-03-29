<!--#sessions and cookies stuff set here?-->
<?php
session_start();
$_SESSION["currUser"] = "";
$_SESSION["currId"] = "";
$_SESSION["currViewUser"] = "";
$_SESSION["currViewId"] = "";
require_once 'Dao.php';
$dao = new Dao();
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
                        <input type="text" placeholder="username" class="text_box" name="username"><br>
                        <input type="password" placeholder="password" class="text_box" name="password"><br>
                        <input type="submit" name="signin" class="submit" value="Sign In" action="browse.php" method="get">
                        <input type="submit" name="register" class="submit" value="switch to: register" action="index.php">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once "footer.php";
?>

</body>
