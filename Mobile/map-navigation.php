<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Tue Apr 05 2022 12:45:34 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="624bef62678d85017f59b657" data-wf-site="62165137ca1ed84e0065bb2c">
<head>
  <meta charset="utf-8">
  <title>Map Navigation</title>
  <meta content="Map Navigation" property="og:title">
  <meta content="Map Navigation" property="twitter:title">
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

    #duration, #meters{
        font-family: 'Arial';
    }

    .nav-title{
      text-decoration: none;
      color: black;
    }
  </style>
</head>
<body>
  <?php
    $link = mysqli_connect('localhost','root','');
    mysqli_select_db($link,"diskobre");

    $estabId ='';
    if(isset($_GET['estabId'])) $estabId = $_GET['estabId'];
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
  <div class="mob-body">
    <!-- header -->
    <div class="head container map">
      <a href="home.php" class="w-inline-block"><img src="images/Frame-121.svg" loading="lazy" alt=""></a>
      <!-- <a href="#" class="w-inline-block"><img src="images/Group-148.png" loading="lazy" alt=""></a> -->
      <a href="navigation.php" class="w-inline-block"><img src="images/Frame-122.svg" loading="lazy" alt=""></a>
    </div>

    <!-- sorting head -->
    <!-- <div class="sort-header container"><img src="images/Group_1.svg" loading="lazy" alt="">
      <div class="sort-btn nav-map-btn selected">
        <div class="nav-map-btn">Open now</div>
      </div>
      <div class="sort-btn nav-map-btn">
        <div class="nav-map-btn">Top rated</div>
      </div>
    </div> -->

    <!-- map -->
    <div id="map" class="nav-map map"></div>

  </div>

  <!-- bottom info -->
  <!-- <div class="bottom-info flex-v">
    <div class="flex-h border-bottom">
      <div class="weight-80 flex-h">
        <div class="mr-0-5"><img src="images/Frame-151.svg" loading="lazy" alt=""></div>
        <div class="content-left pt-0-5">
          <div class="top-info-text"><?= $estabName ?></div>
          <div class="bottom-info-text distance-time"><span id="kilometer">...</span> | <span id="minutes">...</span></div>
        </div>
      </div>
      <div class="weight-30 img-holder"><img src="images/unsplash_nMyM7fxpokE.png" loading="lazy" alt="" class="img-based"></div>
    </div>
    <div class="content-hbetween">
      <a href="establishment-view-page.php?estabId=<?php echo($estabId)?>" class="w-inline-block"><img src="images/Frame-130.png" loading="lazy" alt=""></a>
      <a href="#" class="w-inline-block"><img src="images/Frame-154.png" loading="lazy" alt=""></a>
    </div>
  </div> -->
  
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
                
                console.log("latitude: " + latitude + ", longitude: " + longitude + ", accuracy: " + accuracy);
            },
            function error(msg) {
                alert('Please enable your location feature!');
            },
            {maximumAge:10000, timeout:5000, enableHighAccuracy: true});
        } else {
            alert("Geolocation API is not supported in your browser.");
        }

        var dataForm = new FormData();
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "apiallestablishment.php");
        xhr.onload = function(){
            var establishments = JSON.parse(this.response);
            const geojson = {
                type: 'FeatureCollection',
                features: establishments
            };

            for (const feature of geojson.features) {
                const el = document.createElement('div');
                el.className = 'marker';

                new mapboxgl.Marker(el)
                    .setLngLat(feature.geometry.coordinates)
                    .setPopup(
                        new mapboxgl.Popup({ offset: 25 }) 
                            .setHTML(
                                `<h5>${feature.properties.title}</h5><p>${feature.properties.category}</p>`
                            )
                    )
                    .addTo(map);
            }
        }
        xhr.send(dataForm);      

        $('#myloc').click(function(){
            map.flyTo({
                center: [currentLoc.long, currentLoc.lat],
                essential: true // this animation is considered essential with respect to prefers-reduced-motion
            });
        })
  </script>
</body>
</html>