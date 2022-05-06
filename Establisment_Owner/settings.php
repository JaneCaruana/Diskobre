<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Sun Mar 27 2022 17:09:54 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="62402d2bbd42a548951ad5be" data-wf-site="6216511dceccf8d3bc0c62f3">
<head>
  <meta charset="utf-8">
  <title>Settings</title>
  <meta content="Settings" property="og:title">
  <meta content="Settings" property="twitter:title">
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
date_default_timezone_set("Asia/Manila");
$link = mysqli_connect('localhost','root','');
mysqli_select_db($link,"diskobre");
$estabId = $_GET['estab_id'];

$viewEstab = mysqli_query($link, "SELECT * from establishment where establishment_id='{$estabId}'");


if(mysqli_num_rows($viewEstab) > 0){
  while($s = mysqli_fetch_array($viewEstab)){
  
    $estab_name = $s['estab_name'];
    $address = $s['address'];
    $description = $s['description'];
    $address = $s['address'];
    $estab_email = $s['estab_email'];
    $contact = $s['contact'];
  }
}

$getUser = mysqli_query($link, "SELECT  user_fk as userId from establishment where establishment_id='{$estabId}'");


if(mysqli_num_rows($getUser) > 0){
  while($s = mysqli_fetch_array($getUser)){
  
    $userId = $s['userId'];
  }
}

$user = mysqli_query($link, "SELECT * from user where user_id='{$userId}'");


if(mysqli_num_rows($user) > 0){
  while($s = mysqli_fetch_array($user)){
  
    $fname = $s['fname'];
    $middle = $s['middle'];
    $lname = $s['lname'];
  
    $password = $s['password'];
    $username = $s['username'];
   
  }
}
if(isset($_POST['approve'])) {
  $fname = $_POST['fname'];
  $middle = $_POST['middle'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
 
  $establishmentName = $_POST['establishmentName'];
  $email = $_POST['email-establish'];
  $address = $_POST['address'];
  $description = $_POST['description'];
  $contact = $_POST['contact'];


  $password = $_POST['password'];

  
  
  // ? consult with dan
   $updateUser = mysqli_query($link,"UPDATE user SET fname='$fname', middle='$middle', lname='$lname', username='$username' WHERE user_id='{$userId}'");
   $updateEstab = mysqli_query($link,"UPDATE establishment SET  estab_email='$email',estab_name='$establishmentName', address='$address', description='$description',contact='$contact' WHERE user_fk='{$userId}'");


  header("location: dashboard.php");


}






?>
<body>
  <div class="body-wrapper">
    <div class="left-panel"><img src="images/Group-349.svg" loading="lazy" alt="" class="admin-logo-login mx-1">
      <a href="dashboard.php" class="nav-item w-inline-block"><img src="images/Group.png" loading="lazy" alt="">
        <div class="nav-text">Overview</div>
      </a>
      <a href="messages.php" class="nav-item w-inline-block"><img src="images/mail-line.svg" loading="lazy" alt="">
        <div class="nav-text">Messages</div>
      </a>
      <a href="#" class="nav-item selected-nav w-inline-block"><img src="images/user-settings-line.svg" loading="lazy" alt="">
        <div class="nav-text selected">Settings</div>
      </a>
    </div>
    <div class="right-panel">
      <div data-hover="false" data-delay="0" class="admin-info w-dropdown">
        <div class="info-drop-down w-dropdown-toggle"><img src="images/unsplash_X6Uj51n5CE8.png" loading="lazy" alt="" class="drop-down-icon">
          <div class="info-text"><span><?php echo($username)?></span></div>
        </div>
        <nav class="dropdown-list w-dropdown-list">
          <a href="#" class="info-drop-down-item w-dropdown-link">Logout</a>
        </nav>
      </div>
      <div class="page-container">
        <h1 class="page-title">Settings</h1>
      </div>
      <div class="settings-container">
        <div class="block-weighted">
          <div class="weight-30">
            <div class="admin-seeting">Admin Settings</div>
            <a href="settings.php" aria-current="page" class="adm-item selected-admn-item w-inline-block w--current">
              <div class="admn-text selected-adm-text">Establishment Information</div>
            </a>
            <a href="settings-hours.php" class="adm-item w-inline-block">
              <div class="admn-text">Set Standard Hours</div>
            </a>
          </div>
          <div class="weight-70 admn-right-panel">
            <div class="subcription-box">
              <div class="subs-headers">
                <div class="actve-subs"><?php 
                  $qSelectSub = mysqli_query($link, "SELECT * FROM subscription WHERE user_id_fk = {$userId}");
                  if(mysqli_num_rows($qSelectSub) > 0){
                    $subscription = mysqli_fetch_assoc($qSelectSub);
                    $start_at = $subscription['start_at'];
                    $expire_at = $subscription['expire_at'];
                    $current_date = date("Y-m-d");

                    $date1 = date_create($expire_at);
                    $date2 = date_create($current_date);
                    $diff = date_diff($date1,$date2);
                    // echo $diff->format("%R%a");
                    if(number_format($diff->format("%R%a")) > 0){
                      echo "Expired Subscription";
                      $qUpdateSub = mysqli_query($link, "UPDATE subscription SET status = 'inactive' WHERE user_id_fk = {$userId}");
                    }else{
                      echo "Active Subscription";
                      $qUpdateSub = mysqli_query($link, "UPDATE subscription SET status = 'active' WHERE user_id_fk = {$userId}");
                    }
                  }else{
                    echo "No Subscription";
                  }
                ?></div>
                <div class="text-block-2">
                  <?php 
                  if(isset($start_at)){
                    $date1=date_create($start_at);
                    $date2=date_create($expire_at);
                    $diff=date_diff($date1,$date2);
                    // echo $diff->format("%R%a");
                    if(number_format($diff->format("%R%a")) >= 365){
                      echo 'P758<span class="spe-char">/</span><span class="spe-color">month</span>';
                    }else{
                      echo 'P79<span class="spe-char">/</span><span class="spe-color">month</span>';
                    }
                  } echo "-";
                  ?>
                </div>
              </div>
              <div class="subs-range-box">
                <div class="start-subs">
                  <div class="text-block-4"><?php if( isset($start_at) ) echo date_format(date_create($start_at),"M d, Y"); else echo "-"; ?></div>
                </div>
                <div class="text-block-3">to</div>
                <div class="end-subs">
                  <div class="text-block-4"><?php if( isset($expire_at) ) echo date_format(date_create($expire_at),"M d, Y"); else echo "-"; ?></div>
                </div>
              </div>
            </div>
            <div class="admn-label-box">
              <div class="estab-text">Establishment Information</div>
              <p class="paragraph text-p-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis interdum vestibulum aliquet odio vel nisi, laoreet vel lectus. Nibh proin nisl bibendum porttitor.</p>
            </div>
            <div class="form-block w-form">
              <!-- form -->
              <form id="email-form" name="email-form" data-name="Email Form" method="POST">
                <div class="estab-accnt-ttle">Establishment Account</div>
                <p class="paragraph accnt-p">This is the credentials to be used in logging in to your account.</p>
                  <label for="Username" class="form-label">Username</label>
                    <input type="text" value="<?php echo($username) ?>" name="username" class="text-field-settings spe-char w-input" maxlength="256" data-name="Username" placeholder="RoseP_Fuente" id="Username" required="">
                  <label for="email" class="form-label">Password</label>
                    <input type="password" value="<?php echo($password) ?>" name="password" class="text-field-settings spe-char w-input" maxlength="256"  data-name="Password" placeholder="***" id="Password" required="">
                <div class="estab-accnt-ttle mb-1 mt-3">Establishment Information</div>
                  <label for="Name" class="form-label">Name</label>
                    <input type="text" value="<?php echo($estab_name) ?>"  name="establishmentName" class="text-field-settings spe-char w-input" maxlength="256" name="Name" data-name="Name" placeholder="Rose Pharmacy - Fuente" id="Name" required="">
                  <!-- <label for="Category" class="form-label">Category</label> -->
                    <!-- <input type="text" name="" class="text-field-settings spe-char w-input" maxlength="256" name="Category" data-name="Category" placeholder="Pharmacy" id="Category" required=""> -->
                  <label for="Username-2" class="form-label">Description</label>
                  <p class="paragraph accnt-p">The information can be ex. amenities, service offered, etc.</p>
                    <input type="text" value="<?php echo($description) ?>" name="description"class="text-field-settings spe-char description-field w-input" maxlength="256" data-name="Description" placeholder="We offer check up" id="Description" required="">
                    <label for="Address" class="form-label">Address</label>
                    <input type="text" value="<?php echo($address) ?>" name="address" class="text-field-settings spe-char w-input" maxlength="256"  data-name="Address" placeholder="Dionisio St, Brgy. Zapatera, Cebu City, Cebu, 6000" id="Address" required="">
                    <label for="Contact-Number"  class="form-label">Contact Number</label>
                    <input type="number" value="<?php echo($contact) ?>" name="contact" class="text-field-settings spe-char w-input" maxlength="256"  data-name="Contact Number" placeholder="09123456789" id="Contact-Number" required="">
                    <label for="Email-Address" class="form-label">Email Address</label>
                    <input type="email" value="<?php echo($estab_email) ?>" name="email-establish" class="text-field-settings spe-char w-input" maxlength="256"  data-name="Email Address" placeholder="rosep_fuente@gmail.com" id="Email-Address" required="">
                    <label for="Username-2" class="form-label">Featured Image</label>
                    <p class="paragraph accnt-p">Image to be uploaded will set as featured photo of the establishment.</p>
                <div class="text-field-2">
                  <div class="w-embed"><input type="file" name="estab-featured-img" multiple=""></div>
                </div><label for="Username-2" class="form-label">Business Permit</label>
                <p class="paragraph accnt-p">Must upload 2 permits for verification.</p>
                <div class="text-field-2">
                  <div class="w-embed"><input type="file" name="estab-featured-img" multiple=""></div>
                </div>
                <div class="estab-accnt-ttle mb-1 mt-3">Establishment Owner</div>
                  <label for="First-Name" class="form-label">First Name</label>
                  <input type="text" value="<?php echo($fname) ?>" name="fname" class="text-field-settings spe-char w-input" maxlength="256"  data-name="First Name" placeholder="First Name" id="First-Name" required="">
                  <label for="Middle-Name" class="form-label">Middle Name <span class="text-span">(Optional)</span></label>
                  <input type="text" value="<?php echo($middle) ?>" name="middle" class="text-field-settings spe-char w-input" maxlength="256"  data-name="Middle Name" placeholder="Middle Name" id="Middle-Name" required="">
                  <label for="Last-Name" class="form-label">Last Name</label>
                  <input type="text" value ="<?php echo($lname) ?>" name="lname" class="text-field-settings spe-char w-input" maxlength="256"  data-name="Last Name" placeholder="Last Name" id="Last-Name" required="">
                <div class="content-center">
                  <input type="submit" name="approve"  value="Update Business Information" data-wait="Please wait..." class="primary-button setting-btn w-button"></div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6216511dceccf8d3bc0c62f3" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- <script src="js/diskobre.js" type="text/javascript"></script> -->
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>