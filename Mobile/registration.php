<!doctype html>
<html lang="en">

<?php

$link = mysqli_connect("localhost", "root", ""); // SERVER CONNECTION

session_start();
if(isset($_SESSION['uname'])){
    header("location: home.php");
    exit;
}

if(isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $firstName = $_POST['firstName'];

    $lastName = $_POST['lastName'];

    $date = $_POST['date'];

    $confirmPass = $_POST['confirmPass'];

    mysqli_select_db($link, "diskobre");  //? CONNECT TO DATEBASE

    if($confirmPass == $password) {
            mysqli_query($link, "
            insert into user(username,password,user_type,email,fname,lname,bdate) values(
            '".$username."',
                MD5('".$password."'),  
                2,'".$email."','".$firstName."','".$lastName."','".$date."')");
                header("location: login.php");
        }
    }
  
?>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="description" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
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
    }

    input:focus,
    select:focus,
    textarea:focus,
    button:focus {
        outline: none;
    }
    </style>
</head>

<body style="background: white;">
    <div style="width: 100%;height: 3rem;display: block;">
        <a href="index.php">
            <img src="assets/back_btn.svg" alt="back_btn.svg" style="height:3rem;width:3rem" onclick="return_back()" />
        </a>
    </div>
    <br>
    <div style="width: 100%;height: auto;display: block;">
        <span style="color: #313035;font-size: 1rem;font-weight: 300;">Create Account</span>
        <br>
        <div style="margin:auto; display: flex;flex-wrap: wrap;">
            <span style="color: #313035;font-size: 2rem;flex: 100%;">Welcome</span>
            <span style="color: #313035;font-size: 2rem;">to&nbsp;</span>
            <img src="assets/brand.svg" alt="brand.svg" style="height:3rem;" />
        </div>
    </div>
    <br>
    <div style="width: 100%;height: auto;display: block;">
        <span style="color: #313035;font-size: 1rem;font-weight: regular;">Sign up to keep exploring<br>amazing places
            in Cebu City.</span>
    </div>
    <br>

    <form method = "POST">
        <div style="width: 100%;height: auto;display: block;">

            <div
                style="box-shadow: inset 0px 3.83772px 3.83772px #E7E7E7;background: #EAF1F1;display: flex;padding: 0.5rem;">
                <img src="assets/profile_icon.svg" alt="profile_icon.svg" style="height:2.5rem;width:2.5rem" />
                <input type="text" name= "username" style="flex: 50%;background: none;border: none;font-size: 1.2rem" placeholder="Username"
                    minlength="3" maxlength="99" required />
            </div>
            <br>
            <div
                style="box-shadow: inset 0px 3.83772px 3.83772px #E7E7E7;background: #EAF1F1;display: flex;padding: 0.5rem;">
                <img src="assets/profile_icon.svg" alt="profile_icon.svg" style="height:2.5rem;width:2.5rem" />
                <input type="text" name= "firstName" style="flex: 50%;background: none;border: none;font-size: 1.2rem" placeholder="First Name"
                    minlength="3" maxlength="99" required />
            </div>
            <br>
            <div
                style="box-shadow: inset 0px 3.83772px 3.83772px #E7E7E7;background: #EAF1F1;display: flex;padding: 0.5rem;">
                <img src="assets/profile_icon.svg" alt="profile_icon.svg" style="height:2.5rem;width:2.5rem" />
                <input type="text" name= "lastName" style="flex: 50%;background: none;border: none;font-size: 1.2rem" placeholder="Last Name"
                    minlength="3" maxlength="99" required />
            </div>
            <br>
            <div
                style="box-shadow: inset 0px 3.83772px 3.83772px #E7E7E7;background: #EAF1F1;display: flex;padding: 0.5rem;">
                <img src="assets/profile_icon.svg" alt="profile_icon.svg" style="height:2.5rem;width:2.5rem" />
                <input type="text" name= "email" style="flex: 50%;background: none;border: none;font-size: 1.2rem" placeholder="email"
                    minlength="3" maxlength="99" required />
            </div>
            <br>
            <div
                style="box-shadow: inset 0px 3.83772px 3.83772px #E7E7E7;background: #EAF1F1;display: flex;padding: 0.5rem;">
                <img src="assets/profile_icon.svg" alt="profile_icon.svg" style="height:2.5rem;width:2.5rem" />
                <input type="date" name= "date" style="flex: 50%;background: none;border: none;font-size: 1.2rem" placeholder="date"
                    minlength="3" maxlength="99" required />
            </div>
            <br>
            <div
                style="box-shadow: inset 0px 3.83772px 3.83772px #E7E7E7;background: #EAF1F1;display: flex;padding: 0.5rem;">
                <img src="assets/password_icon.svg" alt="password_icon.svg" style="height:2.5rem;width:2.5rem" />
                <input type="password" name ="password" style="flex: 50%;background: none;border: none;font-size: 1.2rem"
                    placeholder="Password" minlength="6" maxlength="99" required />
            </div>
            <br>
            <div
                style="box-shadow: inset 0px 3.83772px 3.83772px #E7E7E7;background: #EAF1F1;display: flex;padding: 0.5rem;">
                <img src="assets/password_icon.svg" alt="password_icon.svg" style="height:2.5rem;width:2.5rem" />
                <input type="password" name="confirmPass" style="flex: 50%;background: none;border: none;font-size: 1.2rem"
                    placeholder="Password" minlength="6" maxlength="99" required />
            </div>
        </div>
        <br>
        <br>
        <!-- Google Button -->
        <div style="background: #34CCCE;color: white;display: flex;width: 100%;height: 4rem;border-radius:
            1rem;" >
            <div style="margin: auto;display:flex;" >

                <input type="submit" name="register" value="Submit" style="margin:auto;font-size: 1rem;border: none;color: none;color: white;background: none">
                
            </div>
        </div>
    </form>
    <br>
    <div style="width: 100%;height: auto;display: block;text-align: center;">
        <span style="color: #313035;font-size: 0.8rem;line-height: 0;font-weight: regular;">Already have an account?<a href="login.php"
                    style="color: #1B9EC3;"><u>Login</u></a></p>
        </span>
    </div>
    <br>
    <br>
    <br>

</body>
<script>
// function submit_registration() {
//     console.log("Submit Registration Pressed.");
//     localStorage.setItem("new_user", "0");
//     window.location.href = "login.php";

// }

// function return_back() {
//     console.log("Returning.");
//     window.location.href = "initial_registration.php";

// }
</script>

</html>