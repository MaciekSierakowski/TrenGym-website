<?php
session_start();
require_once("connect.php");

if (isset($_POST["nazwa"])) {
    try 
    {
        if (isset($_SESSION['loged']) && $_SESSION['loged'] == true) 
        {
            $login = $_SESSION['user'];
            $nazwa = $_POST['nazwa'];
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

            if ($polaczenie->query("UPDATE uzytkownicy SET typ_karnetu = '$nazwa', Pozostała_dlugosc_karnetu = 30 WHERE login = '$login'")) 
            {
                $_SESSION["succes1"] = true;
                header("Location: zakup.php");
                exit();
            } else 
            {
                throw new Exception($polaczenie->error);
            }
        }
    } catch (Exception $e) 
    {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
        echo '<br />Informacja developerska: ' . $e;
    }
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

        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        select,
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        select {
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

    </style>
</head>
<body>

<header>
    <a href="projekt.html"><img src="logo.png" alt="Logo"></a>
</header>

<form method="post">
    <label for="nazwa">Typ karnetu:</label><br>
    <select name="nazwa" id="nazwa">
        <option value="Open">Open</option>
        <option value="Poranny">Poranny</option>
    </select>
    <input type="submit" value="Kup karnet">
</form>

</body>
</html>
