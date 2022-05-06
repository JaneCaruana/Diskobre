
<?php
$link = mysqli_connect("localhost", "root", ""); // SERVER CONNECTION
mysqli_select_db($link, "diskobre");
  
if(isset($_GET["logout"])) {
 
    session_destroy();
  
    header("location: index.php");
  
  }

  session_start();
  
   
  if(isset($_SESSION["userId"])) {

            $userId = $_SESSION["userId"];
            $uname = $_SESSION['uname'];
            $userF = mysqli_query($link,"SELECT estab_name,establishment_id, category_id from establishment WHERE user_fk='$userId'");
              while ($fUser = mysqli_fetch_array($userF)) {
                $categoryId = $fUser['category_id'];
                $estabId = $fUser['establishment_id'];
                $estabName = $fUser['estab_name'];
               
              }

          
          
        
      $fCategory = mysqli_query($link,"SELECT estcat from category WHERE category_id='$categoryId'");

      if(mysqli_num_rows($fCategory) > 0){
        while($s = mysqli_fetch_array($fCategory)){ // GET THE DATA
            $foundCategory = $s['estcat'];
          }
          
        }

      $user = mysqli_query($link,"SELECT * from user WHERE user_type='2'");  
      $age1 = 0;
      $age2 = 0;
      $age3 = 0;
      $age4 = 0;
      $age5 = 0;
      $age6 = 0;
      if(mysqli_num_rows($user) > 0){
        while($s = mysqli_fetch_array($user)){ // GET THE DATA
            $bdate = $s['bdate'];
            $age = date_diff(date_create($bdate), date_create('now'))->y;

           if($age >= 12 && $age <= 15) {
            $age1++;
           }
           else if($age >= 16 && $age <= 64) {

            $age2++;
           }
           else {
            $age3++;

          }
        
          }
        }

        $dataPoints = array(
          array("label"=> "12-15", "y"=> $age1),
          array("label"=> "16-64", "y"=> $age2),
          array("label"=> "65-older", "y"=> $age3)
        );
    
    }

    // echo $estabId;

    $qSelect = mysqli_query($link, 
    "SELECT *
    FROM visits
    WHERE establishment_id = {$estabId}
    ORDER BY datetime");
   
   $visits = array();
   $stackvis = array();
   $oldDate = null;
   $dDate = null;
   $ctr = 0;
   while($visit = mysqli_fetch_array($qSelect)){
      $dDate = date_format(date_create($visit['datetime']), "m/d/Y");
      if(isset($oldDate)){
        if($oldDate == $dDate){
          $ctr++;
        }else{
          $ctr++;
          array_push($visits, date_format(date_create($oldDate), "M d"), $ctr);
          $oldDate = $dDate;
          $ctr=0;
          array_push($stackvis, $visits);
          $visits = (array) null;
        }
      }else{
        $oldDate = $dDate;
        $ctr++;
      }
   }
   if($ctr != 0){
    if($oldDate == $dDate){
      array_push($visits, date_format(date_create($oldDate), "M d"), $ctr);
      array_push($stackvis, $visits);
    }
   }

  //  print_r ($stackvis);
  //  print_r ($visitStats[0]);
  //  print_r ($visitStats[1]);
  
  ?>
<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Sun Mar 27 2022 17:09:54 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="622900b5173b65a22e3620ab" data-wf-site="6216511dceccf8d3bc0c62f3">
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <meta content="Dashboard" property="og:title">
  <meta content="Dashboard" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="diskobre" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <link href="css/diskobre-owner.styles.css" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
  <!-- google stats -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      var visits = JSON.parse('<?php echo json_encode($stackvis); ?>');
      console.log(visits);

      google.charts.load('current', {
        packages: ['corechart', 'line']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', 'Visits');

        data.addRows(visits);

        var options = {
          hAxis: {
            title: 'Date'
          },
          vAxis: {
            title: 'Visits'
          },
          backgroundColor: '#fff'
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
</head>

<body>
  <div class="body-wrapper">
    <div class="left-panel"><img src="images/Group-349.svg" loading="lazy" alt="" class="admin-logo-login mx-1">
      <a href="dashboard.php" aria-current="page" class="nav-item selected-nav w-inline-block w--current"><img src="images/Group-416.svg" loading="lazy" alt="">
        <div class="nav-text selected">Overview</div>
      </a>
      <a href="messages.php" class="nav-item w-inline-block"><img src="images/mail-line.svg" loading="lazy" alt="">
        <div class="nav-text">Messages</div>
      </a>
      <a href="settings.php?estab_id=<?php echo($estabId);?>" class="nav-item w-inline-block"><img src="images/user-settings-line.svg" loading="lazy" alt="">
        <div class="nav-text">Settings</div>
      </a>
    </div>
    <div class="right-panel">
      <div data-hover="false" data-delay="0" class="admin-info w-dropdown">
        <div class="info-drop-down w-dropdown-toggle"><img src="images/unsplash_X6Uj51n5CE8.png" loading="lazy" alt="" class="drop-down-icon">
          <div class="info-text spe-char"><span><?php echo($uname) ?></span></div>
        </div>
        <nav class="dropdown-list w-dropdown-list">
          <a href="index.php?logout=true" class="info-drop-down-item w-dropdown-link">Logout</a>
        </nav>
      </div>
      <div class="page-container">
        <h1 class="page-title">Overview</h1>
        <div class="content-hbetween mb-1">
          <div class="content-vcenter">
            <div class="box inbox w-clearfix">
              <img src="images/unsplash_X6Uj51n5CE8.png" loading="lazy" id="w-node-_4809819e-b50e-5bbf-03de-8486d068159b-2e3620ab" alt="" class="pp-mssgs">
              <h2 id="w-node-_10981c81-cc0e-ba18-c29a-d9baf0efbb36-2e3620ab" class="total-heading pp-heading" ><?php echo($estabName) ?></h2>
              <img src="images/codicon_verified-filled.svg" loading="lazy" id="w-node-_2f90dcc5-9f89-1247-286a-1e76768b8731-2e3620ab" alt="" class="pp-mssgs owner-verify">
              <h3 id="w-node-_292ccf9f-a63a-1a41-84f3-d17f8b87e374-2e3620ab" class="h3-mssg"><?php echo($foundCategory); ?></h3>
            </div>
            <div class="box mr-1">
              <h2 class="total-heading">Total visits for this month</h2>
              <div class="total-num">
                <?php
                  $qSelectmv = mysqli_query($link, "SELECT count(*) as total FROM visits WHERE Month(datetime) = Month(CURRENT_DATE()) AND establishment_id = {$estabId};");
                  while( $monthVisits = mysqli_fetch_array($qSelectmv) ){
                    echo $monthVisits['total'];
                  }
                ?>
              </div>
            </div>
            <div class="box">
              <h2 class="total-heading">Total new users visit</h2>
              <div class="total-num">
                <?php
                  $qSelectmv = mysqli_query($link, "SELECT * FROM visits WHERE establishment_id = {$estabId} GROUP BY user_id");
                  echo mysqli_num_rows($qSelectmv);
                ?>
                </div>
            </div>
          </div>
          <div class="content-vcenter">
            <div class="custome-date"><img src="images/Frame-94.svg" loading="lazy" alt="">
              <div class="cus-date-text">Custom Date</div>
            </div>
          </div>
        </div>
        <div class="grid">

          <div class="box large">
            <h3 class="box-heading">Visitors</h3>
            <div class="date">Last 30 days</div>
            <!-- visit chart -->
            <div class="chart" id="curve_chart"></div>
          </div>

          <div class="box category">
            <h3 class="box-heading">Most search category</h3>
            <div class="of-auto">
              <div class="w-layout-grid table-grid row estab category">
                <div id="w-node-ce338ebe-0f6c-45d9-db14-d5a7a704b966-2e3620ab" class="cell-holder icons-in-cell">
                  <div class="compe-circle category icon"><img src="images/Vector-5.svg" loading="lazy" width="31" alt="" class="cell-icon"></div>
                </div>
                <div id="w-node-ce338ebe-0f6c-45d9-db14-d5a7a704b969-2e3620ab" class="cell-holder">
                  <div class="cell-data">Hospital</div>
                </div>
                <div id="w-node-ce338ebe-0f6c-45d9-db14-d5a7a704b96d-2e3620ab" class="content-center">
                  <div class="compe-circle category">
                    <div class="cell-data category">1</div>
                  </div>
                </div>
              </div>
              <div class="w-layout-grid table-grid row estab category">
                <div id="w-node-_8745b8aa-e563-a872-7595-e41698c841ee-2e3620ab" class="cell-holder icons-in-cell">
                  <div class="compe-circle category icon"><img src="images/Vector-4.svg" loading="lazy" width="31" alt="" class="cell-icon"></div>
                </div>
                <div id="w-node-_8745b8aa-e563-a872-7595-e41698c841f1-2e3620ab" class="cell-holder">
                  <div class="cell-data">Hospital</div>
                </div>
                <div id="w-node-_8745b8aa-e563-a872-7595-e41698c841f4-2e3620ab" class="content-center">
                  <div class="compe-circle category">
                    <div class="cell-data category">1</div>
                  </div>
                </div>
              </div>
              <div class="w-layout-grid table-grid row estab category">
                <div id="w-node-_9634be15-131f-366e-b48e-6614bf3554ef-2e3620ab" class="cell-holder icons-in-cell">
                  <div class="compe-circle category icon"><img src="images/Vector-3.svg" loading="lazy" width="31" alt="" class="cell-icon"></div>
                </div>
                <div id="w-node-_9634be15-131f-366e-b48e-6614bf3554f2-2e3620ab" class="cell-holder">
                  <div class="cell-data">Hospital</div>
                </div>
                <div id="w-node-_9634be15-131f-366e-b48e-6614bf3554f5-2e3620ab" class="content-center">
                  <div class="compe-circle category">
                    <div class="cell-data category">1</div>
                  </div>
                </div>
              </div>
              <div class="w-layout-grid table-grid row estab category">
                <div id="w-node-cb77fd46-1ba3-3207-d111-833c86b6c99e-2e3620ab" class="cell-holder icons-in-cell">
                  <div class="compe-circle category icon"><img src="images/Vector-2.svg" loading="lazy" width="31" alt="" class="cell-icon"></div>
                </div>
                <div id="w-node-cb77fd46-1ba3-3207-d111-833c86b6c9a1-2e3620ab" class="cell-holder">
                  <div class="cell-data">Hospital</div>
                </div>
                <div id="w-node-cb77fd46-1ba3-3207-d111-833c86b6c9a4-2e3620ab" class="content-center">
                  <div class="compe-circle category">
                    <div class="cell-data category">1</div>
                  </div>
                </div>
              </div>
              <div class="w-layout-grid table-grid row estab category">
                <div id="w-node-acc6e84d-1128-cc93-76d2-f51adcea3720-2e3620ab" class="cell-holder icons-in-cell">
                  <div class="compe-circle category icon"><img src="images/Vector-1.svg" loading="lazy" width="31" alt="" class="cell-icon"></div>
                </div>
                <div id="w-node-acc6e84d-1128-cc93-76d2-f51adcea3723-2e3620ab" class="cell-holder">
                  <div class="cell-data">Hospital</div>
                </div>
                <div id="w-node-acc6e84d-1128-cc93-76d2-f51adcea3726-2e3620ab" class="content-center">
                  <div class="compe-circle category">
                    <div class="cell-data category">1</div>
                  </div>
                </div>
              </div>
              <div class="w-layout-grid table-grid row estab category">
                <div id="w-node-_8b9936c6-0c09-5792-2f26-e7c1ae8eb6d3-2e3620ab" class="cell-holder icons-in-cell">
                  <div class="compe-circle category icon"><img src="images/Vector.svg" loading="lazy" width="31" alt="" class="cell-icon"></div>
                </div>
                <div id="w-node-_8b9936c6-0c09-5792-2f26-e7c1ae8eb6d6-2e3620ab" class="cell-holder">
                  <div class="cell-data">Hospital</div>
                </div>
                <div id="w-node-_8b9936c6-0c09-5792-2f26-e7c1ae8eb6d9-2e3620ab" class="content-center">
                  <div class="compe-circle category">
                    <div class="cell-data category">1</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- competitor -->
          <div class="box large">
            <h3 class="box-heading">Top Competitors    <span class="estab-spec"><?php echo($foundCategory); ?></span></h3>
            <div class="date w-clearfix">Last 30 days    <span class="ttl-vst">Total Visits</span></div>
            <div class="w-layout-grid table-grid row estab">
              <div id="w-node-_3270139d-7a8b-5b87-d204-c251c0bb5e8f-2e3620ab" class="content-center">
                <div class="compe-circle">
                  <div class="cell-data ranking _1">1</div>
                </div>
              </div>
              <div id="w-node-_3270139d-7a8b-5b87-d204-c251c0bb5e92-2e3620ab" class="cell-holder">
                <div class="cell-data">Rose Pharmacy</div>
              </div>
              <div id="w-node-_3270139d-7a8b-5b87-d204-c251c0bb5ea3-2e3620ab" class="cell-holder"></div>
              <div id="w-node-_822902c4-e572-a08c-98ac-8dfc20667d2f-2e3620ab" class="cell-holder">
                <div class="cell-data">350</div>
              </div>
            </div>
            <div class="w-layout-grid table-grid row estab">
              <div id="w-node-_22af318d-49c5-e203-cdad-4eef6080bcd4-2e3620ab" class="content-center">
                <div class="compe-circle _2">
                  <div class="cell-data ranking _2">2</div>
                </div>
              </div>
              <div id="w-node-_22af318d-49c5-e203-cdad-4eef6080bcd8-2e3620ab" class="cell-holder">
                <div class="cell-data">Rose Pharmacy</div>
              </div>
              <div id="w-node-_22af318d-49c5-e203-cdad-4eef6080bcdb-2e3620ab" class="cell-holder"></div>
              <div id="w-node-_22af318d-49c5-e203-cdad-4eef6080bcdc-2e3620ab" class="cell-holder">
                <div class="cell-data">350</div>
              </div>
            </div>
            <div class="w-layout-grid table-grid row estab">
              <div id="w-node-c47abcfa-e600-060e-6400-48c782a91cad-2e3620ab" class="content-center">
                <div class="compe-circle _2">
                  <div class="cell-data ranking _2">3</div>
                </div>
              </div>
              <div id="w-node-c47abcfa-e600-060e-6400-48c782a91cb1-2e3620ab" class="cell-holder">
                <div class="cell-data">Rose Pharmacy</div>
              </div>
              <div id="w-node-c47abcfa-e600-060e-6400-48c782a91cb4-2e3620ab" class="cell-holder"></div>
              <div id="w-node-c47abcfa-e600-060e-6400-48c782a91cb5-2e3620ab" class="cell-holder">
                <div class="cell-data">350</div>
              </div>
            </div>
            <div class="w-layout-grid table-grid row estab">
              <div id="w-node-a7d6a37f-e917-f283-0450-c70f3d0f2e59-2e3620ab" class="content-center">
                <div class="compe-circle _2">
                  <div class="cell-data ranking _2">4</div>
                </div>
              </div>
              <div id="w-node-a7d6a37f-e917-f283-0450-c70f3d0f2e5d-2e3620ab" class="cell-holder">
                <div class="cell-data">Rose Pharmacy</div>
              </div>
              <div id="w-node-a7d6a37f-e917-f283-0450-c70f3d0f2e60-2e3620ab" class="cell-holder"></div>
              <div id="w-node-a7d6a37f-e917-f283-0450-c70f3d0f2e61-2e3620ab" class="cell-holder">
                <div class="cell-data">350</div>
              </div>
            </div>
            <div class="w-layout-grid table-grid row estab">
              <div id="w-node-_9a3e22de-9f94-f481-1530-a73ae1b600d3-2e3620ab" class="content-center">
                <div class="compe-circle _2">
                  <div class="cell-data ranking _2">5</div>
                </div>
              </div>
              <div id="w-node-_9a3e22de-9f94-f481-1530-a73ae1b600d7-2e3620ab" class="cell-holder">
                <div class="cell-data">Rose Pharmacy</div>
              </div>
              <div id="w-node-_9a3e22de-9f94-f481-1530-a73ae1b600da-2e3620ab" class="cell-holder"></div>
              <div id="w-node-_9a3e22de-9f94-f481-1530-a73ae1b600db-2e3620ab" class="cell-holder">
                <div class="cell-data">350</div>
              </div>
            </div>
          </div>
          <div class="box" id = "chartContainer">
           
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Age Groups"
	},
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6216511dceccf8d3bc0c62f3" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/diskobre.js" type="text/javascript"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>