<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Commandes</title>
    <link rel="stylesheet" href="./liste.css">
</head>
<body>
<header>
    <h1 id="titre">Liste des Commandes</h1>
</header>
<?php
$file = 'commande.json';

// Vérifie si le fichier existe
if (!file_exists($file)) {
    echo "<p>Aucune commande trouvée.</p>";
    exit;
}

// Charge le contenu du JSON
$data = json_decode(file_get_contents($file), true);

// Vérifie si le JSON est valide
if (!is_array($data) || empty($data)) {
    echo "<p>Aucune commande trouvée.</p>";
    exit;
}

// Affiche chaque entrée
foreach ($data as $nom => $valeur) {
    echo "<div class='commande'>
            <strong>$nom</strong> → $valeur
          </div>";
}
?>

</body>
</html>