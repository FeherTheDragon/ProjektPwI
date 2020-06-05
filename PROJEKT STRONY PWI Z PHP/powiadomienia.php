<?php

	session_start();
	
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: niezalogowany.html');
		exit();
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
                <p>Brak powiadomień.</p>
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
