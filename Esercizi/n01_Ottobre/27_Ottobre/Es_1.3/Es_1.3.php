<?php
$sillabe = ["CA", "NE", "VA", "LO"];

echo "--- Punto 1 ---\n";
echo "Con echo (elementi separati da spazio): ";
foreach ($sillabe as $s) {
    echo $s . " ";
}
echo "\n\nCon print_r:\n";
print_r($sillabe); 

echo "\n--- Punti 2 e 3 ---\n";
$parola = "";
$num_sillabe = count($sillabe);

for ($i = 0; $i < 6; $i++) {
    $indice_casuale = rand(0, $num_sillabe - 1); 
    $parola .= $sillabe[$indice_casuale];
}

echo "Parola casuale generata (6 sillabe con ripetizioni): " . $parola . "\n";
?>