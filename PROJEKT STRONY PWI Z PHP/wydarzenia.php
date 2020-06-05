<?php

	session_start();
	
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: niezalogowany.html');
		exit();
	}

    include("connection.php");

    if(isset($_POST['sumbit'])){
        $id_ogloszenia = $_POST['id_ogloszenia'];
        $zap_usun = $conn->prepare('DELETE FROM ogloszenia WHERE id_ogloszenia = '.$id_ogloszenia);
        $zap_usun->execute();
        header('Location: wydarzenia.php');
    } 

    if(isset($_POST['dodajwydarzenie'])){
        $tytul = $_POST['tytul'];
        $tresc = $_POST['tresc'];
        $ogl_data = date('Y-m-d H:i:s', strtotime($_POST['ogl_data']));
        $ogl_miejsce = $_POST['ogl_miejsce'];
        $ogl_wstep = $_POST['ogl_wstep'];
        $id_uzytkownika = $_SESSION['id_uzytkownika'];
        $data = date('Y-m-d H:i:s');
        
        $dodaj = $conn->prepare('INSERT INTO ogloszenia (id_uzytkownika, tytul, tresc, data, ogl_miejsce, ogl_data, ogl_wstep) VALUES ('.$id_uzytkownika.', "'.$tytul.'", "'.$tresc.'", "'.$data.'", "'.$ogl_miejsce.'", "'.$ogl_data.'", "'.$ogl_wstep.'")');
        $dodaj->execute();
        header('Location: wydarzenia.php');
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
                <div class="dodaj_wpis">
                    <form action="dodajWydarzenie.php" method="post">
                        <table>
                            <?php
                                if(isset($_SESSION['blad'])){
                                    echo '<tr>';
                                    echo '<td colspan="2" class="blad">';
                                    echo $_SESSION['blad'];
                                    echo '</td></tr>';
                                    unset($_SESSION['blad']);
                                }
                            ?>
                            <tr>
                                <td colspan="2"><h4>Dodaj nowe wydarzenie</h4></td>
                            </tr>
                            <tr>
                                <td><label for="tytul">Tytuł: </label></td>
                                <td><input type="text" id="tytul" name="tytul"></td>
                            </tr>
                            <tr>
                                <td><label for="tresc">Treść: </label></td>
                                <td><textarea id="tresc" name="tresc"></textarea></td>
                            </tr>
                            <tr>
                                <td><label for="ogl_data">Data Wydarzenia: </label></td>
                                <td><input type="datetime-local" id="ogl_data" name="ogl_data"></td>
                            </tr>
                            <tr>
                                <td><label for="ogl_miejsce">Miejsce Wydarzenia: </label></td>
                                <td><input type="text" id="ogl_miejsce" name="ogl_miejsce"></td>
                            </tr>
                            <tr>
                                <td><label for="ogl_wstep">Wstęp: </label></td>
                                <td><input type="text" id="ogl_wstep" name="ogl_wstep"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" name="dodajwydarzenie"  value="Dodaj Wydarzenie"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <?php
                    
                    $zap = $conn->query('SELECT * FROM ogloszenia GROUP BY data DESC');
                    foreach($zap as $row){
                        $zap2 = $conn->prepare('SELECT * FROM uzytkownicy WHERE id_uzytkownika = "'.$row['id_uzytkownika'].'"');
                        $zap2->execute();
                        $row2 = $zap2->fetch();
                        
                        echo '<section class="okno_aktual">';
                            echo '<div class="tytul_data">';
                                echo '<div><img src="'.$row2['avatar'].'" alt="avatar uzytkownika" class="maly_avatar"></div>';
                                echo '<div><h4>[ '.$row2['imie'].' '.$row2['nazwisko'].' ] <br> '.$row['tytul'].'</h4></div>';
                                echo '<div><h4>'.$row['data'].'</h4></div>';
                            echo '</div>';
                            echo '<div class="wydarzenie">';
                                echo '<h4>Miejsce: '.$row['ogl_miejsce'].'</h4>';
                                echo '<h4>Data: '.$row['ogl_data'].'</h4>';
                                echo '<h4>Wstęp: '.$row['ogl_wstep'].'</h4>';
                            echo '</div>';
                            echo '<p>'.$row['tresc'].'</p>';
                            if(isset($_SESSION['admin'])){
                                echo '<form action="" method="post">';
                                    echo '<input type="hidden" id="id_ogloszenia" name="id_ogloszenia" value="'.$row['id_ogloszenia'].'">';
                                    echo '<input class="usun" type="submit" value="Usun Wpis" name="sumbit">';
                                echo '</form>';
                            }
                        echo '</section>';
                    }
                
                ?>
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
