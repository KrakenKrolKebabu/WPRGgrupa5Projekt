<?php
session_start();
include "array_create.php";
$string = $csv[$_SESSION["rand"]]["answer"];
if ($_POST["answer"] == $csv[$_SESSION["rand"]][$string] && $_SESSION["counter"] == 14) {
    header("Location: main_prize.php");
} else if ($_POST["answer"] == $csv[$_SESSION["rand"]][$string]) {
    header("Location: strona_main.php");
    $_SESSION["flag1_bis"] = 0;
    $_SESSION["flag3_bis"] = 0;
} else {
    header("Location: wrong_answer_script.php");
}
?>
