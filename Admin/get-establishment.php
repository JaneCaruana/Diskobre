<?php
$link = mysqli_connect("localhost", "root", ""); // SERVER CONNECTION
mysqli_select_db($link, "diskobre");

$establishment_id =  $_GET['establishment_id'];

$user = mysqli_query($link, "SELECT *  from establishment WHERE establishment_id='{$establishment_id}'");


return $user;

?>