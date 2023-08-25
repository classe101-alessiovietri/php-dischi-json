<?php

$response = null;

if (isset($_POST['info'])) {
    if (
        isset($_POST['info']['name'])
        &&
        $_POST['info']['name'] != ''
        &&
        isset($_POST['info']['artist'])
        &&
        $_POST['info']['artist'] != ''
        &&
        isset($_POST['info']['genre'])
        &&
        $_POST['info']['genre'] != ''
        &&
        isset($_POST['info']['year'])
        &&
        $_POST['info']['year'] != ''
    ) {
        // Ora, finalmente, aggiungo il disco

        $discs = file_get_contents('database/discs.json');
        $discs = json_decode($discs, true);

        $newDisc = [
            'id' => $discs[count($discs) - 1]['id'] + 1,
            'name' => $_POST['info']['name'],
            'artist' => $_POST['info']['artist'],
            'genre' => $_POST['info']['genre'],
            'year' => $_POST['info']['year'],
        ];

        $discs[] = $newDisc;

        file_put_contents('database/discs.json', json_encode($discs));

        $response = 'success';
    }
    else {
        $response = 'error';
    }
}
else {
    $response = 'error';
}

header('Content-Type: application/json');

echo $response;