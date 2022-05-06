<!DOCTYPE html>
<html data-wf-page="624beca7c7a98e7a806fd24c" data-wf-site="62165137ca1ed84e0065bb2c">
<head>
  <meta charset="utf-8">
  <title>Start Navigation</title>
  <meta content="Start Navigation" property="og:title">
  <meta content="Start Navigation" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="diskobre" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <link href="css/diskobre-client.styles.css" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
  <!-- Mapbox link -->
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
  <style>
      .marker {
          background-image: url(images/estab_mark.svg);
          background-size: contain;
          background-repeat: no-repeat;
          width: 30px;
          height: 60px;
          cursor: pointer;
      }

      .mapboxgl-popup {
          max-width: 200px;
      }

      .mapboxgl-popup-content {
          text-align: center;
          font-family: 'Open Sans', sans-serif;
      }
      
      .map{
        position: absolute;
        top: 0%;
        bottom: 0%;
        left: 0%;
        right: 0%;
      }

      #duration, #meters{
          font-family: 'Arial';
      }
  </style>
</head>
<body>
<?php
     $link = mysqli_connect('localhost','root','');
     mysqli_select_db($link,"diskobre");

     $estabId = $_GET['estabId'];
     $getEstablish = mysqli_query($link, "SELECT * from establishment WHERE establishment_id='{$estabId}'");
    if(mysqli_num_rows($getEstablish) > 0){
        while($s = mysqli_fetch_array($getEstablish)){
            $estabName = $s['estab_name'];
            $categoryId = $s['category_id'];
            $address = $s['address'];
            $description = $s['description'];
            $lat = $s['latitude'];
            $long = $s['longtitude'];

        }
    }
?>
  <div class="head container" style="position: fixed; top: 0; left: 0; right: 0; z-index: 100;">
    <!-- back button -->
    <a href="establishment-view-page.php?estabId=<?= $estabId ?>" class="w-inline-block"><img src="images/Frame-121.svg" loading="lazy" alt=""></a>
    <!-- my location button -->
    <div id="myloc" class="w-inline-block"><img src="images/Frame-122.svg" loading="lazy" alt=""></div>
  </div>

  <!-- maps -->
  <div class="map" id="map"></div>

  <!-- bottom info -->
  <div class="bottom-info" style="z-index: 100;">
    <div class="weight-50 flex-h">
      <div class="mr-0-5"><img src="images/Frame-141_1.svg" loading="lazy" alt=""></div>
      <div class="content-left pt-0-5">
        <div class="top-info-text" id="meters">0 METERS</div>
        <div class="bottom-info-text">Distance</div>
      </div>
    </div>
    <div class="weight-50 flex-h">
      <div class="mr-0-5"><img src="images/Frame-141-1.svg" loading="lazy" alt=""></div>
      <div class="content-left pt-0-5">
        <div class="top-info-text"  id="duration">0 Minutes</div>
        <div class="bottom-info-text">Estimated Time</div>
      </div>
    </div>
  </div>

  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62165137ca1ed84e0065bb2c" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/diskobre.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Mapbox JS -->
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
  <script>
      mapboxgl.accessToken = 'pk.eyJ1IjoiZGFuZGFuaWVsMzAwMCIsImEiOiJjbDBoM2p5azMwMmk5M2RvZ202ZXpxNGN1In0.DwxOgkdfNnGcqlrqGFGECg';
      var map = new mapboxgl.Map({
          container: 'map',
          style: 'mapbox://styles/mapbox/streets-v11',
          center: [123.8854, 10.3157], // Longtitude, Latitude
          zoom: 15
      });

      currentLoc = {
            lat: '',
            long: ''
        }
        
        var currentEl;
        
      if (navigator.geolocation) {
            navigator.geolocation.watchPosition(function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                var accuracy = position.coords.accuracy;
                console.log(position);

                currentLoc.lat = latitude;
                currentLoc.long = longitude;
                console.log(currentLoc.lat + ' ' + currentLoc.long);

                var currentGeoJson = {
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [currentLoc.long, currentLoc.lat] 
                    },
                    properties: {
                        title: 'Current Location'
                    }
                }

                if(currentEl){
                    currentEl.remove();
                }
                
                currentEl = document.createElement('div');
                currentEl.style.backgroundImage = `url(assets/myloc.png)`;
                currentEl.style.backgroundRepeat = `no-repeat`;
                currentEl.style.width = `100px`;
                currentEl.style.height = `100px`;
                currentEl.className = 'marker';

                new mapboxgl.Marker(currentEl)
                    .setLngLat(currentGeoJson.geometry.coordinates)
                    .addTo(map);

                getRoute([currentLoc.long, currentLoc.lat], ['<?= $long ?>', '<?= $lat ?>'])

                map.flyTo({
                    center: [longitude, latitude],
                    essential: true // this animation is considered essential with respect to prefers-reduced-motion
                });
                
                console.log("latitude: " + latitude + ", longitude: " + longitude + ", accuracy: " + accuracy);
            },
            function error(msg) {
                alert('Please enable your location feature!');
            },
            {maximumAge:10000, timeout:5000, enableHighAccuracy: true});
        } else {
            alert("Geolocation API is not supported in your browser.");
        }

        const geojson = {
            type: 'FeatureCollection',
            features: [
                { 
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: ['<?= $long ?>', '<?= $lat ?>']
                    },
                    properties: {
                        title: '<?= $estabName ?>'
                    }
                }
            ]
        };

        for (const feature of geojson.features) {
            // create a HTML element for each feature
            const el = document.createElement('div');
            el.className = 'marker';

            // make a marker for each feature and add to the map
            new mapboxgl.Marker(el)
                .setLngLat(feature.geometry.coordinates)
                .setPopup(
                    new mapboxgl.Popup({ offset: 25 }) // add popups
                        .setHTML(
                            `<h3>${feature.properties.title}</h3>`
                        )
                )
                .addTo(map);
        }

        async function getRoute(start, end) {
            const query = await fetch(
                `https://api.mapbox.com/directions/v5/mapbox/walking/${start[0]},${start[1]};${end[0]},${end[1]}?steps=true&geometries=geojson&access_token=${mapboxgl.accessToken}`,
                { method: 'GET' }
            );
            const json = await query.json();
            console.log(json)
            const data = json.routes[0];
            const route = data.geometry.coordinates;
            const distance = data.distance;
            const duration = data.duration;
            if(distance < 10){
                location.href='splash-screen.php';
            }
            
            $('#duration').html((distance/60).toFixed(0) + " Minute/s")
            $('#meters').html((duration/1000).toFixed(2) + " KM/s")


            const geojson = {
                type: 'Feature',
                properties: {},
                geometry: {
                    type: 'LineString',
                    coordinates: route
                }
            };

            // if the route already exists on the map, we'll reset it using setData
            if (map.getSource('route')) {
                map.getSource('route').setData(geojson);
            }

            // otherwise, we'll make a new request
            else {
                map.addLayer({
                    id: 'route',
                    type: 'line',
                    source: {
                        type: 'geojson',
                        data: geojson
                    },
                    layout: {
                        'line-join': 'round',
                        'line-cap': 'round'
                    },
                    paint: {
                        'line-color': '#26D0D2',
                        'line-width': 7,
                        'line-opacity': 1
                    }
                });
            }
            // add turn instructions here at the end
        }

        $('#myloc').click(function(){
            map.flyTo({
                center: [currentLoc.long, currentLoc.lat],
                essential: true // this animation is considered essential with respect to prefers-reduced-motion
            });
        })
    </script>
</body>
</html>