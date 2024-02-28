<?php

	session_start();
	
	if (isset($_POST['email']))
	{
		
		$wszystko_OK=true;

        //Sprawdzanie poprawnosci imienia
        $imie = $_POST['imie'];

        if(ctype_alpha($imie) == false)
        {
            $wszystko_OK=false;
            $_SESSION['e_imie'] = "Imie nie może zawierać cyfr";
        }

        //Sprawdzenie poprawnosci nazwiska
        $nazwisko = $_POST['nazwisko'];

        if(ctype_alpha($nazwisko) == false)
        {
            $wszystko_OK=false;
            $_SESSION['e_nazwisko'] = "Nazwisko nie może zawierać cyfr";
        }

        $data_urodzenia = $_POST['urodziny'];

        //Sprawdz poprawnosc numeru tel
        $numer_tel = $_POST['phone'];

        if(strlen($numer_tel)!=9 || ctype_digit($numer_tel) == false)
        {
            $wszystko_OK=false;
            $_SESSION['e_phone'] = "Numer telefonu musi posiadac 9 cyfr";
        }
		
		//Sprawdź poprawność loginu
		$login = $_POST['login'];
		
		//Sprawdzenie długości loginu
		if ((strlen($login)<3) || (strlen($login)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_login']="Login musi posiadać od 3 do 20 znaków!";
		}
		
		if (ctype_alnum($login)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_login']= "Login moze składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		//Sprawdź poprawność hasła
		$haslo = $_POST['haslo'];
		
		if ((strlen($haslo)<8) || (strlen($haslo)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}

		$haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);
			
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

				//Czy login jest już zarezerwowany?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE login='$login'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_loginow = $rezultat->num_rows;
				if($ile_takich_loginow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_login']="Podany login juz istnieje Wybierz inny.";
				}

                $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE numer_telefonu='$numer_tel'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_telefonow = $rezultat->num_rows;
				if($ile_takich_telefonow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_phone']="Istnieje już konto przypisane do tego numeru telefonu";
				}		

				
				if ($wszystko_OK==true)
				{
					if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$imie', '$nazwisko', '$login', '$haslo', '$email', '$data_urodzenia', '$numer_tel', 'Nowy czlonek', 7)"))
					{
						$_SESSION['succes']=true;
						header('Location: witaj.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
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

        .error {
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
	<header style="padding: 10px; text-align: center;">
        <a href="projekt.html"><img src="logo.png" alt="Logo" style="max-width: 100%;"></a>
    </header>
    <form method="post">
        Imię: <input type="text" name="imie"><br>
        <?php
             if(isset($_SESSION['e_imie']))
             {
                echo'<div class="error">'.$_SESSION['e_imie'].'</div>';
                unset($_SESSION['e_imie']);
             }
        ?>
        
        Nazwisko: <input type="text" name="nazwisko"><br>
        <?php
             if(isset($_SESSION['e_nazwisko']))
             {
                echo'<div class="error">'.$_SESSION['e_nazwisko'].'</div>';
                unset($_SESSION['e_nazwisko']);
             }
        ?>

        Login: <input type="text" name="login"><br>
        <?php
             if(isset($_SESSION['e_login']))
             {
                echo'<div class="error">'.$_SESSION['e_login'].'</div>';
                unset($_SESSION['e_login']);
             }
        ?>

        Email: <input type="text" name="email"><br>
        <?php
             if(isset($_SESSION['e_email']))
             {
                echo'<div class="error">'.$_SESSION['e_email'].'</div>';
                unset($_SESSION['e_email']);
             }
        ?>

        Hasło: <input type="password" name="haslo"><br>
        <?php
             if(isset($_SESSION['e_haslo']))
             {
                echo'<div class="error">'.$_SESSION['e_haslo'].'</div>';
                unset($_SESSION['e_haslo']);
             }
        ?>

        Data urodzenia: <input type="date" name="urodziny"><br>

        Numer telefonu: <input type="number" name="phone"><br>
        <?php
             if(isset($_SESSION['e_phone']))
             {
                echo'<div class="error">'.$_SESSION['e_phone'].'</div>';
                unset($_SESSION['e_phone']);
             }
        ?>

        <input type="submit" value="Zarejestruj się">
    </form>
    
</body>
</html>
