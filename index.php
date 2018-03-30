<title>register</title>
<head>
    <link rel="stylesheet" href="stylesheets/main.css">
</head>

<body class="body">

    <div id="gmap" style="top:.5px">
        <div id="gmap-draw">
          <?php require_once 'map.php'; ?>
        </div>
        <div id="gmap-content">
            <div class="signIn">
               <!-- style="top:-100px;"> -->
                <div id="container" >
                    <div id="content">
<!--                        <form>-->
                        <form name="form" action="/register.php" method="POST">
<!--                            <form name="frm" action="/user.php" method="POST">-->
<!--#sql           allow a user to sign in so check with sql to see if a entry exists with user and password the same-->
<!--                            also renavigate-->
                            <input type="text" placeholder="username" class="text_box" name="username"><br>
                            <input type="text" placeholder="email" class="text_box" name="email"><br>
                            <input type="password" placeholder="password" class="text_box" name="password"><br>
                            <input type="submit" class="submit" value="Register">
                            <input type="submit" name="signin" class="submit" value="switch too: Sign In">
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
