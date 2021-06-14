<?php
session_start();
include "lista_nagrod.php";
include "array_create.php";
$_SESSION["flag2"] = 1;
if ($_SESSION["counter"] >= 5 && $_SESSION["counter"] < 10) {
    echo "1000zł";
} else if ($_SESSION["counter"] >= 10) {
    echo "3200zł";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mail</title>
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
if ($_SESSION["flag1_bis"] == 1) {
    echo $_SESSION["pop"] . "V";
    echo "<br>";
    echo $_SESSION["fal"] . "X";
}
?>
<form method="post" action="validator_script.php">
    <?php
    if ($_SESSION["flag1_bis"] == 1) {
    echo "<input type='submit' id='poprawna' name='answer' value='".$_SESSION["temparray"][0]."'>";
    echo "<input type='submit' id='bledna' name='answer' value='".$_SESSION["temparray"][1]."'>";
    } else {
        echo "<input type='submit' id='A' name='answer' value='" . $csv[$_SESSION["rand"]]["A"] . "'>";
        echo "<input type='submit' id='B' name='answer' value='" . $csv[$_SESSION["rand"]]["B"] . "'>";
        echo "<br>";
        echo "<input type='submit' id='C' name='answer' value='" . $csv[$_SESSION["rand"]]["C"] . "'>";
        echo "<input type='submit' id='D' name='answer' value='" . $csv[$_SESSION["rand"]]["D"] . "'>";
    }
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
if ($_SESSION["flag1"] == 0) {
    echo "<a href=50_50.php>50/50</a>";
    echo "<br>";
    echo "<br>";
}
if ($_SESSION["flag3_bis"] == 0) {
    echo "<a href=pytanie_do_publicznosci.php>Pytanie do publiczności</a>";
} else {
    echo "Wyniki ";
    echo "<br>";
    echo $csv[$_SESSION["rand"]]["A"].": ".$_SESSION["n1"];
    echo "<br>";
    echo $csv[$_SESSION["rand"]]["B"].": ".$_SESSION["n2"];
    echo "<br>";
    echo $csv[$_SESSION["rand"]]["C"].": ".$_SESSION["n3"];
    echo "<br>";
    echo $csv[$_SESSION["rand"]]["D"].": ".$_SESSION["n4"];
}
?>
<p>
    Pytanie do przyjaciela:
    <a href="mailto:friend@example.com?Subject=Request%20for%20help" target="_top">
        Wyślij wiadomość
    </a>
</p>
</body>
</html>
