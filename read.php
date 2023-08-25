<?php

header('Access-Control-Allow-Origin: *');

$discs = file_get_contents('database/discs.json');

$voglioElaborareIDati = false;

if ($voglioElaborareIDati) {
    $discs = json_decode($discs, true);
    
    // Eventuale elaborazione
    
    header('Content-Type: application/json');
    
    echo json_encode($discs);
}
else {
    header('Content-Type: application/json');
    
    echo $discs;
}