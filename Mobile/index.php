<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Splash Screen</title>
    <link rel="icon" href="assets/tab_icon.png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    html {
        height: 100%;
        width: 100%;
        margin: 0;
        padding: 0px;

    }

    body {
        height: 90%;
        width: 90%;
        margin: 5%;
        display: flex;
    }
    </style>
</head>

<body style="background: white;">
    <div style="display: flex;align-items: center;justify-content: center;width: 100%;">

        <img src="assets/logo.svg" alt="logo.svg" style="height:9rem;width:9rem;" />
        <script>
        setTimeout(
            function() {
                if (localStorage.getItem("new_user") === null) {
                    window.location.href = "initial_registration.php";
                } else {
                    window.location.href = "initial_registration.php";
                }

            }, 3000
        );
        </script>
    </div>
</body>

</html>