// Global state
let currentView = 'landing';
let isLoggedIn = false;
let user = null;
let cartItems = [];
let isCartOpen = false;

// Product data (matching the React app exactly)
const products = [
    {
        id: 1,
        name: "Premium Coconut Oil",
        description: "Virgin coconut oil, cold-pressed from fresh coconuts. Rich in MCTs and perfect for cooking and hair care.",
        price: 299,
        originalPrice: 349,
        category: "Coconut Oil",
        image: "https://images.unsplash.com/photo-1582362731452-00153041a324?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb2NvbnV0JTIwb2lsJTIwY29va2luZyUyMGhlYWx0aHl8ZW58MXx8fHwxNzU1NjAzNjQ0fDA&ixlib=rb-4.1.0&q=80&w=1080",
        rating: 4.8,
        reviews: 234
    },
    {
        id: 2,
        name: "Cold-Pressed Groundnut Oil",
        description: "Pure groundnut (peanut) oil extracted using traditional methods. High smoke point, ideal for deep frying.",
        price: 189,
        originalPrice: 219,
        category: "Groundnut Oil",
        image: "https://images.unsplash.com/photo-1634045793583-176ea8dc055b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxncm91bmRudXQlMjBwZWFudXQlMjBvaWwlMjBjb29raW5nfGVufDF8fHx8MTc1NTg0MTMxOHww&ixlib=rb-4.1.0&q=80&w=1080",
        rating: 4.6,
        reviews: 189
    },
    {
        id: 3,
        name: "Organic Sesame Oil",
        description: "Aromatic sesame oil, perfect for tempering and adding authentic flavor to traditional Indian dishes.",
        price: 259,
        category: "Sesame Oil",
        image: "https://images.unsplash.com/photo-1587717415723-8c89fe42c76c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxvbGl2ZSUyMG9pbCUyMGJvdHRsZSUyMGNvb2tpbmd8ZW58MXx8fHwxNzU1NjAzNjQ0fDA&ixlib=rb-4.1.0&q=80&w=1080",
        rating: 4.7,
        reviews: 156
    },
    {
        id: 4,
        name: "Premium Sunflower Oil",
        description: "Light and versatile sunflower oil. Rich in Vitamin E, perfect for everyday cooking and baking.",
        price: 179,
        originalPrice: 199,
        category: "Sunflower Oil",
        image: "https://images.unsplash.com/photo-1684853807644-428f89ce35fc?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzdW5mbG93ZXIlMjBvaWwlMjBib3R0bGUlMjBraXRjaGVufGVufDF8fHx8MTc1NTYwMzY0NHww&ixlib=rb-4.1.0&q=80&w=1080",
        rating: 4.5,
        reviews: 201
    },
    {
        id: 5,
        name: "Pure Mustard Oil",
        description: "Kachi Ghani mustard oil with its distinctive pungent flavor. Traditional favorite for Bengali cuisine.",
        price: 229,
        originalPrice: 269,
        category: "Mustard Oil",
        image: "https://images.unsplash.com/photo-1711374489633-1f3659ebe757?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtdXN0YXJkJTIwb2lsJTIwYm90dGxlJTIwZ29sZGVufGVufDF8fHx8MTc1NTg0MTMxMHww&ixlib=rb-4.1.0&q=80&w=1080",
        rating: 4.9,
        reviews: 178
    },
    {
        id: 6,
        name: "Extra Virgin Olive Oil",
        description: "Premium extra virgin olive oil from Mediterranean olives. Perfect for salads and low-heat cooking.",
        price: 449,
        originalPrice: 499,
        category: "Olive Oil",
        image: "https://images.unsplash.com/photo-1587717415723-8c89fe42c76c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxvbGl2ZSUyMG9pbCUyMGJvdHRsZSUyMGNvb2tpbmd8ZW58MXx8fHwxNzU1NjAzNjQ0fDA&ixlib=rb-4.1.0&q=80&w=1080",
        rating: 4.8,
        reviews: 267
    },
    {
        id: 7,
        name: "Rice Bran Oil",
        description: "Heart-healthy rice bran oil with natural antioxidants. High smoke point, ideal for all cooking methods.",
        price: 199,
        category: "Rice Bran Oil",
        image: "https://images.unsplash.com/photo-1648788767168-aa2df5105037?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxyaWNlJTIwYnJhbiUyMG9pbCUyMGhlYWx0aHklMjBjb29raW5nfGVufDF8fHx8MTc1NTg0MTMyMXww&ixlib=rb-4.1.0&q=80&w=1080",
        rating: 4.4,
        reviews: 123
    },
    {
        id: 8,
        name: "Premium Avocado Oil",
        description: "Luxury avocado oil rich in monounsaturated fats. Perfect for high-heat cooking and grilling.",
        price: 599,
        originalPrice: 649,
        category: "Avocado Oil",
        image: "https://images.unsplash.com/photo-1610109790326-9a21dfe969b7?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb29raW5nJTIwb2lsJTIwYm90dGxlcyUyMHZhcmlldHl8ZW58MXx8fHwxNzU1NjAzNjQ1fDA&ixlib=rb-4.1.0&q=80&w=1080",
        rating: 4.9,
        reviews: 98
    },
    {
        id: 9,
        name: "Cold-Pressed Flaxseed Oil",
        description: "Omega-3 rich flaxseed oil. Perfect supplement for salads and smoothies. Not for heating.",
        price: 399,
        category: "Flaxseed Oil",
        image: "https://images.unsplash.com/photo-1582362731452-00153041a324?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb2NvbnV0JTIwb2lsJTIwY29va2luZyUyMGhlYWx0aHl8ZW58MXx8fHwxNzU1NjAzNjQ0fDA&ixlib=rb-4.1.0&q=80&w=1080",
        rating: 4.6,
        reviews: 87
    },
    {
        id: 10,
        name: "Organic Castor Oil",
        description: "Pure castor oil for hair and skin care. Natural moisturizer with therapeutic properties.",
        price: 179,
        category: "Castor Oil",
        image: "https://images.unsplash.com/photo-1587717415723-8c89fe42c76c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxvbGl2ZSUyMG9pbCUyMGJvdHRsZSUyMGNvb2tpbmd8ZW58MXx8fHwxNzU1NjAzNjQ0fDA&ixlib=rb-4.1.0&q=80&w=1080",
        rating: 4.3,
        reviews: 145
    },
    {
        id: 11,
        name: "Premium Almond Oil",
        description: "Sweet almond oil for cooking and cosmetic use. Rich in Vitamin E and healthy fats.",
        price: 549,
        originalPrice: 599,
        category: "Almond Oil",
        image: "https://images.unsplash.com/photo-1610109790326-9a21dfe969b7?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb29raW5nJTIwb2lsJTIwYm90dGxlcyUyMHZhcmlldHl8ZW58MXx8fHwxNzU1NjAzNjQ1fDA&ixlib=rb-4.1.0&q=80&w=1080",
        rating: 4.7,
        reviews: 76
    },
    {
        id: 12,
        name: "Black Sesame Oil",
        description: "Traditional black sesame oil with intense flavor. Ideal for Ayurvedic cooking and oil pulling.",
        price: 329,
        category: "Sesame Oil",
        image: "https://images.unsplash.com/photo-1587717415723-8c89fe42c76c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxvbGl2ZSUyMG9pbCUyMGJvdHRsZSUyMGNvb2tpbmd8ZW58MXx8fHwxNzU1NjAzNjQ0fDA&ixlib=rb-4.1.0&q=80&w=1080",
        rating: 4.8,
        reviews: 92
    }
];

// Initialize app when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

function initializeApp() {
    // Load saved state from localStorage
    loadState();
    
    // Initialize UI based on state
    updateUI();
    
    // Initialize event listeners
    initializeEventListeners();
    
    // Render products
    renderProducts();
    
    console.log('Poorna Oils app initialized');
}

function loadState() {
    const savedState = localStorage.getItem('poornaOilsState');
    if (savedState) {
        try {
            const state = JSON.parse(savedState);
            isLoggedIn = state.isLoggedIn || false;
            user = state.user || null;
            cartItems = state.cartItems || [];
            currentView = state.currentView || 'landing';
        } catch (e) {
            console.error('Error loading state:', e);
        }
    }
}

function saveState() {
    const state = {
        isLoggedIn,
        user,
        cartItems,
        currentView
    };
    localStorage.setItem('poornaOilsState', JSON.stringify(state));
}

function updateUI() {
    // Update header based on login status
    const loginButton = document.getElementById('login-button');
    const cartButton = document.getElementById('cart-button');
    const userMenuContainer = document.getElementById('user-menu-container');
    const shopNowText = document.getElementById('shop-now-text');
    
    if (isLoggedIn && user) {
        // Show logged-in state
        loginButton.classList.add('hidden');
        cartButton.classList.remove('hidden');
        userMenuContainer.classList.remove('hidden');
        
        // Update user info
        const userAvatar = document.getElementById('user-avatar');
        const userName = document.getElementById('user-name');
        const userMenuName = document.getElementById('user-menu-name');
        const userMenuEmail = document.getElementById('user-menu-email');
        
        if (userAvatar) userAvatar.textContent = user.name.charAt(0).toUpperCase();
        if (userName) userName.textContent = user.name;
        if (userMenuName) userMenuName.textContent = user.name;
        if (userMenuEmail) userMenuEmail.textContent = user.email;
        
        // Update shop now button
        if (shopNowText) shopNowText.textContent = 'Shop Now';
    } else {
        // Show logged-out state
        loginButton.classList.remove('hidden');
        cartButton.classList.add('hidden');
        userMenuContainer.classList.add('hidden');
        
        // Update shop now button
        if (shopNowText) shopNowText.textContent = 'Sign In to Shop';
    }
    
    // Update cart
    updateCartDisplay();
    
    // Update view
    updateViewDisplay();
}

function updateViewDisplay() {
    const mainContent = document.getElementById('main-content');
    const loginPage = document.getElementById('login-page');
    const signupPage = document.getElementById('signup-page');
    
    // Hide all views
    mainContent.classList.add('hidden');
    loginPage.classList.add('hidden');
    signupPage.classList.add('hidden');
    
    // Show current view
    switch (currentView) {
        case 'login':
            loginPage.classList.remove('hidden');
            break;
        case 'signup':
            signupPage.classList.remove('hidden');
            break;
        default:
            mainContent.classList.remove('hidden');
            break;
    }
}

function initializeEventListeners() {
    // Search functionality
    const searchInput = document.getElementById('search-input');
    if (searchInput) {
        searchInput.addEventListener('input', debounce(filterProducts, 300));
    }
    
    // Filter functionality
    const categoryFilter = document.getElementById('category-filter');
    const sortFilter = document.getElementById('sort-filter');
    
    if (categoryFilter) {
        categoryFilter.addEventListener('change', filterProducts);
    }
    
    if (sortFilter) {
        sortFilter.addEventListener('change', filterProducts);
    }
    
    // Login form
    const loginForm = document.getElementById('login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', handleLoginSubmit);
    }
    
    // Signup form
    const signupForm = document.getElementById('signup-form');
    if (signupForm) {
        signupForm.addEventListener('submit', handleSignupSubmit);
    }
    
    // Close cart when clicking outside
    document.addEventListener('click', function(e) {
        const userMenu = document.getElementById('user-menu');
        const userMenuContainer = document.getElementById('user-menu-container');
        
        if (userMenu && !userMenuContainer.contains(e.target)) {
            userMenu.classList.add('hidden');
        }
    });
    
    // Escape key to close modals
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const userMenu = document.getElementById('user-menu');
            if (userMenu) userMenu.classList.add('hidden');
            
            if (isCartOpen) {
                toggleCart();
            }
        }
    });
}

// Authentication functions
function handleLogin(email, password) {
    // Simulate login logic (matching React app)
    const userName = email.split('@')[0].replace(/[._]/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
    user = { name: userName, email };
    isLoggedIn = true;
    currentView = 'landing';
    
    saveState();
    updateUI();
    
    showToast('Successfully logged in!');
}

function handleSignup(name, email, password) {
    // Simulate signup logic (matching React app)
    user = { name, email };
    isLoggedIn = true;
    currentView = 'landing';
    
    saveState();
    updateUI();
    
    showToast('Account created successfully!');
}

function handleGoogleAuth() {
    // Simulate Google authentication (matching React app)
    const mockUser = {
        name: "Google User",
        email: "user@gmail.com"
    };
    user = mockUser;
    isLoggedIn = true;
    currentView = 'landing';
    
    saveState();
    updateUI();
    
    showToast('Successfully signed in with Google!');
}

function handleLogout() {
    isLoggedIn = false;
    user = null;
    cartItems = [];
    currentView = 'landing';
    
    saveState();
    updateUI();
    
    showToast('Successfully logged out');
}

function showLogin() {
    currentView = 'login';
    updateViewDisplay();
}

function showSignup() {
    currentView = 'signup';
    updateViewDisplay();
}

function handleShopNow() {
    if (isLoggedIn) {
        // Scroll to products section
        const productsSection = document.getElementById('products');
        if (productsSection) {
            productsSection.scrollIntoView({ behavior: 'smooth' });
        }
    } else {
        showLogin();
    }
}

// Form submission handlers
function handleLoginSubmit(e) {
    e.preventDefault();
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;
    
    if (email && password) {
        handleLogin(email, password);
    }
}

function handleSignupSubmit(e) {
    e.preventDefault();
    const name = document.getElementById('signup-name').value;
    const email = document.getElementById('signup-email').value;
    const password = document.getElementById('signup-password').value;
    const agreeTerms = document.getElementById('agree-terms').checked;
    
    if (name && email && password && agreeTerms) {
        handleSignup(name, email, password);
    } else if (!agreeTerms) {
        showToast('Please agree to the terms and conditions', 'error');
    }
}

// Product functions
function renderProducts() {
    const grid = document.getElementById('products-grid');
    if (!grid) return;
    
    const filteredProducts = getFilteredProducts();
    
    grid.innerHTML = '';
    
    if (filteredProducts.length === 0) {
        grid.innerHTML = `
            <div class="col-span-full text-center py-12">
                <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="h-8 w-8 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <p class="text-emerald-600 text-lg">No oils found matching your criteria.</p>
                <p class="text-emerald-500">Try adjusting your search or filters.</p>
            </div>
        `;
        return;
    }
    
    filteredProducts.forEach(product => {
        const productCard = createProductCard(product);
        grid.appendChild(productCard);
    });
}

function createProductCard(product) {
    const div = document.createElement('div');
    
    const discount = product.originalPrice 
        ? Math.round(((product.originalPrice - product.price) / product.originalPrice) * 100)
        : 0;

    const stars = generateStars(product.rating);
    
    const buttonText = isLoggedIn ? 'Add to Cart' : 'Sign In to Buy';
    const buttonIcon = isLoggedIn ? '🛒' : '🔒';
    const buttonClass = isLoggedIn 
        ? 'bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white'
        : 'bg-gray-100 hover:bg-gray-200 text-gray-600';
    const buttonAction = isLoggedIn ? `addToCart(${product.id})` : 'showLogin()';

    div.className = 'bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border-0 hover:scale-105';
    div.innerHTML = `
        <div class="relative">
            <img src="${product.image}" alt="${product.name}" class="w-full h-48 object-cover hover:scale-110 transition-transform duration-500" />
            
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
            
            ${discount > 0 ? `<span class="absolute top-3 left-3 bg-red-500 text-white px-2 py-1 rounded-full text-sm shadow-lg">-${discount}%</span>` : ''}
            
            <span class="absolute top-3 right-3 bg-emerald-100 text-emerald-800 px-2 py-1 rounded-full text-sm shadow-lg">${product.category}</span>
        </div>
        
        <div class="p-5 space-y-4 bg-gradient-to-b from-white to-emerald-50/50">
            <div class="flex items-center space-x-1">
                ${stars}
                <span class="text-sm text-emerald-600 ml-2 font-medium">${product.rating} (${product.reviews})</span>
            </div>
            
            <h3 class="text-lg text-emerald-800 font-semibold hover:text-emerald-900 transition-colors">${product.name}</h3>
            
            <p class="text-sm text-emerald-600 line-clamp-2 leading-relaxed">${product.description}</p>
            
            <div class="flex items-center justify-between pt-2">
                <div class="space-x-2">
                    <span class="text-xl font-bold text-emerald-700">₹${product.price}</span>
                    ${product.originalPrice ? `<span class="text-sm text-gray-500 line-through">₹${product.originalPrice}</span>` : ''}
                </div>
                
                <button onclick="${buttonAction}" 
                        class="${buttonClass} px-4 py-2 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 text-sm font-medium">
                    ${buttonIcon} ${buttonText}
                </button>
            </div>

            ${!isLoggedIn ? '<div class="text-center pt-2"><p class="text-xs text-amber-600 font-medium">🔒 Login required to purchase</p></div>' : ''}
        </div>
    `;
    
    return div;
}

function generateStars(rating) {
    const fullStars = Math.floor(rating);
    const hasHalfStar = rating % 1 !== 0;
    let starsHtml = '';
    
    for (let i = 0; i < fullStars; i++) {
        starsHtml += '<span class="text-amber-400">★</span>';
    }
    
    if (hasHalfStar) {
        starsHtml += '<span class="text-amber-400">☆</span>';
    }
    
    const emptyStars = 5 - Math.ceil(rating);
    for (let i = 0; i < emptyStars; i++) {
        starsHtml += '<span class="text-gray-300">☆</span>';
    }
    
    return starsHtml;
}

function getFilteredProducts() {
    const searchTerm = document.getElementById('search-input')?.value.toLowerCase() || '';
    const selectedCategory = document.getElementById('category-filter')?.value || 'all';
    const sortBy = document.getElementById('sort-filter')?.value || 'name';
    
    let filteredProducts = products.filter(product => {
        const matchesSearch = product.name.toLowerCase().includes(searchTerm) || 
                            product.description.toLowerCase().includes(searchTerm);
        const matchesCategory = selectedCategory === 'all' || product.category === selectedCategory;
        return matchesSearch && matchesCategory;
    });
    
    // Sort products
    filteredProducts.sort((a, b) => {
        switch (sortBy) {
            case 'price-low':
                return a.price - b.price;
            case 'price-high':
                return b.price - a.price;
            case 'rating':
                return b.rating - a.rating;
            default:
                return a.name.localeCompare(b.name);
        }
    });
    
    return filteredProducts;
}

function filterProducts() {
    renderProducts();
}

// Cart functions
function addToCart(productId) {
    if (!isLoggedIn) {
        showLogin();
        return;
    }

    const product = products.find(p => p.id === productId);
    if (!product) return;

    const existingItem = cartItems.find(item => item.id === productId);
    
    if (existingItem) {
        existingItem.quantity += 1;
        showToast(`Updated ${product.name} quantity in cart`);
    } else {
        cartItems.push({ ...product, quantity: 1 });
        showToast(`Added ${product.name} to cart`);
    }
    
    saveState();
    updateCartDisplay();
}

function updateCartItemQuantity(productId, quantity) {
    if (quantity === 0) {
        removeFromCart(productId);
        return;
    }

    const item = cartItems.find(item => item.id === productId);
    if (item) {
        item.quantity = quantity;
        saveState();
        updateCartDisplay();
    }
}

function removeFromCart(productId) {
    const item = cartItems.find(item => item.id === productId);
    if (item) {
        showToast(`Removed ${item.name} from cart`);
    }
    
    cartItems = cartItems.filter(item => item.id !== productId);
    saveState();
    updateCartDisplay();
}

function getTotalCartItems() {
    return cartItems.reduce((total, item) => total + item.quantity, 0);
}

function getCartTotal() {
    return cartItems.reduce((total, item) => total + (item.price * item.quantity), 0);
}

function updateCartDisplay() {
    // Update cart count
    const cartCount = document.getElementById('cart-count');
    const totalItems = getTotalCartItems();
    
    if (cartCount) {
        if (totalItems > 0) {
            cartCount.textContent = totalItems;
            cartCount.classList.remove('hidden');
        } else {
            cartCount.classList.add('hidden');
        }
    }
    
    // Update cart items
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    
    if (cartItemsContainer) {
        if (cartItems.length === 0) {
            cartItemsContainer.innerHTML = `
                <div class="text-center py-8 text-gray-500">
                    <svg class="h-12 w-12 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5-6m0 0L4 5M7 13h10"/>
                    </svg>
                    <p>Your cart is empty</p>
                </div>
            `;
        } else {
            cartItemsContainer.innerHTML = `
                <div class="space-y-3">
                    ${cartItems.map(item => createCartItemHTML(item)).join('')}
                </div>
            `;
        }
    }
    
    if (cartTotal) {
        cartTotal.textContent = `₹${getCartTotal()}`;
    }
}

function createCartItemHTML(item) {
    return `
        <div class="flex items-center space-x-3 p-3 bg-emerald-50 rounded-lg">
            <img src="${item.image}" alt="${item.name}" class="w-16 h-16 object-cover rounded-lg" />
            <div class="flex-1">
                <h4 class="font-medium text-emerald-800 text-sm">${item.name}</h4>
                <p class="text-emerald-600 text-sm">₹${item.price}</p>
                <div class="flex items-center space-x-2 mt-2">
                    <button onclick="updateCartItemQuantity(${item.id}, ${item.quantity - 1})" 
                            class="w-6 h-6 rounded-full bg-emerald-200 hover:bg-emerald-300 flex items-center justify-center text-emerald-700 text-sm">-</button>
                    <span class="text-sm font-medium text-emerald-800 w-8 text-center">${item.quantity}</span>
                    <button onclick="updateCartItemQuantity(${item.id}, ${item.quantity + 1})" 
                            class="w-6 h-6 rounded-full bg-emerald-200 hover:bg-emerald-300 flex items-center justify-center text-emerald-700 text-sm">+</button>
                </div>
            </div>
            <div class="text-right">
                <p class="font-medium text-emerald-800 text-sm">₹${item.price * item.quantity}</p>
                <button onclick="removeFromCart(${item.id})" 
                        class="text-red-500 hover:text-red-700 text-xs mt-1">Remove</button>
            </div>
        </div>
    `;
}

function toggleCart() {
    const cartSidebar = document.getElementById('cart-sidebar');
    const cartBackdrop = document.getElementById('cart-backdrop');
    
    if (!cartSidebar || !cartBackdrop) return;
    
    isCartOpen = !isCartOpen;
    
    if (isCartOpen) {
        cartSidebar.classList.remove('translate-x-full');
        cartBackdrop.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    } else {
        cartSidebar.classList.add('translate-x-full');
        cartBackdrop.classList.add('hidden');
        document.body.style.overflow = '';
    }
}

// UI Helper functions
function toggleUserMenu() {
    const userMenu = document.getElementById('user-menu');
    if (userMenu) {
        userMenu.classList.toggle('hidden');
    }
}

function togglePassword(inputId) {
    const passwordInput = document.getElementById(inputId);
    const eyeIcon = passwordInput.nextElementSibling;
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.innerHTML = `
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>
            </svg>
        `;
    } else {
        passwordInput.type = 'password';
        eyeIcon.innerHTML = `
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
        `;
    }
}

// Toast notification system
function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container');
    if (!container) return;
    
    const toast = document.createElement('div');
    toast.className = `max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden transform translate-x-full`;
    
    const bgColor = type === 'success' ? 'bg-emerald-50' : type === 'error' ? 'bg-red-50' : 'bg-amber-50';
    const textColor = type === 'success' ? 'text-emerald-800' : type === 'error' ? 'text-red-800' : 'text-amber-800';
    const icon = type === 'success' ? '✓' : type === 'error' ? '✗' : '!';
    
    toast.innerHTML = `
        <div class="p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-5 h-5 ${bgColor} ${textColor} rounded-full flex items-center justify-center text-xs font-bold">
                        ${icon}
                    </div>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p class="text-sm font-medium text-gray-900">${message}</p>
                </div>
                <div class="ml-4 flex-shrink-0 flex">
                    <button onclick="removeToast(this)" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none">
                        <span class="sr-only">Close</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    `;
    
    container.appendChild(toast);
    
    // Animate in
    setTimeout(() => {
        toast.classList.remove('translate-x-full');
        toast.classList.add('translate-x-0');
    }, 100);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        removeToast(toast.querySelector('button'));
    }, 5000);
}

function removeToast(button) {
    const toast = button.closest('.max-w-sm');
    if (toast) {
        toast.classList.add('translate-x-full');
        setTimeout(() => {
            toast.remove();
        }, 300);
    }
}

// Utility functions
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// CSS class utility for line-clamp
if (!document.head.querySelector('[data-line-clamp]')) {
    const style = document.createElement('style');
    style.setAttribute('data-line-clamp', 'true');
    style.textContent = `
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    `;
    document.head.appendChild(style);
}