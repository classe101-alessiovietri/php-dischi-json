<?php

header('Access-Control-Allow-Origin: *');

$discs = file_get_contents('database/discs.json');

$response = $discs;

$voglioElaborareIDati = false;

if ($voglioElaborareIDati) {
    $discs = json_decode($discs, true);
    
    // Eventuale elaborazione

    $response = json_encode($discs);
}

header('Content-Type: application/json');

echo $response;