<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Sun Mar 27 2022 17:09:54 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="62399d5e2dc7b7e9c78fbb68" data-wf-site="6216511dceccf8d3bc0c62f3">
<head>
  <meta charset="utf-8">
  <title>Messages</title>
  <meta content="Messages" property="og:title">
  <meta content="Messages" property="twitter:title">
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



?>
<body>
  <div class="body-wrapper">
    <div class="left-panel"><img src="images/Group-349.svg" loading="lazy" alt="" class="admin-logo-login mx-1">
      <a href="dashboard.php" class="nav-item w-inline-block"><img src="images/Group.png" loading="lazy" alt="">
        <div class="nav-text">Overview</div>
      </a>
      <a href="messages.php" aria-current="page" class="nav-item selected-nav w-inline-block w--current"><img src="images/Group_1.png" loading="lazy" alt="">
        <div class="nav-text selected">Messages</div>
      </a>
      <a href="settings.php?estab_id=<?php echo($estabId) ?>" class="nav-item w-inline-block"><img src="images/user-settings-line.svg" loading="lazy" alt="">
        <div class="nav-text">Settings</div>
      </a>
    </div>
    <div class="right-panel">
      <div data-hover="false" data-delay="0" class="admin-info w-dropdown">
        <div class="info-drop-down w-dropdown-toggle"><img src="images/unsplash_X6Uj51n5CE8.png" loading="lazy" alt="" class="drop-down-icon">
          <div class="info-text"><span><?php echo($uname)?></span></div>
        </div>
        <nav class="dropdown-list w-dropdown-list">
          <a href="#" class="info-drop-down-item w-dropdown-link">Logout</a>
        </nav>
      </div>
      <div class="page-container">
        <h1 class="page-title">Messages</h1>
      </div>
      <div class="message-container">
        <div class="block-weighted h100per">
          <div class="weight-30 m-right max-h100 flex-v">
            <div class="text-field search">
              <div class="search-input-embeded w-embed"><input type="search" name="search-user" placeholder="Search name" style="width: 100%; border: none; background: rgba(0,0,0,0); outline: none;"></div><img src="images/Group-416_1.svg" loading="lazy" alt="">
            </div>
            <div class="of-auto flex-v">
              <a href="#" class="w-inline-block">
                <div class="box inbox"><img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" loading="lazy" id="w-node-d6317bce-6f88-e53a-11c6-8fc69b3644f0-c78fbb68" alt="" class="pp-mssgs">
                  <div id="w-node-_689fee75-fb56-d6bb-e0f3-b3f5e56f62ba-c78fbb68">
                    <h2 id="w-node-_9f7edad6-5f87-296a-327b-15ed6fb7326a-c78fbb68" class="total-heading pp-heading unread-mssgs">James Gouse</h2>
                    <h3 id="w-node-_9f7edad6-5f87-296a-327b-15ed6fb7326d-c78fbb68" class="h3-mssg unread-mssg">Lorem ipsum....</h3>
                  </div>
                  <div id="w-node-c5e3194c-fa99-b50d-c51d-009e2e507b9e-c78fbb68" class="message-time unread">9:45 PM</div>
                </div>
              </a>
              <a href="#" class="w-inline-block">
                <div class="box inbox"><img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" loading="lazy" id="w-node-bc713acb-569c-8f50-a67a-e9b2884c82cc-c78fbb68" alt="" class="pp-mssgs">
                  <div id="w-node-bc713acb-569c-8f50-a67a-e9b2884c82cd-c78fbb68">
                    <h2 id="w-node-bc713acb-569c-8f50-a67a-e9b2884c82ce-c78fbb68" class="total-heading pp-heading">James Gouse</h2>
                    <h3 id="w-node-bc713acb-569c-8f50-a67a-e9b2884c82d0-c78fbb68" class="h3-mssg">Lorem ipsum....</h3>
                  </div>
                  <div id="w-node-bc713acb-569c-8f50-a67a-e9b2884c82d2-c78fbb68" class="message-time unread">9:45 PM</div>
                </div>
              </a>
              <a href="#" class="w-inline-block">
                <div class="box inbox"><img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" loading="lazy" id="w-node-fa869f28-7334-19b7-2d45-09803f339c0f-c78fbb68" alt="" class="pp-mssgs">
                  <div id="w-node-fa869f28-7334-19b7-2d45-09803f339c10-c78fbb68">
                    <h2 id="w-node-fa869f28-7334-19b7-2d45-09803f339c11-c78fbb68" class="total-heading pp-heading">James Gouse</h2>
                    <h3 id="w-node-fa869f28-7334-19b7-2d45-09803f339c13-c78fbb68" class="h3-mssg">Lorem ipsum....</h3>
                  </div>
                  <div id="w-node-fa869f28-7334-19b7-2d45-09803f339c15-c78fbb68" class="message-time unread">9:45 PM</div>
                </div>
              </a>
              <a href="#" class="w-inline-block">
                <div class="box inbox"><img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" loading="lazy" id="w-node-a6eb8672-9da8-6681-774a-08c7fa678e7e-c78fbb68" alt="" class="pp-mssgs">
                  <div id="w-node-a6eb8672-9da8-6681-774a-08c7fa678e7f-c78fbb68">
                    <h2 id="w-node-a6eb8672-9da8-6681-774a-08c7fa678e80-c78fbb68" class="total-heading pp-heading">James Gouse</h2>
                    <h3 id="w-node-a6eb8672-9da8-6681-774a-08c7fa678e82-c78fbb68" class="h3-mssg">Lorem ipsum....</h3>
                  </div>
                  <div id="w-node-a6eb8672-9da8-6681-774a-08c7fa678e84-c78fbb68" class="message-time unread">9:45 PM</div>
                </div>
              </a>
              <a href="#" class="w-inline-block">
                <div class="box inbox"><img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" loading="lazy" id="w-node-e1be86e0-d0d2-aa8b-1749-d2ddb819c7d8-c78fbb68" alt="" class="pp-mssgs">
                  <div id="w-node-e1be86e0-d0d2-aa8b-1749-d2ddb819c7d9-c78fbb68">
                    <h2 id="w-node-e1be86e0-d0d2-aa8b-1749-d2ddb819c7da-c78fbb68" class="total-heading pp-heading">James Gouse</h2>
                    <h3 id="w-node-e1be86e0-d0d2-aa8b-1749-d2ddb819c7dc-c78fbb68" class="h3-mssg">Lorem ipsum....</h3>
                  </div>
                  <div id="w-node-e1be86e0-d0d2-aa8b-1749-d2ddb819c7de-c78fbb68" class="message-time unread">9:45 PM</div>
                </div>
              </a>
              <a href="#" class="w-inline-block">
                <div class="box inbox"><img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" loading="lazy" id="w-node-ebb16eab-4aef-c264-cbd9-e02c9dcde33d-c78fbb68" alt="" class="pp-mssgs">
                  <div id="w-node-ebb16eab-4aef-c264-cbd9-e02c9dcde33e-c78fbb68">
                    <h2 id="w-node-ebb16eab-4aef-c264-cbd9-e02c9dcde33f-c78fbb68" class="total-heading pp-heading">James Gouse</h2>
                    <h3 id="w-node-ebb16eab-4aef-c264-cbd9-e02c9dcde341-c78fbb68" class="h3-mssg">Lorem ipsum....</h3>
                  </div>
                  <div id="w-node-ebb16eab-4aef-c264-cbd9-e02c9dcde343-c78fbb68" class="message-time unread">9:45 PM</div>
                </div>
              </a>
            </div>
          </div>
          <div class="weight-70 flex-v">
            <div class="convo-header"><img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" loading="lazy" alt="" class="pp-mssgs convo-pp">
              <h2 class="convo-name">James Gouse</h2>
            </div>
            <div class="convo-body">
              <div class="content-left">
                <div class="flex-h receiver">
                  <div><img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" loading="lazy" alt="" class="pp-convo"></div>
                  <div class="message-wrapper">
                    <div>This is some text inside of a div block.This is some text inside of a div block.This is some text inside of a div block.This is some text inside of a div block.This is some text inside of a div block.This is some text inside of a div block.This is some text inside of a div block.This is some text inside of a div block.This is some text inside of a div block.This is some text inside of a div block.</div>
                  </div>
                </div>
              </div>
              <div class="content-right">
                <div class="flex-h sender">
                  <div class="message-wrapper sender">
                    <div>This is some text inside of a div block.This is some text inside of a div block.This is some text inside of a div block.This is some text inside of a div block.</div>
                  </div><img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" loading="lazy" alt="" class="pp-convo">
                </div>
              </div>
            </div>
            <div class="convo-new">
              <div class="block-weighted p-1">
                <div class="weight-90">
                  <div class="text-box flex-h p-0-5 rad10"><img src="images/unsplash_X6Uj51n5CE8.png" loading="lazy" alt="" class="pp-mssgs convo-pp-2">
                    <div class="textarea-embedded w-embed"><textarea class="no-border h75" row="5" column="5" name="message" style="resize: none;" placeholder="Type message"></textarea></div>
                  </div>
                </div>
                <div class="weight-10 content-center"><img src="images/send-plane-line.svg" loading="lazy" alt=""></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6216511dceccf8d3bc0c62f3" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/diskobre.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>