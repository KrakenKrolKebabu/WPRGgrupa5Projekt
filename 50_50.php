<?php
session_start();
include "lista_nagrod.php";
include "array_create.php";
$_SESSION["flag1"] = 1;
$_SESSION["flag1_bis"] = 1;
if ($_SESSION["counter"] >= 5 && $_SESSION["counter"] < 10) {
    echo "1000zł";
} else if ($_SESSION["counter"] >= 10) {
    echo "3200zł";
}
$tablica_blednych = array();
$poprawna_odpowiedz = " ";

if ("A" == $csv[$_SESSION["rand"]]["answer"]) {
    $poprawna_odpowiedz = $csv[$_SESSION["rand"]]["A"];
} else {
    array_push($tablica_blednych,$csv[$_SESSION["rand"]]["A"]);
}
if ("B" == $csv[$_SESSION["rand"]]["answer"]) {
    $poprawna_odpowiedz = $csv[$_SESSION["rand"]]["B"];
} else {
    array_push($tablica_blednych,$csv[$_SESSION["rand"]]["B"]);
}
if ("C" == $csv[$_SESSION["rand"]]["answer"]) {
    $poprawna_odpowiedz = $csv[$_SESSION["rand"]]["C"];
} else {
    array_push($tablica_blednych,$csv[$_SESSION["rand"]]["C"]);
}
if ("D" == $csv[$_SESSION["rand"]]["answer"]) {
    $poprawna_odpowiedz = $csv[$_SESSION["rand"]]["D"];
} else {
    array_push($tablica_blednych,$csv[$_SESSION["rand"]]["D"]);
}
shuffle($tablica_blednych);
array_pop($tablica_blednych);
shuffle($tablica_blednych);
array_pop($tablica_blednych);
$bledna_odpowiedz = array_pop($tablica_blednych);
$_SESSION["pop"] = $poprawna_odpowiedz;
$_SESSION["fal"] = $bledna_odpowiedz;
$temp_array = array($poprawna_odpowiedz, $bledna_odpowiedz
);
shuffle($temp_array);
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
echo $csv[$_SESSION["rand"]]["question"];
echo $poprawna_odpowiedz."V";
echo "<br>";
echo $bledna_odpowiedz."X";
$_SESSION["temparray"] = $temp_array;
?>
<form method="post" action="validator_script.php">
    <?php
    echo "<input type='submit' id='poprawna' name='answer' value='".$temp_array[0]."'>";
    ?>
    <?php
    echo "<input type='submit' id='bledna' name='answer' value='".$temp_array[1]."'>";
    ?>
</form>
<?php
$_SESSION["nagroda"] = $tablica_nagrod[$_SESSION["counter"]];
echo $_SESSION["nagroda"];
echo "<br>";
echo $csv[$_SESSION["rand"]]["number"];
echo "<br>";
echo $csv[$_SESSION["rand"]]["answer"];
?>
<br>
<?php
if (!$_SESSION["counter"] == 0) {
echo "Chcesz odejść z tym co wygrałeś?";
echo '<form method="post" action="cashing_out.php">';
echo '<input type="submit" id="reset" name="reset" value="Tak">';
echo '</form>';
}
?>
<br>
<p>
    Koła ratunkowe:
</p>
<?php
if ($_SESSION["flag2"] == 0) {
    echo "<a href=pytanie_do_przyjaciela.php>Pytanie do przyjaciela</a>";
    echo "<br>";
    echo "<br>";
}
if ($_SESSION["flag3_bis"] == 0) {
    echo "<a href=pytanie_do_publicznosci.php>Pytanie do publiczności</a>";
} else {
    echo $csv[$_SESSION["rand"]]["A"].": ".$_SESSION["n1"];
    echo "<br>";
    echo $csv[$_SESSION["rand"]]["B"].": ".$_SESSION["n2"];
    echo "<br>";
    echo $csv[$_SESSION["rand"]]["C"].": ".$_SESSION["n3"];
    echo "<br>";
    echo $csv[$_SESSION["rand"]]["D"].": ".$_SESSION["n4"];
}
?>
</body>
</html>


