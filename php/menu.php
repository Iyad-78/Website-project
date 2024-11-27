<?php
// Inclure le fichier des catégories
require_once('varSession.inc.php');
?>

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



<ul>
  <?php foreach ($categories as $categorie): ?>
    <li>
      <a href="produits.php?cat=<?php echo $categorie['id']; ?>">
        <?php echo $categorie['type']; ?>
      </a>
      <?php
        // Vérifier si la catégorie a des sous-catégories
        if (isset($categorie['sous_categories'])):
      ?>
        <ul>
          <?php foreach ($categorie['sous_categories'] as $sous_categorie): ?>
            <li>
              <a href="produits.php?cat=<?php echo $sous_categorie['id']; ?>">
                <?php echo $sous_categorie['nom']; ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </li>
  <?php endforeach; ?>
</ul>