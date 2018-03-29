<!--#sessions and cookies stuff-->
<head>
    <link rel="stylesheet" href="stylesheets/main.css">
</head>

<body class="body">
    <!-- style="overflow:hidden;"    background-color:black;-->



    <div class="container">
        <div><a href="user.php"class="button glow-button" >My pictures</a></div><div><a href="browse.php"  class="button glow-button">Browse</a></div><div><a href="dreams.php" class="button glow-button">dream trips</a></div><div><a href="signIn.php" class="button glow-button">sign out</a></div>
    </div>


    <body>

        <div id="gmap">
          <div id="gmap-draw">
            <?php require_once 'map.php'; ?>
          </div>
            <div id="gmap-content">
                <div class="mySubmitBox glow-box">


                  <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <div><input type="text" class="text_box" name="title" placeholder="title"></div>
                    <div><input type="text" class="text_box" name="longitude" placeholder="longitude"></div>
                    <div><input type="text" class="text_box" name="latitude" placeholder="latitude"></div>
                    <textarea rows="4" cols="30" class="text_box" name="description" placeholder="description"></textarea>

                    <!-- <div><a class="myPictureContainer"> -->
                        <!-- <div class="tx"> -->
                            <!-- browse to find a picture -->
                            <!-- or drag and drop -->
                        <!-- </div> -->
                        <!-- </a></div> -->

                    <div style="position: absolute; top: 75%;">
                      <input type="file" name="file">
                      <!-- <button type="submit" name="submit">UPLOAD IMAGE</button> -->
                        <input type="submit" class="submit" value="upload" name="submit">
                    </div>
                  </form>

<!--                    <div id="container" >-->
<!--                        <div id="content">-->
                            <!-- <form> -->
<!--                                <a class="loc_button glow_loc">location</a>-->
                                <!--                        <span class="signInText">username</span>-->
                                <!-- <div><input type="text" class="text_box" name="location" placeholder="location"></div> -->
                                <!--                        <span class="signInText">description</span>-->
<!--                                <a class="loc_button glow_loc">description</a>-->
<!--                                <div><input type="textarea" class="text_box" name="description" placeholder="description"></div>-->

<!--                                TODO make this resize automatically-->
                                <!-- <textarea rows="4" cols="30" class="text_box" name="description" placeholder="description"></textarea> -->

                                <!-- <div><a class="myPictureContainer"> -->
                                    <!-- <div class="tx"> -->
                                        <!-- browse to find a picture -->
                                        <!-- or drag and drop -->
                                    <!-- </div> -->
                                    <!-- </a></div> -->
<!--  -->
                                <!-- <div style="position: absolute; top: 75%;"> -->
                                    <!-- <input type="submit" class="submit" value="Submit" href="browse.php"> -->
                                <!-- </div> -->
                            <!-- </form> -->
<!--                    <div class="submitPictureContainer">-->

<!--                    </div>-->

<!--                        </div>-->
<!--                    </div>-->




                </div>
            </div>
        </div>



        <?php
        require_once "footer.php";
        ?>


    </body>
    </html>
</body>
