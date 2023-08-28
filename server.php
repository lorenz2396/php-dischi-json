<?php

// $dischi = [
//     [
//         "title" => "New Jersey",
//         "author" => "Bon Jovi",
//         "year" => 1988,
//         "img" => "https://images-na.ssl-images-amazon.com/images/I/51sBr4IWDwL.jpg",
//         "genre" => "Rock"
//     ],
//     [
//         "title" => "Live at Wembley 86",
//         "author" => "Queen",
//         "year" => 1992,
//         "img" => "https://images-na.ssl-images-amazon.com/images/I/71g40mlbinL._SX355_.jpg",
//         "genre" => "Pop"
//     ],
//     [
//         "title" => "Ten\"s Summoner\"s Tales",
//         "author" => "Sting",
//         "year" => 1993,
//         "img" => "https://images-na.ssl-images-amazon.com/images/I/411BQR6BHRL.jpg",
//         "genre" => "Pop"
//     ],
//     [
//         "title" => "Steve Gadd band",
//         "author" => "Steve Gadd Band",
//         "year" => 2018,
//         "img" => "https://m.media-amazon.com/images/I/81UtLzBDoEL._SS500_.jpg",
//         "genre" => "Jazz"
//     ],
//     [
//         "title" => "Brave new World",
//         "author" => "Iron Maiden",
//         "year" => 2000,
//         "img" => "https://upload.wikimedia.org/wikipedia/en/0/03/Iron_Maiden_-_Brave_New_World.jpg",
//         "genre" => "Metal"
//     ],
//     [
//         "title" => "One more car, one more rider",
//         "author" => "Eric Clapton",
//         "year" => 2002,
//         "img" => "https://images-na.ssl-images-amazon.com/images/I/81MDAIdh78L._SY355_.jpg",
//         "genre" => "Rock"
//     ]
// ];

header('Access-Control-Allow-Origin: *');

$dischi = file_get_contents('dischi.json');

// $dischi = json_decode($string, true);

// header('Content-Type: application/json');

// echo $dischi;


$elaborareDati = false;

$response = $dischi;

if ($elaborareDati) {
    $dischi = json_decode($string, true);

    // evenuale filtraggio 

    $response = json_encode($dischi);
}

header('Content-Type: application/json');

echo $response;

