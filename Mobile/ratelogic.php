<?php
    session_start();
    $user_id = $_SESSION["userId"] ;
    $estab = $_GET['estab_id'];
    $score =  $_POST['score'];
    $review = $_POST['rate_review'];

    $conn = new mysqli("localhost","root","","diskobre");

    $sql = "INSERT INTO `rating_review`(`estab_id_fk`, `user_id_fk`, `rate`, `review`) VALUES ('$estab','$user_id','$score','$review')";
    $conn->query($sql);

?>