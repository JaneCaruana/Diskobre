<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Sun Mar 27 2022 17:09:54 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="621dfdb4dbd631ae522cfd20" data-wf-site="6216511dceccf8d3bc0c62f3">
<head>
  <meta charset="utf-8">
  <title>Owner Register 3</title>
  <meta content="Owner Register 3" property="og:title">
  <meta content="Owner Register 3" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="diskobre" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <link href="css/diskobre-owner.styles.css" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
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
      .nav-title{
        text-decoration: none;
        color: black;
      }

      .map{
        height: 200px;
      }

      #lat, #long{
        background: white;
      }
  </style>
</head>
<body>

<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "diskobre");
// ? logic for register 2
if(isset($_POST['register'])) {

  $address = $_POST['address'];
  
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $lat = $_POST['lat'];
  $long = $_POST['long'];
  $estId= $_GET['estId'];

  echo($contact);
   mysqli_query($link,
   "UPDATE establishment 
   SET 
   address='{$address}', 
   contact='{$contact}', 
   estab_email='{$email}',
   latitude='{$lat}',
   longtitude='{$long}' 
   WHERE establishment_id='{$estId}'");


   header("location: owner-register-4.php?estId=".$estId);

}



?>
  <div class="login-section">
    <div class="login-content">
      <img src="images/Group-349.svg" loading="lazy" alt="" class="admin-logo-login"><img src="images/Group-346-1.png" loading="lazy" alt="" class="img1">
      
      <div class="w-form">

        <form id="wf-form-Login-Form"  method="POST" autocomplete="off" class="flex-v">
          <h1 class="login-heading">Establishment Information</h1>
          <p class="message-heading accnt-label">The information can be change after you finished registering<br>You can always change them later.</p>

          <!-- address -->
          <label for="establishment-category-2" class="field-label-2">Address<span class="required">*</span></label>
          <!-- map -->
          <div class="text-field-4 flex-v">
            <div class="map" id="map"></div>
          </div>
          <!-- address fields -->
          <div class="text-field-4 flex-v">

            <div class="content-vcenter">
              <label for="lat" id="lat">Latitude: </label>
              <input type="text" id="lat-val"  class="input-field w-input hidden"  name="lat" value="" required="true">
            </div>
            <div class="content-vcenter">
              <label for="long" id="long">Longtitude: </label>
              <input type="text" id="long-val" class="input-field w-input hidden"  name="long" value="" required="true">
            </div>

            <input type="text"class="input-field w-input" maxlength="256" name="address" placeholder="Add address" id="address" required="">
          </div>

          <!-- Contact -->
          <label for="contact-number" class="login-label">Contact Number</label>
          <div class="text-field">
            <input type="text" class="input-field w-input" maxlength="256" name="contact" placeholder="Contact Number" id="contact-number" required="">
          </div>
          
          <!-- Email -->
          <label for="email-address" class="login-label">Email Address</label>
          <div class="text-field description-tf">
            <input name="email" type="text" class="input-field w-input" maxlength="256" name="email-address" placeholder="Email Address" id="email-address" required="">
          </div>

          <input type="submit" value="Continue" class="primary-button mt-2 w-button" name="register">

          <a href="#" class="secondary-button btn-back w-button">Back</a>
        </form>

      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6216511dceccf8d3bc0c62f3" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- <script src="js/diskobre.js" type="text/javascript"></script> -->
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

      map.on('click', (event) => {
            const coords = Object.keys(event.lngLat).map((key) => event.lngLat[key]);
            $('#lat').html('Latitude: ' + coords[1])
            $('#long').html('Longtitude: ' + coords[0])
            $('#lat-val').val(coords[1])
            $('#long-val').val(coords[0])
            const end = {
                type: 'FeatureCollection',
                features: [
                    {
                        type: 'Feature',
                        properties: {},
                        geometry: {
                            type: 'Point',
                            coordinates: coords
                        }
                    }
                ]
            };
            if (map.getLayer('end')) {
                map.getSource('end').setData(end);
            } else {
                map.addLayer({
                    id: 'end',
                    type: 'circle',
                    source: {
                        type: 'geojson',
                        data: {
                            type: 'FeatureCollection',
                            features: [
                                {
                                    type: 'Feature',
                                    properties: {},
                                    geometry: {
                                        type: 'Point',
                                        coordinates: coords
                                    }
                                }
                            ]
                        }
                    },
                    paint: {
                        'circle-radius': 10,
                        'circle-color': '#26D0D2'
                    }
                });
            }
        });

      $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {
            $( "div.gallery" ).empty();
            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function() {
            imagesPreview(this, 'div.gallery');
        });
    });
  </script>

</body>
</html>