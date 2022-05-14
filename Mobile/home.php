
<?php

$link = mysqli_connect('localhost','root','');
mysqli_select_db($link,"diskobre");

session_start();


if(isset($_SESSION['uname']))
$username = $_SESSION['uname'];
else
header('Location: index.php');


?>
<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Tue Apr 05 2022 12:45:34 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="62165137ca1ed8274b65bb2d" data-wf-site="62165137ca1ed84e0065bb2c">
<head>
  <meta charset="utf-8">
  <title>Diskobre Client</title>
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
  <div class="body-wrapper home">
    <nav class="navbar px-2 py-1">
      <a href="home.php" aria-current="page" class="nav-item w-inline-block selected-nav"><img src="images/home-line.svg" loading="lazy" alt="" class="image-2"></a>
      <a href="navigation.php" class="nav-item w-inline-block"><img src="images/navigation.svg" loading="lazy" alt="" class="image-3"></a>
      <!--<a href="community-chat.php" class="nav-item w-inline-block"><img src="images/message.svg" loading="lazy" alt="" class="image-4"></a>-->
      <a href="profile-settings.php" class="nav-item w-inline-block"><img src="images/user-settings.svg" loading="lazy" alt="" class="image-5"></a>
    </nav>
    <div class="search-bar">
            <div style="width: 100%;height: auto;display: block;">

        <div
            style="border: 1.32353px solid #E4E4E4;box-sizing: border-box;border-radius: 8.14793px;display: flex;padding: 0.7rem;">
            <img src="assets/search_icon.svg" alt="search_icon.svg" style="height:1.5rem;" />

            <form action="" method="GET">
                <input type="text" style="flex: 50%;background: none;border: none;font-size: 1.2rem;" minlength=""
                    maxlength="99" required name="search" />
            </form>
        </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="greetings">
      <h1 class="h1 " style="font-family: Arial; 
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;">Hi, <?php echo $username;?><span class="spe-char">!</span></h1>
      <h2 class="h3">Have a safe trip to your destination. Amping<span class="spe-char">!</span></h2>
    </div>
    <div class="category">
      <h3 class="h2">Categories</h3>
      <div class="category-box">


      <?php
      if(isset($_GET['search'])) {
                    $searched = $_GET['search'];

                    $getCategory = mysqli_query($link, "SELECT estcat as establish from category WHERE estcat like '%{$searched}%'");
                }
                else {
                    $getCategory = mysqli_query($link, "SELECT  estcat as establish from category");
                }
                
                    if(mysqli_num_rows($getCategory) > 0){
                    while($s = mysqli_fetch_array($getCategory)){ ?>
                   
                        <!-- <div style="border: 1.32353px solid #ECECEC; width: 32%;;margin-bottom: 2%;position: relative;border-radius: 8.14793px;">
                            <a href="navigation.php?category=<?php //echo($s['establish'])?>"  class="cat-item w-inline-block"> -->
                            <!-- <a href="#" class="cat-item w-inline-block"><img src="images/Group-112.svg" loading="lazy" alt=""></a> -->
                             
                                    <?php
                                    
                                       $estabToLower = strtolower($s['establish']);


                                      //  included
                                       if($estabToLower == 'remittances'){
                                        ?>
                                          <a href="navigation.php?category=remittances&catId=1" class="cat-item w-inline-block"><img src="images/card_remittance.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      if($estabToLower == 'grocery stores'){
                                        ?>
                                          <a href="navigation.php?category=grocery stores&catId=2" class="cat-item w-inline-block"><img src="images/card_grocery_store.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      if($estabToLower == 'water refilling station'){
                                        ?>
                                          <a href="navigation.php?category=water refilling station&catId=3" class="cat-item w-inline-block"><img src="images/card_water_station.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      if($estabToLower == 'laundry shops'){
                                        ?>
                                          <a href="navigation.php?category=laundry shops&catId=9" class="cat-item w-inline-block"><img src="images/card_laundry.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                       if($estabToLower == 'post office'){
                                        ?>
                                          <a href="navigation.php?category=post office&catId=4" class="cat-item w-inline-block"><img src="images/card_post_office.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      

                                      if($estabToLower == 'veterinary clinics'){
                                        ?>
                                          <a href="navigation.php?category=veterinary clinics&catId=10" class="cat-item w-inline-block"><img src="images/card_vet.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }
                                      if($estabToLower == 'hospital'){
                                        ?>
                                          <a href="navigation.php?category=hospital&catId=13" class="cat-item w-inline-block"><img src="images/card_hospital.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      if($estabToLower == 'mall'){
                                        ?>
                                          <a href="navigation.php?category=mall&catId=14" class="cat-item w-inline-block"><img src="images/card_malls.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      if($estabToLower == 'hotel'){
                                        ?>
                                          <a href="navigation.php?category=hotel&catId=15" class="cat-item w-inline-block"><img src="images/card_hotel.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }
                                      if($estabToLower == 'supermarket'){
                                        ?>
                                          <a href="navigation.php?category=supermarket&catId=16" class="cat-item w-inline-block"><img src="images/card_supermarket.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      if($estabToLower == 'gas station'){
                                        ?>
                                          <a href="navigation.php?category=gasoline station&catId=17" class="cat-item w-inline-block"><img src="images/card_gas_station.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      if($estabToLower == 'convenience store'){
                                        ?>
                                          <a href="navigation.php?category=convinience store&catId=18" class="cat-item w-inline-block"><img src="images/card_convinience_store.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }
                                      if($estabToLower == 'pharmacy'){
                                        ?>
                                          <a href="navigation.php?category=pharmacy&catId=19" class="cat-item w-inline-block"><img src="images/card_pharmacy.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      if($estabToLower == 'bank'){
                                        ?>
                                          <a href="navigation.php?category=bank&catId=20" class="cat-item w-inline-block"><img src="images/card_bank.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      if($estabToLower == 'public transportation'){
                                        ?>
                                          <a href="navigation.php?category=public transportation&catId=21" class="cat-item w-inline-block"><img src="images/card_public_transpo.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      if($estabToLower == 'police station'){
                                        ?>
                                          <a href="navigation.php?category=police station&catId=22" class="cat-item w-inline-block"><img src="images/card_police.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      if($estabToLower == 'health care'){
                                        ?>
                                          <a href="navigation.php?category=health care&catId=23" class="cat-item w-inline-block"><img src="images/card_health_care.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      if($estabToLower == 'public markets'){
                                        ?>
                                          <a href="navigation.php?category=public markets&catId=24" class="cat-item w-inline-block"><img src="images/card_public_mart.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }


                                      if($estabToLower == 'hardware stores'){
                                        ?>
                                          <a href="navigation.php?category=hardware stores&catId=25" class="cat-item w-inline-block"><img src="images/card_public_hardware.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      if($estabToLower == 'water and electric utilities'){
                                        ?>
                                          <a href="navigation.php?category=water and electric utilities&catId=26" class="cat-item w-inline-block"><img src="images/card_water_electric.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      if($estabToLower == 'telco'){
                                        ?>
                                          <a href="navigation.php?category=telco&catId=27" class="cat-item w-inline-block"><img src="images/card_telco.svg" loading="lazy" alt=""></a>
                                        <?php
                                      }

                                      // end of included category


                                      // not included


                                        if($estabToLower == 'restaurant'){
                                          ?>
                                            <a href="navigation.php?category=Restaurant&catId=17" class="cat-item w-inline-block"><img src="images/card_restaurant.svg" loading="lazy" alt=""></a>
                                          <?php
                                        }

                                        if($estabToLower == 'apartment'){
                                          ?>
                                            <a href="navigation.php?category=Apartment&catId=17" class="cat-item w-inline-block"><img src="images/card_apartment.svg" loading="lazy" alt=""></a>
                                          <?php
                                        }

                                        // end of not included category


                                        
                                    }
                    }
                
                ?>

      </div>
      <br><br><br><br><br>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62165137ca1ed84e0065bb2c" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/diskobre.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>