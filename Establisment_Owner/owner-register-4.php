<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Sun Mar 27 2022 17:09:54 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="623a1a2ee59eff6ebbd0c8ad" data-wf-site="6216511dceccf8d3bc0c62f3">
<head>
  <meta charset="utf-8">
  <title>Owner Register 4</title>
  <meta content="Owner Register 4" property="og:title">
  <meta content="Owner Register 4" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="diskobre" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <link href="css/diskobre-owner.styles.css" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>

<?php
$link = mysqli_connect("localhost", "root", ""); // SERVER CONNECTION

$estId = $_GET['estId'];

mysqli_select_db($link, "diskobre");
$user = mysqli_query($link, "SELECT user_fk as userId  from establishment WHERE establishment_id='{$estId}'");

if(mysqli_num_rows($user) > 0){
  while($s = mysqli_fetch_array($user)){ 
      $userId = $s['userId'];
  }
  $specUser = mysqli_query($link, "SELECT username as username  from user WHERE user_id='{$userId}'");
  
  if(mysqli_num_rows($specUser) > 0){
    while($s = mysqli_fetch_array($specUser)){ 
        $username = $s['username'];
    }
  }
  
    header("location: owner-Success-6.php?username=".$username);
}


?>
<body>
  <div class="login-section">
    <div class="login-content"><img src="images/Group-349.svg" loading="lazy" alt="" class="admin-logo-login"><img src="images/Group-346-1.png" loading="lazy" alt="" class="img1">
      <div class="w-form">
        <form id="wf-form-Login-Form" name="wf-form-Login-Form" data-name="Login Form" method="get" autocomplete="off" class="flex-v">
          <h1 class="login-heading">Establishment Information</h1>
          <p class="message-heading accnt-label w100per">The information can be change after you finished registering<br>You can always change them later.</p><label for="username" class="login-label">Image</label>
          <p class="message-heading accnt-label w100per">Image to be uploaded will set as featured photo of the establishment</p>
          <div class="text-field">
            <div class="input-field file w-embed"><input type="file" name="estab-featured-img" multiple=""></div>
          </div><label for="password" class="login-label">Permits</label>
          <div class="canvas">
            <div class="question-box">
              <div>Lists of Permits</div>
              <div class="divider"></div>
              <ul role="list" class="list">
                <li>Credentials includes BIR TIN</li>
                <li>Barangay Clearance</li>
                <li>DTI Business Name Registration Certificate</li>
                <li>Business Permit</li>
                <li>SEC Registration Certificate <span class="normal-font">(</span>optional<span class="normal-font">)</span>.</li>
              </ul>
            </div>
            <p class="message-heading accnt-label w100per">Must upload 5 permits for verification <span data-w-id="fcf0c7d9-7979-fd49-496b-c1886c7f6b1e" class="fontawesome"></span></p>
          </div>
          <div class="text-field mb-3">
            <div class="input-field file w-embed"><input type="file" name="estab-featured-img" multiple=""></div>
          </div><input type="submit" value="Continue" data-wait="Please wait..." class="primary-button mt-2 w-button">
          <a href="#" class="secondary-button btn-back w-button">Back</a>
        </form>
        <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while submitting the form.</div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6216511dceccf8d3bc0c62f3" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/diskobre.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>