<!--#sessions and cookies stuff-->
<head>
    <link rel="stylesheet" href="stylesheets/main.css">
</head>

<body class="body">
    <!-- style="overflow:hidden;"    background-color:black;-->



    <div class="container">
        <div><a href="user.php"class="button glow-button" >My pictures</a></div><div><a href="browse.php"  class="button glow-button">Browse</a></div><div><a href="dreams.php" class="button glow-button">dream trips</a></div><div><a href="signIn.php" class="button glow-button">sign in</a></div>
    </div>


    <body>

        <div id="gmap">
            <div id="gmap-draw">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d712.5140702062604!2d-116.20371165490606!3d43.615062451539146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sbd!4v1518382569657" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div id="gmap-content">
                <div class="mySubmitBox glow-box">


                  <form action="upload.php" method="POST" enctype="multipart/form-data">
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



        <div class="spacedFooter">
            <span>&copy Kepa Totorica</span>
            <span>(208)599-5425</span>

        </div>



    </body>
    </html>
</body>
