<?php
header('Content-Type: application/json');

// Récupère le prénom envoyé en POST
$prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : '';

if ($prenom === '') {
    echo json_encode(['message' => 'Prénom manquant.']);
    exit;
}

$file = 'commande.json';

// Si le fichier n'existe pas, on crée un tableau vide
if (!file_exists($file)) {
    file_put_contents($file, '{}');
}

$data = json_decode(file_get_contents($file), true);

// Vérifie si le JSON est valide
if (!is_array($data)) {
    $data = [];
}

// Met à jour ou crée la variable
$data[$prenom] = "Lifeblood";

// Sauvegarde le fichier
file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo json_encode(['message' => "Commande enregistrée pour $prenom."]);
?>