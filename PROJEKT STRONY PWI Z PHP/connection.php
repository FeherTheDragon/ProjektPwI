<?php

    try
    {
        $conn = new PDO('mysql:host=localhost;dbname=id13885642_typhoondb', 'id13885642_localhost', 'Dp2xtKo?uW0qLi');
    }
    catch (PDOException $e)
    {
        print "Błąd połączenia z bazą!: " . $e->getMessage() . "<br/>";
        die();
    }
    $conn->exec("SET NAMES utf8");

    

?>