<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
$user = $isLoggedIn ? $_SESSION['user'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poorna Oils - Pure Oils for a Healthy Life</title>
    <link rel="stylesheet" href="styles/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        green: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534'
                        },
                        yellow: {
                            400: '#facc15',
                            500: '#eab308',
                            600: '#ca8a04'
                        },
                        amber: {
                            50: '#fffbeb',
                            100: '#fef3c7',
                            200: '#fde68a'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="bg-gradient-to-r from-green-700 via-green-600 to-green-700 text-white relative overflow-hidden shadow-lg">
        <!-- Decorative wave -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1200 120" class="w-full h-8 fill-green-600">
                <path d="M0,96L48,80C96,64,192,32,288,37.3C384,43,480,85,576,90.7C672,96,768,64,864,58.7C960,53,1056,75,1152,80L1200,85.3L1200,120L1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
        
        <nav class="container mx-auto px-4 py-4 flex items-center justify-between relative z-10">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg">
                    <span class="text-xl">🌱</span>
                </div>
                <div>
                    <h1 class="text-xl font-bold">Poorna Oils</h1>
                    <p class="text-xs text-green-100">Pure Oils for a Healthy Life</p>
                </div>
            </div>
            
            <div class="hidden md:flex space-x-6">
                <a href="#home" class="hover:text-yellow-300 transition-colors relative group">
                    Home
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-300 transition-all group-hover:w-full"></span>
                </a>
                <a href="#about" class="hover:text-yellow-300 transition-colors relative group">
                    About
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-300 transition-all group-hover:w-full"></span>
                </a>
                <a href="#products" class="hover:text-yellow-300 transition-colors relative group">
                    Products
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-300 transition-all group-hover:w-full"></span>
                </a>
                <a href="#testimonials" class="hover:text-yellow-300 transition-colors relative group">
                    Reviews
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-300 transition-all group-hover:w-full"></span>
                </a>
                <a href="#contact" class="hover:text-yellow-300 transition-colors relative group">
                    Contact
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-300 transition-all group-hover:w-full"></span>
                </a>
            </div>
            
            <div class="flex items-center space-x-4">
                <?php if ($isLoggedIn): ?>
                    <button onclick="toggleCart()" class="text-white hover:text-yellow-300 relative">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5-6m0 0L4 5M7 13h10m0 0v6a1 1 0 01-1 1H8a1 1 0 01-1-1v-6m5-2V7a1 1 0 00-1-1H9a1 1 0 00-1 1v4h3z"/>
                        </svg>
                        <span id="cart-count" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center hidden">0</span>
                    </button>
                    
                    <div class="relative">
                        <button onclick="toggleUserMenu()" class="flex items-center space-x-2 text-white hover:text-yellow-300">
                            <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center text-green-800 font-bold">
                                <?php echo strtoupper(substr($user['name'], 0, 1)); ?>
                            </div>
                            <span class="hidden md:block"><?php echo htmlspecialchars($user['name']); ?></span>
                        </button>
                        
                        <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden z-50">
                            <div class="px-4 py-2 border-b">
                                <p class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($user['name']); ?></p>
                                <p class="text-xs text-gray-500"><?php echo htmlspecialchars($user['email']); ?></p>
                            </div>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Orders</a>
                            <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="login.php" class="bg-yellow-400 hover:bg-yellow-500 text-green-800 px-6 py-2 rounded-lg font-medium shadow-lg transition-colors">
                        Sign In
                    </a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="bg-gradient-to-br from-amber-50 via-green-50 to-yellow-50 py-16 relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-0 left-0 right-0">
            <svg viewBox="0 0 1200 120" class="w-full h-8 fill-green-50 rotate-180">
                <path d="M0,96L48,80C96,64,192,32,288,37.3C384,43,480,85,576,90.7C672,96,768,64,864,58.7C960,53,1056,75,1152,80L1200,85.3L1200,120L1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
        
        <div class="container mx-auto px-4 pt-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div class="space-y-4">
                        <div class="flex items-center space-x-2 text-green-700">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-lg font-medium">100% Natural & Pure</span>
                        </div>
                        
                        <h1 class="text-5xl lg:text-7xl text-green-800 leading-tight font-bold">
                            Pure Oils
                            <br />
                            <span class="text-yellow-600">for a</span>
                            <br />
                            Healthy Life
                        </h1>
                        
                        <p class="text-green-600 text-xl max-w-md leading-relaxed">
                            Discover our premium collection of cold-pressed, natural oils. 
                            From traditional coconut oil to exotic avocado oil - pure nutrition for your family.
                        </p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <?php if ($isLoggedIn): ?>
                            <button onclick="scrollToProducts()" class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white px-8 py-4 rounded-full text-lg shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                                Shop Now
                                <span class="ml-2">→</span>
                            </button>
                        <?php else: ?>
                            <a href="login.php" class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white px-8 py-4 rounded-full text-lg shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 text-center">
                                Sign In to Shop
                                <span class="ml-2">→</span>
                            </a>
                        <?php endif; ?>
                        
                        <button class="px-8 py-4 rounded-full text-lg border-2 border-green-600 text-green-700 hover:bg-green-50 shadow-lg transition-colors">
                            <svg class="inline h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                            </svg>
                            Watch Story
                        </button>
                    </div>

                    <!-- Trust indicators -->
                    <div class="grid grid-cols-3 gap-6 pt-8">
                        <div class="text-center">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                <svg class="h-6 w-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <p class="text-sm text-green-700 font-medium">100% Pure</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                <svg class="h-6 w-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <p class="text-sm text-green-700 font-medium">Cold Pressed</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                <svg class="h-6 w-6 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                            <p class="text-sm text-green-700 font-medium">Award Winning</p>
                        </div>
                    </div>
                </div>
                
                <div class="relative flex justify-center">
                    <div class="relative">
                        <!-- Main product image -->
                        <div class="relative z-10">
                            <img src="https://images.unsplash.com/photo-1587717415723-8c89fe42c76c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxvbGl2ZSUyMG9pbCUyMGJvdHRsZSUyMGNvb2tpbmd8ZW58MXx8fHwxNzU1NjAzNjQ0fDA&ixlib=rb-4.1.0&q=80&w=1080"
                                 alt="Premium Poorna Oils collection"
                                 class="w-96 h-96 object-cover rounded-2xl shadow-2xl" />
                            
                            <!-- Floating badge -->
                            <div class="absolute -top-4 -right-4 bg-yellow-400 text-green-800 px-4 py-2 rounded-full shadow-lg font-bold">
                                #1 Choice
                            </div>
                        </div>
                        
                        <!-- Decorative elements -->
                        <div class="absolute -top-6 -left-6 w-16 h-16 bg-green-200 rounded-full opacity-60 animate-pulse"></div>
                        <div class="absolute -bottom-8 -right-8 w-20 h-20 bg-yellow-200 rounded-full opacity-40"></div>
                        <div class="absolute top-1/2 -left-12 w-10 h-10 bg-amber-300 rounded-full opacity-50"></div>
                        
                        <!-- Background pattern -->
                        <div class="absolute inset-0 -z-10">
                            <div class="w-full h-full bg-gradient-to-br from-green-100 to-yellow-100 rounded-3xl opacity-30 transform rotate-3"></div>
                        </div>
                    </div>
                    
                    <!-- Floating product cards -->
                    <div class="absolute top-4 -left-8 bg-white p-3 rounded-lg shadow-lg animate-float">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                <span class="text-xs">🥥</span>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-green-800">Coconut Oil</p>
                                <p class="text-xs text-green-600">₹299</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="absolute bottom-4 -right-8 bg-white p-3 rounded-lg shadow-lg animate-float-delayed">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                                <span class="text-xs">🌻</span>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-green-800">Sunflower Oil</p>
                                <p class="text-xs text-green-600">₹199</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-16 bg-gradient-to-b from-white to-green-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <div class="flex items-center justify-center space-x-2 mb-4">
                    <svg class="h-6 w-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-green-600 font-medium">Product Showcase</span>
                </div>
                <h2 class="text-4xl text-green-800 mb-4 font-bold">Our Premium Oil Collection</h2>
                <p class="text-green-600 text-lg max-w-3xl mx-auto">
                    From traditional coconut oil to exotic avocado oil - discover our complete range of 
                    cold-pressed, natural oils for every cooking need and health benefit.
                </p>
            </div>

            <!-- Filters -->
            <div class="flex flex-col md:flex-row gap-4 mb-8 bg-white p-6 rounded-2xl shadow-lg">
                <div class="relative flex-1">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-green-400 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" id="search-input" placeholder="Search for oils..." 
                           class="pl-10 w-full px-4 py-2 border border-green-200 rounded-lg focus:border-green-400 focus:ring-2 focus:ring-green-400 focus:outline-none">
                </div>
                
                <select id="category-filter" 
                        class="px-4 py-2 border border-green-200 rounded-lg focus:border-green-400 focus:ring-2 focus:ring-green-400 focus:outline-none">
                    <option value="all">All Categories</option>
                    <option value="Coconut Oil">Coconut Oil</option>
                    <option value="Groundnut Oil">Groundnut Oil</option>
                    <option value="Sesame Oil">Sesame Oil</option>
                    <option value="Sunflower Oil">Sunflower Oil</option>
                    <option value="Mustard Oil">Mustard Oil</option>
                    <option value="Olive Oil">Olive Oil</option>
                    <option value="Rice Bran Oil">Rice Bran Oil</option>
                    <option value="Avocado Oil">Avocado Oil</option>
                </select>

                <select id="sort-filter" 
                        class="px-4 py-2 border border-green-200 rounded-lg focus:border-green-400 focus:ring-2 focus:ring-green-400 focus:outline-none">
                    <option value="name">Name A-Z</option>
                    <option value="price-low">Price: Low to High</option>
                    <option value="price-high">Price: High to Low</option>
                    <option value="rating">Highest Rated</option>
                </select>
            </div>

            <!-- Products Grid -->
            <div id="products-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Products will be loaded here by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-16 bg-gradient-to-b from-green-50 to-amber-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <div class="flex items-center justify-center space-x-2 mb-4">
                    <svg class="h-6 w-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.25 2.25a3 3 0 00-3 3v4.318a3 3 0 00.879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 005.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 00-2.122-.879H5.25zM6.375 7.5a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-green-600 font-medium">Customer Reviews</span>
                </div>
                <h2 class="text-4xl text-green-800 mb-4 font-bold">What Our Customers Say</h2>
                <p class="text-green-600 text-lg max-w-2xl mx-auto">
                    Real reviews from real customers who trust Poorna Oils for their daily cooking needs.
                </p>
            </div>

            <!-- Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-700 mb-2">5000+</div>
                    <p class="text-green-600">Happy Customers</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-yellow-600 mb-2">4.8★</div>
                    <p class="text-green-600">Average Rating</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-amber-600 mb-2">12+</div>
                    <p class="text-green-600">Oil Varieties</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-emerald-600 mb-2">100%</div>
                    <p class="text-green-600">Pure & Natural</p>
                </div>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex items-center space-x-1 mb-4">
                        <span class="text-yellow-400">★★★★★</span>
                    </div>
                    <p class="text-green-700 italic mb-4">
                        "The coconut oil from Poorna is absolutely pure! I've been using it for cooking and hair care for 6 months now. The quality is exceptional and you can taste the difference."
                    </p>
                    <div class="bg-green-50 px-3 py-1 rounded-full inline-block mb-4">
                        <span class="text-xs text-green-700 font-medium">Verified purchase: Coconut Oil</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-700 font-bold">PS</div>
                        <div>
                            <p class="font-semibold text-green-800">Priya Sharma</p>
                            <p class="text-sm text-green-600">Mumbai, Maharashtra</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex items-center space-x-1 mb-4">
                        <span class="text-yellow-400">★★★★★</span>
                    </div>
                    <p class="text-green-700 italic mb-4">
                        "Finally found genuine mustard oil! The traditional kachi ghani process really makes a difference. My wife loves cooking with it, and it brings back childhood flavors."
                    </p>
                    <div class="bg-green-50 px-3 py-1 rounded-full inline-block mb-4">
                        <span class="text-xs text-green-700 font-medium">Verified purchase: Mustard Oil</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-700 font-bold">RK</div>
                        <div>
                            <p class="font-semibold text-green-800">Rajesh Kumar</p>
                            <p class="text-sm text-green-600">Delhi, NCR</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex items-center space-x-1 mb-4">
                        <span class="text-yellow-400">★★★★☆</span>
                    </div>
                    <p class="text-green-700 italic mb-4">
                        "Great quality groundnut oil. Perfect for deep frying and everyday cooking. The cold-pressed method preserves all the nutrients. Highly recommended!"
                    </p>
                    <div class="bg-green-50 px-3 py-1 rounded-full inline-block mb-4">
                        <span class="text-xs text-green-700 font-medium">Verified purchase: Groundnut Oil</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center text-amber-700 font-bold">AP</div>
                        <div>
                            <p class="font-semibold text-green-800">Anita Patel</p>
                            <p class="text-sm text-green-600">Ahmedabad, Gujarat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-gradient-to-b from-white via-green-50 to-amber-50">
        <div class="container mx-auto px-4">
            <!-- Why Choose Poorna Oils -->
            <div class="text-center mb-12">
                <div class="flex items-center justify-center space-x-2 mb-4">
                    <svg class="h-6 w-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-green-600 font-medium">Why Choose Us</span>
                </div>
                <h2 class="text-4xl text-green-800 mb-4 font-bold">Why Choose Poorna Oils?</h2>
                <p class="text-green-600 text-lg max-w-3xl mx-auto">
                    We are committed to bringing you the finest quality oils that combine traditional wisdom 
                    with modern safety standards for your family's health and well-being.
                </p>
            </div>

            <!-- Benefits Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-green-200 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl text-green-800 font-semibold mb-4">100% Purity Guaranteed</h3>
                    <p class="text-green-600 leading-relaxed">Every drop is tested for purity. No adulterants, no artificial preservatives - just pure, natural oil.</p>
                </div>

                <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-green-200 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl text-green-800 font-semibold mb-4">Cold-Pressed Process</h3>
                    <p class="text-green-600 leading-relaxed">Traditional extraction methods that preserve nutrients, flavor, and natural goodness of the oils.</p>
                </div>

                <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-green-200 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl text-green-800 font-semibold mb-4">Organic Sourcing</h3>
                    <p class="text-green-600 leading-relaxed">Sourced directly from certified organic farms that follow sustainable and ethical farming practices.</p>
                </div>
            </div>

            <!-- Contact & Support -->
            <div id="contact" class="bg-gradient-to-r from-green-600 to-green-700 rounded-2xl p-8 text-white">
                <div class="text-center">
                    <h3 class="text-3xl font-bold mb-4">Contact & Support</h3>
                    <p class="text-green-100 text-lg mb-8 max-w-2xl mx-auto">
                        Have questions about our oils or need personalized recommendations? 
                        Our expert team is here to help you choose the perfect oils for your needs.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="text-center">
                            <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-green-800 text-xl">📞</span>
                            </div>
                            <h4 class="font-semibold mb-2">Call Us</h4>
                            <p class="text-green-100">+91 98765 43210</p>
                            <p class="text-green-100 text-sm">Mon-Sat 9AM-7PM</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-green-800 text-xl">✉️</span>
                            </div>
                            <h4 class="font-semibold mb-2">Email Us</h4>
                            <p class="text-green-100">support@poornaoils.com</p>
                            <p class="text-green-100 text-sm">24/7 Support</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-green-800 text-xl">💬</span>
                            </div>
                            <h4 class="font-semibold mb-2">Live Chat</h4>
                            <p class="text-green-100">Instant Support</p>
                            <p class="text-green-100 text-sm">Available Now</p>
                        </div>
                    </div>
                    
                    <button class="bg-yellow-400 hover:bg-yellow-500 text-green-800 px-8 py-3 font-semibold shadow-lg rounded-lg transition-colors">
                        Get In Touch
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-green-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg">
                            <span class="text-xl">🌱</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">Poorna Oils</h3>
                            <p class="text-xs text-green-200">Pure Oils for a Healthy Life</p>
                        </div>
                    </div>
                    <p class="text-green-200 mb-4">Premium quality, cold-pressed natural oils for your family's health and well-being.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-green-200 hover:text-yellow-400 transition-colors">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-green-200 hover:text-yellow-400 transition-colors">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-green-200 hover:text-yellow-400 transition-colors">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.042-3.441.219-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 01.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.888-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.357-.631-2.749-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-green-200 hover:text-yellow-400 transition-colors">Home</a></li>
                        <li><a href="#products" class="text-green-200 hover:text-yellow-400 transition-colors">Products</a></li>
                        <li><a href="#about" class="text-green-200 hover:text-yellow-400 transition-colors">About</a></li>
                        <li><a href="#testimonials" class="text-green-200 hover:text-yellow-400 transition-colors">Reviews</a></li>
                        <li><a href="#contact" class="text-green-200 hover:text-yellow-400 transition-colors">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-green-200 hover:text-yellow-400 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="text-green-200 hover:text-yellow-400 transition-colors">Terms & Conditions</a></li>
                        <li><a href="#" class="text-green-200 hover:text-yellow-400 transition-colors">Shipping Info</a></li>
                        <li><a href="#" class="text-green-200 hover:text-yellow-400 transition-colors">Return Policy</a></li>
                        <li><a href="#" class="text-green-200 hover:text-yellow-400 transition-colors">FAQ</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Newsletter</h4>
                    <p class="text-green-200 mb-4">Subscribe to get updates on new products and offers.</p>
                    <form class="flex">
                        <input type="email" placeholder="Enter your email" 
                               class="flex-1 px-3 py-2 rounded-l-lg text-gray-900 focus:outline-none">
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-green-800 px-4 py-2 rounded-r-lg font-medium transition-colors">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-green-700 pt-8 text-center">
                <p class="text-green-200">&copy; 2024 Poorna Oils. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Shopping Cart Sidebar -->
    <div id="cart-sidebar" class="fixed inset-y-0 right-0 w-80 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 z-50">
        <div class="h-full flex flex-col">
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-lg font-semibold text-green-800">Shopping Cart</h3>
                <button onclick="toggleCart()" class="text-gray-500 hover:text-gray-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <div class="flex-1 overflow-y-auto p-4">
                <div id="cart-items">
                    <div class="text-center py-8 text-gray-500">
                        <svg class="h-12 w-12 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5-6m0 0L4 5M7 13h10"/>
                        </svg>
                        <p>Your cart is empty</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t p-4">
                <div class="flex justify-between items-center mb-4">
                    <span class="font-semibold text-green-800">Total:</span>
                    <span id="cart-total" class="font-bold text-green-800 text-lg">₹0</span>
                </div>
                <button class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white py-3 rounded-lg font-medium transition-colors">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>

    <!-- Cart backdrop -->
    <div id="cart-backdrop" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40" onclick="toggleCart()"></div>

    <!-- Toast Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2"></div>

    <!-- JavaScript Files -->
    <script src="js/utils.js"></script>
    <script src="js/products.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/ui.js"></script>
    <script src="js/main.js"></script>
</body>
</html>