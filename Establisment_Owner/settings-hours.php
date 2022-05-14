<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Sun Mar 27 2022 17:09:54 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="62405851e8e7ac66236ee3e5" data-wf-site="6216511dceccf8d3bc0c62f3">
<head>
  <meta charset="utf-8">
  <title>Settings-Hours</title>
  <meta content="Settings-Hours" property="og:title">
  <meta content="Settings-Hours" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="diskobre" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <link href="css/diskobre-owner.styles.css" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
  <style>
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}
/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}
/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}
.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}
input:checked + .slider {
  background-color: #2196F3;
}
input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}
input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}
.slider.round:before {
  border-radius: 50%;
}
</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<?php
$link = mysqli_connect("localhost", "root", ""); // SERVER CONNECTION
mysqli_select_db($link, "diskobre");

session_start();

if(isset($_SESSION["userId"])) {

  $uname = $_SESSION['uname'];
  $userId = $_SESSION["userId"];
  
  $userF = mysqli_query($link,"SELECT estab_name,establishment_id, category_id from establishment WHERE user_fk='$userId'");
  while ($fUser = mysqli_fetch_array($userF)) {
    $estabId = $fUser['establishment_id'];
    
  }

}


if(isset($_GET["logout"])) {
 
  session_destroy();
  
  header("location: index.php");

}

if(isset($_POST['submit'])) {
 
  $days = $_POST['day'];

  foreach($days as $eachDay) {
    if($eachDay == 'sunday') {

      
      $sun= $_POST['sun'];
      $start = date('H:i:s A', strtotime($sun[0]));
      $end = date('H:i:s A', strtotime($sun[1]));
    
      mysqli_query($link, "
    insert into operatingtime(Establishmentid_fk,Day,start,end) values(
      '".$estabId."',
        '0',  
        '".$start."',
        '".$end."')");
       
    }


     if($eachDay == 'monday') {
      $mon= $_POST['mon'];
     
      $start = date('H:i:s A', strtotime($mon[0]));
      $end = date('H:i:s A', strtotime($mon[1]));
      
      mysqli_query($link, "
      insert into operatingtime(Establishmentid_fk,Day,start,end) values(
        '".$estabId."',
          '1',  
          '".$start."',
          '".$end."')");
    }

     if($eachDay == 'tuesday') {
      $mon= $_POST['tues'];
     
      $start = date('H:i:s A', strtotime($mon[0]));
      $end = date('H:i:s A', strtotime($mon[1]));

      mysqli_query($link, "
      insert into operatingtime(Establishmentid_fk,Day,start,end) values(
        '".$estabId."',
          '2',  
          '".$start."',
          '".$end."')");
      
    }
     if($eachDay == 'wednesday') {
      $mon= $_POST['wed'];
     
      $start = date('H:i:s A', strtotime($mon[0]));
      $end = date('H:i:s A', strtotime($mon[1]));

      mysqli_query($link, "
      insert into operatingtime(Establishmentid_fk,Day,start,end) values(
        '".$estabId."',
          '3',  
          '".$start."',
          '".$end."')");
      
    }
     if($eachDay == 'thursday') {
      $mon = $_POST['thurs'];
     
      $start = date('H:i:s A', strtotime($mon[0]));
      $end = date('H:i:s A', strtotime($mon[1]));

      mysqli_query($link, "
      insert into operatingtime(Establishmentid_fk,Day,start,end) values(
        '".$estabId."',
          '4',  
          '".$start."',
          '".$end."')");
      
    }
     if($eachDay == 'friday') {
      $mon= $_POST['fri'];
     
      $start = date('H:i:s A', strtotime($mon[0]));
      $end = date('H:i:s A', strtotime($mon[1]));
      mysqli_query($link, "
      insert into operatingtime(Establishmentid_fk,Day,start,end) values(
        '".$estabId."',
          '5',  
          '".$start."',
          '".$end."')");
      
    }

     if($eachDay == 'saturday') {
      $mon= $_POST['sat'];

      $start = date('H:i:s A', strtotime($mon[0]));
      $end = date('H:i:s A', strtotime($mon[1]));
      
      mysqli_query($link, "
      insert into operatingtime(Establishmentid_fk,Day,start,end) values(
        '".$estabId."',
          '6',  
          '".$start."',
          '".$end."')");
    }

  }
}

?>
<body>
  <div class="body-wrapper">
    <div class="left-panel"><img src="images/Group-349.svg" loading="lazy" alt="" class="admin-logo-login mx-1">
      <a href="dashboard.php" class="nav-item w-inline-block"><img src="images/Group.png" loading="lazy" alt="">
        <div class="nav-text">Overview</div>
      </a>
      <!--<a href="messages.php" class="nav-item w-inline-block"><img src="images/mail-line.svg" loading="lazy" alt="">
        <div class="nav-text">Messages</div>
      </a> -->
      <a href="#" class="nav-item selected-nav w-inline-block"><img src="images/user-settings-line.svg" loading="lazy" alt="">
        <div class="nav-text selected">Settings</div>
      </a>
    </div>
    <div class="right-panel">
      <div data-hover="false" data-delay="0" class="admin-info w-dropdown">
        <div class="info-drop-down w-dropdown-toggle"><img src="images/unsplash_X6Uj51n5CE8.png" loading="lazy" alt="" class="drop-down-icon">
          <div class="info-text"><span><?php echo($uname)?></span></div>
        </div>
        <nav class="dropdown-list w-dropdown-list">
          <a href="settings-hours.php?logout=true" class="info-drop-down-item w-dropdown-link">Logout</a>
        </nav>
      </div>
      <div class="page-container">
        <h1 class="page-title">Settings</h1>
      </div>
      <div class="settings-container">
        <div class="block-weighted">
          <div class="weight-30">
            <div class="admin-seeting">Admin Settings</div>
            <a href="settings.php?estab_id=<?php echo($estabId)?>" class="adm-item w-inline-block">
              <div class="admn-text">Establishment Information</div>
            </a>
            <a href="settings-hours.php" aria-current="page" class="adm-item selected-admn-item w-inline-block w--current">
              <div class="admn-text selected-adm-text">Set Standard Hours</div>
            </a>
          </div>
          <div class="weight-70 admn-right">
            <form  method="post">
              <div class="admn-label-box">
                <div class="estab-text text-24">Set Standard Hours</div>
                <p class="paragraph ssh-text">Configure the standard hours of operation for this location</p>
              </div>
              <div class="days">
                <div id="w-node-_82337e4a-291d-4a84-4f44-0ce16f391c89-236ee3e5" class="set-hrs">
                  <div id="w-node-_64aedf8d-6eb8-1267-0886-925e79d2e7ea-236ee3e5" class="days-text">Sunday</div>
                  <div id="w-node-d7270eac-a93f-0a65-827c-dbb07dbedf69-236ee3e5" class="w-embed"><label class="switch">
                      <input id="sun" type="checkbox" name="day[]" value="sunday">
                      <span class="slider round"></span>
                    </label></div>
                  <div id="sun-time" class="spe-char content-haround align-center w-node-eba73f6c-3852-992b-6464-58d0436e7984-236ee3e5 w-embed"><input type="time" id="appt" name="sun[]"> to <input type="time" id="appt" name="sun[]"></div>
                </div>
                <div id="w-node-e700fe73-a6ff-f456-b59e-db275b64319c-236ee3e5" class="set-hrs">
                  <div id="w-node-e700fe73-a6ff-f456-b59e-db275b64319d-236ee3e5" class="days-text">Monday</div>
                  <div id="w-node-e700fe73-a6ff-f456-b59e-db275b64319f-236ee3e5" class="w-embed"><label class="switch">
                      <input id="mon" type="checkbox" name="day[]" value="monday">
                      <span class="slider round"></span>
                    </label></div>
                  <div id="mon-time" class="spe-char content-haround align-center w-node-e700fe73-a6ff-f456-b59e-db275b6431a0-236ee3e5 w-embed"><input type="time" id="appt" name="mon[]"> to <input type="time" id="appt" name="mon[]"></div>
                </div>
                <div id="w-node-e1440c45-da49-0222-7ced-162e792e750f-236ee3e5" class="set-hrs">
                  <div id="w-node-e1440c45-da49-0222-7ced-162e792e7510-236ee3e5" class="days-text">Tuesday</div>
                  <div id="w-node-e1440c45-da49-0222-7ced-162e792e7512-236ee3e5" class="w-embed"><label class="switch">
                      <input id="tue" type="checkbox" name="day[]" value="tuesday">
                      <span class="slider round"></span>
                    </label></div>
                  <div id="tue-time" class="spe-char content-haround align-center w-node-e1440c45-da49-0222-7ced-162e792e7513-236ee3e5 w-embed"><input type="time" id="appt" name="tues[]"> to <input type="time" id="appt" name="tues[]"></div>
                </div>
                <div id="w-node-_85040e43-8e2a-5687-464c-de05a800b078-236ee3e5" class="set-hrs">
                  <div id="w-node-_85040e43-8e2a-5687-464c-de05a800b079-236ee3e5" class="days-text">Wednesday</div>
                  <div id="w-node-_85040e43-8e2a-5687-464c-de05a800b07b-236ee3e5" class="w-embed"><label class="switch">
                      <input id="wed" type="checkbox" name="day[]" value="wednesday">
                      <span class="slider round"></span>
                    </label></div>
                  <div id="wed-time" class="spe-char content-haround align-center w-node-_85040e43-8e2a-5687-464c-de05a800b07c-236ee3e5 w-embed"><input type="time" id="appt" name="wed[]"> to <input type="time" id="appt" name="wed[]"></div>
                </div>
                <div id="w-node-d634561c-00a1-efb7-c29d-a9fe3d880923-236ee3e5" class="set-hrs">
                  <div id="w-node-d634561c-00a1-efb7-c29d-a9fe3d880924-236ee3e5" class="days-text">Thursday</div>
                  <div id="w-node-d634561c-00a1-efb7-c29d-a9fe3d880926-236ee3e5" class="w-embed"><label class="switch">
                      <input id="thu" type="checkbox" name="day[]" value="thursday">
                      <span class="slider round"></span>
                    </label></div>
                  <div id="thu-time" class="spe-char content-haround align-center w-node-d634561c-00a1-efb7-c29d-a9fe3d880927-236ee3e5 w-embed"><input type="time" id="appt" name="thurs[]"> to <input type="time" id="appt" name="thurs[]"></div>
                </div>
                <div id="w-node-_02a2ed65-5c97-6753-9c9e-6c512f4ab91b-236ee3e5" class="set-hrs">
                  <div id="w-node-_02a2ed65-5c97-6753-9c9e-6c512f4ab91c-236ee3e5" class="days-text">Friday</div>
                  <div id="w-node-_02a2ed65-5c97-6753-9c9e-6c512f4ab91e-236ee3e5" class="w-embed"><label class="switch">
                      <input id="fri" type="checkbox" name="day[]" value="friday">
                      <span class="slider round"></span>
                    </label></div>
                  <div id="fri-time" class="spe-char content-haround align-center w-node-_02a2ed65-5c97-6753-9c9e-6c512f4ab91f-236ee3e5 w-embed"><input type="time" id="appt" name="fri[]"> to <input type="time" id="appt" name="fri[]"></div>
                </div>
                <div id="w-node-bbe987ea-f53c-8800-fabf-a63376b8af43-236ee3e5" class="set-hrs">
                  <div id="w-node-bbe987ea-f53c-8800-fabf-a63376b8af44-236ee3e5" class="days-text">Saturday</div>
                  <div id="w-node-bbe987ea-f53c-8800-fabf-a63376b8af46-236ee3e5" class="w-embed"><label class="switch">
                      <input id="sat" type="checkbox" name="day[]" value="saturday">
                      <span class="slider round"></span>
                    </label></div>
                  <div id="sat-time" class="spe-char content-haround align-center w-node-bbe987ea-f53c-8800-fabf-a63376b8af47-236ee3e5 w-embed"><input type="time" id="appt" name="sat[]"> to <input type="time" id="appt" name="sat[]"></div>
                </div>
              </div>
            
              <div class="buttons">
                <a href="#" class="secondary-button w-button">Cancel</a>
                <input class="primary-button setting-btn w-button" type="submit" value="Save Changes"name="submit">
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6216511dceccf8d3bc0c62f3" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/diskobre.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <script>
	$(document).ready(function(){
    $('#sun').click(function(){
    	if($(this).prop("checked") == true){
        $('#sun-time').css('display','flex');
      }
      else if($(this).prop("checked") == false){
        $('#sun-time').hide();
      }
    });
    $('#tue').click(function(){
    	if($(this).prop("checked") == true){
        $('#tue-time').css('display','flex');
      }
      else if($(this).prop("checked") == false){
        $('#tue-time').hide();
      }
    });
    $('#mon').click(function(){
    	if($(this).prop("checked") == true){
        $('#mon-time').css('display','flex');
      }
      else if($(this).prop("checked") == false){
        $('#mon-time').hide();
      }
    });
    $('#wed').click(function(){
    	if($(this).prop("checked") == true){
        $('#wed-time').css('display','flex');
      }
      else if($(this).prop("checked") == false){
        $('#wed-time').hide();
      }
    });
    $('#thu').click(function(){
    	if($(this).prop("checked") == true){
        $('#thu-time').css('display','flex');
      }
      else if($(this).prop("checked") == false){
        $('#thu-time').hide();
      }
    });
    $('#fri').click(function(){
    	if($(this).prop("checked") == true){
        $('#fri-time').css('display','flex');
      }
      else if($(this).prop("checked") == false){
        $('#fri-time').hide();
      }
    });
    $('#sat').click(function(){
    	if($(this).prop("checked") == true){
        $('#sat-time').css('display','flex');
      }
      else if($(this).prop("checked") == false){
        $('#sat-time').hide();
      }
    });
  });
</script>
</body>
</html>