<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Thu May 05 2022 12:18:14 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="62736957d44c223ed3131ffc" data-wf-site="62165100d93c4633055bbbac">
<head>
  <meta charset="utf-8">
  <title>Edit Account</title>
  <meta content="Edit Account" property="og:title">
  <meta content="Edit Account" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/diskobre-admin.webflow.css" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body>

<?php 
// ? Check if there is session

$link = mysqli_connect("localhost", "root", ""); // SERVER CONNECTION
mysqli_select_db($link, "diskobre");

session_start();


if(isset($_SESSION["uname"])) {

  $uname = $_SESSION["uname"];
  $userId = $_SESSION['userId'];
}


$findAdmin = mysqli_query($link, "SELECT * from user WHERE user_id='{$userId}'");
if(mysqli_num_rows($findAdmin) > 0){
  while($s = mysqli_fetch_array($findAdmin)){
    
    $passwword = $s['password'];
    $email = $s['email'];
    $username = $s['username'];
    $fname = $s['fname'];
    $lname = $s['lname'];
  }
}


if(isset($_POST["delete"])) {
  
  $updateUser = mysqli_query($link,"DELETE FROM user WHERE user_id = '{$userId}'");
  session_destroy();
  header("location: index.php");
}
if(isset($_POST["update"])) {
  $user = $_POST['name'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  $updateUser = mysqli_query($link,"UPDATE user SET username='{$user}', password=md5('{$password}'), email = '{$email}',fName='${fname}',lname='${lname}'  WHERE user_id='{$userId}'");
  header("Location: edit-account.php");
}

?>


  <div class="body-wrapper">
    <div class="left-panel"> <a href="dashboard.php"><img src="images/admin-logo.svg" loading="lazy" alt="" class="admin-logo-login mx-1"></a></div>
    <div class="right-panel">
      <!-- <div data-hover="false" data-delay="0" class="admin-info w-dropdown">
        <div class="info-drop-down w-dropdown-toggle"><img src="images/Group-416_1.svg" loading="lazy" alt="" class="drop-down-icon">
          <div class="info-text"><span class="text-ligh-dark">Hi,</span> <?php echo($uname) ?><span class="text-span">!</span></div>
        </div>
        <nav class="dropdown-list w-dropdown-list">
          <a href="index.html" class="info-drop-down-item w-dropdown-link">Logout</a>
        </nav>
      </div> -->
      <div class="page-container">
        <div class="content-vcenter py-0-5"><img src="images/Frame-437.svg" loading="lazy" alt="" class="mr-1">
          <h1 class="page-ttle">Edit Account</h1>
        </div>
        <div class="box large">
          <div class="estab-body-view">
            <div class="w-form">
              <form id="wf-form-establishment-form" method="POST">
                <div class="estab-view-body">
                  <h2 class="h2-estab-view">Admin Account</h2>
                  <div class="h-divider mb-1"></div>
                  <label for="username-3" class="h4-estab-view">Username</label>
                  
                  <input type="text" value="<?php echo($username) ?>" class="text-field estab-view w-input" maxlength="256" name="name" data-name="Estab Email 3" placeholder="Email Address" >
                  <label for="password" class="h4-estab-view">Password</label>
                  <input type="password" value="<?php echo($passwword) ?>" class="text-field estab-view w-input" maxlength="256" name="password" data-name="password" placeholder="Password" id="password" >
                  <label for="estab-email-3" class="h4-estab-view">Email Address</label>
                  <input type="email" value="<?php echo($email) ?>" class="text-field estab-view w-input" maxlength="256" name="email" data-name="Estab Email 3" placeholder="Email Address" id="estab-email-3" >
                </div>
                <div class="content-center">
                  <div class="content-vcenter">
                    <input type="submit" value="Delete" name="delete" style="background: red;" class="primary-button estab-view w-button">
                    <div class="px-3"></div>
                    <input type="submit" value="Update" name="update" class="primary-button estab-view w-button">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62165100d93c4633055bbbac" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>