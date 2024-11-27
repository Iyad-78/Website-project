$(document).ready(function() {
  // Function to handle adding/ordering a product
  function addToOrder(productID, quantity) {
    $.ajax({
      url: 'updateStock.php', // Replace with your actual AJAX endpoint
      method: 'POST',
      data: {
        productID: productID,
        quantity: quantity
      },
      success: function(response) {
        // Update stock display and handle any additional logic
        updateStockDisplay(productID, quantity);
        if (response.success) {
          // Display success message or perform other actions (if applicable)
          console.log("Stock updated successfully!");
        } else {
          // Display error message (if applicable)
          console.error("Error updating stock:", response.error);
        }
      },
      error: function(error) {
        console.error("AJAX error:", error);
      }
    });
  }

  // Function to update stock display
  function updateStockDisplay(productID, quantityChange) {
    // Implement logic to update the stock display for the product with productID
    // You can use DOM manipulation or update data attributes, etc.
    console.log("Updating stock display for product:", productID, "quantity change:", quantityChange);
  }

  // Attach click event handlers to "Ajouter / Commander" buttons
  $(document).on('click', '.add-order-button', function() {
    var productID = $(this).data('product-id');
    var quantity = $(this).data('quantity');

    addToOrder(productID, quantity);
  });
});
