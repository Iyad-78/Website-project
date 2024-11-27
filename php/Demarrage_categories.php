<?php
// Charger les données depuis le fichier JSON
$jsonData = file_get_contents('categories.json');

// Décoder les données JSON en tableau associatif
$categories = json_decode($jsonData, true);

// Vérifier si le décodage a réussi
if ($categories === null) {
    die('Erreur de chargement des données.');
}
?>