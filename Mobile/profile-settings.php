<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Tue Apr 05 2022 12:45:34 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="6249eed27b96d313020fd21e" data-wf-site="62165137ca1ed84e0065bb2c">
<head>
  <meta charset="utf-8">
  <title>Profile Settings</title>
  <meta content="Profile Settings" property="og:title">
  <meta content="Profile Settings" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="diskobre" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <link href="css/diskobre-client.styles.css" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">

<!-- Ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>





</head>
<body>

<?php
session_start();
$link = mysqli_connect('localhost','root','');
mysqli_select_db($link,"diskobre");
$userId = $_SESSION["userId"];

$qUser = mysqli_query($link, "SELECT * FROM user WHERE user_id = '{$userId}'");
if(mysqli_num_rows($qUser) > 0){
  while($user= mysqli_fetch_array($qUser)){
    $username = $user['username'];
    $email = $user['email'];

  
  }
}
?>
  <div class="body-wrapper">
    <div class="head">
      <a href="home.php" class="w-inline-block"><img src="images/Frame-121.svg" loading="lazy" alt=""></a>
    </div>
    <div class="box">
      <!-- profile -->
      <img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" loading="lazy" width="82" height="82" alt="" class="profile">
      <div class="name-box">
        <h1 class="text-style-4" style="font-family: arial;"><?= $username ?></h1>
        <a href="dk-help.php?userId=<?php echo($userId)?>" class="w-inline-block">
          <img src="images/Group-1.svg" loading="lazy" alt="">
        </a>
      </div>
      <div class="text-style-1 text-size-14 color-light mb-2 ml-1" style="font-family: arial;"><?= $email ?></div>
      
      <div class="text-style-3 text-size-14 color-gray mb-1">Personal</div>

      <a href="recently-visited.php" class="settings w-inline-block">
        <img src="images/Frame-141.svg" loading="lazy" alt="" class="mr-0-5">
        <div class="text-style-3 text-size-14">Recently Visited</div>
        <div> <span class="counter"></span></div>
      </a>
      
      <a href="contribute-place.php" class="settings w-inline-block">
        <img src="images/Frame-127.svg" loading="lazy" alt="" class="mr-0-5">
        <div class="text-style-3 text-size-14">Contribute Establishment</div>
      </a>

      <div class="text-style-3 text-size-14 color-gray mb-1 mt-2">Content</div>
      <a href="help.php" class="settings w-inline-block">
        <img src="images/Frame-124.svg" loading="lazy" alt="" class="mr-0-5">
        <div class="text-style-3 text-size-14">Help</div>
      </a>
      
      <a href="logout.php" class="btn-logout w-button">Log out</a>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62165137ca1ed84e0065bb2c" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/diskobre.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>





<!-- Function for Ajax to refresh every 1000 miliseconds -->
<script>

$(document).ready(function(){

function load_unseen_notification(view = '')
{
$.ajax({
url:"php/fetchNotif.php",
method:"POST",
data:{view:view},
dataType:"json",
success:function(data)
{
if(data.unseen_notification > 0)
{
 $('.counter').html(data.unseen_notification);
}
}
});
}

setInterval(function(){ 
load_unseen_notification();; 
}, 1000);

});

</script>