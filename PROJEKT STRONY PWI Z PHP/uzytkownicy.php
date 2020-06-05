<?php

	session_start();
	
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: niezalogowany.html');
		exit();
	}
    
    include("connection.php");

    if(isset($_POST['usunusera'])){
        $jakiuser = $_POST['jakiuser'];
        $zap3_usun = $conn->prepare('DELETE FROM ogloszenia WHERE id_uzytkownika = '.$jakiuser);
        $zap3_usun->execute();
        $zap2_usun = $conn->prepare('DELETE FROM wpisy WHERE id_uzytkownika = '.$jakiuser);
        $zap2_usun->execute();
        $zap_usun = $conn->prepare('DELETE FROM uzytkownicy WHERE id_uzytkownika = '.$jakiuser);
        $zap_usun->execute();
        
        header('Refresh:0');
    } 
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    
    <title>Typhoon</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    
    <header>
        <h1>Typhoon</h1>
        <h2>serwis społecznościowy</h2>
    </header>
    
    <div id="main_menu">
        <nav class="menu_lewe">
            <ul>
                <li><a href="moj_profil.php">Mój Profil</a></li>
                <li><a href="index.php">Wpisy</a></li>
                <li><a href="wydarzenia.php">Wydarzenia</a></li>
                <li><a href="powiadomienia.php">Powiadomienia</a></li>
            </ul>
        </nav> 

        <nav class="menu_prawe">
            <ul>
                <li><a href="wyloguj.php">Wyloguj się</a></li>
            </ul>
        </nav> 
    </div>
    
    <div style="height:100%;">
        <main id="main_glowny">
            <div class="panel_glowny">
                <?php
                    
                    $zap = $conn->query('SELECT * FROM uzytkownicy');
                    foreach($zap as $row){
                        echo '<div class="uzytkownicy">';
                            echo '<div>';
                                echo '<img src="'.$row['avatar'].'" alt="avatar uzytkownika" class="pu_avatar">';
                            echo '</div>';
                            echo '<div class="pu_dane">';
                                echo '<p>Typ użytkownika: '.$row['typ_uzytkownika'].'</p>';
                                echo '<p>'.$row['imie'].' '.$row['nazwisko'].'</p>';
                                if($row['id_uzytkownika'] != $_SESSION['id_uzytkownika']){
                                    echo '<form action="" method="post">';
                                        echo '<input type="hidden" name="jakiuser" value="'.$row['id_uzytkownika'].'">';
                                        echo '<input class="usun" type="submit" value="Usuń Użytkownika" name="usunusera">';
                                    echo '</form>';
                                }
                            echo '</div>';
                        echo '</div>';
                    }
                
                ?>
            </div>
        </main>
    </div>
    
    <footer>
        <p id="stopka_p">Strona Wykonana w 2020r.</p>
    </footer>
    
</body>
</html>
