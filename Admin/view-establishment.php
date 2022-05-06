<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Sun Mar 27 2022 17:09:56 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="621b7684a2c038d1c2adfbd5" data-wf-site="62165100d93c4633055bbbac">
<head>
  <meta charset="utf-8">
  <title>View Establishment</title>
  <meta content="View Establishment" property="og:title">
  <meta content="View Establishment" property="twitter:title">
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

date_default_timezone_set("Asia/Manila");

 $link = mysqli_connect('localhost','root','');
 mysqli_select_db($link,"diskobre");

 $estabId = $_GET['estab_id'];
//  ? View etablishment
$type = $_GET['type'];


if($type == 'estab') {
  $urlRedirect = "establishment-management.php";

}
else {
  $urlRedirect = "contribution-management.php";
}


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

// ? get user

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
    $username = $s['username'];
    
  }
}

// ? Update the form
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

  $userId = $_POST['user_fk'];
  
  // ? consult with dan
  $updateUser = mysqli_query($link,"UPDATE user SET fname='$fname', middle='$middle', lname='$lname', username='$username' WHERE user_id='{$userId}'");
  $updateEstab = mysqli_query($link,"UPDATE establishment SET  estab_email='$email',estab_name='$establishmentName', address='$address', description='$description',contact='$contact' WHERE user_fk='{$userId}'");


  header("location: view-establishment.php?estab_id=".$estabId);

}

$today = date("Y-m-d");

$todayconvert = strtotime($today);


if(isset($_POST['sub-submit'])) {
  

$Sdate = date_default_timezone_set("Asia/Bangkok");

  
$subscript =  $_POST['estab-subscription'];

if($subscript == 79) {

  $date = strtotime("+1 month", strtotime($today));
  $gotDate = date('Y-m-d ', $date);
  echo($gotDate);
  mysqli_query($link, "
    insert into subscription(user_id_fk,start_at,expire_at,status) values(
      '".$userId."',
        '".$today."', 
        '".$gotDate."',  
        'active'
        )");

  header("location: view-establishment.php?estab_id=".$estabId."&type=estab");
}
else {
  $date = strtotime("+12 month", strtotime($today));
  $gotDate = date('Y-m-d ', $date);
  echo($gotDate);
  mysqli_query($link, "
    insert into subscription(user_id_fk,start_at,expire_at,status) values(
      '".$userId."',
        '".$today."', 
        '".$gotDate."',  
        'active'
        )");

        header("location: view-establishment.php?estab_id=".$estabId."&type=estab");
}      


}

$ifActive = mysqli_query($link, "SELECT * from subscription where user_id_fk='{$userId}'");


if(mysqli_num_rows($ifActive) > 0){
  while($s = mysqli_fetch_array($ifActive)){
    $start_at  = $s['start_at'];
    $expire_at =  $s['expire_at'];
    $status = $s['status'];
  }
}
else {
  $status = "null";
}
 
?>
<body>
  <div class="body-wrapper">
    <div class="left-panel"><img src="images/admin-logo.svg" loading="lazy" alt="" class="admin-logo-login mx-1">
      <a href="dashboard.php" class="nav-item w-inline-block"><img src="images/bar-chart-line.svg" loading="lazy" alt="">
        <div class="nav-text">Dashboard</div>
      </a>
      <a href="user-management.php" class="nav-item w-inline-block"><img src="images/mail-line.svg" loading="lazy" alt="">
        <div class="nav-text">User Management</div>
      </a>
      <a href="establishment-management.php" class="nav-item  w-inline-block"><img src="images/mail-line.svg" loading="lazy" alt="">
        <div class="nav-text">Establishment Management</div>
      </a>
      <a href="contribution-management.php" class="nav-item w-inline-block"><img src="images/mail-line.svg" loading="lazy" alt="">
        <div class="nav-text">Contribution Management</div>
      </a>
    </div>
    <div class="right-panel">
    
      <div class="page-container">

      <form method="POST">
        <h1 class="page-title">Establishment Management <span class="text-separator">&gt;</span><span class="small"> View establishment</span></h1>
        <div class="estab-wrapper">
          <div class="estab-head-content">
            <div class="content-hbetween mb-2">
              <div class="content-vcenter">
                <div class="flex-v mr-4">
                  <div class="estab-view-text">Status:</div>
                  <div class="input-status-estab w-embed">
                  <h1 style="color:green">
                    <?php
                      $qSelectSub = mysqli_query($link, "SELECT * FROM subscription WHERE user_id_fk = {$userId}");
                      if(mysqli_num_rows($qSelectSub) > 0){
                        while($subscription = mysqli_fetch_assoc($qSelectSub)){
                          $start_at = $subscription['start_at'];
                          $expire_at = $subscription['expire_at'];
                          $current_date = date("Y-m-d");
      
                          $date1 = date_create($start_at);
                          $date2 = date_create($expire_at);
                          $diff = date_diff($date1,$date2);
                          // echo $diff->format("%R%a");
                          if(number_format($diff->format("%R%a")) > 0){
                            $qUpdateSub = mysqli_query($link, "UPDATE subscription SET status = 'active' WHERE user_id_fk = {$userId}");
                            $status = 'active';
                          }else{
                            $qUpdateSub = mysqli_query($link, "UPDATE subscription SET status = 'inactive' WHERE user_id_fk = {$userId}");
                            $status = 'inactive';
                          }
                          
                        }
                        
                      }
                    ?>
                    </h1>
                    <?php 
                        echo($status);
                        if($status == 'active') { 
                         
                          $disabled = 'disabled';?>
                          <h1 style="color:green">ACTIVE</h1>
                       <?php } else { 
                          $disabled = 'enabled';
                         ?>
                        
                        <h1 style="color:red">INACTIVE</h1>
                        <?php 
                      } ?>
                    </select></div>
                </div>
                <div class="flex-v">
                  <div class="estab-view-text">Subscription type:</div>
                  <div class="input-status-estab w-embed">
                    <select name="estab-subscription" class="estab-dropdown-item subscription" <?php echo($disabled)?> >
                      <option value="79">79/monthly</option>
                      <option value="758">758/Anually</option>
                    </select>
                  </div>
                </div>
              </div>
              <div>
                <input  class="btn-1" type="submit" name= "sub-submit" style="width: 100%;
                    height: 40px;
                    border-radius: 8px;
                    background-color: #fff;
                    font-family: 'light aftika', sans-serif;
                    color: #293733;
                    line-height: 1.2;
                    font-weight: 300;
                    text-align: center;
                    border:none;
                    cursor:pointer;"  
                    <?php echo($disabled)?>
                  />
              </div>
            </div>
      </form>
            <div class="content-center">
              <div class="content-vcenter">
                <div class="content-vcenter mr-2">
                  <div class="estab-view-text mr-1">Start Date</div>
                  <div class="border-white"><?php if(isset($start_at)) echo $start_at; else echo "-"; ?></div>
                </div>
                <div class="content-vcenter">
                  <div class="estab-view-text mr-1">End Date</div>
                  <div class="border-white"><?php if(isset($expire_at)) echo $expire_at; else echo "-"; ?>
                   
                  <?php 
                    // if(isset($_POST['sub-submit'])) {
                    //   echo date("Y-m-d", $date);
                    // }
                    // else {
                    //   echo("-");
                    // }?></div>

                    
          
                </div>
              </div>
            </div>
          </div>
          <div class="estab-body-view">
            <div class="w-form">
              <form id="wf-form-establishment-form" name="wf-form-establishment-form" data-name="establishment form" method="POST">
                <div class="estab-view-body">
                  <h2 class="h2-estab-view">Establishment Information</h2>
                  <p class="estab-view-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis interdum vestibulum aliquet odio vel nisi, laoreet vel lectus. Nibh proin nisl bibendum porttitor.</p>
                  <div class="h-divider mb-1"></div>
                  <h3 class="h3-estab-view">Establishment Account</h3>
                  <p class="estab-view-paragraph">This is the credentials to be used in logging in to your account.</p><label for="username" class="h4-estab-view">Username</label>
                    <input disabled type="text" class="text-field estab-view mb-4 w-input" value="<?php echo($username) ?>" maxlength="256" name="username" data-name="username" placeholder="Username" id="username" required="true">
                  <h3 class="h3-estab-view">Establishment  Information</h3>
                  <label for="establishment-name" class="h4-estab-view">Name</label>
                    <input disabled type="text" class="text-field estab-view w-input" maxlength="256" value="<?php echo($estab_name); ?>" name="establishmentName" data-name="establishment name" placeholder="Establishment Name" id="establishment-name"  required="true">
                    <!-- <label for="establishment-category" class="h4-estab-view">Catregory</label> -->
                    <!-- <select id="establishment-category" name="establishment-category" data-name="establishment category" required="" class="text-field estab-view w-select">
                      <option value="pharmacy">Pharmacy</option>
                      <option value="Third">Third choice</option>
                    </select> -->
                  <label for="establishment-category-2" class="h4-estab-view">Description</label>
                  <p class="estab-view-paragraph">The information can be ex. amenities, service offered, etc.</p>
                  <textarea disabled   placeholder="We offer check up" maxlength="5000" id="description" name="description" data-name="field" class="text-field estab-view text-area w-input"  required="true"><?php echo($description);?></textarea>
                  <label for="estab-address" class="h4-estab-view">Address</label>
                    <input disabled value= "<?php echo($address) ?>" type="text" name = "address" class="text-field estab-view w-input" maxlength="256" name="estab-address" data-name="estab address" placeholder="Dionisio St, Brgy. Zapatera, Cebu City, Cebu, 6000" id="estab-address"  required="true">
                  <label for="estab-contact" class="h4-estab-view">Contact number</label>
                    <input disabled  value= "<?php echo($contact) ?>" name = "contact" type="tel" class="text-field estab-view w-input"  name="estab-contact" data-name="estab contact" placeholder="09123456789" id="estab-contact"  required="true" maxlength="9" pattern="\d*" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
                  <label for="estab-" class="h4-estab-view" > Email</label>
                    <input disabled   value= "<?php echo($estab_email) ?>" name="email-establish"  type="email" class="text-field estab-view w-input" maxlength="256"  data-name="estab contact" placeholder="johnDoe@gmail.com" id="estab-contact" required="true">
                  
                 
                  
                  <h3 class="h3-estab-view">Establishment Owner</h3>
                  <label for="owner-fname" class="h4-estab-view">First name</label>
                    <input disabled name="fname" value="<?php echo($fname) ?>" type="text" class="text-field estab-view w-input" maxlength="256" name="owner-fname" data-name="owner fname" placeholder="First name" id="owner-fname"  required="true">
                  <label for="Owner-mname" class="h4-estab-view">Middle name <span class="special-char">(</span>Optional<span class="special-char">)</span></label>
                    <input disabled name="middle" value="<?php echo($middle) ?>" type="text" class="text-field estab-view w-input" maxlength="256" name="Owner-mname" data-name="Owner mname" placeholder="Middle name" id="Owner-mname"  required="true"><label for="Owner-lname" class="h4-estab-view">Last name</label>
                    <input disabled name="lname"  value="<?php echo($lname) ?>" type="text" class="text-field estab-view w-input" maxlength="256" name="Owner-lname" data-name="Owner lname" placeholder="Last name" id="Owner-lname"  required="true">
                </div>
                <div class="content-center">
                  <div class="content-vcenter">
                    <button type="button" class="cancel-btn w-button " id="btn-deny">Deny</button>
                    <div class="px-3"></div>
                    <input type="button" value="Approve" name="approve" class="primary-button estab-view w-button" id="btn-approve">
                  </div>
                </div>
                
                <!-- Deny Modal -->
                <div id="deny-modal" class="modal deny">
                  <div class="modal-overlay"></div>
                  <div class="modal-box confirmation">
                    <div class="h-divider mt-1-5 mb-1"></div>
                    <div class="confirmation-content">
                      <p class="confirmation-text">Are you sure you want to Deny the Establishment Details?</p>
                    </div>
                    <div class="content-hbetween">
                      <div class="light-button confirmation">
                        <div id="btn-close-modal">Cancel</div>
                      </div>
                      <div class="primary-button confirmation">
                        <button class="primary-btn-text" name="deny-estab" style="border: none; background: none;">Confirm</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Approve Modal -->
                <div id="approve-modal" class="modal approve">
                  <div class="modal-overlay"></div>
                  <div class="modal-box confirmation">
                    <div class="h-divider mt-1-5 mb-1"></div>
                    <div class="confirmation-content">
                      <p class="confirmation-text">Are you sure you want to approve the application?</p>
                    </div>
                    <div class="content-hbetween">
                      <div class="light-button confirmation">
                        <div id="btn-close-modal">Cancel</div>
                      </div>
                      <div class="primary-button confirmation">
                        <button class="primary-btn-text" name="approve-estab" style="border: none; background: none;">Confirm</button>
                      </div>
                    </div>
                  </div>
                </div>
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
      </div>
    </div>
  </div>


  <?php
    if(isset($_POST['approve-estab'])){
      $updateApproveEstab = mysqli_query($link, "UPDATE establishment SET status = '2' WHERE establishment_id = " . $estabId);
      ?>
        <!-- Infomration Modal Approve -->
        <div id="estab-approve-modal" class="modal estab-approve" style="display: flex;">
          <div class="modal-overlay"></div>
          <div class="modal-box confirmation"><img src="images/x.svg" loading="lazy" alt="" class="close-icon">
            <div class="h-divider mt-1-5 mb-1"></div>
            <p class="confirmation-text estab">Application for verification has been approved</p><img src="images/check-circle-1.svg" loading="lazy" alt="" class="estab-modal-img">
            <div class="primary-button confirmation">
              <div onclick="window.location.href='<?php echo($urlRedirect) ?>'" class="primary-btn-text">Go back</div>
            </div>
          </div>
        </div> 
      <?php
    }
    if(isset($_POST['deny-estab'])){
      $updateApproveEstab = mysqli_query($link, "UPDATE establishment SET status = '3' WHERE establishment_id = " . $estabId);
      ?>
        <!-- Infomration Modal Dissaprove -->
        <div id="estab-dissaprove-modal" class="modal estab-dissaprove" style="display: flex;">
          <div class="modal-overlay"></div>
          <div class="modal-box confirmation"><img src="images/x.svg" loading="lazy" alt="" class="close-icon">
            <div class="h-divider mt-1-5 mb-1"></div>
            <p class="confirmation-text estab">Application for verification has been disapproved</p><img src="images/check-circle.svg" loading="lazy" alt="" class="estab-modal-img">
            <div class="primary-button confirmation">
              <div onclick="window.location.href='<?php echo($urlRedirect) ?>'"  class="primary-btn-text">Go back</div>
            </div>
          </div>
        </div>
      <?php
    }
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#btn-deny').click(function(){
        $('#deny-modal').css('display','flex');
      })
      $('#btn-approve').click(function(){
        $('#approve-modal').css('display','flex');
      })
      $('#btn-close-modal, .modal-overlay').click(function(){
        $('#deny-modal').hide();
        $('#approve-modal').hide();
        $('#estab-dissaprove-modal').hide();
        $('#estab-approve-modal').hide();
      })
    })
  </script>
  <!-- <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62165100d93c4633055bbbac" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/diskobre.js" type="text/javascript"></script> -->
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>