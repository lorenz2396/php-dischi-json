<?php 
$string = file_get_contents('database/dischi.json');

$dischi_array  = json_decode($string, true);
$response = [];

foreach ($students as $student) {
    if ($student['last_name'] == $_GET['last_name']) {
        $response[] = $student;
    }
}

header('Content-Type: application/json');

echo json_encode($response);
