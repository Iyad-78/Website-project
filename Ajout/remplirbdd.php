<?php

// Process each HTML file (blanc.html, noir.html, lait.html)
foreach (['blanc.html', 'noir.html', 'lait.html'] as $fileName) {
  $htmlContent = file_get_contents($fileName);
  $document = new DOMDocument();
  $document->loadHTML($htmlContent);

  // Extract product information from the DOM object
  $listeProduits = $document->getElementsByTagName('li');
  foreach ($listeProduits as $produitElement) {
    $nomProduit = $produitElement->getElementsByTagName('h3')[0]->textContent; // Assuming product name is in the first 'h3' tag
    $prixProduit = $produitElement->getElementsByTagName('p')[1]->textContent; // Assuming product price is in the second 'p' tag

    // Extract product category from the file name
    $categorieProduit = ucfirst(str_replace('html', '', $fileName)); // Capitalize and remove 'html' from filename

    // Store product data in the array
    $productData[] = [
      'nom' => $nomProduit,
      'prix' => $prixProduit,
      'categorie' => $categorieProduit
    ];

    // Add category to the categories array if not already present (optional, depends on your logic)
    if (!in_array($categorieProduit, $categories)) {
      $categories[] = $categorieProduit;
    }
  }
}

// Include the file containing database functions (assuming it's named bdd.php)
require_once('bdd.php');

// Call the function from bdd.php to insert the extracted product data
insertProducts($productData);

echo "Données insérées dans la base de données avec succès!";

