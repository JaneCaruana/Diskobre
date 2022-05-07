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

if(isset($_POST['login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  
  mysqli_select_db($link, "diskobre");  //? CONNECT TO DATEBASE
  $stud = mysqli_query($link, "SELECT password from user WHERE user_type = '1' AND username = '" . $username."'"); //? CALL QUERY

  if(mysqli_num_rows($stud) > 0){ //? IF VALUE IS GREATER THAN 0 THEN WOULD EXECUTE WHILE LOOP
    while($s = mysqli_fetch_array($stud)){ // GET THE DATA
      $pas = mysqli_query($link, "SELECT * from user WHERE user_type = '1' AND password = MD5('{$password}') AND username = '{$username}';"); //? CALL QUERY

      if(mysqli_num_rows($pas) > 0) {
              //? If value match then create a session
        while($s = mysqli_fetch_array($pas)) {

            $userId = $s['user_id'];

        }
              $_SESSION["uname"] = $username;
              $_SESSION["userType"] = 1;
              $_SESSION["userId"] = $userId;
              header("Location: dashboard.php");
          
              //! Should be hashed, did not put a hash yet because in the admin it is only login
      }
        
    }
     
  }
}

?>

<body>
  <div class="login-section">
    <div class="login-content"><img src="images/admin-logo.svg" loading="lazy" alt="" class="admin-logo-login">
      <div class="w-form">
        <form id="wf-form-Login-Form" name="wf-form-Login-Form" data-name="Login Form"  autocomplete="off" class="flex-v" method="POST">
          <h1 class="login-heading">Login Account</h1><label for="username" class="login-label">Username</label>
          <div class="text-field">
            <img loading="lazy" src="images/Frame-111.svg" alt="">
            <input type="text" class="input-field w-input" maxlength="256" name="username" data-name="username" placeholder="Username" id="username" name="username" required="">
          </div>
          <label for="password" class="login-label">Password</label>
          <div class="text-field">
            <img loading="lazy" src="images/Frame-112.svg" alt="">
            <input type="password" class="input-field w-input" maxlength="256" name="password" data-name="password" placeholder="Password" id="password-2" name="password" required="">
          </div>
          <input type="submit" value="Login" data-wait="Please wait..." class="primary-button mt-2 w-button" name="login">
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
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62165100d93c4633055bbbac" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- <script src="js/diskobre.js" type="text/javascript"></script> -->
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>