<header class="relative text-white sticky top-0 z-50 shadow-2xl overflow-hidden">
    
    <div class="absolute inset-0 bg-gradient-to-br from-[#7a5a3a] via-[#8b6f47] to-[#6b4e2f]"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.03\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
    <div class="absolute inset-0 border-b-2 border-white/10"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        
        <div class="flex items-center justify-between h-20">
            
            <a href="/" class="flex items-center gap-3 group">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-white/25 to-white/10 rounded-xl blur-md group-hover:from-white/35 group-hover:to-white/20 transition-all duration-300"></div>
                    <div class="relative bg-gradient-to-br from-white/20 to-white/5 p-2.5 rounded-xl backdrop-blur-sm border border-white/20 group-hover:border-white/30 transition-all">
                        <svg class="w-10 h-10 group-hover:scale-110 transition-transform duration-300 drop-shadow-lg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="2"/>
                            <line x1="3" y1="9" x2="21" y2="9" stroke="currentColor" stroke-width="2"/>
                            <line x="3" y1="14" x2="21" y2="14" stroke="currentColor" stroke-width="2"/>
                            <circle cx="8" cy="6.5" r="0.8" fill="currentColor"/>
                            <circle cx="16" cy="11.5" r="0.8" fill="currentColor"/>
                        </svg>
                    </div>
                </div>
                <div class="group-hover:translate-x-0.5 transition-transform duration-300">
                    <span class="text-2xl font-bold font-serif block leading-tight bg-gradient-to-r from-white to-white/95 bg-clip-text text-transparent drop-shadow-lg">和食 Washoku</span>
                    <span class="text-xs text-white/85 leading-tight font-medium tracking-wide">Japanese Restaurant</span>
                </div>
            </a>

            
            @if(!request()->routeIs('admin.*'))
            <div class="hidden lg:flex items-center gap-2.5 bg-white/15 backdrop-blur-md px-5 py-2.5 rounded-full border border-white/20 hover:bg-white/25 hover:border-white/30 hover:shadow-lg transition-all duration-300 cursor-pointer group relative">
                <svg class="w-5 h-5 text-white/95 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <select class="bg-transparent border-none focus:outline-none cursor-pointer text-sm font-semibold text-white appearance-none pr-6">
                    <option class="bg-[#6b4e2f]">Select your Address</option>
                    <option class="bg-[#6b4e2f]">Manila</option>
                    <option class="bg-[#6b4e2f]">Quezon City</option>
                    <option class="bg-[#6b4e2f]">Makati</option>
                    <option class="bg-[#6b4e2f]">Pasig</option>
                    <option class="bg-[#6b4e2f]">Taguig</option>
                </select>
                <svg class="w-4 h-4 text-white/80 absolute right-3 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
            @endif

            
            <div class="flex items-center gap-3">
                
                @if(auth()->guard()->check())
                    
                    <div class="flex items-center gap-3 md:gap-4">
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-sm md:text-base font-semibold text-white hover:text-yellow-200 transition-colors group">
                            <div class="p-1.5 rounded-lg bg-white/10 group-hover:bg-white/20 transition-all">
                                <svg class="w-5 h-5 md:w-6 md:h-6 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <span>
                                @if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isOrderProcessor()))
                                    Admin
                                @else
                                    {{ Auth::user()->name }}
                                @endif
                            </span>
                        </a>
                        <span class="text-white/40 text-lg">|</span>
                        <a href="{{ route('dashboard') }}" class="text-sm md:text-base font-medium text-white/90 hover:text-yellow-200 transition-colors px-2 py-1 rounded-md hover:bg-white/10">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline" id="logout-form">
                            @csrf
                            <button type="submit" class="text-sm md:text-base font-medium text-white/90 hover:text-yellow-200 transition-colors px-2 py-1 rounded-md hover:bg-white/10">
                                Logout
                            </button>
                        </form>
                        <script>
                            document.getElementById('logout-form')?.addEventListener('submit', function() {
                                // Clear cart on logout
                                try {
                                    if (window.Alpine && typeof window.Alpine.store === 'function') {
                                        const cart = window.Alpine.store('cart');
                                        if (cart) {
                                            cart.items = [];
                                            cart.count = 0;
                                        }
                                    }
                                    localStorage.removeItem('cart_guest');
                                    @if(auth()->guard()->check())
                                    localStorage.removeItem('cart_user_{{ auth()->id() }}');
                                    @endif
                                } catch (e) {
                                    console.error('Error clearing cart:', e);
                                }
                            });
                        </script>
                    </div>
                @else
                    
                    <div class="flex items-center gap-2 md:gap-3">
                        <a href="{{ route('login') }}" class="flex items-center gap-1.5 md:gap-2 text-xs md:text-sm font-semibold text-white/90 hover:text-white transition-colors px-3 py-1.5 rounded-lg hover:bg-white/10">
                            <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            <span class="hidden sm:inline">Log In</span>
                        </a>
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-white/25 to-white/15 hover:from-white/35 hover:to-white/25 backdrop-blur-md px-4 md:px-5 py-2 md:py-2.5 rounded-full text-xs md:text-sm font-semibold transition-all duration-300 border border-white/20 hover:border-white/30 hover:shadow-lg">
                            <span class="hidden sm:inline">Sign Up</span>
                            <span class="sm:hidden">Sign Up</span>
                        </a>
                    </div>
                @endif

                
                @if(!request()->routeIs('admin.*'))
                <a href="/cart" 
                   class="relative bg-gradient-to-r from-white via-white to-white/95 text-primary px-7 py-3.5 rounded-full font-bold hover:from-yellow-50 hover:via-white hover:to-yellow-50 transition-all duration-300 flex items-center gap-2.5 shadow-2xl hover:shadow-3xl hover:scale-105 group border border-white/20"
                   @cart-updated.window="$store.cart.save()">
                    <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span>Order Now</span>
                    <span x-show="$store.cart.count > 0" 
                          x-text="$store.cart.count"
                          x-transition
                          class="absolute -top-2 -right-2 bg-gradient-to-br from-red-500 to-red-600 text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center shadow-xl ring-2 ring-white animate-pulse">
                    </span>
                </a>
                @endif
            </div>
        </div>

        
        <nav class="border-t border-white/10 bg-gradient-to-b from-transparent to-white/5">
            <ul class="flex gap-6 lg:gap-8 py-4 items-center overflow-x-auto scrollbar-hide">
                @if(!request()->routeIs('admin.*'))
                <li>
                    <a href="/" class="relative py-2.5 px-3 rounded-lg hover:bg-white/10 transition-all duration-300 font-semibold group">
                        <span class="relative z-10">Home</span>
                        <span class="absolute bottom-1 left-3 right-3 h-0.5 bg-gradient-to-r from-transparent via-yellow-300 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    </a>
                </li>
                <li>
                    <a href="/menu" class="relative py-2.5 px-3 rounded-lg hover:bg-white/10 transition-all duration-300 font-semibold group">
                        <span class="relative z-10">Menu</span>
                        <span class="absolute bottom-1 left-3 right-3 h-0.5 bg-gradient-to-r from-transparent via-yellow-300 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('stores') }}" class="relative py-2.5 px-3 rounded-lg hover:bg-white/10 transition-all duration-300 font-semibold group">
                        <span class="relative z-10">Stores</span>
                        <span class="absolute bottom-1 left-3 right-3 h-0.5 bg-gradient-to-r from-transparent via-yellow-300 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    </a>
                </li>
                <li>
                    <a href="/bento-builder" class="inline-flex items-center gap-1.5 py-2.5 px-4 rounded-full bg-yellow-400/30 font-bold text-yellow-50 group hover:bg-yellow-400/40 transition-all duration-300 shadow-md hover:shadow-lg">
                        Build Your Bento
                        <svg class="w-4 h-4 group-hover:rotate-12 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </a>
                </li>
                @if(auth()->guard()->check())
                <li>
                    <a href="{{ route('dashboard.orders') }}" class="relative py-2.5 px-3 rounded-lg hover:bg-white/10 transition-all duration-300 font-semibold group flex items-center gap-2">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <span class="relative z-10">My Orders</span>
                        <span class="absolute bottom-1 left-3 right-3 h-0.5 bg-gradient-to-r from-transparent via-yellow-300 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    </a>
                </li>
                @if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isOrderProcessor()))
                <li>
                    <a href="{{ route('admin.index') }}" class="inline-flex items-center py-2.5 px-4 rounded-full bg-yellow-400/30 font-bold text-yellow-50 group hover:bg-yellow-400/40 transition-all duration-300 shadow-md hover:shadow-lg">
                        Admin Panel
                    </a>
                </li>
                @endif
                @endif
                @endif
            </ul>
        </nav>
    </div>
</header>
