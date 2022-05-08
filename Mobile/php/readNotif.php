<?PHP 
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "diskobre");

$QestabID = $_POST["estabID"];


//$result = mysqli_query($link, "UPDATE establishment SET notif = 1 WHERE estab_name = '$QestabID' ");

if (mysqli_query($link, "UPDATE establishment SET notif = '1' WHERE establishment_id = '$QestabID' ")) {


   header("Location: ../profile-settings.php");
  } else {
    echo "Error updating record: " . mysqli_error($link);
  }