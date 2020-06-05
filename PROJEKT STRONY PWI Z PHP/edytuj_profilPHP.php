<?php

    session_start();

    if(!isset($_SESSION['zalogowany']))
	{
		header('Location: niezalogowany.html');
		exit();
	}

    include("connection.php");

    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $wiek = $_POST['wiek'];
    $plec = $_POST['plec'];
    $avatar = $_POST['avatar'];

    $external_link = $_POST['avatar'];
    if (@GetImageSize($external_link)) {
        $avatar = $_POST['avatar'];
    } else {
        $avatar = "https://iupac.org/wp-content/uploads/2018/05/default-avatar.png";
    }  

    $dodaj = $conn->prepare('UPDATE uzytkownicy 
                            SET imie = "'.$imie.'", nazwisko = "'.$nazwisko.'", wiek = "'.$wiek.'", plec = "'.$plec.'", avatar = "'.$avatar.'"
                            WHERE id_uzytkownika = '.$_SESSION['id_uzytkownika']);
    $dodaj->execute();
    $_SESSION['edytowano'] = "Pomyślnie zaktualizowano profil!";
    header('Location: moj_profil.php');

?>