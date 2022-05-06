<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Sun Mar 27 2022 17:09:54 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="621deb2f999a5749746a42d7" data-wf-site="6216511dceccf8d3bc0c62f3">
<head>
  <meta charset="utf-8">
  <title>Owner Register 1</title>
  <meta content="Owner Register 1" property="og:title">
  <meta content="Owner Register 1" property="twitter:title">
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
<body>

<?php
$link = mysqli_connect("localhost", "root", ""); // SERVER CONNECTION

session_start();

if(isset($_SESSION["uname"]) && isset($_SESSION["userType"])) {
  
    if($_SESSION['userType'] == 1) {

        header("location: dashboard.php");
    }
    else if($_SESSION['userType'] == 2) {
      header("location: ../Mobile/home.php");
    }

}

if(isset($_POST['register'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $middle = $_POST['middle'];
  $lName = $_POST['lastName'];
  $fName = $_POST['Fname'];

  mysqli_select_db($link, "diskobre");  //? CONNECT TO DATEBASE



  mysqli_query($link, "
    insert into user(username,password,user_type,lname,middle,fname) values(
      '".$username."',
        MD5('".$password."'),  
        3,'".$lName."',
        '".$middle."',
        '".$fName."'
        )");
        header("location: owner-register-2.php?username=".$username);
}


?>



  <div class="login-section">
    <div class="login-content"><img src="images/Group-349.svg" loading="lazy" alt="" class="admin-logo-login"><img src="images/Group-348.png" loading="lazy" alt="">
      <h1 class="welcome-h1 welcome-register">Welcome! First things first...</h1>
      <h2 class="message-heading">You can always change them later.</h2>
      <div class="w-form">
        <form id="wf-form-Login-Form" name="wf-form-Login-Form" data-name="Login Form" method="POST" autocomplete="off" class="flex-v">

          <h3 class="login-heading">Establishment Account</h3>
          <p class="message-heading accnt-label">This is the credentials to be used in logging in to your account.</p>
          
          <label for="username" class="login-label" name="firstName">First Name</label>
          <div class="text-field">
            <input type="text" class="input-field w-input" maxlength="256" name="Fname" data-name="Fname" placeholder="First Name" id="Fname" required="">
          </div>

          <label for="password" class="login-label">Middle Initial <span class="optional">(Optional)</span></label>
          <div class="text-field">
            <input type="text" name="middle" class="input-field w-input" maxlength="256" name="middle-initial" data-name="middle initial" placeholder="M" id="middle-initial" >
          </div>

          <label for="username" class="login-label">Last Name</label>
          <div class="text-field description-tf">
            <input type="text" name="lastName" class="input-field w-input" maxlength="256" name="lname" data-name="lname" placeholder="Last Name" id="lname" required="">
          </div>

          <label for="username" class="login-label">Username</label>
          <div class="text-field">
            <img loading="lazy" src="images/Frame-111.svg" alt="">
            <input type="text" class="input-field w-input" maxlength="256" name="username" data-name="username" placeholder="Username" id="username" required="">
          </div>
          
          <label for="password" class="login-label">Password</label>
          <div class="text-field">
            <img loading="lazy" src="images/Frame-112.svg" alt="">
            <input type="password" class="input-field w-input" maxlength="256" name="password" data-name="password" placeholder="Password" id="password-2" required="">
          </div>
          
          <input type="submit" value="Create Account" data-wait="Please wait..." class="primary-button mt-2 w-button" name="register">

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
  <!-- <script src="js/diskobre.js" type="text/javascript"></script> -->
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>