<?php
// Autoriser les requêtes depuis n'importe quelle origine (CORS)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Vérifie la méthode
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if ($data) {
        file_put_contents(__DIR__ . '/../data/cocktails.json', json_encode($data, JSON_PRETTY_PRINT));
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid data"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Only POST allowed"]);
}
?>