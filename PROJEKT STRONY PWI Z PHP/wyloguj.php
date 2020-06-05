<?php

	session_start();
	
    unset($_SESSION['zalogowany']);
    unset($_SESSION['admin']);
    unset($_SESSION['id_uzytkownika']);
    header('Location: niezalogowany.html');

?>