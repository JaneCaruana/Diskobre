<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Tue Apr 05 2022 12:45:34 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="6249fad5186ec72fe43e051b" data-wf-site="62165137ca1ed84e0065bb2c">
<head>
  <meta charset="utf-8">
  <title>Notifications</title>
  <meta content="Recently VIsited" property="og:title">
  <meta content="Recently VIsited" property="twitter:title">
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




<?php
$link = mysqli_connect("localhost", "root", "");
session_start();
$userId = $_SESSION["userId"];
?>



<body>
  <div class="body-wrapper">
    <nav class="navbar px-2 py-1 hidden">
      <a href="index.html" class="nav-item w-inline-block"><img src="images/home-line-1.svg" loading="lazy" alt="" class="image-2"></a>
      <a href="navigation.html" class="nav-item w-inline-block"><img src="images/navigation.svg" loading="lazy" alt="" class="image-3"></a>
      <a href="community-chat-conversation.html" class="nav-item w-inline-block"><img src="images/message_1.svg" loading="lazy" alt="" class="image-4"></a>
      <a href="#" class="nav-item w-inline-block"><img src="images/user-settings.svg" loading="lazy" alt="" class="image-5"></a>
    </nav>
    <div class="head">
      <a href="profile-settings.php" class="w-inline-block"><img src="images/Frame-121.svg" loading="lazy" alt=""></a>
      <div class="convo-title">
        <h1 class="tittle mt-0">Notifications</h1>
      </div>
    </div>
    <div class="box">
<?php
    mysqli_select_db($link, "diskobre");
    $result = mysqli_query($link, "SELECT estab_name, address, status, establishment_id  FROM establishment WHERE user_fk = '$userId' AND status IN (2,3) AND notif = 0 ORDER BY estab_timestamp DESC ");

    while($notif = mysqli_fetch_array($result)):
     if($notif[2]== 2)
     {
       $getStatus= "Your contribution has been approved.";
     }
     if($notif[2]== 3)
     {
       $getStatus= "Sorry,  your contribution has  been disapproved its either the information was inaccurate or the establishment already exist.";
     }

?>



      <div class="place">
        <h2 class="place-name"><?php echo $notif[0]; ?></h2>
        <p class="place-address"><?php echo $notif[1] ?></p>
        <h2 class = "place-name"><?php echo $getStatus; ?></h2>


        <form action="php/readNotif.php" method="POST"> 
          <input name= "estabID" value="<?php echo $notif[3]?>" hidden> 

          <button type="submit"> Read  </button> 
        </form>
       
      </div>

      <!-- <div class="place"> -->
        <!-- <h2 class="place-name">Metro Colon</h2> -->
        <!-- <p class="place-address">Gaisano Metro, Colon corner Juan Luna Sts., Cebu City</p> -->
      <!-- </div> -->

      <!-- <div class="place"> -->
        <!-- <h2 class="place-name">Robinsons Galleria Cebu</h2> -->
        <!-- <p class="place-address">Gen. Maxilom Avenue Extension, Sergio Osmeña Jr Blvd, Cebu City, 6000 Cebu</p> -->
      <!-- </div> -->
    <!-- </div> -->
<?php endwhile; ?>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62165137ca1ed84e0065bb2c" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/diskobre.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>