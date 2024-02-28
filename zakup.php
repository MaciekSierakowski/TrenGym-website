<?php
session_start();

if (!isset($_SESSION["succes1"])) {
    header("Location: karnet.php");
    exit();
} else {
    unset($_SESSION["succes1"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrenGym</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        header {
            padding: 10px;
            text-align: center;
        }

        header img {
            max-width: 100%;
        }

        .message {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .message a {
            color: #4CAF50;
            text-decoration: none;
            display: block;
            margin-top: 10px;
            display: inline-block;
        }

        .message a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header>
    <a href="projekt.html"><img src="logo.png" alt="Logo"></a>
</header>

<div class="message">
    Udalo ci sie kupic karnet<br>
    Wroc na <a href="index.php">strone glowna</a>
</div>

</body>
</html>
