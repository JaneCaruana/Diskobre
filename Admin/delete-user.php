<?php

    $link = mysqli_connect('localhost','root','');
    mysqli_select_db($link,"diskobre");

    $userId = $_POST['deleteUser'];
    echo($userId);
    $delete_query = "DELETE from user where user_id =".$userId;
    $run_delete_query = mysqli_query($link, $delete_query);

    echo 'Successfully Delete Establishment Detail.';
?>