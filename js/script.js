// script.js

document.addEventListener('DOMContentLoaded', function() {
  let images = document.querySelectorAll('.zoomable');

  images.forEach(function(image) {
      image.addEventListener('click', function() {
          this.classList.toggle('zoomed');
      });
  });

  // Ajout d'un gestionnaire d'événements pour les boutons "Ajouter au panier"
  let addToCartButtons = document.querySelectorAll('.add-to-cart');
  addToCartButtons.forEach(function(button) {
      button.addEventListener('click', function(event) {
          event.preventDefault(); // Empêcher le comportement par défaut du lien

          // Récupérer les informations du produit
          let productName = this.parentElement.querySelector('h3').innerText;
          let price = parseFloat(this.parentElement.querySelector('p').innerText.split(' ')[1]); // Récupérer le prix

          // Appeler la fonction addToCart avec les informations du produit
          addToCart(productName, 1, price);
      });
  });
});



// Fonction pour ajouter le produit au panier
function addToCart(productName, quantity, price) {
    // Créer un objet représentant le produit à ajouter au panier
    let quantity = parseInt(document.getElementById('quantity').value);

    let product = {
      name: productName,
      quantity: quantity,
      price: price
    };
  
    // Récupérer le panier depuis le stockage local s'il existe, sinon initialiser un panier vide
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
  
    // Vérifier si le produit est déjà dans le panier
    let existingProductIndex = cart.findIndex(item => item.name === product.name);
  
    if (existingProductIndex !== -1) {
      // Si le produit existe déjà dans le panier, mettre à jour la quantité
      cart[existingProductIndex].quantity += product.quantity;
    } else {
      // Sinon, ajouter le produit au panier
      cart.push(product);
    }
  
    // Mettre à jour le panier dans le stockage local
    localStorage.setItem('cart', JSON.stringify(cart));
  
    // Afficher un message de confirmation ou mettre à jour l'interface utilisateur
    alert('Le produit a été ajouté au panier !');
}



// Fonction pour vérifier le formulaire de contact
function validateForm() {
  let nomInput = document.getElementById('nom');
  let emailInput = document.getElementById('email');
  let messageInput = document.getElementById('message');
  let isValid = true;

  // Vérification du nom
  if (nomInput.value === '') {
    nomInput.style.borderColor = 'red';
    isValid = false;
  } else {
    nomInput.style.borderColor = '';
  }

  // Vérification de l'email
  if(emailInput.value=="") {
    email.style.border="1px solid red";
    document.getElementById("erreurEmail").innerHTML="E-mail invalide ou vide";
    erreur=true;
  }

  // Vérification du message
  if (messageInput.value === '') {
    messageInput.style.borderColor = 'red';
    isValid = false;
  } else {
    messageInput.style.borderColor = '';
  }

  return isValid;
}

document.getElementById('toggleStock').addEventListener('click', function() {
  let stockCells = document.querySelectorAll('.stock');
  stockCells.forEach(function(cell) {
    cell.classList.toggle('hidden');
  });
});

document.getElementById('productList').addEventListener('click', function(event) {
  if (event.target.tagName === 'A') {
    event.preventDefault();
    addToCart();
  }
});

document.querySelector('form').addEventListener('submit', function(event) {
  if (!validateForm()) {
    event.preventDefault();
  }
});