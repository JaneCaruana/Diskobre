<?php
session_start();
$userId = $_SESSION["userId"];
//fetch.php;
if(isset($_POST["view"]))
{
$connect = mysqli_connect("localhost", "root", "", "diskobre");

 $query = "SELECT user_fk, status FROM establishment WHERE user_fk = '$userId' AND status IN (2,3) AND notif = 0";
 $result = mysqli_query($connect, $query);



    

 $count = mysqli_num_rows($result);
 $data = array(
    
  'UserID' => $userId,
  'unseen_notification' => $count
 );


 echo json_encode($data);
}

?>
