<?php
function recuperer_produits_par_categorie($id_categorie) {
  global $produits; // Assumer que $produits est un tableau contenant les données des produits

  $produits_filtres = array();
  foreach ($produits as $produit) {
    if ($produit['categorie_id'] == $id_categorie) {
      $produits_filtres[] = $produit;
    }
  }
  return $produits_filtres;
}

// Récupérer l'identifiant de la catégorie à partir du paramètre GET
$id_categorie = isset($_GET['cat']) ? (int)$_GET['cat'] : null;

// Implémenter la logique pour récupérer les produits de la catégorie sélectionnée
// En fonction de votre source de données (base de données, fichiers, etc.)
$produits = recuperer_produits_par_categorie($id_categorie);

?><?php echo ($id_categorie) ? "Produits de la catégorie " . $categories[$id_categorie]['nom'] : "Tous les produits"; ?>

<?php if ($produits): ?>
    <?php foreach ($produits as $produit): ?>