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
            var prevLng = -116.12317940000003;
            var prevLat = 43.574431;
            var panPath = [];   // An array of points the current panning action will use
            var panQueue = [];  // An array of subsequent panTo actions to take
            var STEPS = 10000;

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
                  // map.setZoom(10);
                  var location = results[0].geometry.location
                  var lng = location.lng();
                  var lat = location.lat();
                  var gLng = location.lng() - prevLng;
                  var gLat = location.lat() - prevLat;
                  var interLat = lat;
                  var interLng = lng;
                  var steps = 10000;

                  var dLat = gLat / steps;
                  var dLng = gLng / steps;
                  console.log(lng);
                  console.log(lat);
                  // map.setCenter(new google.maps.LatLng(prevLat,prevLng));
                  console.log("1");
                  // map.panTo(new google.maps.LatLng(lat,lng));
                  for (var i=0; i < steps; i++) {
                      // prevLat += dLat;
                      // prevLong += dLng;
                      //for some reason this isn't actually makeing it pan
                        setTimeout(map.panTo(new google.maps.LatLng(prevLat + dLat*i,prevLng + dLng*i)),1000);
                  //     console.log(map.getCenter().lat());
                  //     // map.panTo(new google.maps.LatLng(prevLat + i*dLat,prevLong + i*dLng));
                  }
                  console.log("=========Latitiude==========");
                  console.log("prev= " + prevLat);
                  console.log("goal= " + lat);
                  console.log("difference= " + (prevLat - lat));
                  console.log("change= " + dLat);
                  console.log("times changed= " + steps);
                  console.log("result = " + (prevLat + dLat*steps));
                  console.log("goal= " + lat);
                  console.log("reached= " + map.getCenter().lat());

                  console.log("=========Longitude==========");
                  console.log("prev= " + prevLng);
                  console.log("goal= " + lng);
                  console.log("difference= " + (prevLng - lng));
                  console.log("change= " + dLng);
                  console.log("times changed= " + steps);
                  console.log("result = " + (prevLng + dLng*steps));
                  console.log("goal= " + lng);
                  console.log("reached= " + map.getCenter().lng());

                  // map.setCenter(results[0].geometry.location);
                  // var marker = new google.maps.Marker({
                  //     map: map,
                  //     position: results[0].geometry.location
                  // });
                  prevLat = lat;
                  prevLng = lng;
                  map.setCenter(new google.maps.LatLng(prevLat,prevLng));
                  console.log("prev= " + prevLat);
                  console.log("goal= " + lat);
                  console.log("prev= " + prevLng);
                  console.log("goal= " + lng);
                } else {
                  // alert('Geocode was not successful for the following reason: ' + status);
                  codeAddress("mount everest");
                }
              });
            }


            // function panTo(newLat, newLng) {
            //   if (panPath.length > 0) {
            //     // We are already panning...queue this up for next move
            //     panQueue.push([newLat, newLng]);
            //   } else {
            //     // Lets compute the points we'll use
            //     panPath.push("LAZY SYNCRONIZED LOCK");  // make length non-zero - 'release' this before calling setTimeout
            //     var curLat = map.getCenter().lat();
            //     var curLng = map.getCenter().lng();
            //     var dLat = (newLat - curLat)/STEPS;
            //     var dLng = (newLng - curLng)/STEPS;
            //     console.log("2");
            //
            //     for (var i=0; i < STEPS; i++) {
            //       panPath.push([curLat + dLat * i, curLng + dLng * i]);
            //       console.log("3");
            //     }
            //     panPath.push([newLat, newLng]);
            //     panPath.shift();      // LAZY SYNCRONIZED LOCK
            //     setTimeout(doPan, 20);
            //   }
            // }
            //
            // function doPan() {
            //   console.log("4");
            //   var next = panPath.shift();
            //   if (next != null) {
            //     // Continue our current pan action
            //     panTo( new google.maps.LatLng(next[0], next[1]));
            //     setTimeout(doPan, 20 );
            //     console.log("5" + next[0] + " - " + next[1]);
            //   } else {
            //     // We are finished with this pan - check if there are any queue'd up locations to pan to
            //     console.log("DONE");
            //     var queued = panQueue.shift();
            //     if (queued != null) {
            //       panTo(queued[0], queued[1]);
            //       console.log("6");
            //     }
            //   }
            // }

            // map.setCenter({ lat: yourLat, lng: yourLng })
            google.maps.event.addDomListener(window, 'load', initMap);
        </script>
    </head>
    <body>
        <div id="map"></div>
    </body>
</html>
