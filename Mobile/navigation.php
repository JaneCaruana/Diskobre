<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Tue Apr 05 2022 12:45:34 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="6249c8753e3a248015346cee" data-wf-site="62165137ca1ed84e0065bb2c">
<head>
  <meta charset="utf-8">
  <title>Navigation</title>
  <meta content="Navigation" property="og:title">
  <meta content="Navigation" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="diskobre" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <link href="css/diskobre-client.styles.css" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body>


<?php

$link = mysqli_connect('localhost','root','');
mysqli_select_db($link,"diskobre");

session_start();



$username = $_SESSION['uname'];

$category = null;
$categoryId ='';

if(isset($_GET['category'])) $category = $_GET['category'];
if(isset($_GET['catId'])) $categoryId = $_GET['catId'];


// $getId = mysqli_query($link, "SELECT  category_id as categoryId from category WHERE estcat LIKE '%{$category}%';");

// if(mysqli_num_rows($getId) > 0){
//   while($s = mysqli_fetch_array($getId)){

//      = $s['categoryId'];

//    }
//   }
?>

  <div class="body-wrapper">
    <!-- bottom navbar -->
    <nav class="navbar px-2 py-1">
      <a href="home.php" class="nav-item w-inline-block"><img src="images/home-line-1.svg" loading="lazy" alt="" class="image-2"></a>
      <a href="navigation.php" aria-current="page" class="nav-item w-inline-block selected-nav"><img src="images/navigation-1.svg" loading="lazy" alt="" class="image-3"></a>
      <!--<a href="community-chat.php" class="nav-item w-inline-block"><img src="images/message.svg" loading="lazy" alt="" class="image-4"></a> -->
      <a href="profile-settings.php" class="nav-item w-inline-block"><img src="images/user-settings.svg" loading="lazy" alt="" class="image-5"></a>
    </nav>

    <!-- header -->
    <div class="head">
      <!-- back button -->
      <a href="home.php" class="w-inline-block">
        <img src="images/Frame-121.svg" loading="lazy" alt="">
      </a>

      <!-- category -->
      <div class="cat-title">
        <?php
          if($category == 'remittances'){
            ?>
              <img src="images/cat_remittance.svg" loading="lazy" alt="">
            <?php
          }

          if($category == 'grocery stores'){
            ?>
              <img src="images/cat_grocery_store.svg" loading="lazy" alt="">
            <?php
          }

          if($category == 'water refilling station'){
            ?>
            <img src="images/cat_water_station.svg" loading="lazy" alt="">
            <?php
          }

          if($category == 'laundry shops'){
            ?>
              <img src="images/cat_laundry.svg" loading="lazy" alt="">
            <?php
          }

           if($category == 'post office'){
            ?>
              <img src="images/cat_post_office.svg" loading="lazy" alt="">
            <?php
          }

          if($category == 'veterinary clinics'){
            ?>
              <img src="images/cat_vet.svg" loading="lazy" alt="">
            <?php
          }
          if($category == 'hospital'){
            ?>
              <img src="images/cat_hospital.svg" loading="lazy" alt="">
            <?php
          }

          if($category == 'mall'){
            ?>
            <img src="images/cat_public_mart.svg" loading="lazy" alt="">
            <?php
          }

          if($category == 'hotel'){
            ?>
              <img src="images/cat_hotel.svg" loading="lazy" alt="">
            <?php
          }
          if($category == 'supermarket'){
            ?>
              <img src="images/cat_supermarket.svg" loading="lazy" alt="">
            <?php
          }

          if($category == 'gasoline station'){
            ?>
              <img src="images/cat_gas.svg" loading="lazy" alt="">
            <?php
          }

          if($category == 'convinience store'){
            ?>
            <img src="images/cat_convinience.svg" loading="lazy" alt="">
            <?php
          }
          if($category == 'pharmacy'){
            ?>
            <img src="images/cat_pharmacy.svg" loading="lazy" alt="">
            <?php
          }

          if($category == 'bank'){
            ?>
            <img src="images/cat_bank.svg" loading="lazy" alt="">
            <?php
          }

          if($category == 'public transportation'){
            ?>
            <img src="images/cat_public_transpo.svg" loading="lazy" alt="">
            <?php
          }

          if($category == 'police station'){
            ?>
            <img src="images/cat_police.svg" loading="lazy" alt="">
            <?php
          }

          if($category == 'health care'){
            ?>
            <img src="images/cat_health_care.svg" loading="lazy" alt="">
            <?php
          }

          if($category == 'public markets'){
            ?>
            <img src="images/cat_public_mart.svg" loading="lazy" alt="">
            <?php
          }


          if($category == 'hardware stores'){
            ?>
            <img src="images/cat_hardware.svg" loading="lazy" alt="">
            <?php
          }

          if($category == 'water and electric utilities'){
            ?>
            <img src="images/cat_water_electric.svg" loading="lazy" alt="">
            <?php
          }

          if($category == 'telco'){
            ?>
            <img src="images/cat_telco.svg" loading="lazy" alt="">
            <?php
          }

        ?>
        
        <h1 class="tittle">
          <?php 
            if( isset($category) ) echo ucwords($category); 
            else echo "All"; 
          ?>
        </h1>
      </div>

      <!-- Go to map -->
      <a href="map-navigation.php" class="w-inline-block">
        <img src="images/Frame-122.svg" loading="lazy" alt="">
      </a>
    </div>


  <div class="box">
    <?php  
      $strQ = "SELECT  * from establishment ";
      if(isset($_GET['catId'])) $strQ .= "  WHERE category_id = '{$categoryId}';";
      $getEstablish = mysqli_query($link, $strQ );
      if(mysqli_num_rows($getEstablish) > 0){
        while($s = mysqli_fetch_array($getEstablish)){ 
          $userFk = $s['user_fk'];
          $estabId = $s['establishment_id'];
          $getUser_type = mysqli_query($link, "SELECT user_type as userType from user WHERE user_id='{$userFk}'");
          // $getOpTime =  mysqli_query($link, "SELECT  * FROM operatingtime  WHERE Establishmentid_fk='{$estabId}'");

          
          if(mysqli_num_rows($getUser_type) > 0){
            while($a = mysqli_fetch_array($getUser_type)){
                
              $userType = $a['userType'];
              
             }
          }
    

          ?>
            <div style="text-decoration:none" >
              <!-- card -->
              <div style="display: flex;" class="block-h-weighted border-design my-1" >
                <div style="width: 80%;" class="flex-v" onclick="window.location.href='establishment-view-page.php?estabId=<?php echo($s['establishment_id']) ?>'">
                  <h2 class="estab-name">Cebu <?php echo($s['estab_name']) ?></h2>

                  <div class="ratings-distance">
                    <div class="address-txt"><span class="spe-char">4</span>.0</div> 

                    <div class="star"><span class="spe-char">*****</span></div>
                  </div>

                  <div  class="address-txt">
                    <span class="spe-char"><?php echo($s['address']) ?></span>
                  </div>
                  <?php
                    if(isset($userType)){
                      if($userType == 2) echo '<p style= "color:#C7C7C7;">Contributed Establishment</p>';
                    }                     
                  ?>
                </div>

                <div style="width: 20%;" class="content-center"> 
                    <img src="images/Frame-121-1.svg" loading="lazy" alt="" onclick="window.location.href='start-navigation.php?estabId=<?php echo($s['establishment_id'])?>'">
                </div>
              </div>
            </div>
          <?php 
        }
      } 
    ?>
  </div>

  <div class="p-3"></div>
  
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62165137ca1ed84e0065bb2c" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/diskobre.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>