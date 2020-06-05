<?php

	session_start();
	
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: niezalogowany.html');
		exit();
	}

    include("connection.php");

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
                <div class="panel_uzytkownika">
                    <div class="pu_dane_avatar">
                        <div>
                            <?php
                            
                                $zap = $conn->prepare('SELECT * FROM uzytkownicy WHERE id_uzytkownika = '.$_SESSION['id_uzytkownika']);
                                $zap->execute();
                                $row = $zap->fetch();
                            
                                echo '<img src="'.$row['avatar'].'" alt="avatar uzytkownika" class="pu_avatar">';
                            
                            ?>
                        </div>
                        <div class="pu_dane">
                            <?php
                            
                                if(isset($_SESSION['edytowano'])){
                                    echo '<p style="color:greenyellow">';
                                    echo $_SESSION['edytowano'];
                                    echo '</p>';
                                    unset($_SESSION['edytowano']);
                                }
                            
                                if($row['wiek'] == 0) $wiek = "ukryty";
                                else $wiek = $row['wiek'];
                                if($row['plec'] == "") $plec = "ukryta";
                                else $plec = $row['plec'];
                            
                                echo '<p>'.$row['typ_uzytkownika'].'</p>';
                                echo '<p>Imię: '.$row['imie'].'</p>';
                                echo '<p>Nazwisko: '.$row['nazwisko'].'</p>';
                                echo '<p>Wiek: '.$wiek.'</p>';
                                echo '<p>Płeć: '.$plec.'</p>';

                            ?>
                        </div>
                    </div>
                    <div>
                        <ul>
                            <li><a href="edytuj_profil.php">Edytuj Profil</a></li>
                            <?php
                                if(isset($_SESSION['admin']))
                                {   
                                    echo '<li class="usun"><a href="uzytkownicy.php">Użytkownicy</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <aside class="panel_prawy">
                <h3>Ważne!</h3>
                <div class="okno_aktual">
                    <div class="tytul_data">
                        <h4>Miłej zabawy!</h4>
                        <h4>2020-05-20 11:16:00</h4>
                    </div>
                    <p>Miłej zabawy z korzystania z portalu społecznościowego!</p>
                </div>
            </aside>
        </main>
    </div>
    
    <footer>
        <p id="stopka_p">Strona Wykonana w 2020r.</p>
    </footer>
    
</body>
</html>
