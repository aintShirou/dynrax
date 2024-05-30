const productContainer = document.querySelector('.view-product');
const cartItemElement = document.getElementById('cartItem');
const totalElement = document.getElementById('total');

const products = [ // Sample product data (replace with your actual data)
  {
    id: 1,
    image: "uploads/product1.jpg", // Replace with your image paths
    title: "Product 1",
    price: 19.99
  },
  {
    id: 2,
    image: "uploads/product2.jpg",
    title: "Product 2",
    price: 24.50
  },
  {
    id: 3,
    image: "uploads/product3.jpg",
    title: "Product 3",
    price: 39.95
  },
  // Add more product data here
];

let cartItems = []; // Array to store cart items

// Function to display products in the HTML
function displayProducts() {
  productContainer.innerHTML = products.map(generateProductHTML).join('');
}

// Function to generate product HTML (Reusable)
function generateProductHTML(product) {
  const { id, image, title, price } = product;
  return `
    <div class="product-box">
      <div class="img-product">
        <img class="images" src="${image}" alt="${title}">
      </div>
      <div class="product-details">
        <p class="product-title">${title}</p>
        <h2 class="product-price">₱ ${price.toFixed(2)}</h2>
        <button data-product-id="${id}">Add to Cart</button>
      </div>
    </div>
  `;
}

// Function to add product to cart
function addToCart(productId) {
  const existingItem = cartItems.find(item => item.id === productId);
  if (existingItem) {
      existingItem.quantity++; // Increment quantity if item exists
  } else {
      const product = products.find(item => item.id === productId); // Find product by ID
      if (product) {
          cartItems.push({ id: product.id, quantity: 1, image: product.image, title: product.title, price: product.price });
      }
  }
  updateCartDisplay();
}


// Function to remove item from cart
function removeFromCart(productId) {
  const itemIndex = cartItems.findIndex(item => item.id === productId);
  if (itemIndex !== -1) {
      cartItems.splice(itemIndex, 1); // Remove item from cartItems array
      updateCartDisplay(); // Update cart display after removing item
  }
}

// Add event listener to each cart item to remove it when clicked
cartItemElement.addEventListener('click', (event) => {
  const target = event.target;
  if (target.classList.contains('remove-item')) {
      const productId = parseInt(target.parentElement.dataset.productId, 10);
      removeFromCart(productId);
  }
});

// Function to update cart display and total
function updateCartDisplay() {
  let total = 0;
  const updatedCartItems = cartItems.filter(item => item.quantity > 0); // Remove items with quantity 0
  const cartItemText = updatedCartItems.length > 0 ?
      updatedCartItems.map(item => {
          console.log(item); // Log the cart item object
          return `
          <div class="cart-item" data-product-id="${item.id}" style="display: flex; align-items: center;">
          <p style="margin-right: 10px;">${item.quantity}x ${item.title} - ₱${item.price ? item.price.toFixed(2) : 'N/A'}</p>
          <div class="quantity-control">
              <button class="decrement-quantity" data-product-id="${item.id}" style="background-color: red; color: white; border: none; padding: 3px 6px; border-radius: 5px; cursor: pointer;">-</button>
              <span style="margin: 0 5px;">${item.quantity}</span>
              <button class="increment-quantity" data-product-id="${item.id}" style="background-color: green; color: white; border: none; padding: 3px 6px; border-radius: 5px; cursor: pointer;">+</button>
          </div>
          </div>
          `;
      }).join('') :
      'Your cart is Empty';

  cartItemElement.innerHTML = cartItemText;

  for (const item of updatedCartItems) {
      total += item.quantity * item.price;
  }

  totalElement.textContent = `₱ ${total.toFixed(2)}`;
}

// Add event listener to each cart item to remove it when clicked
cartItemElement.addEventListener('click', (event) => {
  const target = event.target;
  if (target.classList.contains('decrement-quantity')) {
      const productId = parseInt(target.dataset.productId, 10);
      console.log("Decrementing quantity for product ID:", productId);
      decrementQuantity(productId);
  } else if (target.classList.contains('increment-quantity')) {
      const productId = parseInt(target.dataset.productId, 10);
      console.log("Incrementing quantity for product ID:", productId);
      incrementQuantity(productId);
  }
});

// Function to decrement quantity
function decrementQuantity(productId) {
  const existingItem = cartItems.find(item => item.id === productId);
  if (existingItem && existingItem.quantity > 0) {
      existingItem.quantity--; // Decrement the quantity
      if (existingItem.quantity === 0) {
          removeFromCart(productId); // Remove item if quantity reaches 0
      }
      updateCartDisplay(); // Update cart display after decrementing
  }
}

// Function to increment quantity
function incrementQuantity(productId) {
  const existingItem = cartItems.find(item => item.id === productId);
  if (existingItem) {
      existingItem.quantity + 1;
      updateCartDisplay();
  }
}

// Function to remove item from cart
function removeFromCart(productId) {
  const itemIndex = cartItems.findIndex(item => item.id === productId);
  if (itemIndex !== -1) {
      cartItems.splice(itemIndex, 1); // Remove item from cartItems array
      updateCartDisplay(); // Update cart display after removing item
  }
}

// Add event listener for "Add to Cart" buttons
document.addEventListener('click', (event) => {
  const target = event.target;
  if (target.tagName === 'BUTTON' && target.dataset.productId) {
      const productId = parseInt(target.dataset.productId, 10);
      addToCart(productId);
  }
});

displayProducts();

const checkoutButton = document.getElementById('checkoutButton');

checkoutButton.addEventListener('click', () => {
  if (cartItems.length > 0) {
      // Confirmation message (Optional)
      alert('Thank you for your order!.');
      // Redirect to checkout page (Optional)
      // window.location.href = "your-checkout-page.html";
  } else {
      alert('Your cart is empty. Please add items to checkout.');
  }
});