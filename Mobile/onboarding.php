<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Onboarding</title>
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
    <div id="back_container" style="width: 100%;display: block;display: block;margin: 10% 0 0 0;">
        <div style="display:flex;">
            <img id="image_view" src="assets/onboarding_one.svg" alt="onboarding.svg" style="height:35rem;" />
        </div>
    </div>
    <br>


    <br>

    <!-- Google Button -->
    <div style="display: flex;width: 100%;height: 4rem;border-radius:
        1rem;">

        <div style="margin: auto;display:flex;">
            <span style="margin:auto;font-size: 1rem;pointer-events: none;color: white;"> </span>
        </div>
        <div style="margin: auto;display:flex;" onclick="getStarted()">
            <span
                style="margin:auto;font-size: 1rem;pointer-events: none;color: #423D3D;font-weight: light;">Skip</span>
        </div>
        <div id="next_btn" onclick="next_onboarding_image()"
            style="margin: auto;display:flex;background: #34CCCE;color: white;padding: 1rem 2.5rem 1rem 2.5rem;border-radius: 2.5rem;">
            <span style="margin:auto;font-size: 1rem;pointer-events: none;">Next</span>
        </div>
        <div id="get_started_btn" onclick="getStarted()"
            style="margin: auto;background: #34CCCE;color: white;padding: 1rem 2.5rem 1rem 2.5rem;border-radius: 2.5rem;display: none;">
            <span style="margin:auto;font-size: 1rem;pointer-events: none;">Get Started</span>
        </div>

        <div style="margin: auto;display:flex;">
            <span style="margin:auto;font-size: 1rem;pointer-events: none;color: white;"> </span>
        </div>
    </div>

    <br>


</body>
<script>
var slide = 0;

function next_onboarding_image() {

    if (slide == 0) {
        document.getElementById("image_view").src = "assets/onboarding3.svg";
        slide++;
        document.getElementById("next_btn").style.display = "none";
        document.getElementById("get_started_btn").style.display = "flex";
        localStorage.setItem("new_user", "1");
    }

}
function getStarted() {
    window.location.href = "initial_registration.php";
}

function return_back() {

    console.log("Returning.");
    window.location.href = "initial_registration.php";

}
</script>

</html>