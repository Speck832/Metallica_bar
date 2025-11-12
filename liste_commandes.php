<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Commandes</title>
    <link rel="stylesheet" href="./liste.css">
</head>
<body>
<header>
    <h1>Liste des Commandes</h1>
</header>

<div id="contenu">
    <p id="message">Chargement des commandes...</p>
</div>

<script>
// Fonction pour charger les commandes depuis le serveur
async function chargerCommandes() {
    try {
        const reponse = await fetch('get_commandes.php'); // On appelle le fichier PHP
        const data = await reponse.json();

        const zone = document.getElementById('contenu');

        if (!data || Object.keys(data).length === 0) {
            zone.innerHTML = '<p id="message">Aucune commande trouvée.</p>';
            return;
        }

        let html = '';
        for (const [nom, valeur] of Object.entries(data)) {
            html += `<div><strong>${nom}</strong> → ${valeur}</div>`;
        }

        zone.innerHTML = html;
    } catch (erreur) {
        console.error('Erreur de chargement des commandes :', erreur);
        document.getElementById('contenu').innerHTML = '<p>Erreur lors du chargement.</p>';
    }
}

// Charger immédiatement les commandes
chargerCommandes();

// Et recharger toutes les 5 secondes
setInterval(chargerCommandes, 5000);
</script>

</body>
</html>