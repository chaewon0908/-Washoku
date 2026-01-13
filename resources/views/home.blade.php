@extends('layouts.app')

@section('title', 'Home - Washoku Japanese Restaurant')

@section('content')

<section class="relative min-h-[700px] flex items-center bg-gradient-to-br from-red-700 via-red-600 to-red-800 overflow-hidden">
    
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    
    <div class="absolute top-20 left-10 w-32 h-32 bg-white/5 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-40 h-40 bg-white/5 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
    
    <div class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-6xl mx-auto">
            
            <div class="text-center mb-8">
                <div class="inline-block bg-white/10 backdrop-blur-sm px-6 py-2 rounded-full mb-6">
                    <span class="text-white/90 text-sm font-semibold">🍱 Premium Japanese Cuisine</span>
                </div>
                <h1 class="text-6xl md:text-8xl font-bold font-serif text-white mb-6 text-balance leading-tight">
                    PREMIUM BENTO
                </h1>
                <p class="text-white/95 text-center text-2xl md:text-3xl mb-12 text-pretty max-w-3xl mx-auto">
                    Authentic Japanese flavors in one beautiful box
                </p>
            </div>
            
            
            <div x-data="{ 
                currentSlide: 0,
                bentos: [
                    {
                        name: 'Character/Decorative Bento (Kyaraben)',
                        description: 'Bento designed with creative food art (characters or cute shapes), especially popular for kids',
                        image: 'https://static1.squarespace.com/static/6217a6968b376a434418ae8b/t/6416043616fc5e2dca82c202/1679164471002/Show%2BYour%2BLove%2Bwith%2Bour%2BMiso%2BTasty%2BBento%2BBox%2BLunch%2BIdeas.jpg?format=1500w',
                        price: 299
                    },
                    {
                        name: 'Makunouchi Bento',
                        description: 'A classic, well-balanced lunch box with rice, grilled fish, egg, pickles, and side dishes',
                        image: 'https://www.webstaurantstore.com/uploads/blog/2023/1/bento-box_what-is-bento.jpg',
                        price: 329
                    },
                    {
                        name: 'Premium Bento Box',
                        description: 'Build your own bento! Choose your main dish and 3 side dishes to create your perfect meal',
                        image: 'https://m.media-amazon.com/images/I/71E1qGpcb3L.jpg',
                        price: 399
                    }
                ],
                autoRotate() {
                    setInterval(() => {
                        this.currentSlide = (this.currentSlide + 1) % this.bentos.length;
                    }, 5000);
                }
            }" 
            x-init="autoRotate()"
            class="relative">
                <div class="flex items-center justify-center gap-4 md:gap-8">
                    
                    <button 
                        @click="currentSlide = (currentSlide - 1 + bentos.length) % bentos.length" 
                        class="flex-shrink-0 w-14 h-14 rounded-full bg-white/20 backdrop-blur-sm hover:bg-white/30 transition-all duration-300 flex items-center justify-center group shadow-lg hover:scale-110">
                        <svg class="w-7 h-7 text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    
                    
                    <div class="flex-1 max-w-4xl">
                        <div class="relative h-[450px] md:h-[500px]">
                            <template x-for="(bento, index) in bentos" :key="index">
                                <div 
                                    x-show="currentSlide === index"
                                    x-transition:enter="transition ease-out duration-700"
                                    x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 scale-95 translate-y-4"
                                    class="absolute inset-0 flex flex-col items-center justify-center">
                                    
                                    
                                    <div class="relative mb-8 group">
                                        <div class="absolute -inset-6 bg-white/30 rounded-full blur-3xl group-hover:bg-white/40 transition-all duration-700 animate-pulse"></div>
                                        <div class="relative w-72 h-72 md:w-96 md:h-96 rounded-full overflow-hidden ring-8 ring-white/50 shadow-2xl">
                                            <img :src="bento.image" :alt="bento.name" 
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Bento';">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="text-center px-4">
                                        <div class="inline-flex items-center gap-3 bg-white/95 backdrop-blur px-10 py-4 rounded-full mb-4 shadow-xl">
                                            <span class="text-red-600 font-bold text-xl tracking-wide" x-text="bento.name"></span>
                                            <span class="text-red-500 font-bold">₱<span x-text="bento.price"></span></span>
                                        </div>
                                        <p class="text-white text-lg md:text-xl font-medium max-w-xl mx-auto text-pretty" x-text="bento.description"></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                    
                    
                    <button 
                        @click="currentSlide = (currentSlide + 1) % bentos.length" 
                        class="flex-shrink-0 w-14 h-14 rounded-full bg-white/20 backdrop-blur-sm hover:bg-white/30 transition-all duration-300 flex items-center justify-center group shadow-lg hover:scale-110">
                        <svg class="w-7 h-7 text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
                
                
                <div class="flex justify-center gap-3 mt-10">
                    <template x-for="(bento, index) in bentos" :key="index">
                        <button 
                            @click="currentSlide = index"
                            :class="currentSlide === index ? 'w-10 bg-white shadow-lg' : 'w-3 bg-white/40'"
                            class="h-3 rounded-full transition-all duration-300 hover:bg-white/80">
                        </button>
                    </template>
                </div>
                
                
                <div class="text-center mt-12">
                    <a href="/bento-builder" 
                       class="inline-flex items-center gap-3 bg-white hover:bg-red-50 text-red-600 font-bold text-2xl px-16 py-6 rounded-full transition-all duration-300 shadow-2xl hover:shadow-white/30 hover:scale-105 transform">
                        <span>Build Your Bento</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    <p class="text-white/90 text-base mt-4 font-medium">Starting at ₱299 • Customize to your taste</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="bg-white py-16 border-b border-gray-100">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl font-bold text-red-600 mb-2">10K+</div>
                <div class="text-gray-600 font-medium">Happy Customers</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-red-600 mb-2">50+</div>
                <div class="text-gray-600 font-medium">Menu Items</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-red-600 mb-2">4.9★</div>
                <div class="text-gray-600 font-medium">Average Rating</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-red-600 mb-2">24/7</div>
                <div class="text-gray-600 font-medium">Order Support</div>
            </div>
        </div>
    </div>
</section>


<section class="container mx-auto px-4 py-24">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-4">
        <div>
            <div class="inline-block bg-red-100 text-red-600 font-semibold px-4 py-2 rounded-full mb-4">
                Our Menu
            </div>
            <h2 class="text-5xl md:text-6xl font-bold font-serif text-primary-dark text-balance">Featured Categories</h2>
            <p class="text-gray-600 text-lg mt-3 max-w-2xl">Explore our diverse selection of authentic Japanese dishes</p>
        </div>
        <a href="/menu" class="group flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 rounded-full transition-all shadow-lg hover:shadow-xl hover:scale-105">
            <span>View All</span>
            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
        </a>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
        @php
        $categories = [
            ['name' => 'Build Your Bento', 'slug' => 'build-your-bento', 'image' => 'https://imgs.search.brave.com/WWSv1pHBLW6u_iNhuV9iH_sBPXCQSGrEkyyP_H_qjQE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvNTQw/NTMwODcwL3Bob3Rv/L2tpZHMtYmVudG8t/Zm9vZC5qcGc_cz02/MTJ4NjEyJnc9MCZr/PTIwJmM9d3o2NlNB/VXVlREFWU25BSUVZ/di0yTUVCbi0tcnRW/VVkySFRSVlEzdl9n/WT0', 'icon' => '🍱'],
            ['name' => 'Bento Sets', 'slug' => 'bento-boxes', 'image' => 'https://imgs.search.brave.com/cyO9guESIT2aE2gj1IPXal82LeUN6NWYhD-mJZITdCY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90aHVt/YnMuZHJlYW1zdGlt/ZS5jb20vYi92YXJp/ZXR5LWNvbG9yZnVs/LWJlbnRvLWJveGVz/LWZpbGxlZC1zdXNo/aS1yb2xscy10ZW1w/dXJhLXNocmltcC1y/aWNlLXBpY2tsZWQt/dmVnZXRhYmxlcy12/YXJpZXR5LWNvbG9y/ZnVsLWJlbnRvLWJv/eGVzLTM4MDY5OTI1/Mi5qcGc', 'icon' => '🍱'],
            ['name' => 'Ramen', 'slug' => 'ramen', 'image' => 'https://imgs.search.brave.com/newkFCOdy73B_l6faYPFCBXcJ0aTiI14sIGommgr2kM/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5nZXR0eWltYWdl/cy5jb20vaWQvMTM0/MDA5MTkzNi9waG90/by9yYW1lbi1zb3Vw/LXNlcnZlZC1hdC10/aGUtcmVzdGF1cmFu/dC1kaXJlY3RseS1h/Ym92ZS12aWV3Lmpw/Zz9zPTYxMng2MTIm/dz0wJms9MjAmYz02/STJNN0p5c28wNzBD/em8xM0stejYyUV9r/dVNrdzh5eDhVbkxj/d0hFalpZPQ', 'icon' => '🍜'],
            ['name' => 'Sushi Rolls', 'slug' => 'sushi', 'image' => 'https://images.pexels.com/photos/1052189/pexels-photo-1052189.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop', 'icon' => '🍣'],
            ['name' => 'Donburi Bowls', 'slug' => 'donburi', 'image' => 'https://imgs.search.brave.com/ptGDXp2CbPuai3lAB9MhxkWahWTgQGxcDLnQpjt3Jbg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tdXN1/YmlraWxuLmNvbS9j/ZG4vc2hvcC9maWxl/cy9mdWt1aG91LWtp/bG4tdG9rdXNhLWhh/c2FtaS1kb25idXJp/LWJvd2wtcy1tdXN1/Ymkta2lsbi1xdWFs/aXR5LWphcGFuZXNl/LXRhYmxld2FyZXMt/YW5kLWdpZnRzLTQ1/MjMwMy5qcGc_dj0x/NzU4NzY0ODI1Jndp/ZHRoPTIwMDA', 'icon' => '🍚'],
            ['name' => 'Tempura', 'slug' => 'tempura', 'image' => 'https://imgs.search.brave.com/dgGD3ZERAmKb4LIY4zyo1pRjtuOoadjFWsfKOYfrm_0/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5nZXR0eWltYWdl/cy5jb20vaWQvODY4/MDA0ODc2L3Bob3Rv/L2Zvb2Qtc2FtcGxl/LW9mLXRlbXB1cmEu/anBnP3M9NjEyeDYx/MiZ3PTAmaz0yMCZj/PW9tWlNrMm0xYjNh/WGVaUHN0c1JzOExi/UHY3T3lQdjBjazE0/eFhkUXhqNUU9', 'icon' => '🍤']
        ];
        @endphp
        
        @foreach($categories as $category)
            <a href="{{ $category['slug'] === 'build-your-bento' ? '/bento-builder' : '/menu/' . $category['slug'] }}" 
               class="group relative block bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border-2 border-transparent hover:border-red-200">
                
                <div class="aspect-square overflow-hidden bg-gradient-to-br from-gray-100 to-gray-50 relative">
                    <img src="{{ $category['image'] }}" 
                         alt="{{ $category['name'] }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         loading="lazy"
                         onerror="this.onerror=null; this.src='https://via.placeholder.com/600x600/f3f4f6/9ca3af?text={{ urlencode($category['name']) }}';">
                    
                    <div class="absolute top-4 right-4 text-4xl opacity-80 group-hover:opacity-100 transition-opacity">
                        {{ $category['icon'] }}
                    </div>
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                
                <div class="p-6 text-center relative bg-white">
                    <h3 class="font-bold text-lg text-primary-dark group-hover:text-red-600 transition-colors text-balance">
                        {{ $category['name'] }}
                    </h3>
                    
                    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-1 bg-red-600 group-hover:w-20 transition-all duration-300 rounded-full"></div>
                </div>
            </a>
        @endforeach
    </div>
</section>


<section class="bg-gradient-to-b from-warm-cream via-warm-beige to-warm-cream py-24 relative overflow-hidden">
    
    <div class="absolute top-0 right-0 w-96 h-96 bg-red-100/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-red-100/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-4">
            <div>
                <div class="inline-block bg-red-100 text-red-600 font-semibold px-4 py-2 rounded-full mb-4">
                    Best Sellers
                </div>
                <h2 class="text-5xl md:text-6xl font-bold font-serif text-primary-dark text-balance">Customer Favorites</h2>
                <p class="text-gray-600 text-lg mt-3">Most loved dishes by our customers</p>
            </div>
            <a href="/menu" class="group flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 rounded-full transition-all shadow-lg hover:shadow-xl hover:scale-105">
                <span>View All</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
            $bestsellers = [
                ['id' => 1, 'name' => 'Teriyaki Chicken Bento w/ Miso Soup', 'price' => 249, 'image' => 'https://imgs.search.brave.com/Cvb7g7a0VAcBfUEp0dI_m6H4Q3XgyCbH6C0piHnGQjY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS1jZG4udHJpcGFk/dmlzb3IuY29tL21l/ZGlhL3Bob3RvLW8v/MTEvZmEvMzIvM2Mv/Y2hpY2tlbi10ZXJp/eWFraS1zZXQuanBn', 'badge' => 'Popular', 'rating' => 4.9],
                ['id' => 2, 'name' => 'Salmon Sashimi Set w/ Rice & Salad', 'price' => 389, 'image' => 'https://images.pexels.com/photos/1052189/pexels-photo-1052189.jpeg?auto=compress&cs=tinysrgb&w=600&h=450&fit=crop', 'badge' => 'Fresh', 'rating' => 5.0],
                ['id' => 3, 'name' => 'Tonkatsu Pork Cutlet w/ Curry Rice', 'price' => 299, 'image' => 'https://imgs.search.brave.com/DFfVbZCzKExcxxXIIoBdkrSYEZQi2MUiLk78XbVBUqY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/a2l0Y2hlbnNhbmN0/dWFyeS5jb20vd3At/Y29udGVudC91cGxv/YWRzLzIwMTUvMTAv/a2F0c3Vkb24tUG9y/ay10YWxsMS53ZWJw', 'badge' => 'Chef Special', 'rating' => 4.8],
                ['id' => 4, 'name' => 'Custom Bento Box (4 compartments)', 'price' => 329, 'image' => 'https://imgs.search.brave.com/KlkAiQ3hziE8jrVJSZAued2Oy283CHc4qpjvJH5KGjI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTI1/MjczODI0Ni9waG90/by9yZWQtYW5kLWJs/YWNrLWVtcHR5LWJl/bnRvLWJveC10cmFk/aXRpb25hbC1qYXBh/bmVzZS10cmF5LW1h/ZGUtZm9yLWx1bmNo/LmpwZz9zPTYxMng2/MTImdz0wJms9MjAm/Yz0tbndGT1MyaXlZ/SW5Henc3QmFQcndU/bWpuT2tHRmFBbUtP/NUhjLU1KUmZRPQ', 'badge' => 'Customizable', 'rating' => 4.9]
            ];
            @endphp
            
            @foreach($bestsellers as $item)
                <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border-2 border-transparent hover:border-red-200">
                    
                    <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-gray-100 to-gray-50">
                        <img src="{{ $item['image'] }}" 
                             alt="{{ $item['name'] }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                             loading="lazy"
                             onerror="this.onerror=null; this.src='https://via.placeholder.com/600x450/f3f4f6/9ca3af?text=Japanese+Food';">
                        
                        <div class="absolute top-4 left-4">
                            <span class="inline-block bg-red-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg">
                                {{ $item['badge'] }}
                            </span>
                        </div>
                        
                        <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm px-3 py-1.5 rounded-full shadow-lg">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="text-xs font-bold text-gray-700">{{ $item['rating'] }}</span>
                            </div>
                        </div>
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    
                    
                    <div class="p-6">
                        <h3 class="font-bold text-primary-dark mb-4 line-clamp-2 min-h-[3.5rem] text-lg group-hover:text-red-600 transition-colors text-balance">
                            {{ $item['name'] }}
                        </h3>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-xs mb-1">Starting at</p>
                                <span class="text-3xl font-bold text-red-600">₱{{ number_format($item['price'], 0) }}</span>
                            </div>
                            <button 
                                @click="$store.cart.addToCart({{ $item['id'] }}, '{{ addslashes($item['name']) }}', {{ $item['price'] }}, '{{ $item['image'] }}')"
                                class="relative bg-red-600 hover:bg-red-700 text-white w-14 h-14 rounded-2xl flex items-center justify-center transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-110 group/btn">
                                <svg class="w-6 h-6 transition-transform group-hover/btn:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<section class="container mx-auto px-4 py-24">
    <div class="grid md:grid-cols-2 gap-16 items-center">
        
        <div class="relative group">
            <div class="absolute -inset-6 bg-gradient-to-br from-red-100 via-red-50 to-primary-light/20 rounded-3xl transform -rotate-3 group-hover:rotate-0 transition-transform duration-500"></div>
            <div class="relative aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl">
                <img src="https://images.pexels.com/photos/1267320/pexels-photo-1267320.jpeg?auto=compress&cs=tinysrgb&w=1200&h=900&fit=crop" 
                     alt="Japanese Restaurant Interior"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                     loading="lazy"
                     onerror="this.onerror=null; this.src='https://via.placeholder.com/1200x900/f3f4f6/9ca3af?text=Japanese+Restaurant';">
            </div>
        </div>
        
        
        <div>
            <div class="inline-block bg-red-100 text-red-600 font-semibold px-4 py-2 rounded-full mb-6">
                Since 2020
            </div>
            <h2 class="text-5xl md:text-6xl font-bold font-serif text-primary-dark mb-6 text-balance">
                和食 Washoku
            </h2>
            <h3 class="text-2xl font-semibold text-gray-700 mb-6 text-balance">
                Authentic Japanese Restaurant
            </h3>
            <p class="text-gray-600 text-lg leading-relaxed mb-6 text-pretty">
                Welcome to Washoku, your destination for authentic Japanese cuisine delivered to your doorstep. 
                Experience the art of Japanese culinary tradition with every meal.
            </p>
            <p class="text-gray-600 leading-relaxed mb-6 text-pretty">
                Our menu serves up many of your favorite comfort foods, including premium bento boxes, 
                authentic ramen, fresh sushi, and savory teriyaki dishes prepared by our expert chefs.
            </p>
            <p class="text-gray-600 leading-relaxed mb-8 text-pretty">
                Explore our menu for more delicious Japanese meals at affordable prices and 
                discover why we are known to be the country's favorite Japanese restaurant.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="/menu" 
                   class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-bold px-8 py-4 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                    <span>Explore Menu</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
                <a href="/bento-builder" 
                   class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-red-600 border-2 border-red-600 font-bold px-8 py-4 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                    <span>Build Bento</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
