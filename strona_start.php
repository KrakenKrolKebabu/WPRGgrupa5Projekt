<?php
session_start();
include "array_create.php";
include "lista_nagrod.php";
$_SESSION["nagroda"] = "100zł";
$_SESSION["counter"] = 0;
$_SESSION["flag1"] = 0;
$_SESSION["flag2"] = 0;
$_SESSION["flag3"] = 0;
$_SESSION["flag1_bis"] = 0;
$_SESSION["flag3_bis"] = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panel Gry</title>
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
</head>
<body>
<?php
$_SESSION["rand"] = rand(1,545);
echo $csv[$_SESSION["rand"]]["question"];
?>
<form method="post" action="validator_script.php">
    <?php
    echo "<input type='submit' id='A' name='answer' value='".$csv[$_SESSION["rand"]]["A"]."'>";
    ?>
    <?php
    echo "<input type='submit' id='B' name='answer' value='".$csv[$_SESSION["rand"]]["B"]."'>";
    ?>
    <br>
    <?php
    echo "<input type='submit' id='C' name='answer' value='".$csv[$_SESSION["rand"]]["C"]."'>";
    ?>
    <?php
    echo "<input type='submit' id='D' name='answer' value='".$csv[$_SESSION["rand"]]["D"]."'>";
    ?>
</form>
<?php
$_SESSION["nagroda"] = $tablica_nagrod[$_SESSION["counter"]];
echo $_SESSION["nagroda"];
echo "<br>";
echo $csv[$_SESSION["rand"]]["number"];
echo "<br>";
echo $csv[$_SESSION["rand"]]["answer"];
echo "<br>";
?>
<p>
    Koła ratunkowe
</p>
<?php
if ($_SESSION["flag1"] == 0) {
    echo "<a href=50_50.php>50/50</a>";
    echo "<br>";
    echo "<br>";
}
if ($_SESSION["flag2"] == 0) {
    echo "<a href=pytanie_do_przyjaciela.php>Pytanie do przyjaciela</a>";
    echo "<br>";
    echo "<br>";
}
if ($_SESSION["flag3"] == 0) {
    echo "<a href=pytanie_do_publicznosci.php>Pytanie do publiczności</a>";
}
?>
</body>
</html>