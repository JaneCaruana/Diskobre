<!DOCTYPE html><!--  This site was created in diskobre. http://www.diskobre.com  -->
<!--  Last Published: Tue Apr 05 2022 12:45:34 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="6249d26b4993c130eff79efb" data-wf-site="62165137ca1ed84e0065bb2c">
<head>
  <meta charset="utf-8">
  <title>Establishment View Page</title>
  <meta content="Establishment View Page" property="og:title">
  <meta content="Establishment View Page" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="diskobre" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <link href="css/diskobre-client.styles.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link href="css/star.css" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>

<?php
session_start();
  $link = mysqli_connect('localhost','root','');
  mysqli_select_db($link,"diskobre");

  $user_id = $_SESSION["userId"];

  if(isset($_GET['estabId'])) {
    $estabId = $_GET['estabId'];
  }
  $getEstablish = mysqli_query($link, "SELECT * from establishment WHERE establishment_id='{$estabId}'");
  if(mysqli_num_rows($getEstablish) > 0){
    while($s = mysqli_fetch_array($getEstablish)){
      $estabName = $s['estab_name'];
      $categoryId = $s['category_id'];
      $address = $s['address'];
      $description = $s['description'];
      $userFK = $s['user_fk'];
    }
  }

  $category = mysqli_query($link, "SELECT estcat FROM category WHERE category_id='{$categoryId}'");
  if(mysqli_num_rows($category) > 0){
    while($s = mysqli_fetch_array($category)){
      $gotCategory = $s['estcat']; 
    }
  }

  //  VISIT
   mysqli_query($link, "INSERT INTO visits(user_id, establishment_id) VALUES('{$user_id}','{$estabId}')");
?>
<body>
 <p id="establishmet_id" style="display:none"><?php echo $_GET['estabId']?></p>
  <div class="body-wrapper">
    <nav class="navbar px-2 py-1 hidden">
      <a href="home.php" class="nav-item w-inline-block"><img src="images/home-line-1.svg" loading="lazy" alt="" class="image-2"></a>
      <a href="navigation.php" class="nav-item w-inline-block"><img src="images/navigation-1.svg" loading="lazy" alt="" class="image-3"></a>
      <a href="#" class="nav-item w-inline-block"><img src="images/message.svg" loading="lazy" alt="" class="image-4"></a>
      <a href="#" class="nav-item w-inline-block"><img src="images/user-settings.svg" loading="lazy" alt="" class="image-5"></a>
    </nav>
    <div class="head">
      <a href="home.php" class="w-inline-block"><img src="images/Frame-121.svg" loading="lazy" alt=""></a>
      <a href="#" class="w-inline-block"><img src="images/Frame-122.svg" loading="lazy" alt=""></a>
    </div>
    <div class="box relative pt-2">
      <div class="bg-card-white"></div>
      <div class="estab-featured-img"><img src="images/unsplash_nMyM7fxpokE.png" loading="lazy" alt="" class="estab-image">
        <div class="estab-img-more"><img src="images/unsplash_nMyM7fxpokE.png" loading="lazy" alt="" class="image-7"><img src="images/unsplash_nMyM7fxpokE.png" loading="lazy" alt="" class="image-7"><img src="images/unsplash_nMyM7fxpokE.png" loading="lazy" alt="" class="image-7"><img src="images/unsplash_nMyM7fxpokE.png" loading="lazy" alt="" class="image-7"><img src="images/unsplash_nMyM7fxpokE.png" loading="lazy" alt="" class="image-7"></div>
      </div>
      <div class="estab-detials">
        <h1 class="estab-name-large"><?php echo($estabName); ?></h1>
        <div class="block-h-weighted pl-0 border-bottom">
          <div class="weight-50 pl-1 border-right content-vbetween">
            <div class="text-style-2"><?php echo($gotCategory); ?></div>

            <div class="content-vcenter">
            <?php 
              $conn2 = new mysqli("localhost","root","","diskobre");
              
              $query1 = "SELECT COUNT(ra_rev_id) as  countRating, FORMAT((SUM(rate) / COUNT(ra_rev_id)),1) as avgRatings FROM rating_review WHERE estab_id_fk = '$estabId'";
              $dataresult = $conn2->query($query1); 
              $rateresult = $dataresult->fetch_array();

          ?>

            <?php 
                for($i=1; $i<=5; $i++){
                if($i<= $rateresult['avgRatings']){
            ?>
              <img src="images/Group-423.svg" loading="lazy" alt="" class="rate-star-oa">
            <?php }else{?>
              <img src="images/Group-424.svg" loading="lazy" alt="" class="rate-star-oa">
            <?php }}?>
          
        

              <div class="text-style-1"><span class="spe-char ml-0-5"><?php echo $rateresult['avgRatings']?></span> 

            </div>
            </div>
            <div class="text-style-1"><span class="spe-char"><?php echo $rateresult['countRating']?></span> Review</div>
          </div>
         
          <div class="weight-50 pl-1">
            <p class="text-style-1">700 m   <span class="spe-char">|  8 min<br><br><?php echo($address) ?>
            <span class="text-blue">Open</span>
            <?php 
               $days = mysqli_query($link, "SELECT * FROM operatingtime WHERE Establishmentid_fk='{$estabId}'");

              
               if(mysqli_num_rows($days) > 0){

                 while($s = mysqli_fetch_array($days)){
                    
                    $start = date('h:i A', strtotime($s['start']));
                    $end = date('h:i A', strtotime($s['end']));
                   
                    if( $s['Day'] == '0') { ?>
                        
                      <p>Monday: <?php  echo($start.'-'.$end) ?></p>
                   <?php }  if( $s['Day'] == '1') { ?>
                        
                        <p>Tuesday: <?php  echo($start.'-'.$end) ?> </p>
                     <?php }  if( $s['Day'] == '2') { ?>
                        
                        <p>Wednesday:<?php  echo($start.'-'.$end) ?></p>
                    <?php }  if( $s['Day'] == '3') { ?>
                        
                    <p>Thursday: <?php  echo($start.'-'.$end) ?></p>
                    <?php }  if( $s['Day'] == '4') { ?>
                        
                        <p>Friday: <?php  echo($start.'-'.$end) ?></p>
                    <?php }  if( $s['Day'] == '5') { ?>
                        
                      <p>Saturday: <?php  echo($start.'-'.$end) ?></p>
                      <?php }  if( $s['Day'] == '6') { ?>
                        
                        <p>Sunday: <?php  echo($start.'-'.$end) ?></p>
                      
                 <?php }      
                }

              }
             
              $userType = mysqli_query($link, "SELECT user_type AS userType FROM user WHERE user_id='{$userFK}'");

              $checkContri = mysqli_query($link, "SELECT * FROM establishment JOIN user ON user.user_id = establishment.user_fk WHERE user.user_type = 2 AND establishment_id = {$estabId}");
                if(mysqli_num_rows($checkContri) > 0){
                  ?>
                    <p style= "color:#C7C7C7;">Contributed Establishment</p>
                  <?php 
                }  
                ?> 
               
              
                


            
            
          
          </p>
          </div>
        </div>
      </div>
      <div class="btn-box border-bottom pb-0">
        <!-- message button -->
        <a href="#" class="mb-1 w-inline-block">
          <img src="images/Frame-130-2.svg" loading="lazy" width="131" height="40" alt="">
        </a>
        <!-- navigation button -->
        <a href="start-navigation.php?estabId=<?= $estabId ?>" class="mb-1 w-inline-block">
          <img src="images/Frame-129.svg" loading="lazy" alt="">
        </a>
      </div>
      <div class="amenities-box border-bottom">
        <div class="text-style-3 mb-1">Amenities</div>
        <div>
          <div class="text-style-1">Accessibility</div>
          <ul role="list" class="w-list-unstyled">
            <li class="list-item"><img src="images/Group.svg" loading="lazy" alt="">
              <div class="text-style-1"><?php echo($description)?></div>
            </li>
          </ul>
        </div>
      </div>
      <div class="ratings-box">
        <div class="content-center mb-0-5">
        <!-- COUNT(rating_id) as  countRating, FORMAT((SUM(computer_rate) / COUNT(rating_id)),1) as avgRatings -->
          <?php 
              $conn1 = new mysqli("localhost","root","","diskobre");
              
              $query = "SELECT COUNT(ra_rev_id) as  countRating, FORMAT((SUM(rate) / COUNT(ra_rev_id)),1) as avgRatings FROM rating_review WHERE estab_id_fk = '$estabId'";
              $dataresult = $conn1->query($query); 
              $rateresult = $dataresult->fetch_array();

          ?>
          <div class="rating-score-total"><?php echo $rateresult['avgRatings']?></div>

          <div class="content-vcenter mb-0-5">

            <?php 
                for($i=1; $i<=5; $i++){
                if($i<= $rateresult['avgRatings']){
            ?>
              <img src="images/Group-423.svg" loading="lazy" alt="" class="rate-star-oa">
            <?php }else{?>
              <img src="images/Group-424.svg" loading="lazy" alt="" class="rate-star-oa">
            <?php }}?>
          
          </div>

            


          <div class="text-style-1">based on <span class="arial"><?php echo $rateresult['countRating']?></span> reviews</div>
        </div>
        <div class="chart"></div>
      </div>
      <div class="border-bottom">
        <div class="text-style-3 mb-1">Rating and review</div>
        <div class="text-style-1 mb-0-5">Share your experience to help others</div>
        <div class="mb-0-5 content-vcenter"><img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" loading="lazy" width="41" height="41" alt="" class="pp-img mr-2">
          <div class="content-vcenter">

            <div class="rating">
              <input type="radio" name="star" value="5" class="click_star"/><span class="star"> </span>
              <input type="radio" name="star" value="4" class="click_star"/><span class="star"> </span>
              <input type="radio" name="star" value="3" class="click_star"/><span class="star"> </span>
              <input type="radio" name="star" value="2" class="click_star"/><span class="star"> </span>
              <input type="radio" name="star" value="1" class="click_star"/><span class="star"> </span>
            </div>

          </div>
        </div>
        <div class="form-block w-form">
          <form id="email-form" name="email-form" data-name="Email Form" >
            <input type="text" class="text-field-2 w-input" maxlength="256" name="name" data-name="Name" placeholder="" id="review_input">
            <input type="" value="Write a review" data-wait="Please wait..." class="btn-1 w-button" id="rate_review_btn">
          </form>
          <div class="w-form-done">
            <div>Thank you! Your submission has been received!</div>
          </div>
          <div class="w-form-fail">
            <div>Oops! Something went wrong while submitting the form.</div>
          </div>
        </div>
      </div>
      <div class="pb-1">
        <div class="text-style-3 mb-1">Sort by</div>
        <div class="content-vcenter justify-between mb-1">
          <div class="sort-btn selected">
            <div class="sort-btn-text">Most relevant</div>
          </div>
          <div class="sort-btn">
            <div class="sort-btn-text">Newest</div>
          </div>
          <div class="sort-btn">
            <div class="sort-btn-text">Highest</div>
          </div>
          <div class="sort-btn">
            <div class="sort-btn-text">Lowest</div>
          </div>
        </div>

        <div class="flex-v">

        <?php 
             $conn = new mysqli("localhost","root","","diskobre");

          

             $sql = "SELECT * FROM rating_review INNER JOIN user ON rating_review.user_id_fk = user.user_id WHERE estab_id_fk = '$estabId' ORDER BY ra_rev_id DESC";
             $result = $conn->query($sql);
            // if(mysqli_num_rows($days) > 0){
             while($data = $result->fetch_assoc()){    
        ?>
          <div class="flex-v border-bottom">
            <div class="mb-0-5 content-vcenter"><img src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg" loading="lazy" width="41" height="41" alt="" class="pp-img mr-0-5">
              <div class="content-left">
                <div class="rater-name"><?php echo $data['fname']?> <?php echo $data['lname']?></div>
                <div class="rater-title">Local tourist</div>
              </div>
            </div>
            <div class="content-vcenter mb-0-5">
             
              <div class="content-vcenter mr-0-5">


              <?php
                  for($i=1; $i<=5; $i++){               
                    if($i<= $data['rate']){
                    
              ?>
                <img src="images/Group-423.svg" loading="lazy" alt="" class="rate-star-oa">
              <?php }else{ ?>	    
                <img src="images/Group-424.svg" loading="lazy" alt="" class="rate-star-oa">                     
              <?php
                }
              }
              ?>   

               
                <!-- <img src="images/Group-423.svg" loading="lazy" alt="" class="rate-star-oa">
                <img src="images/Group-423.svg" loading="lazy" alt="" class="rate-star-oa">
                <img src="images/Group-423.svg" loading="lazy" alt="" class="rate-star-oa">
                <img src="images/Group-424.svg" loading="lazy" alt="" class="rate-star-oa"> -->

              </div>
              <!-- <div class="rate-date">2 days ago</div> -->
            </div>
            <p class="review-text"><?php echo $data['review']?></p>
          </div>
          <?php }?>
      

        </div>

      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62165137ca1ed84e0065bb2c" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/diskobre.js" type="text/javascript"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>


<script>

$(document).on('click','.click_star',function(){ 
   var rating = $(this).val();
  $("#rate_review_btn").attr('rating',rating);
});



$(document).on('click','#rate_review_btn',function(){ 
   var estab_id = $('#establishmet_id').text();
   var rating = 0;
   rating = $(this).attr('rating');
   var review = $('#review_input').val();


  if(rating >0){

    $.ajax({
			url: "ratelogic.php/?estab_id="+estab_id,
			method: "POST",
			data:{score: rating,rate_review:review},
			success: function (data) {
        swal({
            title: "Thank You",
            text: "Your FeedBack Was Succesfully Submitted",
            icon: "success",
            button: "Continue",
          }).then((value) => {
                location.reload();
          });

			},
		});

  }else{

    swal(     'Unable To Submit',
							'Please Select a Rate',
							'error'
						)
  }


  
});


</script>