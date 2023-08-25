<?php

header('Access-Control-Allow-Origin: *');

$discs = file_get_contents('database/discs.json');
$discs = json_decode($discs, true);

$foundDisc = null;

// Controllo se mi è stato passato il parametro
if (isset($_GET['id'])) {

    // Controllo se il parametro ha il formato giusto
    if (is_numeric($_GET['id'])) {

        $id = intval($_GET['id']);

        foreach ($discs as $disc) {
            if ($id == $disc['id']) {
                $foundDisc = $disc;
                break;
            }
        }
        
    }

}

$response = json_encode($foundDisc);

header('Content-Type: application/json');

echo $response;