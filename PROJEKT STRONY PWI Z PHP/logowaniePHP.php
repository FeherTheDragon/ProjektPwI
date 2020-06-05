<?php

	session_start();

    if($_POST['login'] == "" || $_POST['haslo'] == ""){
        $_SESSION['blad'] = "Wypełnij wszystkie pola!";
		header('Location: logowanie.php');
		exit();
	}

    include("connection.php");

    $login = $_POST['login'];
    $haslo = hash('sha224', $_POST['haslo']);

    $zap = $conn->prepare('SELECT * FROM uzytkownicy WHERE login = "'.$login.'"');
    $zap->execute();
    $row = $zap->fetch();

    if($row['haslo'] == $haslo){
        if($row['typ_uzytkownika'] == "Admin") $_SESSION['admin'] = true;
        $_SESSION['zalogowany'] = true;
        $_SESSION['id_uzytkownika'] = $row['id_uzytkownika'];
        header('Location: index.php');
		exit();
    }
    else{
        $_SESSION['blad'] = "Błędne dane logowania!";
		header('Location: logowanie.php');
		exit();
    }
    
?>