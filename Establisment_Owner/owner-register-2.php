<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Sun Mar 27 2022 17:09:54 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="621df3bc6da3be4585c9aa57" data-wf-site="6216511dceccf8d3bc0c62f3">
<head>
  <meta charset="utf-8">
  <title>Owner Register 2</title>
  <meta content="Owner Register 2" property="og:title">
  <meta content="Owner Register 2" property="twitter:title">
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

session_start();

if(isset($_SESSION["uname"]) && isset($_SESSION["userType"])) {
  
    if($_SESSION['userType'] == 1) {

        header("location: dashboard.php");
    }
    else if($_SESSION['userType'] == 2) {
      header("location: ../Mobile/home.php");
    }

}

// ? logic for register 2
if(isset($_POST['register'])) {

$getUser = $_GET['username'];

$name = $_POST['name'];
$category = $_POST['establishment-category'];
$descript = $_POST['descript'];


mysqli_select_db($link, "diskobre");
$user = mysqli_query($link, "SELECT user_id as userId  from user WHERE username='{$getUser}'");

if(mysqli_num_rows($user) > 0){
  while($s = mysqli_fetch_array($user)){ 
      $userId = $s['userId'];
  }

}


mysqli_query($link, "
    insert into establishment(estab_name,category_id,description,user_fk) values(
      '".$name."',
        '".$category."',  
        '".$descript."',
        '".$userId."'
        )");

$est = mysqli_query($link, "SELECT establishment_id as estId  from establishment WHERE estab_name='{$name}'");
if(mysqli_num_rows($est) > 0){
  while($s = mysqli_fetch_array($est)){
    $estId = $s['estId'];
  }
}

        


  header("location: owner-register-3.php?estId=".$estId);
}
?>










<body>
  <div class="login-section">
    <div class="login-content"><img src="images/Group-349.svg" loading="lazy" alt="" class="admin-logo-login"><img src="images/Group-346.png" loading="lazy" alt="">
      <h1 class="welcome-h1 welcome-register">Let’s set up the information <br>for your establishment</h1>
      <h2 class="message-heading">You can always change them later.</h2>
      <div class="w-form">
        <form id="wf-form-Login-Form"  data-name="Login Form" method="POST" autocomplete="off" class="flex-v">
          <h3 class="login-heading">Establishment Information</h3>
          <p class="message-heading accnt-label">The information can be change after you finished registering</p><label for="username" class="login-label">Name</label>
          <div class="text-field">
            <input type="text" class="input-field w-input" maxlength="256" name="name" data-name="Name" placeholder="Name" id="Name" required="true"></div>
          <label for="password" class="login-label">Category</label>
          <select id="establishment-category" name="establishment-category" data-name="establishment category" required="" class="text-field drop-down w-select">
            <?php 
              //? get the category
              mysqli_select_db($link, "diskobre");
              $category = mysqli_query($link, "select * from category");
              if(mysqli_num_rows($category) > 0){
                while($s = mysqli_fetch_array($category)){ ?>
                    <option value=<?php echo($s['category_id'])?>><?php echo($s['estcat']) ?></option>     
              <?php 
                }
              }
              ?>
          </select>
          <label for="username" class="login-label">Description</label>
          <div class="text-field description-tf">
            <input name="descript" type="text" class="input-field w-input" maxlength="256"  data-name="description" placeholder="Description" id="description" required=""></div>
            <input type="submit" value="Continue" data-wait="Please wait..." class="primary-button mt-2 w-button" name="register">
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
  <!-- <script src="js/diskobre.js" type="text/javascript"></script> -->
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>