<!--sessions and cookies stuff-->
<head>
    <link rel="stylesheet" href="stylesheets/main.css">
</head>

<body class="body">
    <!-- style="overflow:hidden;"    background-color:black;-->


    <div class="container">
        <div><a href="user.php"class="button glow-button" >My pictures</a></div><div><a href="" class="button_current" disabled>Browse</a></div><div><a href="dreams.php" class="button glow-button">dream trips</a></div><div><a href="signIn.php" class="button glow-button">sign in</a>
        </div>
    </div>

    <body>
        <div id="gmap">
            <div id="gmap-draw">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d712.5140702062604!2d-116.20371165490606!3d43.615062451539146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sbd!4v1518382569657" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div id="gmap-content">
<!--
                <h1>This is content</h1>
                <p>This is some text</p>
-->
            </div>
        </div>

<!--
        <div id="map"></div>
        <script>
            function initMap() {
                key=AIzaSyAQKJz82BbkGS6Mbg-M9EtS6lpZRm12iBI;
                var uluru = {lat: -25.363, lng: 131.044};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 4,
                    center: uluru
                });
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
        </script>
-->

        <div class="myBox glow-box">
            <ul>

<!--#sql                find and list all users by name, later try to implement a search function-->
                <li><a href="#" class="loc_button glow_loc">Jen</a></li><li><a href="#" class="loc_button glow_loc">Tucker</a></li><li><a href="#" class="loc_button glow_loc">Randy</a></li>
                <li><a href="#" class="loc_button glow_loc">Lanzo</a></li><li><a href="#" class="loc_button glow_loc">Prince Charming</a></li><li><a href="#" class="loc_button glow_loc">America</a></li>
                <li><a href="#" class="loc_button glow_loc">Jen</a></li><li><a href="#" class="loc_button glow_loc">Tucker</a></li><li><a href="#" class="loc_button glow_loc">Randy</a></li>
                <li><a href="#" class="loc_button glow_loc">Lanzo</a></li><li><a href="#" class="loc_button glow_loc">Prince Charming</a></li><li><a href="#" class="loc_button glow_loc">America</a></li>
                <li><a href="#" class="loc_button glow_loc">Jen</a></li><li><a href="#" class="loc_button glow_loc">Tucker</a></li><li><a href="#" class="loc_button glow_loc">Randy</a></li>
                <li><a href="#" class="loc_button glow_loc">Lanzo</a></li><li><a href="#" class="loc_button glow_loc">Prince Charming</a></li><li><a href="#" class="loc_button glow_loc">America</a></li>
                <li><a href="#" class="loc_button glow_loc">Jen</a></li><li><a href="#" class="loc_button glow_loc">Tucker</a></li><li><a href="#" class="loc_button glow_loc">Randy</a></li>
                <li><a href="#" class="loc_button glow_loc">Lanzo</a></li><li><a href="#" class="loc_button glow_loc">Prince Charming</a></li><li><a href="#" class="loc_button glow_loc">America</a></li>

            </ul>
        </div>
        <div class="spacedFooter">
            <span>&copy Kepa Totorica</span>
            <span>(208)599-5425</span>

        </div>

        <div class="submit">
            <a href="submit.php" class="submit_button glow_submit">add a picture</a>
        </div>

    </body>
    </html>
</body>
