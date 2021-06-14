<?php
session_start();
include "lista_nagrod.php";
echo "Wygrałeś ". $tablica_nagrod[$_SESSION["counter"] - 1];
echo "<br>";
echo "Czy chcesz zagrać jeszcze raz?";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        input[type=submit] {
            background-color: #000066;
            border: none;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
    <title>Wygrana</title>
</head>
<body>
<form method="post" action="session_kill.php">
    <input type="submit" id="kill" name="kill" value="Tak">
</form>
</body>
</html>
