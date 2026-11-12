<?php
$sillabe = ["CA", "NE", "VA", "LO"]; 
$parola = "";

while (count($sillabe) > 0) {
    $indice = rand(0, count($sillabe) - 1);
    
    $parola .= $sillabe[$indice];
    
    unset($sillabe[$indice]);
    
    $sillabe = array_values($sillabe);
}

echo "Concatenazione casuale senza ripetizioni: " . $parola . "\n";
?>