<?php
session_start();

if (!isset($_SESSION["loged"])) 
{
   header("location: index.php");
   exit();
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

        .user-info {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        a {
            color: #c00;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header>
    <a href="projekt.html"><img src="logo.png" alt="Logo"></a>
</header>

<div class="user-info">
    <?php
       echo "Witaj <strong>".$_SESSION['user']."</strong><br><br>";
       echo 'Karnet: '.$_SESSION['karnet']."<br><br>";
       echo 'Dni do wygaśnięcia: '.$_SESSION['dni_do_wygasniecia']."<br><br>";
       echo '<a href="logout.php">Wyloguj się</a>';
       echo '<a href="karnet.php">Kup karnet</a>';
    ?>
</div>

</body>
</html>
