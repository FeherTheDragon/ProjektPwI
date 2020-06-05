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
            <article class="panel_glowny">
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
                            <form action="edytuj_profilPHP.php" method="post">
                                <table>
                                    <tr>
                                        <td colspan="2"><h4>Edytuj Profil</h4></td>
                                    </tr>
                                    <tr>
                                        <td><label for="imie">Imię: </label></td>
                                        <td><input type="text" id="imie" name="imie" <?php echo 'value="'.$row['imie'].'"'; ?> ></td>
                                    </tr>
                                    <tr>
                                        <td><label for="nazwisko">Nazwisko: </label></td>
                                        <td><input type="text" id="nazwisko" name="nazwisko" <?php echo 'value="'.$row['nazwisko'].'"'; ?> ></td>
                                    </tr>
                                    <tr>
                                        <td><label for="wiek">Wiek:<br>(wyczyść, by ukryć)</label></td>
                                        <td><input type="number" id="wiek" name="wiek" min="13" max="130" <?php echo 'value="'.$row['wiek'].'"'; ?> ></td>
                                    </tr>
                                    <tr>
                                        <td><label for="plec">Płeć:</label></td>
                                        <td>
                                            <select id="plec" name="plec">
                                                <option <?php if($row['plec'] == "") echo 'selected="selected"'; ?>value="">Nie podawaj</option>
                                                <option <?php if($row['plec'] == "Kobieta") echo 'selected="selected"'; ?> value="Kobieta">Kobieta</option>
                                                <option <?php if($row['plec'] == "Mężczyzna") echo 'selected="selected"'; ?> value="Mężczyzna">Mężczyzna</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="avatar">Obrazek Profilowy<br>(podaj adres url): </label></td>
                                        <td><input type="text" id="avatar" name="avatar" <?php echo 'value="'.$row['avatar'].'"'; ?> ></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input type="submit" value="Edytuj"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div>
                        <ul>
                            <li><a href="moj_profil.php">Wróć do Profilu</a></li>
                            <?php
                                if(isset($_SESSION['admin']))
                                {   
                                    echo '<li class="usun"><a href="uzytkownicy.php">Użytkownicy</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </article>
            <aside class="panel_prawy">
                <h3>Ważne!</h3>
                <section class="okno_aktual">
                    <div class="tytul_data">
                        <h4>Miłej zabawy!</h4>
                        <h4>2020-05-20 11:16:00</h4>
                    </div>
                    <p>Miłej zabawy z korzystania z portalu społecznościowego!</p>
                </section>
            </aside>
        </main>
    </div>
    
    <footer>
        <p id="stopka_p">Strona Wykonana w 2020r.</p>
    </footer>
    
</body>
</html>
