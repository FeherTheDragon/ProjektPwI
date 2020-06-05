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
                <form action="logowaniePHP.php" method="post">
                    <table>
                        <?php
                            if(isset($_SESSION['zarejestrowany'])){
                                echo '<tr>';
                                echo '<td colspan="2" class="zarejestrowany">';
                                echo $_SESSION['zarejestrowany'];
                                echo '</td></tr>';
                                unset($_SESSION['zarejestrowany']);
                            }
                        ?>
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
                            <td colspan="2"><h4>Zaloguj się</h4></td>
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
                            <td colspan="2"><input type="submit" value="Zaloguj"></td>
                        </tr>
                        <tr>
                            <td colspan="2">Nie masz konta? <a href="rejestracja.php">Zarejestruj się</a></td>
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
