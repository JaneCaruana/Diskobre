<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Sun Mar 27 2022 17:09:56 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="621b7665d8ed4d5648df79eb" data-wf-site="62165100d93c4633055bbbac">
<head>
  <meta charset="utf-8">
  <title>User Management</title>
  <meta content="User Management" property="og:title">
  <meta content="User Management" property="twitter:title">
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

$ownerNum = mysqli_query($link, "SELECT COUNT(*) AS allEstablishOwner FROM establishment  JOIN user ON establishment.user_fk = user.user_id where user.user_type = '3';");//? CALL QUERY for all establishment
$dataOwner=mysqli_fetch_array($ownerNum);

$allDataOwner = $dataOwner['allEstablishOwner'];

// ? Number of pending contribution

$pendingContr = mysqli_query($link, "SELECT COUNT(*) AS totalPending FROM establishment  JOIN user ON establishment.user_fk = user.user_id where user.user_type = '3' AND status = 1" );//? CALL QUERY for all establishment
$getPending=mysqli_fetch_array($pendingContr);

$totalPending = $getPending['totalPending'];


// ? Number of approved contribution
$approvedContr = mysqli_query($link, "SELECT COUNT(*) AS totalApprove FROM establishment JOIN user ON establishment.user_fk = user.user_id where user.user_type = '3' AND   status = 2");//? CALL QUERY for all establishment
$getApprove=mysqli_fetch_array($approvedContr);

$totalApprv = $getApprove['totalApprove'];

// ? Number of disapproved contribution
$disapprovedContr = mysqli_query($link, "SELECT COUNT(*) AS totalDisapprove FROM establishment JOIN user ON establishment.user_fk = user.user_id where user.user_type = '3' AND   status = 3");//? CALL QUERY for all establishment
$getDisapprove=mysqli_fetch_array($disapprovedContr);

$totalDisapprove = $getDisapprove['totalDisapprove'];

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
      <a href="establishment-management.php" aria-current="page" class="nav-item w-inline-block w--current"><img src="images/mail-line_1.svg" loading="lazy" alt="">
        <div class="nav-text selected">Establishment Management</div>
      </a>
      <a href="contribution-management.php" class="nav-item w-inline-block"><img src="images/mail-line.svg" loading="lazy" alt="">
        <div class="nav-text">Contribution Management</div>
      </a>
    </div>
    <div class="right-panel">
      <div data-hover="false" data-delay="0" class="admin-info w-dropdown">
        <div class="info-drop-down w-dropdown-toggle"><img src="images/Group-416_1.svg" loading="lazy" alt="" class="drop-down-icon">
          <div class="info-text"><span class="text-ligh-dark">Hi,</span> <?php echo($_SESSION['uname'])?><span class="text-span">!</span></div>
        </div>
        <nav class="dropdown-list w-dropdown-list">
          <a href="edit-account.php?userId=<?php echo($userId)?>" class="info-drop-down-item w-dropdown-link">Edit Profile</a>
          <a href="establishment-management.php?logout=true" class="info-drop-down-item w-dropdown-link">Logout</a>
        </nav>
      </div>
      <div class="page-container">
        <h1 class="page-title">Establishment Management</h1>
        <div class="content-hbetween mb-2">
          <div class="text-field search">
            <div class="search-input-embedded w-embed"><form action="" method="get"><input type="search" name="search-user" placeholder="Search name" style="width: 100%; border: none; background: rgba(0,0,0,0); outline: none;"></form></div><img src="images/Group-416_2.svg" loading="lazy" alt="">
          </div>
        </div>
        <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100" class="w-tabs">
          <div class="w-tab-menu">
            <a data-w-tab="Tab 1" class="estab-tab w-inline-block w-tab-link w--current">
              <div class="flex-v">
                <div class="tab-title">Total</div>
                <div class="tab-num"><?php echo($allDataOwner) ?></div>
              </div>
            </a>
            <a data-w-tab="Tab 2" class="estab-tab w-inline-block w-tab-link">
              <div class="flex-v">
                <div class="tab-title">Pending</div>
                <div class="tab-num"><?php echo($totalPending) ?></div>
              </div>
            </a>
            <a data-w-tab="Tab 3" class="estab-tab w-inline-block w-tab-link">
              <div class="flex-v">
                <div class="tab-title">Approved</div>
                <div class="tab-num"><?php echo($totalApprv) ?></div>
              </div>
            </a>
            <a data-w-tab="Tab 4" class="estab-tab w-inline-block w-tab-link">
              <div class="flex-v">
                <div class="tab-title">Denied</div>
                <div class="tab-num"><?php echo($totalDisapprove) ?></div>
              </div>
            </a>
          </div>
          <div class="w-tab-content">
            <div data-w-tab="Tab 1" class="w-tab-pane w--tab-active">
              <div class="box table mb-2">
                
                <div class="w-layout-grid table-grid estab">
                  <div id="w-node-b10d97f3-596c-24ff-713c-aeffc962c17f-48df79eb" class="cell-holder">
                    <div class="col-title">ID</div>
                  </div>
                  <div id="w-node-efd62dc2-fbbc-6731-2dfc-4ba54f5015d1-48df79eb" class="cell-holder">
                    <div class="col-title">Estabishment name</div>
                  </div>
                  <div id="w-node-_0011877a-d974-5016-3339-5bc048bee5cf-48df79eb" class="cell-holder">
                    <div class="col-title">Owners name</div>
                  </div>
                  <div id="w-node-b2faf8d0-be16-6669-b539-77bc80a3f9ba-48df79eb" class="cell-holder">
                    <div class="col-title">Category</div>
                  </div>
                  <div id="w-node-_66d206a0-c34f-8ffb-6b37-a9179ac593a7-48df79eb" class="cell-holder">
                    <div class="col-title">Approve Status</div>
                  </div>
                  <div id="w-node-_2213fe03-9abc-2df6-6630-a5290ec31a6d-48df79eb" class="cell-holder">
                    <div class="col-title">Account Status</div>
                  </div>
                  <div id="w-node-_0f0b999b-7d37-2e09-d072-ac6c0b84632b-48df79eb" class="cell-holder">
                    <div class="col-title">Action</div>
                  </div>
                </div>
                <?php
                    if($link){ // READ FUNCTION
                      $userRoleUser = 2;
                        if(isset($_GET['search-user'])) {
                          $searchedUser = $_GET['search-user'];
                          
                          mysqli_select_db($link, "diskobre");
                          $userSearch = mysqli_query($link, "SELECT * from establishment JOIN user ON establishment.user_fk = user.user_id where estab_name LIKE '%{$searchedUser}%' AND user.user_type = '3';");
                          if(mysqli_num_rows($userSearch) > 0){
                            while($s = mysqli_fetch_array($userSearch)){
                              if($s['status'] == 1) {
                                $status = "pending";
                              }
                              else if($s['status'] == 2) {
                                $status = "approved";
                              }
                              else if($s['status'] == 3) {
                                $status = "denied";
                              }
                              $fCategory =$s['category_id'];
                              $category = mysqli_query($link, "SELECT estcat from category where category_id='{$fCategory}'");
                              if(mysqli_num_rows($category) > 0){
                                while($cat = mysqli_fetch_array($category)) {

                                    $foundC = $cat['estcat'];

                                }}

                              ?>
                              <div class="w-layout-grid table-grid row estab">
                                <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb32-48df79eb" class="cell-holder">
                                  <div class="cell-data"><?php echo($s['establishment_id']);?></div>
                                </div>
                                <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb35-48df79eb" class="cell-holder">
                                  <div class="cell-data"><?php echo($s['estab_name']);?></div>
                                </div>
                                <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb38-48df79eb" class="cell-holder">
                                  <div class="cell-data"><?php echo $s['fname'] . " " . $s['middle'] ." " . $s['lname'] ?></div>
                                </div>
                                <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb3b-48df79eb" class="cell-holder">
                                  <div class="email-cont">
                                    <div class="cell-data">
                                      <div class="cell-data"><?php echo($foundC); ?></div>
                                    </div>
                                  </div>
                                </div>
                                <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb3e-48df79eb" class="cell-holder">
                                  <div class="cell-data"><?php echo $status; ?></div>
                                </div>
                                <div id="w-node-_52b6058c-9090-5212-60aa-9c6e596c737a-48df79eb" class="cell-holder">
                                  <div class="cell-data"><?php if($status == "denied" || $status == "pending") {echo("inactive");} else {echo("active");} ?></div>
                                </div>
                                <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb41-48df79eb" class="cell-holder">
                                    <a href="view-establishment.php?estab_id=<?php echo $s['establishment_id'];?>&type=estab&status=<?php echo($status);?>"><img id="view-<?php echo($s['establishment_id']) ?>" loading="lazy" src="images/Group-418.svg" alt="" class="action-icon view-btn"></a>
                                    <img onclick="" loading="lazy" src="images/Group-416_3.svg" alt="" class="action-icon deny-btn" id="deny-<?= $s['establishment_id'];?>">
                                 </div>
                              </div>
                   <?php  }
                        }
                      } 
                        else if(!isset($_GET['search-user']))  {

                          $user = mysqli_query($link, "SELECT * from establishment JOIN user ON establishment.user_fk = user.user_id where user.user_type = '3';");
                          if(mysqli_num_rows($user) > 0){
                              while($s = mysqli_fetch_array($user)){

                                  if($s['status'] == 1) {
                                    $status = "pending";
                                  }
                                  else if($s['status'] == 2) {
                                    $status = "approved";
                                  }
                                  else if($s['status'] == 3) {
                                    $status = "denied";
                                  }
                                  $fCategory =$s['category_id'];
                               
                                  $category = mysqli_query($link, "select estcat from category where category_id='{$fCategory}'");
                                  if(mysqli_num_rows($category) > 0){
                                    while($cat = mysqli_fetch_array($category)) {
    
                                        $foundC = $cat['estcat'];
    
                                    }}

                                  ?>
                                <div class="w-layout-grid table-grid row estab">
                                  <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb32-48df79eb" class="cell-holder">
                                    <div class="cell-data"><?php echo($s['establishment_id']);?></div>
                                  </div>
                                  <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb35-48df79eb" class="cell-holder">
                                    <div class="cell-data"><?php echo($s['estab_name']);?></div>
                                  </div>
                                  <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb38-48df79eb" class="cell-holder">
                                    <div class="cell-data"><?php echo $s['fname'] . " " . $s['middle'] ." " . $s['lname'] ?></div>
                                  </div>
                                  <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb3b-48df79eb" class="cell-holder">
                                    <div class="email-cont">
                                      <div class="cell-data">
                                        <div class="cell-data"><?php echo($foundC); ?></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb3e-48df79eb" class="cell-holder">
                                    <div class="cell-data"><?php echo $status; ?></div>
                                  </div>
                                  <div id="w-node-_52b6058c-9090-5212-60aa-9c6e596c737a-48df79eb" class="cell-holder">
                                    <div class="cell-data"><div class="cell-data"><?php if($status == "denied" || $status == "pending") {echo("inactive");} else {echo("active");} ?></div></div>
                                  </div>
                                  <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb41-48df79eb" class="cell-holder">
                                    <a href="view-establishment.php?estab_id=<?php echo $s['establishment_id'];?>&type=estab&status=<?php echo($status);?>"><img id="view-<?php echo($s['establishment_id']) ?>" loading="lazy" src="images/Group-418.svg" alt="" class="action-icon view-btn"></a>
                                    <img onclick="" loading="lazy" src="images/Group-416_3.svg" alt="" class="action-icon deny-btn" id="deny-<?= $s['establishment_id'];?>">
                                  </div>
                                </div> <?php 
                                    
                              }

                        }
               
                      }else echo "NO USERS YET!";
                      
                    }
                ?>
              </div>
            </div>
            <div data-w-tab="Tab 2" class="w-tab-pane">
              <div class="box table mb-2">

                <div class="w-layout-grid table-grid estab">
                  <div id="w-node-_6ac075bc-e5ad-f8c8-2965-f79a3da21c12-48df79eb" class="cell-holder">
                    <div class="col-title">ID</div>
                  </div>
                  <div id="w-node-_6ac075bc-e5ad-f8c8-2965-f79a3da21c15-48df79eb" class="cell-holder">
                    <div class="col-title">Estabishment name</div>
                  </div>
                  <div id="w-node-_6ac075bc-e5ad-f8c8-2965-f79a3da21c18-48df79eb" class="cell-holder">
                    <div class="col-title">Owners name</div>
                  </div>
                  <div id="w-node-_6ac075bc-e5ad-f8c8-2965-f79a3da21c1b-48df79eb" class="cell-holder">
                    <div class="col-title">Category</div>
                  </div>
                  <div id="w-node-_6ac075bc-e5ad-f8c8-2965-f79a3da21c1e-48df79eb" class="cell-holder">
                    <div class="col-title">Approve Status</div>
                  </div>
                  <div id="w-node-_6ac075bc-e5ad-f8c8-2965-f79a3da21c21-48df79eb" class="cell-holder">
                    <div class="col-title">Account Status</div>
                  </div>
                  <div id="w-node-_6ac075bc-e5ad-f8c8-2965-f79a3da21c24-48df79eb" class="cell-holder">
                    <div class="col-title">Action</div>
                  </div>
                </div>
               <?php mysqli_select_db($link, "diskobre");
                          $statusNum = 1;
                          $user = mysqli_query($link, "SELECT * from establishment JOIN user ON establishment.user_fk = user.user_id where user.user_type = '3' AND status='{$statusNum}'");
                          if(mysqli_num_rows($user) > 0){
                              while($s = mysqli_fetch_array($user)){
                                if($s['status'] == 1) {
                                  $status = "pending";
                                }
                                else if($s['status'] == 2) {
                                  $status = "approved";
                                }
                                else if($s['status'] == 3) {
                                  $status = "denied";
                                }

                                $fCategory =$s['category_id'];
                               
                                $category = mysqli_query($link, "SELECT estcat from category where category_id='{$fCategory}'");
                                if(mysqli_num_rows($category) > 0){
                                  while($cat = mysqli_fetch_array($category)) {
  
                                      $foundC = $cat['estcat'];
  
                                  }}
                                ?>
                                <div class="w-layout-grid table-grid row estab">
                                  <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb32-48df79eb" class="cell-holder">
                                    <div class="cell-data"><?php echo($s['establishment_id']);?></div>
                                  </div>
                                  <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb35-48df79eb" class="cell-holder">
                                    <div class="cell-data"><?php echo($s['estab_name']);?></div>
                                  </div>
                                  <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb38-48df79eb" class="cell-holder">
                                    <div class="cell-data"><?php echo $s['fname'] . " " . $s['middle'] ." " . $s['lname'] ?></div>
                                  </div>
                                  <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb3b-48df79eb" class="cell-holder">
                                    <div class="email-cont">
                                      <div class="cell-data">
                                        <div class="cell-data"><?php echo($foundC); ?></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb3e-48df79eb" class="cell-holder">
                                    <div class="cell-data"><?php echo $status; ?></div>
                                  </div>
                                  <div id="w-node-_52b6058c-9090-5212-60aa-9c6e596c737a-48df79eb" class="cell-holder">
                                    <div class="cell-data"><div class="cell-data"><?php if($status == "denied" || $status == "pending") {echo("inactive");} else {echo("active");} ?></div></div>
                                  </div>
                                  <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb41-48df79eb" class="cell-holder">
                                    <a href="view-establishment.php?estab_id=<?php echo $s['establishment_id'];?>&type=estab&status=<?php echo($status);?>"><img id="view-<?php echo($s['establishment_id']) ?>" loading="lazy" src="images/Group-418.svg" alt="" class="action-icon view-btn"></a>
                                    <img onclick="" loading="lazy" src="images/Group-416_3.svg" alt="" class="action-icon deny-btn" id="deny-<?= $s['establishment_id'];?>">
                                 </div>
                                </div>
                              <?php

                              }

                        }
                  ?>
                <div class="content-right">
                  <!-- <div class="content-vcenter">
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
                  </div> -->
                </div>
              </div>
            </div>
                   
            <div data-w-tab="Tab 3" class="w-tab-pane">
              <div class="box table mb-2">
                <div class="w-layout-grid table-grid estab">
                  <div id="w-node-_08261c49-6498-4731-019b-05e69a39e50b-48df79eb" class="cell-holder">
                    <div class="col-title">ID</div>
                  </div>
                  <div id="w-node-_08261c49-6498-4731-019b-05e69a39e50e-48df79eb" class="cell-holder">
                    <div class="col-title">Estabishment name</div>
                  </div>
                  <div id="w-node-_08261c49-6498-4731-019b-05e69a39e511-48df79eb" class="cell-holder">
                    <div class="col-title">Owners name</div>
                  </div>
                  <div id="w-node-_08261c49-6498-4731-019b-05e69a39e514-48df79eb" class="cell-holder">
                    <div class="col-title">Category</div>
                  </div>
                  <div id="w-node-_08261c49-6498-4731-019b-05e69a39e517-48df79eb" class="cell-holder">
                    <div class="col-title">Approve Status</div>
                  </div>
                  <div id="w-node-_08261c49-6498-4731-019b-05e69a39e51a-48df79eb" class="cell-holder">
                    <div class="col-title">Account Status</div>
                  </div>
                  <div id="w-node-_08261c49-6498-4731-019b-05e69a39e51d-48df79eb" class="cell-holder">
                    <div class="col-title">Action</div>
                  </div>
                </div>
               <?php mysqli_select_db($link, "diskobre");
                  $statusNum = 2;
                  $user = mysqli_query($link, "SELECT * from establishment JOIN user ON establishment.user_fk = user.user_id where user.user_type = '3' AND status='{$statusNum}'");
                  if(mysqli_num_rows($user) > 0){
                      while($s = mysqli_fetch_array($user)){
                        if($s['status'] == 1) {
                          $status = "pending";
                        }
                        else if($s['status'] == 2) {
                          $status = "approved";
                        }
                        else if($s['status'] == 3) {
                          $status = "denied";
                        }
                        $fCategory =$s['category_id'];
                               
                        $category = mysqli_query($link, "select estcat from category where category_id='{$fCategory}'");
                        if(mysqli_num_rows($category) > 0){
                          while($cat = mysqli_fetch_array($category)) {

                              $foundC = $cat['estcat'];

                          }}
                        ?>
                        <div class="w-layout-grid table-grid row estab">
                          <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb32-48df79eb" class="cell-holder">
                            <div class="cell-data"><?php echo($s['establishment_id']);?></div>
                          </div>
                          <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb35-48df79eb" class="cell-holder">
                            <div class="cell-data"><?php echo($s['estab_name']);?></div>
                          </div>
                          <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb38-48df79eb" class="cell-holder">
                            <div class="cell-data"><?php echo $s['fname'] . " " . $s['middle'] ." " . $s['lname'] ?></div>
                          </div>
                          <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb3b-48df79eb" class="cell-holder">
                            <div class="email-cont">
                              <div class="cell-data">
                                <div class="cell-data"><?php echo($foundC); ?></div>
                              </div>
                            </div>
                          </div>
                          <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb3e-48df79eb" class="cell-holder">
                            <div class="cell-data"><?php echo $status; ?></div>
                          </div>
                          <div id="w-node-_52b6058c-9090-5212-60aa-9c6e596c737a-48df79eb" class="cell-holder">
                            <div class="cell-data"><div class="cell-data"><?php if($status == "denied" || $status == "pending") {echo("inactive");} else {echo("active");} ?></div></div>
                          </div>
                          <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb41-48df79eb" class="cell-holder">
                            <a href="view-establishment.php?estab_id=<?php echo $s['establishment_id'];?>&type=estab&status=<?php echo($status) ?>"><img id="view-<?php echo($s['establishment_id']) ?>" loading="lazy" src="images/Group-418.svg" alt="" class="action-icon view-btn"></a>
                            <img onclick="" loading="lazy" src="images/Group-416_3.svg" alt="" class="action-icon deny-btn" id="deny-<?= $s['establishment_id'];?>">
                          </div>
                        </div>
                      <?php

                      }

                }
              ?>
               
              </div>
              <div class="content-right">
                <!-- <div class="content-vcenter">
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
                </div> -->
              </div>
            </div>
            <div data-w-tab="Tab 4" class="w-tab-pane">
              <div class="box table mb-2">
                <div class="w-layout-grid table-grid estab">
                  <div id="w-node-_67749c21-89e3-dadb-4c98-f6f70b9edc6e-48df79eb" class="cell-holder">
                    <div class="col-title">ID</div>
                  </div>
                  <div id="w-node-_67749c21-89e3-dadb-4c98-f6f70b9edc71-48df79eb" class="cell-holder">
                    <div class="col-title">Estabishment name</div>
                  </div>
                  <div id="w-node-_67749c21-89e3-dadb-4c98-f6f70b9edc74-48df79eb" class="cell-holder">
                    <div class="col-title">Owners name</div>
                  </div>
                  <div id="w-node-_67749c21-89e3-dadb-4c98-f6f70b9edc77-48df79eb" class="cell-holder">
                    <div class="col-title">Category</div>
                  </div>
                  <div id="w-node-_67749c21-89e3-dadb-4c98-f6f70b9edc7a-48df79eb" class="cell-holder">
                    <div class="col-title">Approve Status</div>
                  </div>
                  <div id="w-node-_67749c21-89e3-dadb-4c98-f6f70b9edc7d-48df79eb" class="cell-holder">
                    <div class="col-title">Account Status</div>
                  </div>
                  <div id="w-node-_67749c21-89e3-dadb-4c98-f6f70b9edc80-48df79eb" class="cell-holder">
                    <div class="col-title">Action</div>
                  </div>
                </div>
               <?php mysqli_select_db($link, "diskobre");
                  $statusNum = 3;
                  $user = mysqli_query($link, "SELECT * from establishment JOIN user ON establishment.user_fk = user.user_id where user.user_type = '3' AND status='{$statusNum}'");
                  if(mysqli_num_rows($user) > 0){
                      while($s = mysqli_fetch_array($user)){
                        if($s['status'] == 1) {
                          $status = "pending";
                        }
                        else if($s['status'] == 2) {
                          $status = "approved";
                        }
                        else if($s['status'] == 3) {
                          $status = "denied";
                        }
                        $fCategory =$s['category_id'];
                               
                        $category = mysqli_query($link, "SELECT estcat from category where category_id='{$fCategory}'");
                        if(mysqli_num_rows($category) > 0){
                          while($cat = mysqli_fetch_array($category)) {

                              $foundC = $cat['estcat'];

                          }}
                        ?>
                        <div class="w-layout-grid table-grid row estab">
                          <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb32-48df79eb" class="cell-holder">
                            <div class="cell-data"><?php echo($s['establishment_id']);?></div>
                          </div>
                          <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb35-48df79eb" class="cell-holder">
                            <div class="cell-data"><?php echo($s['estab_name']);?></div>
                          </div>
                          <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb38-48df79eb" class="cell-holder">
                            <div class="cell-data"><?php echo $s['fname'] . " " . $s['middle'] ." " . $s['lname'] ?></div>
                          </div>
                          <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb3b-48df79eb" class="cell-holder">
                            <div class="email-cont">
                              <div class="cell-data">
                                <div class="cell-data"><?php echo($foundC); ?></div>
                              </div>
                            </div>
                          </div>
                          <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb3e-48df79eb" class="cell-holder">
                            <div class="cell-data"><?php echo $status; ?></div>
                          </div>
                          <div id="w-node-_52b6058c-9090-5212-60aa-9c6e596c737a-48df79eb" class="cell-holder">
                            <div class="cell-data"><div class="cell-data"><?php if($status == "denied" || $status == "pending") {echo("inactive");} else {echo("active");} ?></div></div>
                          </div>
                          <div id="w-node-_07237bdd-3fc1-a28d-53fb-d1319bdafb41-48df79eb" class="cell-holder">
                            <a href="view-establishment.php?estab_id=<?php echo $s['establishment_id'];?>&type=estab&status=<?php echo($status)?>"><img id="view-<?php echo($s['establishment_id']) ?>" loading="lazy" src="images/Group-418.svg" alt="" class="action-icon view-btn"></a>
                            <img onclick="" loading="lazy" src="images/Group-416_3.svg" alt="" class="action-icon deny-btn" id="deny-<?= $s['establishment_id'];?>">
                          </div>
                        </div>
                      <?php

                      }

                  }
                ?>
               
              <div class="content-right">
                <!-- <div class="content-vcenter">
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
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <div id="deny-modal" class="modal deny">
    <div class="modal-overlay"></div>
    <div class="modal-box confirmation"><img src="images/x.svg" loading="lazy" alt="" class="close-icon">
      <div class="h-divider mt-1-5 mb-1"></div>
      <div class="confirmation-content">
        <p class="confirmation-text">Are you sure you want to Delete the Establishment Details?</p>
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
  <div id="estab-dissaprove-modal" class="modal estab-dissaprove">
    <div class="modal-overlay"></div>
    <div class="modal-box confirmation"><img src="images/x.svg" loading="lazy" alt="" class="close-icon">
      <div class="h-divider mt-1-5 mb-1"></div>
      <p class="confirmation-text estab">Application for verification has been disapproved</p><img src="images/check-circle.svg" loading="lazy" alt="" class="estab-modal-img">
      <div class="primary-button confirmation">
        <div class="primary-btn-text">Go back</div>
      </div>
    </div>
  </div>
  <div id="estab-approve-modal" class="modal estab-approve">
    <div class="modal-overlay"></div>
    <div class="modal-box confirmation"><img src="images/x.svg" loading="lazy" alt="" class="close-icon">
      <div class="h-divider mt-1-5 mb-1"></div>
      <p class="confirmation-text estab">Application for verification has been approved</p><img src="images/check-circle-1.svg" loading="lazy" alt="" class="estab-modal-img">
      <div class="primary-button confirmation">
        <div class="primary-btn-text">Go back</div>
      </div>
    </div>
  </div> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62165100d93c4633055bbbac" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/diskobre.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
<script>
  $(document).ready(function(){
    $('.deny-btn').click(function(){
      console.log(this.id);

      var string = this.id;
      var parts = string.split("-");
      var button_name = parts[0]; // Deny Button Name
      var establishment_id_value = parts[1]; // Establishment ID

      $.ajax({
            type: "POST",
            url: 'delete-establishment.php',
            data: {
              establishment_id: establishment_id_value
            },
            success: function(response) {
              
              location.reload();
            }
      });

    })
  });

 
</script>
</html>