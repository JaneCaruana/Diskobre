<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Tue Apr 05 2022 12:45:34 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="6249fd03dd48a974bfb7c6b1" data-wf-site="62165137ca1ed84e0065bb2c">
<head>
  <meta charset="utf-8">
  <title>Contribute Place</title>
  <meta content="Contribute Place" property="og:title">
  <meta content="Contribute Place" property="twitter:title">
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
session_start();

$userId = $_SESSION['userId'];


$link = mysqli_connect("localhost", "root", ""); // SERVER CONNECTION

if(isset($_POST['submitEstab'])) {

    $name = $_POST['name'];
    $category = $_POST['establishment-category'];
    $contactNumber = $_POST['contact-number'];
    $description = $_POST['description'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];

    $address = $_POST['address'];

    mysqli_select_db($link, "diskobre");  //? CONNECT TO DATEBASE

  
    mysqli_query($link, "INSERT into establishment(estab_name,category_id,address,description,contact,user_fk,latitude,longtitude) 
    values(
        '".$name."',
        '".$category."',  
        '".$address."','".$description."','".$contactNumber."','".$userId."','{$lat}','{$long}')");
  }

?>
  <div class="body-wrapper">

    <!-- header -->
    <div class="head">
      <a href="profile-settings.php" class="w-inline-block"><img src="images/Frame-121.svg" loading="lazy" alt=""></a>
      <div class="convo-title">
        <h1 class="tittle mt-0">Contribute a place</h1>
      </div>
    </div>

    <div class="box">
      <div class="text-style-3 mb-0-5">Add a location that you are familiar with</div>
      <div class="text-style-5 mb-1">Contribute a location that is note seen in the map</div>
      <div class="w-form">
        <form id="email-form" name="email-form" method="POST">
          
        <!-- name -->
        <label for="name-2" class="field-label-2">Name<span class="required">*</span></label>
        <div class="text-field-4">
          <input type="text" class="input-field w-input" maxlength="256" name="name" placeholder="Add name" id="name" required="">
        </div>

        <!-- category -->
        <label for="establishment-category" class="field-label-2">Category
          <span class="required">*</span></label>
          <select id="establishment-category" name="establishment-category" required="" class="text-field-4 w-select">
            <?php
              mysqli_select_db($link, "diskobre");
              $getAllCategory = mysqli_query($link, "SELECT *  from category");

              if(mysqli_num_rows($getAllCategory) > 0){
                while($s = mysqli_fetch_array($getAllCategory)){ ?>

                  <option value="<?php echo($s['category_id'])?>"><?php echo($s['estcat']) ?></option>

                 <?php }}
            ?>
          </select>
          
          <!-- contact number -->
          <label for="establishment-category-2" class="field-label-2">Contact Number</label>
          <div class="text-field-4">
            <input type="tel" class="input-field w-input" maxlength="256" name="contact-number" placeholder="Add contact number" id="contact-number" required="">
          </div>
          
          <!-- description -->
          <label for="establishment-category-2" class="field-label-2">Description<span class="required"></span></label>
          <div class="text-field-4">
            <input type="text" class="input-field w-input" maxlength="256" name="description" placeholder="Add description" id="description" required="">
          </div>
         
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
          
          <!-- imgs -->
          <!-- <div class="text-field-4 flex-v">
            <div class="w-embed">
              <input type="file" name="estab-featured-img" multiple id="gallery-photo-add">
            </div>
            <div class="gallery">

            </div>
          </div> -->

          <!-- <div class="text-style-5 mb-3">Helpful photos include the storefront, notices, and hours. Adding photo will easily reconized to the other person.</div> -->
          
          <!-- button -->
          <input class="btn-1 w-button" value="Contribute establishment" type="submit" name="submitEstab" >
        </form>
        
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62165137ca1ed84e0065bb2c" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- <script src="js/diskobre.js" type="text/javascript"></script> -->
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->

    
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Mapbox JS -->
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
  <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZGlza29icmUiLCJhIjoiY2wydnBlZDN2MGU0cjNpbXB2amd4dTlqYiJ9.J7FP7ZNPgwAGaUe8gQEcew';
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