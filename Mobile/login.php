<!doctype html>
<html lang="en">



<?php
    session_start();
    if(isset($_SESSION['uname'])){
        header("location: home.php");
        exit;
    }
    $link = mysqli_connect("localhost", "root", ""); // SERVER CONNECTION
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];

        $password = $_POST['password'];
        // ? Check if username already exist and if the priviledge is for an establishment owner
        
        mysqli_select_db($link, "diskobre");

        $user = mysqli_query($link,"SELECT password,user_id FROM user WHERE username='$username' AND user_type = 2");
        // ? continue this
        if(mysqli_num_rows($user) > 0){
        while($s = mysqli_fetch_array($user)){ // GET THE DATA
            $pas = mysqli_query($link, "SELECT * from user WHERE user_type = 2 AND password = MD5('{$password}') AND username = '{$username}';"); //? CALL QUERY
          $passwordFound = $s['password'];
          $userId = $s['user_id'];
          if(mysqli_num_rows($pas) > 0) {
            //? If value match then create a session
            session_start();
            $_SESSION["uname"] = $username;
            $_SESSION["userType"] = 2;
            $_SESSION["userId"] = $userId;
            header("Location: onboarding.php");
          }
        }
      }
    }
?>


<head>
    <meta charset="utf-8">
    <title>Login</title>
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
    <form method ="POST">
        <div id="back_container" style="width: 100%;height: 3rem;display: block;display: none">
            <img src="assets/back_btn.svg" alt="back_btn.svg" style="height:3rem;width:3rem" onclick="return_back()" />
        </div>
        <br>
        <div style="width: 100%;height: auto;display: block;">

            <div style="margin:auto; display: flex;flex-wrap: wrap;">
                <span style="color: #313035;font-size: 2rem;flex: 100%;">Welcome</span>
                <span style="color: #313035;font-size: 2rem;">to&nbsp;</span>
                <img src="assets/brand.svg" alt="brand.svg" style="height:3rem;" />
            </div>
        </div>
        <br>
        <div style="width: 100%;height: auto;display: block;">
            <span style="color: #313035;font-size: 1rem;font-weight: regular;">Login to keep exploring amazing<br>places
                in Cebu City.</span>
        </div>
        <br>
        <div style="width: 100%;height: auto;display: block;">

            <div
                style="box-shadow: inset 0px 3.83772px 3.83772px #E7E7E7;background: #EAF1F1;display: flex;padding: 0.5rem;">
                <img src="assets/profile_icon.svg" alt="profile_icon.svg" style="height:2.5rem;width:2.5rem" />
                <input type="text" style="flex: 50%;background: none;border: none;font-size: 1.2rem" placeholder="Username"
                    minlength="3" maxlength="99" name= "username" required  />
            </div>
            <br>

            <div
                style="box-shadow: inset 0px 3.83772px 3.83772px #E7E7E7;background: #EAF1F1;display: flex;padding: 0.5rem;">
                <img src="assets/password_icon.svg" alt="password_icon.svg" style="height:2.5rem;width:2.5rem" />
                <input type="password" style="flex: 50%;background: none;border: none;font-size: 1.2rem"
                    placeholder="Password" minlength="6"  name="password" maxlength="99" required />
            </div>

            <div style="width: 100%;height: auto;display: block;text-align: right;">
                <a style="color: #313035;font-size: 0.8rem;font-weight: regular;color: #34CCCE;"><u>Forgot Password?</u></a>
            </div>
        </div>

        <br>

        <!-- Google Button -->
        <div style="background: #34CCCE;color: white;display: flex;width: 100%;height: 4rem;border-radius:
            1rem;" >
            <div style="margin: auto;display:flex;">
                <input type="submit" name="submit" value="LOGIN" style="border: none; background: none;color: white;">
            </div>
        </div>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div style="width: 100%;height: auto;display: block;text-align: center;">
        <span style="color: #313035;font-size: 0.8rem;line-height: 0;font-weight: regular;">Don't have an account?<a href="registration.php"
                    style="color: #1B9EC3;"><u>Register now!</u></a></p>
        </span>
    </div>

    <br>
    <br>
    <br>

</body>
<script>
// function submit_login() {
//     console.log("Submit Registration Pressed.");
//     if (localStorage.getItem("new_user") == "0") {
//         window.location.href = "onboarding.php";
//     } else if (localStorage.getItem("new_user") == "1") {
//         window.location.href = "home.php";
//     }
// }

// function return_back() {

//     console.log("Returning.");
//     window.location.href = "initial_registration.php";

// }
</script>

</html>