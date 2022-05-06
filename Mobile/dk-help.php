<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Tue Apr 05 2022 12:45:34 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="6249f68e23e2fe6a87b9958a" data-wf-site="62165137ca1ed84e0065bb2c">
<head>
  <meta charset="utf-8">
  <title>DK-Help</title>
  <meta content="DK-Help" property="og:title">
  <meta content="DK-Help" property="twitter:title">
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
<body>

<?php 

$userId = $_GET['userId'];

$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "diskobre");


if(isset($_POST['submit'])) {
  $newUser = $_POST['username'];
  $newEmail = $_POST['email'];
  $newPass = $_POST['password'];

  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $birthPicker =$_POST['birthPicker'];


  $stQUpdate = "UPDATE user SET  username='{$newUser}',password=MD5('{$newPass}'), email ='{$newEmail}', bdate='{$birthPicker}',fname='{$fName}',lname='{$lName}' WHERE user_id='{$userId}'";
  $updateUser = mysqli_query($link, $stQUpdate);
 
}

$user = mysqli_query($link,"SELECT * from user WHERE user_id='{$userId}'");
if(mysqli_num_rows($user) > 0){
  while($s = mysqli_fetch_array($user)){ // GET THE DATA
   $username = $s['username']; 
   $password = $s['password']; 
   $email = $s['email'];
   $fname = $s['fname'];
   $middle = $s['middle'];
   $lname = $s['lname'];
   $bdate = $s['bdate'];
  }
}


?>
  <div class="body-wrapper">
    <nav class="navbar px-2 py-1 hidden">
      <a href="index.php" class="nav-item w-inline-block"><img src="images/home-line-1.svg" loading="lazy" alt="" class="image-2"></a>
      <a href="navigation.php" class="nav-item w-inline-block"><img src="images/navigation.svg" loading="lazy" alt="" class="image-3"></a>
      <a href="community-chat-conversation.php" class="nav-item w-inline-block"><img src="images/message_1.svg" loading="lazy" alt="" class="image-4"></a>
      <a href="#" class="nav-item w-inline-block"><img src="images/user-settings.svg" loading="lazy" alt="" class="image-5"></a>
    </nav>

    <!-- header -->
    <div class="head">
      <a href="profile-settings.php" class="w-inline-block"><img src="images/Frame-121.svg" loading="lazy" alt=""></a>
      <div class="convo-title">
        <h1 class="tittle mt-0">Edit profile</h1>
      </div>
      <a href="profile-settings.php" class="w-inline-block"></a>
    </div>

    <!-- editable -->
    <div class="box">
      <!-- Profile Photo -->
      <div class="block-centered">
        <img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" loading="lazy" width="160" height="160" alt="" class="edit-img">
        <div class="edit-profile">
          <div class="profile-text">Edit Profile</div>
          <img src="images/Group-3.svg" loading="lazy" alt="">
        </div>
      </div>
      
      <!-- Form -->
      <div class="w-form">
        <form id="email-form" method="POST" autocomplete="off">

        <label for="email" class="field-label">First Name</label>
          <div class="text-field-3">
            <input type="text" value = "<?php echo($fname) ?>" 
            class="input-field w-input"
             maxlength="256" 
             name="fName" 
             placeholder="password" 
             id="username-2" >
            <img src="images/Group-3.svg" loading="lazy" alt="" class="image-6">
          </div>
          <label for="email" class="field-label">Last Name</label>
          <div class="text-field-3">
            <input type="text" value = "<?php echo($lname) ?>" 
            class="input-field w-input"
             maxlength="256" 
             name="lName" 
             placeholder="password" 
             id="username-2" >
            <img src="images/Group-3.svg" loading="lazy" alt="" class="image-6">
          </div>

          <!-- email -->
          <label for="email" class="field-label">Email</label>
          <div class="text-field-3">
            <input type="email" value="<?php echo($email) ?>" 
            class="input-field w-input" 
            maxlength="256" 
            name="email" 
            placeholder="email" 
            id="username-2">
            <img src="images/Group-3.svg" loading="lazy" alt="" class="image-6">
          </div>

          <!-- username -->
          <label for="username" class="field-label">Username</label>
          <div class="text-field-3">
            <input type="text" value="<?php echo($username)?>" 
            class="input-field w-input" 
            maxlength="256" 
            name="username" 
            placeholder="username" 
            id="username" >
            <img src="images/Group-3.svg" loading="lazy" alt="" class="image-6">
          </div>

          <!-- password -->
          <label for="email" class="field-label">Password</label>
          <div class="text-field-3">
            <input type="password" value = "<?php echo($password) ?>" 
            class="input-field w-input"
             maxlength="256" 
             name="password" 
             placeholder="password" 
             id="username-2" >
            <img src="images/Group-3.svg" loading="lazy" alt="" class="image-6">
          </div>

          <label for="email" class="field-label">Birthdate</label>
          <div class="text-field-3">
            <input type="date"
            class="input-field w-input"
             maxlength="256" 
             name="birthPicker" 
             placeholder="password" 
             id="username-2" 
             value="<?= $bdate ?>" >
            <img src="images/Group-3.svg" loading="lazy" alt="" class="image-6">
          </div>

          <input type="submit" name="submit" value ="submit" class = "btn-1" style= "border:none">
        </form>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62165137ca1ed84e0065bb2c" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- <script src="js/diskobre.js" type="text/javascript"></script> -->
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->

</body>
</html>