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
            var prevLong = -116.12317940000003;
            var prevLat = 43.574431;
            var panPath = [];   // An array of points the current panning action will use
            var panQueue = [];  // An array of subsequent panTo actions to take
            var STEPS = 50;

            function initMap() {
              geocoder = new google.maps.Geocoder();
              map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 20,
                    // center: {lat: 62.323907, lng: -150.109291},
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
                  map.setZoom(10);
                  var location = results[0].geometry.location
                  var lng = location.lng();
                  var lat = location.lat();
                  // var interLat = lat;
                  // var interLang = lang;
                  var steps = 10;

                  var dLat = lat / steps;
                  var dLng = lat / steps;
                  console.log(lng);
                  console.log(lat);
                  // for (var i=0; i < steps; i++) {
                  map.panTo(new google.maps.LatLng(lat,lng));
                      // map.panTo(new google.maps.LatLng(prevLat + i*dLat,prevLong + i*dLng));
                  // }

                  // map.setCenter(results[0].geometry.location);
                  // var marker = new google.maps.Marker({
                  //     map: map,
                  //     position: results[0].geometry.location
                  // });
                  prevLat = lat;
                  prevLong = lng;
                } else {
                  // alert('Geocode was not successful for the following reason: ' + status);
                  codeAddress("mount everest");
                }
              });
            }


            function panTo(newLat, newLng) {
              if (panPath.length > 0) {
                // We are already panning...queue this up for next move
                panQueue.push([newLat, newLng]);
              } else {
                // Lets compute the points we'll use
                panPath.push("LAZY SYNCRONIZED LOCK");  // make length non-zero - 'release' this before calling setTimeout
                var curLat = map.getCenter().lat();
                var curLng = map.getCenter().lng();
                var dLat = (newLat - curLat)/STEPS;
                var dLng = (newLng - curLng)/STEPS;

                for (var i=0; i < STEPS; i++) {
                  panPath.push([curLat + dLat * i, curLng + dLng * i]);
                }
                panPath.push([newLat, newLng]);
                panPath.shift();      // LAZY SYNCRONIZED LOCK
                setTimeout(doPan, 20);
              }
            }

            function doPan() {
              var next = panPath.shift();
              if (next != null) {
                // Continue our current pan action
                map.panTo( new google.maps.LatLng(next[0], next[1]));
                setTimeout(doPan, 20 );
              } else {
                // We are finished with this pan - check if there are any queue'd up locations to pan to
                var queued = panQueue.shift();
                if (queued != null) {
                  panTo(queued[0], queued[1]);
                }
              }
            }

            // map.setCenter({ lat: yourLat, lng: yourLng })
            google.maps.event.addDomListener(window, 'load', initMap);
        </script>
    </head>
    <body>
        <div id="map"></div>
    </body>
</html>
