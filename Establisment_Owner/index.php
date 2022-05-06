<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Sun Mar 27 2022 17:09:54 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="6216511dceccf833080c62f4" data-wf-site="6216511dceccf8d3bc0c62f3">
<head>
  <meta charset="utf-8">
  <title>Diskobre Owner</title>
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
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];

        $password = $_POST['password'];
        // ? Check if username already exist and if the priviledge is for an establishment owner
        
        mysqli_select_db($link, "diskobre");

        $userId = 3;
        $user = mysqli_query($link,"SELECT password,user_id from user WHERE username='$username' AND user_type = 3");
        // ? continue this
      if(mysqli_num_rows($user) > 0){
        while($s = mysqli_fetch_array($user)){ // GET THE DATA
          $pas = mysqli_query($link, "SELECT * from user WHERE user_type = 3 AND password = MD5('{$password}') AND username = '{$username}';"); //? CALL QUERY
          $passwordFound = $s['password'];
          $userId = $s['user_id'];
          if(mysqli_num_rows($pas) > 0) {
                  //? If value match then create a session
                  session_start();
                  $_SESSION["uname"] = $username;
                  $_SESSION["userType"] = 3;
                  $_SESSION['userId'] = $userId;
                  header("Location: dashboard.php");
          }
          
        }
      }
    }
?>

<body>
  <div class="login-section">
    <div class="login-content"><img src="images/Group-349.svg" loading="lazy" alt="" class="admin-logo-login">
      <h1 class="welcome-h1">Welcome!</h1>
      <h2 class="message-heading">We hope you have a great day<span class="spe-char">!</span></h2>
      <div class="w-form">
        <form id="wf-form-Login-Form" name="wf-form-Login-Form" data-name="Login Form" method="POST" autocomplete="off" class="flex-v">
          <h3 class="login-heading">Login Account</h3><label for="username" class="login-label">Username</label>
          <div class="text-field"><img loading="lazy" src="images/Frame-111.svg" alt="">
            <input type="text" class="input-field w-input" maxlength="256" name="username" data-name="username" placeholder="Username" id="username" required=""></div><label for="password" class="login-label">Password</label>
          <div class="text-field"><img loading="lazy" src="images/Frame-112.svg" alt="">
            <input type="password" class="input-field w-input" maxlength="256" name="password" data-name="password" placeholder="Password" id="password-2" required=""></div>
            <input name="submit" type="submit" value="Login" data-wait="Please wait..." class="primary-button mt-2 w-button">
        </form>
        <!-- <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while submitting the form.</div>
        </div> -->
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6216511dceccf8d3bc0c62f3" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- <script src="js/diskobre.js" type="text/javascript"></script> -->
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>