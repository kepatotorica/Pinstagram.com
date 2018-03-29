<!--#TODO make it so that dreams just resets to current view being you, maybe call it homepage  -->

<head>
    <link rel="stylesheet" href="stylesheets/main.css">
</head>

<body class="body">
    <!-- style="overflow:hidden;"    background-color:black;-->



    <div class="container">
        <div><a href="user.php"class="button glow-button" >My pictures</a></div><div><a href="browse.php"  class="button glow-button">Browse</a></div><div><a href="dreams.php" class="button_current" disabled>dream trips</a></div><div><a href="signIn.php" class="button glow-button">sign out</a></div>
    </div>

    <div id="gmap">
      <div id="gmap-draw">
        <?php require_once 'map.php'; ?>
      </div>
    </div>

    <body>

        <!-- HTML -->
        <div class="myBox glow-box">
            <ul>
<!--#sql                based on dream locations aka a new entry in the database that corrisponds with a user id-->
                <li><a href="#" class="loc_button glow_loc">atlantis</a></li><li><a href="#" class="loc_button glow_loc">Mars</a></li><li><a href="#" class="loc_button glow_loc">the sun</a></li>
                <li><a href="#" class="loc_button glow_loc">atlantis</a></li><li><a href="#" class="loc_button glow_loc">Mars</a></li><li><a href="#" class="loc_button glow_loc">the sun</a></li>
                <li><a href="#" class="loc_button glow_loc">atlantis</a></li><li><a href="#" class="loc_button glow_loc">Mars</a></li><li><a href="#" class="loc_button glow_loc">the sun</a></li>
                <li><a href="#" class="loc_button glow_loc">atlantis</a></li><li><a href="#" class="loc_button glow_loc">Mars</a></li><li><a href="#" class="loc_button glow_loc">the sun</a></li>
                <li><a href="#" class="loc_button glow_loc">atlantis</a></li><li><a href="#" class="loc_button glow_loc">Mars</a></li><li><a href="#" class="loc_button glow_loc">the sun</a></li>
                <li><a href="#" class="loc_button glow_loc">atlantis</a></li><li><a href="#" class="loc_button glow_loc">Mars</a></li><li><a href="#" class="loc_button glow_loc">the sun</a></li>
            </ul>
        </div>

        <div class="submit">
            <a href="submit.php" class="submit_button glow_submit">add a picture</a>
        </div>

        <?php
        require_once "footer.php";
        ?>

    </body>
    </html>
</body>
