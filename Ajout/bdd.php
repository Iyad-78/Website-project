<?php

// Include database connection variables
require_once('bddData.php');

// Function to insert products into the database
function insertProducts($productData) {
  if (!empty($productData)) {
    foreach ($productData as $product) {
      $nomProduit = $product['nom'];
      $prixProduit = $product['prix'];
      $categorieProduit = $product['categorie'];

      // Get category ID from 'categories' table (use function to retrieve)
      $categoryId = null;
      $categories = getAllCategories();  // Call the function to retrieve categories
      if ($categories != null) {
        foreach ($categories as $category) {
          if ($category['nom'] == $categorieProduit) {
            $categoryId = $category['id'];
            break;
          }
        }
      }

      if ($categoryId != null) {
        // Insert product into 'produits' table
        $insertProductQuery = "INSERT INTO produits (nom, description, prix, categorie_id, stock) VALUES ('" . $nomProduit . "', '', " . $prixProduit . ", " . $categoryId . ", 10)";
        $db = connectDB();  // Call the function to connect to the database
        $db->query($insertProductQuery) or die('Error inserting product: ' . $db->error);
        disconnectDB($db);  // Call the function to close the connection
      } else {
        echo "Error: Category not found for product: " . $nomProduit . "<br>";
      }
    }
  }
}


// Example usage (assuming $productData is populated from remplir.php)
insertProducts($productData);

echo "Données insérées dans la base de données avec succès!";
