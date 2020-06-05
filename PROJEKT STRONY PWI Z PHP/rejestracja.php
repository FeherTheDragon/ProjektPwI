<?php

	session_start();

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
        </nav> 

        <nav class="menu_prawe">
            <ul>
                <li><a href="logowanie.php">Zaloguj się</a></li>
            </ul>
        </nav> 
    </div>
    
    <div style="height:100%;">
        <main id="main_glowny">
            <div class="panel_glowny">
                <form action="rejestracjaPHP.php" method="post">
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
                            <td colspan="2"><h4>Zarejestruj się</h4></td>
                        </tr>
                        <tr>
                            <td><label for="imie">Imię: </label></td>
                            <td><input type="text" id="imie" name="imie"></td>
                        </tr>
                        <tr>
                            <td><label for="nazwisko">Nazwisko: </label></td>
                            <td><input type="text" id="nazwisko" name="nazwisko"></td>
                        </tr>
                        <tr>
                            <td><label for="login">Login: </label></td>
                            <td><input type="text" id="login" name="login"></td>
                        </tr>
                        <tr>
                            <td><label for="haslo">Hasło: </label></td>
                            <td><input type="password" id="haslo" name="haslo"></td>
                        </tr>
                        <tr>
                            <td><label for="haslo2">Ponownie hasło: </label></td>
                            <td><input type="password" id="haslo2" name="haslo2"></td>
                        </tr>
                        <tr>
                            <td><label for="regulamin" >Zapoznałem się z <a href="regulamin.html">regulaminem</a></label></td>
                            <td><input type="checkbox" id="regulamin" name="regulamin"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Zarejestruj"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </main>
    </div>
    
    <footer>
        <p id="stopka_p">Strona Wykonana w 2020r.</p>
    </footer>
    
</body>
</html>
