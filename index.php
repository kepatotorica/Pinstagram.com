<title>register</title>
<head>
    <link rel="stylesheet" href="stylesheets/main.css">
</head>

<body class="body">

    <div id="gmap" style="top:.5px">
        <div id="gmap-draw">
          <?php
          require_once 'map.php';
          if(is_dir("uploads")){
            echo "<br>true<br>";
          }else{
            mkdir("uploads", 0777);
          }
          ?>
        </div>
        <div id="gmap-content">
            <div class="signIn">
               <!-- style="top:-100px;"> -->
                <div id="container" >
                    <div id="content">
<!--                        <form>-->
                        <form name="form" action="/register.php" method="POST">
                          <?php
                          if($_GET['error'] != ""){
                            echo '<div id="error">';
                            if($_GET['error'] == 0){
                              echo 'email and username already in use';
                            }else if($_GET['error'] == 1){
                              echo 'username already in use';
                            }else if($_GET['error'] == 2){
                              echo 'email already in use';
                            }
                            echo '</div>';
                          }
                          ?>
                            <script>
                            t = setTimeout(function(){removeElement("error") }, 2000);
                            function removeElement(elementId) {
                              var element = document.getElementById(elementId);
                              element.parentNode.removeChild(element);
                            }
                            </script>
                            <input type="text" placeholder="username" class="text_box" name="username" required="required"><br>
                            <input type="email" placeholder="email" class="text_box" name="email" required="required"><br>
                            <input type="password" placeholder="password" class="text_box" name="password" required="required"><br>
                            <input type="submit" class="submit" value="Register">
                        </form>
                        <form name="form" action="/register.php" method="POST">
                            <input type="submit" name="signIn" class="submit" value="switch too: Sign In" action="signIn.php">
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
