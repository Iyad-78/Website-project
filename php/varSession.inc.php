<?php
session_start();

// Tableau des catégories
$categories = array(
  array(
    "id" => 1,
    "type" => "Chocolat blanc",
    "produits" => array(
      array(
        "id" => 101,
        "nom" => "Chocolat blanc aux noix",
        "prix" => 10,
        "description" => "Un chocolat blanc onctueux et fondant, agrémenté de noix croquantes.",
		"stock" => 20,
      ),
      array(
        "id" => 102,
        "nom" => "Chocolat blanc aux amandes",
        "prix" => 12,
        "description" => "Un chocolat blanc délicat et parfumé, avec des amandes entières.",
		"stock" => 20,
      ),
      array(
        "id" => 103,
        "nom" => "Chocolat blanc nature",
        "prix" => 8,
        "description" => "Un chocolat blanc simple et savoureux, à la saveur pure et authentique.",
		"stock" => 20,
      ),
      array(
        "id" => 104,
        "nom" => "Chocolat blanc à la noisette",
        "prix" => 9,
        "description" => "Un chocolat blanc onctueux et gourmand, parsemé d'éclats de noisettes.",
		"stock" => 20,
      ),
      array(
        "id" => 105,
        "nom" => "Chocolat blanc praliné",
        "prix" => 11,
        "description" => "Un chocolat blanc irrésistible, avec une ganache praliné onctueuse et fondante.",
		"stock" => 20,
      ),
    ),
  ),
  
  array(
    "id" => 2,
    "type" => "Chocolat au lait",
    "produits" => array(
      array(
        "id" => 201,
        "nom" => "Chocolat au lait aux fruits",
        "prix" => 10,
        "description" => "Un chocolat au lait onctueux et savoureux, agrémenté de fruits savoureux.",
		"stock" => 20,
      ),
      array(
        "id" => 202,
        "nom" => "Chocolat au lait aux caramel",
        "prix" => 12,
        "description" => "Un chocolat au lait délicat et parfumé, avec du caramel onctueux.",
		"stock" => 20,
      ),
      array(
        "id" => 203,
        "nom" => "Chocolat au lait nature",
        "prix" => 8,
        "description" => "Un chocolat lait simple et savoureux, à la saveur pure et authentique.",
		"stock" => 20,
      ),
      array(
        "id" => 204,
        "nom" => "Chocolat au lait à la noisette",
        "prix" => 9,
        "description" => "Un chocolat au lait gourmand et parfumé, avec des éclats de noisette.",
		"stock" => 20,
      ),
      array(
        "id" => 205,
        "nom" => "Chocolat au lait praliné",
        "prix" => 11,
        "description" => "Un chocolat au lait onctueux et fondant, avec une ganache praliné irrésistible.",
		"stock" => 20,
      ),
    ),
  ),

  array(
    "id" => 3,
    "type" => "Chocolat noir",
    "produits" => array(
      array(
        "id" => 301,
        "nom" => "Chocolat noir aux noix",
        "prix" => 12,
        "description" => "Un chocolat noir intense et savoureux, agrémenté de noix croquantes.",
		"stock" => 20,
      ),
      array(
        "id" => 302,
        "nom" => "Chocolat noir aux amandes",
        "prix" => 14,
        "description" => "Un chocolat noir délicat et parfumé, avec des amandes entières.",
		"stock" => 20,
      ),
      array(
        "id" => 303,
        "nom" => "Chocolat noir nature",
        "prix" => 10,
        "description" => "Un chocolat noir intense et authentique, à la saveur pure et corsée.",
		"stock" => 20,
      ),
      array(
        "id" => 304,
        "nom" => "Chocolat noir à la noisette",
        "prix" => 11,
        "description" => "Un chocolat noir gourmand et intense, avec des éclats de noisette.",
		"stock" => 20,
      ),
      array(
        "id" => 305,
        "nom" => "Chocolat noir praliné",
        "prix" => 13,
        "description" => "Un chocolat noir intense et fondant, avec une ganache praliné croquante.",
		"stock" => 20,
      ),
    ),
  ),
 
$_SESSION['categories'] = $categories;

// Convertir en JSON
$jsonData = json_encode($categories);

// Écrire dans un fichier
file_put_contents('categories.json', $jsonData);

// Stocker dans la session
$_SESSION['categories'] = $categories;

?>
