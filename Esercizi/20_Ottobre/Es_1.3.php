<?php
$a = isset($_GET['a']) ? intval($_GET['a']) : 0;
$b = isset($_GET['b']) ? intval($_GET['b']) : 1;

if ($b != 0) {
    $decimale = $a / $b;
    $quoziente = intdiv($a, $b);
    $resto = $a % $b;
    echo "Risultato in forma decimale: " . $decimale . "<br>";
    echo "Risultato intero più resto: " . $quoziente . " con resto di " . $resto;
} else {
    echo "Errore: divisione per zero.";
}
?>