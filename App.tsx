import { useState } from 'react';
import { Header } from './components/Header';
import { HeroSection } from './components/HeroSection';
import { ProductCatalog } from './components/ProductCatalog';
import { TestimonialsSection } from './components/TestimonialsSection';
import { AboutSection } from './components/AboutSection';
import { Footer } from './components/Footer';
import { ShoppingCart, CartItem } from './components/ShoppingCart';
import { LoginPage } from './components/auth/LoginPage';
import { SignupPage } from './components/auth/SignupPage';
import { Product } from './components/ProductCard';
import { Toaster } from './components/ui/sonner';
import { toast } from 'sonner@2.0.3';

type AuthView = 'landing' | 'login' | 'signup';

interface User {
  name: string;
  email: string;
}

export default function App() {
  const [currentView, setCurrentView] = useState<AuthView>('landing');
  const [isLoggedIn, setIsLoggedIn] = useState(false);
  const [user, setUser] = useState<User | null>(null);
  const [cartItems, setCartItems] = useState<CartItem[]>([]);
  const [isCartOpen, setIsCartOpen] = useState(false);

  const handleLogin = (email: string, password: string) => {
    // Simulate login logic
    const userName = email.split('@')[0].replace(/[._]/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
    setUser({ name: userName, email });
    setIsLoggedIn(true);
    setCurrentView('landing');
  };

  const handleSignup = (name: string, email: string, password: string) => {
    // Simulate signup logic
    setUser({ name, email });
    setIsLoggedIn(true);
    setCurrentView('landing');
  };

  const handleGoogleAuth = () => {
    // Simulate Google authentication
    const mockUser = {
      name: "Google User",
      email: "user@gmail.com"
    };
    setUser(mockUser);
    setIsLoggedIn(true);
    setCurrentView('landing');
    toast.success('Successfully signed in with Google!');
  };

  const handleLogout = () => {
    setIsLoggedIn(false);
    setUser(null);
    setCartItems([]);
    setCurrentView('landing');
    toast.success('Successfully logged out');
  };

  const handleShowLogin = () => {
    setCurrentView('login');
  };

  const handleShopNow = () => {
    if (isLoggedIn) {
      // Scroll to products section
      const productsSection = document.getElementById('products');
      productsSection?.scrollIntoView({ behavior: 'smooth' });
    } else {
      setCurrentView('login');
    }
  };

  const addToCart = (product: Product) => {
    if (!isLoggedIn) {
      setCurrentView('login');
      return;
    }

    setCartItems(prevItems => {
      const existingItem = prevItems.find(item => item.id === product.id);
      
      if (existingItem) {
        toast.success(`Updated ${product.name} quantity in cart`);
        return prevItems.map(item =>
          item.id === product.id
            ? { ...item, quantity: item.quantity + 1 }
            : item
        );
      } else {
        toast.success(`Added ${product.name} to cart`);
        return [...prevItems, { ...product, quantity: 1 }];
      }
    });
  };

  const updateCartItemQuantity = (productId: number, quantity: number) => {
    if (quantity === 0) {
      removeFromCart(productId);
      return;
    }

    setCartItems(prevItems =>
      prevItems.map(item =>
        item.id === productId
          ? { ...item, quantity }
          : item
      )
    );
  };

  const removeFromCart = (productId: number) => {
    setCartItems(prevItems => {
      const item = prevItems.find(item => item.id === productId);
      if (item) {
        toast.success(`Removed ${item.name} from cart`);
      }
      return prevItems.filter(item => item.id !== productId);
    });
  };

  const getTotalCartItems = () => {
    return cartItems.reduce((total, item) => total + item.quantity, 0);
  };

  // Show authentication pages
  if (currentView === 'login') {
    return (
      <>
        <LoginPage
          onLogin={handleLogin}
          onSwitchToSignup={() => setCurrentView('signup')}
          onGoogleLogin={handleGoogleAuth}
        />
        <Toaster position="top-right" />
      </>
    );
  }

  if (currentView === 'signup') {
    return (
      <>
        <SignupPage
          onSignup={handleSignup}
          onSwitchToLogin={() => setCurrentView('login')}
          onGoogleLogin={handleGoogleAuth}
        />
        <Toaster position="top-right" />
      </>
    );
  }

  // Show main landing page
  return (
    <div className="min-h-screen bg-white">
      <Header 
        cartItemsCount={getTotalCartItems()}
        onCartClick={() => setIsCartOpen(true)}
        isLoggedIn={isLoggedIn}
        user={user}
        onLogin={handleShowLogin}
        onLogout={handleLogout}
      />
      
      <main>
        <HeroSection 
          isLoggedIn={isLoggedIn}
          onShopNow={handleShopNow}
        />
        <ProductCatalog 
          onAddToCart={addToCart}
          isLoggedIn={isLoggedIn}
          onLogin={handleShowLogin}
        />
        <TestimonialsSection />
        <AboutSection />
      </main>
      
      <Footer />
      
      <ShoppingCart
        isOpen={isCartOpen}
        onClose={() => setIsCartOpen(false)}
        cartItems={cartItems}
        onUpdateQuantity={updateCartItemQuantity}
        onRemoveItem={removeFromCart}
      />
      
      <Toaster position="top-right" />
    </div>
  );
}