<?php

$response = null;

if (isset($_POST['info'])) {
    if (
        isset($_POST['info']['title'])
        &&
        $_POST['info']['title'] != ''
        &&
        isset($_POST['info']['author'])
        &&
        $_POST['info']['author'] != ''
        &&
        isset($_POST['info']['year'])
        &&
        $_POST['info']['year'] != ''
        &&
        isset($_POST['info']['genre'])
        &&
        $_POST['info']['genre'] != ''
    ) {
        // Ora, finalmente, aggiungo il disco

        $dischi = file_get_contents('dischi.json');
        $dischi = json_decode($dischi, true);

        $newDisc = [
            'id' => $dischi[count($dischi) - 1]['id'] + 1,
            'title' => $_POST['info']['title'],
            'author' => $_POST['info']['author'],            
            'year' => $_POST['info']['year'],
            'genre' => $_POST['info']['genre'],
        ];

        $dischi[] = $newDisc;

        file_put_contents('dischi.json', json_encode($dischi));

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