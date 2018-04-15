<?php
session_start();
$_SESSION["currPic"] = 1;
?>

<title>register</title>
<head>
  <link rel="icon" href="/images/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="stylesheets/main.css">
</head>

<body class="body">

    <div id="gmap" style="top:.5px">
        <div id="gmap-draw">
          <?php
          require_once 'map.php';
          if(is_dir("uploads")){
            // echo "<br>true<br>";
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
<!-- <div id="flexHolder"> -->
                        <form name="form" action="/register.php" method="POST">
                          <?php
                            if($_GET['error'] != ""){
                              echo '<div id="error">';
                              if($_GET['error'] == 0){
                                echo 'email and username invalid';
                              }else if($_GET['error'] == 1){
                                echo 'invalid username';
                              }else if($_GET['error'] == 2){
                                echo 'invalid email';
                              }else if($_GET['error'] == 3){
                                echo ' invalid email, username and password';
                              }else if($_GET['error'] == 4){
                                echo 'invalid email and password';
                              }else if($_GET['error'] == 5){
                                echo 'invalid username and password';
                              }else if($_GET['error'] == 6){
                                echo 'invalid password';
                              }
                              echo '</div>';
                            }
                          ?>
                            <script>
                            t = setTimeout(function(){removeElement("error") }, 4000);
                            function removeElement(elementId) {
                              var element = document.getElementById(elementId);
                              element.parentNode.removeChild(element);
                            }
                            </script>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

                            <!-- <label for="password" id="#error"> passwords must have 1 number, lowercase letter, and uppercause letter. Must be longer than 8 characters</label> -->
                            <?php
                            echo '<input type="text" placeholder="username" id="username" class="text_box" name="username" required="required" value="'.$_SESSION["enterUser"].'">'.
                            '<input type="email" placeholder="email" id="email" class="text_box" name="email" required="required" value="'.$_SESSION["enterEmail"].'">'.
                            '<div id="help">password must have atleast 8 characters, one number, one Uppercase and one Lowecase letter</div>'.
                            '<input type="password" placeholder="password"  id="password" class="text_box" name="password" required="required" title="password must have atleast 8 characters, one number, one Uppercase and one Lowecase letter" value="'.$_SESSION["enterPassword"].'">'.
                            '<input type="password" placeholder="confirm password" name="confirm_password" id="confirm_password" class="text_box" name="passwordAgain" required="required" title="password must have atleast 8 characters, 1 number, one Uppercase and one Lowecase letter" value="'.$_SESSION["enterConfirmPassword"].'">'.
                            '<input type="submit" id="register" class="submit" value="Register">';
                            ?>
                        </form>

                        <button id="helpButton">?</button>
                        <script>
                        $('#password, #confirm_password').on('keyup', function () {
                          if ($('#password').val() == $('#confirm_password').val()) {
                            $('#confirm_password').css('background-color', 'green');
                            $('#register').removeAttr("disabled");
                          } else{
                            if($('#confirm_password').val != ""){
                              $('#confirm_password').css('background-color', 'red');
                            }
                            $('#register').attr("disabled","disabled");
                        }
                          // $('#password').css('background-color', 'red');
                        });
                      </script>

                      <script>
                        $(document).ready(function(){
                            $("button").click(function(){
                                $("#help").toggle();
                              });
                            });
                    </script>

                          <!-- <span id='message'>asdgasdgasdgasdgasdf</span> -->
                        <form name="form" action="/register.php" method="POST">
                            <input type="submit" name="signIn" class="submit" value="switch to: Sign In" action="signIn.php">
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
