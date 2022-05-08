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
  <link href="css/diskobre-owner.webflow.css" rel="stylesheet" type="text/css">
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

  if($_FILES["business_permit-img1"]["error"] == 0) {
    permit_upload1();
  }
  if($_FILES["business_permit-img2"]["error"] == 0){
    permit_upload2();
  } 

  // ? consult with dan
   $updateUser = mysqli_query($link,"UPDATE user SET fname='$fname', middle='$middle', lname='$lname', username='$username' WHERE user_id='{$userId}'");
   $updateEstab = mysqli_query($link,"UPDATE establishment SET  estab_email='$email',estab_name='$establishmentName', address='$address', description='$description',contact='$contact' WHERE user_fk='{$userId}'");


  // header("location: dashboard.php");
}

if(isset($_POST['submitReceipt'])){
  upload_receipt();
}

?>

<!-- function for business permit1 upload -->
<?php 

//permit_upload1 function 
 function permit_upload1(){

  $estabId = $_GET['estab_id'];

  $target_dir = "../uploads/";
  $target_file1 = $target_dir .basename($_FILES["business_permit-img1"]["name"]);

  $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));

  $establishmentName = $_POST['establishmentName'];
  $imagename1 = $estabId.$establishmentName."businesspermit1.".$imageFileType1;
  $filename1 = $target_dir.$imagename1;

  if (move_uploaded_file($_FILES["business_permit-img1"]["tmp_name"],$filename1)) {
    $link = mysqli_connect('localhost','root','');
    mysqli_select_db($link,"diskobre");
    mysqli_query($link,"INSERT INTO `estab_image`( `estab_id_fk`, `image`, `image_type`) VALUES ('$estabId','$imagename1','4')");
    
 
  }

 }
//end of permit_upload1 function

function permit_upload2(){

  $estabId = $_GET['estab_id'];

  $target_dir = "../uploads/";
  $target_file2 = $target_dir .basename($_FILES["business_permit-img2"]["name"]);

  $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

   $establishmentName = $_POST['establishmentName'];
   $imagename2 = $estabId.$establishmentName."businesspermit2.".$imageFileType2;
   $filename2 = $target_dir.$imagename2;

  if (move_uploaded_file($_FILES["business_permit-img2"]["tmp_name"],$filename2)) {
    $link = mysqli_connect('localhost','root','');
    mysqli_select_db($link,"diskobre");
    mysqli_query($link,"INSERT INTO `estab_image`( `estab_id_fk`, `image`, `image_type`) VALUES ('$estabId','$imagename2','4')");
  }

}

function upload_receipt(){
  $estabId = $_GET['estab_id'];

  $target_dir = "../uploads/";
  $target_file2 = $target_dir .basename($_FILES["paymentReceiptImage"]["name"]);

  $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

   
   $imagename2 = $estabId."PaymentReceipt.".$imageFileType2;
   $filename2 = $target_dir.$imagename2;

  if (move_uploaded_file($_FILES["paymentReceiptImage"]["tmp_name"],$filename2)) {
    $link = mysqli_connect('localhost','root','');
    mysqli_select_db($link,"diskobre");
    //update add image receipt
    mysqli_query($link,"INSERT INTO `estab_image`( `estab_id_fk`, `image`, `image_type`) VALUES ('$estabId','$imagename2','5')");

  }

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
                <div class="actve-subs"><span class="text-span-3">Status:</span> INACTIVE</div>
              </div>
              <div class="subs-range-box">
                <div class="subscription-divider">
                  <div class="subs-box w-row">
                    <div class="subscribe-now w-col w-col-6">
                      <p class="paragraph-2" style="font-family: Arial;"><span class="text-span-4">Want to unlock the Dashboard Analytics?</span><br><br>Choose type of subscription. Just send your payment to [ <strong>Diskobre - 09205149329</strong> ] via Gcash only. After paying, kindly upload a screenshot of the receipt for proof of payment.</p>
                      <div class="subscription-type">
                        <h5 class="heading">Subscription Type: </h5>
                        <div data-hover="false" data-delay="0" class="dropdown w-dropdown">
                          <div class="dropdown-toggle w-dropdown-toggle">
                            <div class="w-icon-dropdown-toggle"></div>
                            <div>Subscription Type</div>
                          </div>
                          <nav class="w-dropdown-list">
                            <a href="#" class="w-dropdown-link">Link 1</a>
                            <a href="#" class="w-dropdown-link">Link 3</a>
                          </nav>
                        </div>
                      </div>
                      <a href="#" class="subscribe-btn w-button">Subscribe Now!</a>
                    </div>
                    <div class="upload-receipt w-col w-col-6">
                      <div class="upload-box">
                        <h4 class="upload-text">Upload Receipt</h4>
                        <img src="" alt="" id="receipt-preview">
                        <div class="buttons flex-v">
                          <a class="upload-btn upload w-button" onclick="clickPaymentReceiptUpload()" >Upload Receipt</a>
                            <form method="POST" enctype="multipart/form-data">
                              <div class="span-text"><input type="file" id="paymentReceiptImage" name="paymentReceiptImage" onchange="imagePreview(event)" style="display:none"></div>
                              <!-- <a href="#" class="upload-btn w-button">Submit</a> -->
                              <center><input type="submit" class="upload-btn w-button" value="Submit" name="submitReceipt"></center>
                            </form>
                        </div>
                      </div>
                      <br><br>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="form-block w-form">
              <!-- form -->
              <form id="email-form" name="email-form" data-name="Email Form" method="POST" enctype="multipart/form-data">
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
                  <div class="w-embed"><input type="file" name="business_permit-img1" multiple=""></div>
                </div>
                <div class="text-field-2">
                  <div class="w-embed"><input type="file" name="business_permit-img2" multiple=""></div>
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
<script>
  function clickPaymentReceiptUpload(){
    var link = document.getElementById('paymentReceiptImage');
    link.click();

  }
  function imagePreview(event){
    if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("receipt-preview");
    preview.src = src;
    preview.style.display = "block";

  }
  }
</script>
</html>