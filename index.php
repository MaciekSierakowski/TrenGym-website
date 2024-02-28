<?php
session_start();
if (isset($_SESSION["loged"]) && $_SESSION["loged"] == "true") {
    header("Location: main.php");
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

        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: red;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkred;
        }

        a {
            color: red;
            text-decoration: none;
            display: block;
            
        }

        a:hover {
            text-decoration: underline;
            color: darkred;
        }
    </style>
</head>
<body>
    <header style="padding: 10px; text-align: center;">
        <a href="projekt.html"><img src="logo.png" alt="Logo" style="max-width: 100%;"></a>
    </header>

    <form action="zaloguj.php" method="post">
        Login: <input type="text" name="login"> <br>
        Hasło: <input type="password" name="haslo"> <br>
        <input type="submit" value="Zaloguj się">
        <?php
        if (isset($_SESSION["error"])) {
            echo $_SESSION["error"];
        }
    ?>
    </form>
    <form>
    <a href="rejestracja.php">Rejestracja</a>
    </form>
    
</body>
</html>
