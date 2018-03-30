<?php
session_start();
$address = $_SESSION["currAddress"];
if($_SESSION["currAddress"] === ""){
  $address = "Sydney, NSW";
}else{
  $address = $_SESSION["currAddress"];
}
?>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <style>
            #map {
                height: 100%;
            }
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFHdhSSicB64ul8JDHCFZQkJeo1Na43hY"></script>
        <script>
            var map;
            var geocoder;
            function initMap() {
              geocoder = new google.maps.Geocoder();
              map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: {lat: 62.323907, lng: -150.109291},
                    mapTypeId: 'satellite',

                });
                <?php
                // echo 'codeAddress("Sydney, NSW")';
                echo 'codeAddress("'.$_SESSION["currAddress"].'")';
                ?>
            }

            function codeAddress(ourAddress) {
              var address = ourAddress;
              geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == 'OK') {
                  map.setCenter(results[0].geometry.location);
                  var marker = new google.maps.Marker({
                      map: map,
                      position: results[0].geometry.location
                  });
                } else {
                  alert('Geocode was not successful for the following reason: ' + status);
                }
              });
            }

            // map.setCenter({ lat: yourLat, lng: yourLng })
            google.maps.event.addDomListener(window, 'load', initMap);
        </script>
    </head>
    <body>
        <div id="map"></div>
    </body>
</html>
