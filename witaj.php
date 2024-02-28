<?php
session_start();

if (!isset($_SESSION["succes"]))
{
    header("Location: index.php");
    exit();
}
else
{
    unset($_SESSION["succes"]);
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
        }

        header {
            padding: 10px;
            text-align: center;
        }

        header img {
            max-width: 100%;
        }

        .message {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .message a {
            color: red;
            text-decoration: none;
            display: block;
            margin-top: 10px;
            display: inline-block;
        }

        .message a:hover {
            text-decoration: underline;
            color: darkred;
        }
    </style>
</head>
<body>

<header>
    <img src="logo.png" alt="Logo">
</header>

<div class="message">
    Udało ci się zarejestrować.<br> Teraz zaloguj się <a href="index.php">tutaj</a>
</div>

</body>
</html>
