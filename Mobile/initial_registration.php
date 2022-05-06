<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Initial-registration</title>
    <meta name="description" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/tab_icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    html {
        height: 100%;
        width: 100%;
        margin: 0;
        padding: 0px;
        font-family: 'Poppins', sans-serif;
    }

    body {
        height: 90%;
        width: 90%;
        margin: 5%;
        display: flex;
        flex-wrap: wrap;
    }
    </style>
</head>

<body style="background: white;">
<?php
    session_start();
    if(isset($_SESSION['uname'])){
        header("location: home.php");
        exit;
    }
?>
    <div style="display: flex;align-items: center;justify-content: center;width: 100%;margin: 5rem 0 0 0;">

        <img src="assets/logo.svg" alt="logo.svg" style="height:9rem;width:9rem;" />

    </div>


    <div style="width: 100%;display:flex;flex-direction: column-reverse">


        <!-- Google Button -->
        <div style="background: #34CCCE;color: white;display: flex;width: 100%;height: 4rem;border-radius:
        1rem;" onclick="registerWithMail()">
            <div style="margin: auto;display:flex;">
                <img src="assets/mail.svg" alt="mail.svg" style="height:2.5rem;width:2.5rem" />
                <span style="margin:auto;font-size: 1rem;">&nbsp;&nbsp;&nbsp;Register with Email</span>
            </div>
        </div>

        <br>
        <!-- Google Button -->
        <div style="background: #34CCCE;color: white;display: flex;width: 100%;height: 4rem;border-radius:
        1rem;" onclick="registerWithGoogle()">
            <div style="margin: auto;display:flex;">
                <!-- <img src="assets/google_icon.svg" alt="google_icon.svg" style="height:2.5rem;width:2.5rem" /> -->
                <span style="margin:auto;font-size: 1rem;">&nbsp;&nbsp;&nbsp;LOGIN</span>
            </div>
        </div>


    
    </div>

</body>
<script>
function registerWithGoogle() {
    console.log("Logging in");
    window.location.href = "login.php";

}

function registerWithMail() {
    console.log("Registering with Mail");
    window.location.href = "registration.php";
}
</script>

</html>