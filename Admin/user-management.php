<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Sun Mar 27 2022 17:09:56 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="621b7655e190fa014302a13f" data-wf-site="62165100d93c4633055bbbac">
<head>
  <meta charset="utf-8">
  <title>Establishment Management</title>
  <meta content="Establishment Management" property="og:title">
  <meta content="Establishment Management" property="twitter:title">
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

$link = mysqli_connect("localhost", "root", "");
  session_start();

  if(isset($_SESSION["uname"])) {
  
    $uname = $_SESSION["uname"];
  
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
//  ? Number of Establishment 
$link = mysqli_connect("localhost", "root", ""); // SERVER CONNECTION
mysqli_select_db($link, "diskobre");

$ownerNum = mysqli_query($link, "SELECT COUNT(*) AS allEstablishOwner FROM establishment");//? CALL QUERY for registered user
$dataOwner=mysqli_fetch_array($ownerNum);

$allDataOwner = $dataOwner['allEstablishOwner'];


if(isset($_GET['submit-edit'])) {

  echo("working");
$username = $_GET['username'];

$fname = $_GET['fname'];
$lname = $_GET['lname'];
$email = $_GET['email'];
$userId = $_GET['userId'];


  
  $updateUser = mysqli_query($link,"UPDATE user SET fname='{$fname}', lname='{$lname}', username='{$username}', email='{$email}' WHERE user_id='{$userId}'");

  header("location: user-management.php");
  

}


?>






<body>
  <div class="body-wrapper">
    <div class="left-panel"><img src="images/admin-logo.svg" loading="lazy" alt="" class="admin-logo-login mx-1">
      <a href="dashboard.php" class="nav-item w-inline-block"><img src="images/bar-chart-line.svg" loading="lazy" alt="">
        <div class="nav-text">Dashboard</div>
      </a>
      <a href="user-management.php" aria-current="page" class="nav-item w-inline-block w--current"><img src="images/mail-line_1.svg" loading="lazy" alt="">
        <div class="nav-text selected">User Management</div>
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
          <div class="info-text"><span class="text-ligh-dark">Hi,</span> <?php echo($_SESSION['uname']) ?><span class="text-span">!</span></div>
        </div>
        <nav class="dropdown-list w-dropdown-list">
          <a href="user-management.php?logout=true" class="info-drop-down-item w-dropdown-link">Logout</a>
        </nav>
      </div>
      <div class="page-container">
        <h1 class="page-title">User Management</h1>
        <div class="content-hbetween mb-2">
          <div class="text-field search">
          
            <div class="search-input-embedded w-embed">
              <form action="" method="get">
              <input type="search" name="search-user" placeholder="Search name" style="width: 100%; border: none; background: rgba(0,0,0,0); outline: none;">
              </div>
              <img src="images/Group-416_2.svg" loading="lazy" alt="">
            </form>
          </div>
        </div>
        <div class="box table mb-2">
          <div class="w-layout-grid table-grid">
            <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30f05-4302a13f" class="cell-holder">
              <div class="col-title">ID</div>
            </div>
            <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30f08-4302a13f" class="cell-holder">
              <div class="col-title">Fullname</div>
            </div>
            <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30f0b-4302a13f" class="cell-holder">
              <div class="col-title">Username</div>
            </div>
            <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30f0e-4302a13f" class="cell-holder">
              <div class="col-title">Email</div>
            </div>
           
            <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30f14-4302a13f" class="cell-holder">
              <div class="col-title">Action</div>
            </div>
          </div>
          <?php
                    if($link){ // READ FUNCTION
                      $userRoleUser = 2;
                        if(isset($_GET['search-user'])) {
                          $searchedUser = $_GET['search-user'];
                          
                          mysqli_select_db($link, "diskobre");
                          $userSearch = mysqli_query($link, "SELECT * from user where (username LIKE '%{$searchedUser}%' OR fName LIKE '%{$searchedUser}%' OR lName LIKE '%{$searchedUser}%' OR email LIKE '%{$searchedUser}%') AND user_type = '{$userRoleUser}'");
                          if(mysqli_num_rows($userSearch) > 0){
                            while($s = mysqli_fetch_array($userSearch)){
                              $userId = $s['user_id'];
                              ?>
                              <div class="w-layout-grid table-grid row">
                                    <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30f18-4302a13f" class="cell-holder">
                                      <div class="cell-data"><?php echo($s['user_id']);?></div>
                                    </div>
                                    <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30f1b-4302a13f" class="cell-holder">
                                      <div class="cell-data"><?php echo($s['fname'].' '. $s['middle']. $s['lname']); ?> </div>
                                    </div>
                                    <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30f1e-4302a13f" class="cell-holder">
                                      <div class="cell-data"><?php echo($s['username']); ?></div>
                                    </div>
                                    <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30f21-4302a13f" class="cell-holder">
                                      <div class="email-cont">
                                        <div class="cell-data"><?php echo($s['email']); ?></div>
                                      </div>
                                    </div>
                                    <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30f28-4302a13f" class="cell-holder">
                                      <a href="user-management.php?user_id=<?= $s['user_id'] ?>">
                                        <img src="images/Group-418.svg" loading="lazy" alt="" class="action-icon">
                                      </a>
                                  
                                      <img onclick="" loading="lazy" src="images/Group-416_3.svg" alt="" class="action-icon deny-btn" id="deny-<?= $s['user_id'];?>">
                                  </div>
                              </div>
                                  


          
                         <?php

                                 
                            }
                        }
                      }
                        else if(!isset($_GET['search-user']))  {
                         
                          mysqli_select_db($link, "diskobre");
                          $user = mysqli_query($link, "select * from user where user_type=2");
                          if(mysqli_num_rows($user) > 0){
                              while($s = mysqli_fetch_array($user)){ ?>
                                  <div class="w-layout-grid table-grid row">
                                        <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30f18-4302a13f" class="cell-holder">
                                          <div class="cell-data"><?php echo($s['user_id']);?></div>
                                        </div>
                                        <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30f1b-4302a13f" class="cell-holder">
                                          <div class="cell-data"><?php echo($s['fname'].' '. $s['middle']. $s['lname']); ?> </div>
                                        </div>
                                        <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30f1e-4302a13f" class="cell-holder">
                                          <div class="cell-data"><?php echo($s['username']); ?></div>
                                        </div>
                                        <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30f21-4302a13f" class="cell-holder">
                                          <div class="email-cont">
                                            <div class="cell-data"><?php echo($s['email']); ?></div>
                                          </div>
                                        </div>
                                        <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30f28-4302a13f" class="cell-holder">
                                          <a href="user-management.php?user_id=<?= $s['user_id'] ?>">
                                            <img src="images/Group-418.svg" loading="lazy" alt="" class="action-icon">
                                          </a>
                                      
                                          <img onclick="" loading="lazy" src="images/Group-416_3.svg" alt="" class="action-icon deny-btn" id="deny-<?= $s['user_id'];?>">
                                      </div>
                                  </div>
                                      
  
  
              
                             <?php }

                        } 
               
               
                       
                        }else echo "NO USERS YET!";
                      
                    }
                ?>

          
         
            <div id="w-node-_8231d618-cdfc-8713-aaa3-75cea7e30fbb-4302a13f" class="cell-holder"><img src="images/Group-418.svg" loading="lazy" alt="" class="action-icon"><img src="images/Group-417.svg" loading="lazy" alt="" class="action-icon"><img src="images/Group-416_3.svg" loading="lazy" alt="" class="action-icon"></div>
          </div>
        </div>
        
        <!-- <div class="content-right">
          <div class="content-vcenter">
            <div class="custome-date showby">
              <div class="cus-date-text showby">Show By</div><img src="images/Group-416_4.svg" loading="lazy" alt="">
            </div>
            <div class="content-vcenter"><img src="images/Group-416_5.svg" loading="lazy" alt="">
              <div class="page-user active">1</div>
              <div class="page-user">2</div>
              <div class="page-user">3</div>
              <div class="page-user">4</div>
              <div class="page-user">5</div><img src="images/Group-417_1.svg" loading="lazy" alt="">
            </div>
          </div>
        </div> -->

      </div>
    </div>
  </div>

  <?php
    if(isset( $_GET['user_id'] ) ){
      $eUser_id = $_GET['user_id'];
      $qSelect = mysqli_query($link, 
        "SELECT * FROM USER WHERE user_id = '{$eUser_id}'"
      );
      $fUser = mysqli_fetch_assoc($qSelect);
      ?>
        <!-- User modal -->
        <div id="user-edit-modal" class="modal user-edit" style="display: flex;">
          <div class="modal-overlay"></div>
          <div class="modal-box"><img id="close-modal" src="images/x.svg" loading="lazy" alt="" class="close-icon">
            <div class="modal-content">
      
              <h2 class="user-model-heading">User Profile</h2>
      
              <div class="h-divider mb-1"></div>
      
              <div class="w-form">
                <form id="wf-form-User-Edit-Form" method="get" class="user-form" action= "user-management.php">
      
                  <label for="name-2" class="mb-0-5">Profile Picture</label>
                  <!-- <div class="profile-pic-wrapper mb-0-5">
                    <img loading="lazy" src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" alt="" class="pp-img">
                  </div> -->
      
                  <label for="username">Username</label>
                  <input type="text" class="text-field w-input" value="<?= $fUser['username'] ?>" maxlength="100" name="username" placeholder="Username" id="username" required>
      
                  <label for="fname">First Name</label>
                  <input type="text" class="text-field w-input" value="<?= $fUser['fname'] ?>" maxlength="100" name="fname"placeholder="First Name" id="fname" required>
                  
                  <label for="lname">Last Name</label>
                  <input type="text" class="text-field w-input" value="<?= $fUser['lname'] ?>" maxlength="100" name="lname"  placeholder="Last Name" id="lname" required>
                  
                  <!-- <label for="name">Birthdate</label>
                  <div class="w-embed">
                    <input type="date" class="text-field" style="width: 100%;" required="">
                  </div> -->
                  
                  <label for="email">Email Address</label>
                  <input type="email" value="<?= $fUser['email'] ?>"  class="text-field w-input" maxlength="100" name="email" data-name="Email" placeholder="Email Address" id="email" required="">
                  <input type="hidden" name="userId" value="<?php echo($_GET['user_id'])?>">
                  <input type="submit" value="Update user information" class="primary-button user-submit w-button" name ="submit-edit">
                </form>
              </div>
            </div>
          </div>
        </div>

      <?php
    }
  ?>

  <div id="deny-modal" class="modal deny">
    <div class="modal-overlay"></div>
    <div class="modal-box confirmation"><img src="images/x.svg" loading="lazy" alt="" class="close-icon">
      <div class="h-divider mt-1-5 mb-1"></div>
      <div class="confirmation-content">
        <p class="confirmation-text">Are you sure you want to deny the application?</p>
      </div>
      <div class="content-hbetween">
        <div class="light-button confirmation">
          <div>Cancel</div>
        </div>
        <div class="primary-button confirmation">
          <div class="primary-btn-text">Confirm</div>
        </div>
      </div>
    </div>
  </div>

  <div id="approve-modal" class="modal approve">
    <div class="modal-overlay"></div>
    <div class="modal-box confirmation"><img src="images/x.svg" loading="lazy" alt="" class="close-icon">
      <div class="h-divider mt-1-5 mb-1"></div>
      <div class="confirmation-content">
        <p class="confirmation-text">Are you sure you want to approve the application?</p>
      </div>
      <div class="content-hbetween">
        <div class="light-button confirmation">
          <div>Cancel</div>
        </div>
        <div class="primary-button confirmation">
          <div class="primary-btn-text">Confirm</div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62165100d93c4633055bbbac" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/diskobre.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->

    <script>

    $(document).ready(function(){

        $('.deny-btn').click(function(){
          console.log(this.id);

          var string = this.id;
          var parts = string.split("-");
          var button_name = parts[0]; // Deny Button Name
          var userId = parts[1]; // Establishment ID
         
          $.ajax({
                type: "POST",
                url: 'delete-user.php',
                data: {
                  deleteUser: userId
                },
                success: function(response) {
                  
                  location.reload();
                }
          });

        })

        $('#close-modal, .modal-overlay').click(function(){
          $('#user-edit-modal').hide();
        })
      });
    </script>

  </body>
</html>