<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Sun Mar 27 2022 17:09:56 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="62165100d93c4666df5bbbad" data-wf-site="62165100d93c4633055bbbac">
<head>
  <meta charset="utf-8">
  <title>Diskobre Admin</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="diskobre" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <link href="css/diskobre-admin.styles.css" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>

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

  $confirmPassword = $_POST['confirmPassword'];

  $email = $_POST['email'];


  mysqli_select_db($link, "diskobre");  //? CONNECT TO DATEBASE
 
          if($password == $confirmPassword) {
                  //? If value match then create a session
                 $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                echo($hashed_password);
                mysqli_query($link, "
                insert into user(username,password,user_type,email) values(
                  '".$username."',
                  MD5('".$password."'),  
                    1,'".$email."')");
                    header("location: index.php");
              
                  //! Should be hashed, did not put a hash yet because in the admin it is only login
          }
          
      }
     
  


?>

<body>
  <div class="login-section">
    <div class="login-content"><img src="images/admin-logo.svg" loading="lazy" alt="" class="admin-logo-login">
      <div class="w-form">
        <form id="wf-form-Login-Form" name="wf-form-Login-Form" data-name="Login Form"  autocomplete="off" class="flex-v" method="POST">
          <h1 class="login-heading">Register Account</h1><label for="username" class="login-label">Username</label>
          <div class="text-field">
            <img loading="lazy" src="images/Frame-111.svg" alt="">
            <input type="text" class="input-field w-input" maxlength="256" name="username" data-name="username" placeholder="Username" id="username" name="username" required="">
          </div>

          <label for="password" class="login-label">Email</label>
          <div class="text-field">
            <img loading="lazy" src="images/Frame-112.svg" alt="">
            <input type="email" class="input-field w-input" maxlength="256" name="email" data-name="password" placeholder="email" id="password-2" name="password" required="">
          </div>
          <label for="password" class="login-label">Password</label>
          <div class="text-field">
            <img loading="lazy" src="images/Frame-112.svg" alt="">
            <input type="password" class="input-field w-input" maxlength="256" name="password" data-name="password" placeholder="Password" id="password-2" name="password" required="">
          </div>
          <label for="password" class="login-label">Confirm Password</label>
          <div class="text-field">
            <img loading="lazy" src="images/Frame-112.svg" alt="">
            <input type="password" class="input-field w-input" maxlength="256" name="confirmPassword" data-name="password" placeholder="Password" id="password-2" name="password" required="">
          </div>
        
          <input type="submit" value="Login" class="primary-button mt-2 w-button" name="register">
        </form>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62165100d93c4633055bbbac" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- <script src="js/diskobre.js" type="text/javascript"></script> -->
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>