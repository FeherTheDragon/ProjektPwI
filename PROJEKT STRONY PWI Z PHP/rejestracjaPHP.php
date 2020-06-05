<?php

    session_start();

    if($_POST['login'] == "" || $_POST['haslo'] == "" || $_POST['haslo2'] == ""){
        $_SESSION['blad'] = "Wypełnij wszystkie pola!";
        header('Location: rejestracja.php');
        exit();
	}

    include("connection.php");

    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $login = $_POST['login'];
    $haslo = hash('sha224', $_POST['haslo']);
    $haslo2 = hash('sha224', $_POST['haslo2']);
    $avatar = "https://iupac.org/wp-content/uploads/2018/05/default-avatar.png";
    $typ_uzytkownika = "Użytkownik";

    $zap = $conn->prepare('SELECT login FROM uzytkownicy WHERE login = "'.$login.'"');
    $zap->execute();
    $row = $zap->rowCount();
    
    if($row > 0){
        $_SESSION['blad'] = "Login jest już zajęty!";
		header('Location: rejestracja.php');
		exit();
    }
    if($haslo != $haslo2){
        $_SESSION['blad'] = "Hasła nie są identyczne!";
		header('Location: rejestracja.php');
		exit();
    }
    if(!isset($_POST['regulamin'])){
        $_SESSION['blad'] = "Musisz zaakceptować regulamin!";
		header('Location: rejestracja.php');
		exit();
    }

    $dodaj = $conn->prepare('INSERT INTO uzytkownicy (imie, nazwisko, login, haslo, avatar, typ_uzytkownika) VALUES ("'.$imie.'",
                                                                                                            "'.$nazwisko.'",
                                                                                                            "'.$login.'",
                                                                                                            "'.$haslo.'",
                                                                                                            "'.$avatar.'",
                                                                                                            "'.$typ_uzytkownika.'")');
    $dodaj->execute();
    $_SESSION['zarejestrowany'] = "Pomyślnie zarejestrowano! Proszę się zalogować!";
    header('Location: logowanie.php');

?>