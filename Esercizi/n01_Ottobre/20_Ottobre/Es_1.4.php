<?php
$mesi = [
    "Gennaio" => 31,
    "Febbraio" => 28,
    "Marzo" => 31,
    "Aprile" => 30
];

print_r($mesi);
echo "<br>";

unset($mesi["Gennaio"]);
$mesi["Giugno"] = 30;

print_r($mesi);
echo "<br>";

$mesi["Estate"] = [
    "Luglio" => 31,
    "Agosto" => 31
];

print_r($mesi);
?>