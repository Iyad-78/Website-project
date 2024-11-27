<?php

// Include database connection variables
require_once('bddData.php');

// Function to update product stock
function updateProductStock($productID, $quantityChange) {
  if (!empty($productID) && is_numeric($quantityChange)) {
    $db = connectDB();

    // Prepare and execute the update query (replace with your actual query)
    $updateQuery = $db->prepare("UPDATE produits SET stock = stock + ? WHERE id = ?");
    $updateQuery->bind_param('ii', $quantityChange, $productID);
    $updateQuery->execute() or die('Error updating stock: ' . $db->error);

    disconnectDB($db);

    return true;
  } else {
    return false;
  }
}

// Check if AJAX request is valid
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $productID = intval($_POST['productID']);
  $quantityChange = intval($_POST['quantity']);

  $success = updateProductStock($productID, $quantityChange);

  $response = [
    'success' => $success,
    'error' => $success ? null : 'Error updating stock'
  ];

  echo json_encode($response);
} else {
  // Handle invalid request
  echo json_encode(['success' => false, 'error' => 'Invalid request']);
