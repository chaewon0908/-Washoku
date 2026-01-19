<header class="relative text-white sticky top-0 z-50 overflow-hidden" x-data="{ scrolled: false }" @scroll.window="scrolled = window.scrollY > 20">
    
    <!-- Deep, Rich Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#1a1a1a] via-[#2d1f1f] to-[#1a1a1a]"></div>
    
    <!-- Animated Seigaiha (Japanese Wave) Pattern -->
    <div class="absolute inset-0 opacity-[0.07] seigaiha-pattern"></div>
    
    <!-- Subtle Red Glow from Top -->
    <div class="absolute top-0 left-1/4 w-1/2 h-32 bg-gradient-to-b from-red-600/20 to-transparent blur-3xl"></div>
    
    <!-- Floating Cherry Blossom Petals -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="cherry-petal petal-1"></div>
        <div class="cherry-petal petal-2"></div>
        <div class="cherry-petal petal-3"></div>
        <div class="cherry-petal petal-4"></div>
        <div class="cherry-petal petal-5"></div>
    </div>
    
    <!-- Gold Accent Line at Top -->
    <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-amber-400/70 to-transparent"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        
        <!-- Top Bar -->
        <div class="flex items-center justify-between h-20">
            
            <!-- Logo Section -->
            <a href="/" class="flex items-center gap-4 group">
                <!-- New Japanese-Inspired Logo -->
                <div class="relative">
                    <!-- Glow Effect -->
                    <div class="absolute inset-0 bg-red-500/30 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative w-14 h-14 flex items-center justify-center">
                        <!-- Circular Background with Border -->
                        <div class="absolute inset-0 rounded-full bg-gradient-to-br from-red-600 to-red-800 shadow-lg shadow-red-900/50 group-hover:shadow-red-600/50 transition-all duration-300"></div>
                        <div class="absolute inset-[2px] rounded-full bg-gradient-to-br from-[#1a1a1a] to-[#2d1f1f]"></div>
                        <div class="absolute inset-[3px] rounded-full border border-amber-400/30"></div>
                        
                        <!-- Bowl with Chopsticks Icon -->
                        <svg class="relative w-8 h-8 text-white group-hover:scale-110 transition-transform duration-300" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Chopsticks -->
                            <line x1="7" y1="3" x2="10" y2="10" stroke="url(#goldGradient)" stroke-width="1.5" stroke-linecap="round"/>
                            <line x1="17" y1="3" x2="14" y2="10" stroke="url(#goldGradient)" stroke-width="1.5" stroke-linecap="round"/>
                            <!-- Bowl -->
                            <path d="M4 12C4 12 4 11 12 11C20 11 20 12 20 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M5 12C5 17 8 20 12 20C16 20 19 17 19 12" stroke="currentColor" stroke-width="2" fill="none"/>
                            <!-- Steam Lines -->
                            <path d="M9 8C9 7 9.5 6 9 5" stroke="currentColor" stroke-width="1" stroke-linecap="round" opacity="0.6" class="steam-line"/>
                            <path d="M12 7C12 6 12.5 5 12 4" stroke="currentColor" stroke-width="1" stroke-linecap="round" opacity="0.6" class="steam-line"/>
                            <path d="M15 8C15 7 15.5 6 15 5" stroke="currentColor" stroke-width="1" stroke-linecap="round" opacity="0.6" class="steam-line"/>
                            <defs>
                                <linearGradient id="goldGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#fbbf24"/>
                                    <stop offset="100%" stop-color="#d97706"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </div>
                
                <!-- Brand Text -->
                <div class="group-hover:translate-x-1 transition-transform duration-300">
                    <div class="flex items-center gap-2">
                        <span class="text-3xl font-bold font-japanese tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-white via-white to-amber-100 drop-shadow-lg japanese-text-glow">和食</span>
                        <span class="text-2xl font-bold font-english tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-300">Washoku</span>
                    </div>
                    <div class="flex items-center gap-2 mt-0.5">
                        <span class="text-[10px] text-amber-400/80 tracking-[0.2em] uppercase font-medium">Japanese Restaurant</span>
                        <div class="w-4 h-[1px] bg-gradient-to-r from-amber-400/60 to-transparent"></div>
                    </div>
                </div>
            </a>

            <!-- Location Selector -->
            <?php if(!request()->routeIs('admin.*')): ?>
            <div class="hidden lg:flex items-center gap-2.5 bg-white/5 backdrop-blur-md px-5 py-2.5 rounded-full border border-white/10 hover:bg-white/10 hover:border-red-500/30 transition-all duration-300 cursor-pointer group relative">
                <div class="absolute inset-0 rounded-full bg-gradient-to-r from-red-500/0 via-red-500/5 to-red-500/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <svg class="w-5 h-5 text-red-400 group-hover:scale-110 transition-transform relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <select class="bg-transparent border-none focus:outline-none cursor-pointer text-sm font-medium text-white/90 appearance-none pr-6 relative z-10">
                    <option class="bg-[#1a1a1a]">Select your Address</option>
                    <option class="bg-[#1a1a1a]">Manila</option>
                    <option class="bg-[#1a1a1a]">Quezon City</option>
                    <option class="bg-[#1a1a1a]">Makati</option>
                    <option class="bg-[#1a1a1a]">Pasig</option>
                    <option class="bg-[#1a1a1a]">Taguig</option>
                </select>
                <svg class="w-4 h-4 text-white/60 absolute right-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
            <?php endif; ?>

            <!-- Right Actions -->
            <div class="flex items-center gap-3">
                
                <?php if(auth()->guard()->check()): ?>
                    <!-- Logged In State -->
                    <div class="flex items-center gap-3 md:gap-4">
                        <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center gap-2 text-sm md:text-base font-medium text-white/90 hover:text-amber-300 transition-colors group">
                            <div class="p-2 rounded-full bg-white/5 border border-white/10 group-hover:border-amber-400/30 group-hover:bg-amber-400/10 transition-all">
                                <svg class="w-4 h-4 md:w-5 md:h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <span class="hidden sm:inline">
                                <?php if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isOrderProcessor())): ?>
                                    Admin
                                <?php else: ?>
                                    <?php echo e(Auth::user()->name); ?>

                                <?php endif; ?>
                            </span>
                        </a>
                        <div class="h-5 w-px bg-white/20"></div>
                        <a href="<?php echo e(route('dashboard')); ?>" class="text-sm font-medium text-white/70 hover:text-amber-300 transition-colors">
                            Profile
                        </a>
                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline" id="logout-form">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="text-sm font-medium text-white/70 hover:text-red-400 transition-colors">
                                Logout
                            </button>
                        </form>
                        <script>
                            document.getElementById('logout-form')?.addEventListener('submit', function() {
                                try {
                                    if (window.Alpine && typeof window.Alpine.store === 'function') {
                                        const cart = window.Alpine.store('cart');
                                        if (cart) {
                                            cart.items = [];
                                            cart.count = 0;
                                        }
                                    }
                                    localStorage.removeItem('cart_guest');
                                    <?php if(auth()->guard()->check()): ?>
                                    localStorage.removeItem('cart_user_<?php echo e(auth()->id()); ?>');
                                    <?php endif; ?>
                                } catch (e) {
                                    console.error('Error clearing cart:', e);
                                }
                            });
                        </script>
                    </div>
                <?php else: ?>
                    <!-- Logged Out State -->
                    <div class="flex items-center gap-2 md:gap-3">
                        <a href="<?php echo e(route('login')); ?>" class="flex items-center gap-1.5 md:gap-2 text-sm font-medium text-white/80 hover:text-white transition-colors px-3 py-2 rounded-full hover:bg-white/5 border border-transparent hover:border-white/10">
                            <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            <span class="hidden sm:inline">Log In</span>
                        </a>
                        <a href="<?php echo e(route('register')); ?>" class="relative overflow-hidden bg-gradient-to-r from-white/10 to-white/5 backdrop-blur-md px-5 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 border border-white/20 hover:border-amber-400/40 group">
                            <span class="relative z-10">Sign Up</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-amber-400/20 to-red-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                    </div>
                <?php endif; ?>

                <!-- Order Now Button -->
                <?php if(!request()->routeIs('admin.*')): ?>
                <div class="relative">
                    <a href="/cart" 
                       class="relative overflow-hidden bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-6 py-3 rounded-full font-bold transition-all duration-300 flex items-center gap-2.5 shadow-lg shadow-red-900/30 hover:shadow-red-600/40 hover:scale-105 group border border-red-500/50"
                       @cart-updated.window="$store.cart.save()">
                        <!-- Shimmer Effect -->
                        <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-700 bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
                        
                        <svg class="w-5 h-5 relative z-10 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span class="relative z-10">Order Now</span>
                    </a>
                    <!-- Cart Badge - Outside the button for visibility -->
                    <span x-show="$store.cart.count > 0" 
                          x-text="$store.cart.count > 99 ? '99+' : $store.cart.count"
                          x-transition
                          class="absolute -top-2 -right-2 min-w-[24px] h-[24px] px-1.5 bg-amber-400 text-[#1a1a1a] text-xs font-bold rounded-full flex items-center justify-center shadow-lg ring-2 ring-[#1a1a1a]"
                          style="z-index: 100;">
                    </span>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Navigation Bar -->
        <nav class="border-t border-white/10">
            <ul class="flex gap-1 lg:gap-2 py-3 items-center overflow-x-auto scrollbar-hide">
                <?php if(!request()->routeIs('admin.*')): ?>
                <li>
                    <a href="/" class="nav-link <?php echo e(request()->is('/') ? 'nav-link-active' : ''); ?>">
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="/menu" class="nav-link <?php echo e(request()->is('menu*') ? 'nav-link-active' : ''); ?>">
                        <span>Menu</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('stores')); ?>" class="nav-link <?php echo e(request()->routeIs('stores') ? 'nav-link-active' : ''); ?>">
                        <span>Stores</span>
                    </a>
                </li>
                <li>
                    <a href="/bento-builder" class="relative inline-flex items-center gap-2 py-2.5 px-5 rounded-full font-bold text-black bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-300 hover:to-amber-400 transition-all duration-300 shadow-lg shadow-amber-900/20 hover:shadow-amber-500/30 hover:scale-105 group">
                        <span>Build Your Bento</span>
                        <svg class="w-4 h-4 group-hover:rotate-45 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <!-- Sparkle effect -->
                        <div class="absolute -top-1 -right-1 w-3 h-3">
                            <div class="absolute inset-0 bg-white rounded-full animate-ping opacity-75"></div>
                            <div class="absolute inset-0.5 bg-white rounded-full"></div>
                        </div>
                    </a>
                </li>
                <?php if(auth()->guard()->check()): ?>
                <li>
                    <a href="<?php echo e(route('dashboard.orders')); ?>" class="nav-link flex items-center gap-2 <?php echo e(request()->routeIs('dashboard.orders') ? 'nav-link-active' : ''); ?>">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <span>My Orders</span>
                    </a>
                </li>
                <?php if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isOrderProcessor())): ?>
                <li class="ml-auto">
                    <a href="<?php echo e(route('admin.index')); ?>" class="inline-flex items-center gap-2 py-2.5 px-5 rounded-full font-bold text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 transition-all duration-300 shadow-lg hover:scale-105">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Admin Panel
                    </a>
                </li>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    
    <!-- Bottom Gold Accent Line -->
    <div class="absolute bottom-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-amber-400/50 to-transparent"></div>
</header>
<?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/partials/header.blade.php ENDPATH**/ ?>