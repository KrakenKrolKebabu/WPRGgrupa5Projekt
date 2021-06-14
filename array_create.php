<?php
$csv = array_map('str_getcsv',file("./WWTBAM JSON File.csv"));
array_walk($csv,function (&$a) use ($csv) {
    $a = array_combine($csv[0], $a);
});
array_shift($csv);
?>