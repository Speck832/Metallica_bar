<?php
header('Content-Type: application/json');

$file = 'commande.json';

// Vérifie si le fichier existe
if (!file_exists($file)) {
    echo json_encode([]); // renvoie un tableau vide
    exit;
}

// Lit le contenu du JSON
$data = json_decode(file_get_contents($file), true);

// Vérifie si le contenu est valide
if (!is_array($data)) {
    echo json_encode([]);
    exit;
}

// Envoie les données JSON au navigateur
echo json_encode($data);