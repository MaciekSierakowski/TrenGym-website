<?php
  session_start();

  if ((!isset($_POST["login"]) && $_POST["haslo"]))
  {
     header("location: index.php");
     exit();
  }



  require_once"connect.php";

  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

  if($polaczenie->connect_errno!=0)
  {
    echo "Error:".$polaczenie->connect_errno;
  }
  else
  {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $login = htmlentities($login, ENT_QUOTES,'UTF-8');
    $haslo = htmlentities($haslo, ENT_QUOTES,'UTF-8');

    if($rezultat = @$polaczenie->query(sprintf("SELECT * FROM uzytkownicy WHERE login='%s' and haslo='%s'", mysqli_real_escape_string($polaczenie, $login), mysqli_real_escape_string($polaczenie, $haslo))))
    {
       $ilosc_uzytkownikow = $rezultat->num_rows;

       if($ilosc_uzytkownikow>0)
       {
          $_SESSION["loged"] = true;
          $wiersz=$rezultat->fetch_assoc();
          $_SESSION["id"] = $wiersz["id"];
          $_SESSION['user'] = $wiersz['login'];
          $_SESSION['karnet'] = $wiersz['Typ_karnetu'];
          $_SESSION['dni_do_wygasniecia'] = $wiersz['Pozostała_dlugosc_karnetu'];
          unset($_SESSION['error']);

          $rezultat->free();

          header('Location: main.php');
       }
       else
       {
          $_SESSION['error'] = '<span style="color:red">Nieprawidłowy login lub hasło</span>';
          header('location: index.php');
       }
    }

    $polaczenie->close();
  }




?>