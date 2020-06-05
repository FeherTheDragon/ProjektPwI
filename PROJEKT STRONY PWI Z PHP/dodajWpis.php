<?php
    session_start();
    if(!isset($_SESSION['zalogowany']))
	{
		header('Location: niezalogowany.html');
		exit();
	}
    include("connection.php");
    
    if($_POST['tytul'] == "" || $_POST['tresc'] == ""){
        $_SESSION['blad'] = "Wypełnij wszystkie pola!";
		header('Location: index.php');
		exit();
    }
    else{
		$tytul = $_POST['tytul'];
        $tresc = $_POST['tresc'];
        $id_uzytkownika = $_SESSION['id_uzytkownika'];
        $data = date('Y-m-d H:i:s');
        
        $dodaj = $conn->prepare('INSERT INTO wpisy (id_uzytkownika, tytul, tresc, data) VALUES ("'.$id_uzytkownika.'", "'.$tytul.'", "'.$tresc.'", "'.$data.'")');
        $dodaj->execute();
        header('Location: index.php');
    }
?>