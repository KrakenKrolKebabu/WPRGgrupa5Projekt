<?php
session_start();
if ($_SESSION["counter"] < 5) {
    echo "Niestety, odchodzisz z niczym";
} else if($_SESSION["counter"] >= 5 && $_SESSION["counter"] < 10) {
    echo "Wygrałeś 1000zł";
} else if($_SESSION["counter"] >= 10) {
    echo "Wygrałeś 32000zł";
}
echo "<br>";
echo "Chcesz spróbować ponownie?";
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
    <title>Przegrana</title>
</head>
<body>
<form method="post" action="session_kill.php">
    <input type="submit" id="kill" name="kill" value="Tak">
</form>
</body>
</html>

