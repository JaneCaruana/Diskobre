<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Sun Mar 27 2022 17:09:56 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="621b74b606919844fb4a5949" data-wf-site="62165100d93c4633055bbbac">
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <meta content="Dashboard" property="og:title">
  <meta content="Dashboard" property="twitter:title">
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
// ? Check if there is session
session_start();

if(isset($_SESSION["uname"])) {

  $uname = $_SESSION["uname"];
  $userId = $_SESSION["userId"];

}
// ? If there is no session go back to login page
else {
   header("Location: index.php");
}
?>


<?php
// ? For logout

if(isset($_GET["logout"])) {
 
  session_destroy();

  header("location: index.php");

}
?>

<?php
// ? Finding total registered user
$link = mysqli_connect("localhost", "root", ""); // SERVER CONNECTION
mysqli_select_db($link, "diskobre");

$userRoleUser = 2;
$userNum = mysqli_query($link, "SELECT COUNT(*) AS allUsers FROM user WHERE user_type='".$userRoleUser."'");//? CALL QUERY for registered user
$dataUser=mysqli_fetch_array($userNum);

$allUser = $dataUser['allUsers'];

// ? Finding total for establishment owners

$ownerNum = mysqli_query($link, "SELECT COUNT(*) AS allEstablishOwner FROM establishment JOIN user ON user.user_id = establishment.user_fk WHERE user.user_type= 3");//? CALL QUERY for registered user
$dataOwner=mysqli_fetch_array($ownerNum);

$allDataOwner = $dataOwner['allEstablishOwner'];

?>

<body>
  <div class="body-wrapper">
    <div class="left-panel"><img src="images/admin-logo.svg" loading="lazy" alt="" class="admin-logo-login mx-1">
      <a href="dashboard.php" aria-current="page" class="nav-item w-inline-block w--current"><img src="images/Group-416.svg" loading="lazy" alt="">
        <div class="nav-text selected">Dashboard</div>
      </a>
      <a href="user-management.php" class="nav-item w-inline-block"><img src="images/mail-line.svg" loading="lazy" alt="">
        <div class="nav-text">User Management</div>
      </a>
      <a href="establishment-management.php" class="nav-item w-inline-block"><img src="images/mail-line.svg" loading="lazy" alt="">
        <div class="nav-text">Establishment Management</div>
      </a>
      <a href="contribution-management.php" class="nav-item w-inline-block"><img src="images/mail-line.svg" loading="lazy" alt="">
        <div class="nav-text">Contribution Management</div>
      </a>
    </div>
    <div class="right-panel">
      <div data-hover="false" data-delay="0" class="admin-info w-dropdown">
        <div class="info-drop-down w-dropdown-toggle"><img src="images/Group-416_1.svg" loading="lazy" alt="" class="drop-down-icon">
          <div class="info-text"><span class="text-ligh-dark">Hi,</span> <?php echo($uname)?><span class="text-span">!</span></div>
        </div>
        <nav class="dropdown-list w-dropdown-list">
          <a href="edit-account.php?userId=<?php echo($userId)?>" class="info-drop-down-item w-dropdown-link">Edit Profile</a>
          <a href="dashboard.php?logout=true" class="info-drop-down-item w-dropdown-link">Logout</a>
        </nav>
      </div>
      <div class="page-container">
        <h1 class="page-title">Dashboard</h1>
        <div class="content-hbetween mb-1">
          <div class="content-vcenter">
            <div class="box mr-1">
              <h2 class="total-heading">Total registered users</h2>
              <div class="total-num"><?php echo($allUser) ?></div>
            </div>
            <div class="box">
              <h2 class="total-heading">Total establishment owners</h2>
              <div class="total-num"><?php echo($allDataOwner)?></div>
            </div>
          </div>
          <div class="content-vcenter">
            <div class="custome-date"><img src="images/Frame-94.svg" loading="lazy" alt="">
              <div class="cus-date-text">Custom Date</div>
            </div>
          </div>
        </div>
        <div class="box large">
          <h3 class="box-heading">Registered Users</h3>
          <div class="date">Last 30 days</div>
          <div class="chart"></div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62165100d93c4633055bbbac" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/diskobre.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>