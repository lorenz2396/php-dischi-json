<?php 
// $string = file_get_contents('dischi.json');

// $dischi_array  = json_decode($string, true);
// $response = [];

// foreach ($students as $student) {
//     if ($student['last_name'] == $_GET['last_name']) {
//         $response[] = $student;
//     }
// }

// header('Content-Type: application/json');

// echo json_encode($response);


header('Access-Control-Allow-Origin: *');

$dischi = file_get_contents('dischi.json');
$dischi = json_decode($dischi, true);

$foundDisc = null;

// Controllo se mi è stato passato il parametro
if (isset($_GET['id'])) {

    // Controllo se il parametro ha il formato giusto
    if (is_numeric($_GET['id'])) {

        $id = intval($_GET['id']);

        foreach ($dischi as $disco) {
            if ($id == $disco['id']) {
                $foundDisc = $disco;
                break;
            }
        }
        
    }

}

$response = json_encode($foundDisc);

header('Content-Type: application/json');

echo $response;