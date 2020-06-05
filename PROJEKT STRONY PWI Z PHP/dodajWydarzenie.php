<?php

	session_start();
	
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: niezalogowany.html');
		exit();
	}

    include("connection.php");
    
    $tytul = $_POST['tytul'];
    $tresc = $_POST['tresc'];
    $ogl_data = date('Y-m-d H:i:s', strtotime($_POST['ogl_data']));
    $ogl_miejsce = $_POST['ogl_miejsce'];
    $ogl_wstep = $_POST['ogl_wstep'];

    if($tytul == "" || $tresc == "" || $ogl_data == "" || $ogl_miejsce == "" || $ogl_wstep == ""){
        $_SESSION['blad'] = "Wypełnij wszystkie pola!";
		header('Location: wydarzenia.php');
		exit();
    } 
    else{
        $id_uzytkownika = $_SESSION['id_uzytkownika'];
        $data = date('Y-m-d H:i:s');
        
        $dodaj = $conn->prepare('INSERT INTO ogloszenia (id_uzytkownika, tytul, tresc, data, ogl_miejsce, ogl_data, ogl_wstep) VALUES ('.$id_uzytkownika.', "'.$tytul.'", "'.$tresc.'", "'.$data.'", "'.$ogl_miejsce.'", "'.$ogl_data.'", "'.$ogl_wstep.'")');
        $dodaj->execute();
        header('Location: wydarzenia.php');
    }
?>