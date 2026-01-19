

<?php $__env->startSection('title', 'Home - Washoku Japanese Restaurant'); ?>

<?php $__env->startSection('content'); ?>

<!-- Hero Section - Dark Japanese Theme -->
<section class="relative min-h-[700px] bg-gradient-to-br from-[#1a1a1a] via-[#2d1f1f] to-[#1a1a1a] overflow-hidden">
    
    <!-- Seigaiha Wave Pattern -->
    <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
    
    <!-- Decorative Glows with Parallax -->
    <div class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-red-600/10 rounded-full blur-3xl parallax-slow float" data-speed="0.3"></div>
    <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-amber-400/10 rounded-full blur-3xl parallax-slow float-delayed" data-speed="0.2"></div>
    
    <!-- Floating Cherry Blossoms -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="cherry-petal petal-1"></div>
        <div class="cherry-petal petal-2"></div>
        <div class="cherry-petal petal-3"></div>
        <div class="cherry-petal petal-4"></div>
        <div class="cherry-petal petal-5"></div>
    </div>
    
    <!-- Gold Accent Lines -->
    <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-amber-400/50 to-transparent"></div>
    
    <div class="relative z-10 w-full">
        <!-- Header Text -->
        <div class="container mx-auto px-4 pt-20 pb-8">
            <div class="max-w-6xl mx-auto text-center">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm px-6 py-2.5 rounded-full mb-6 border border-white/10 reveal-scale" style="transition-delay: 100ms;">
                    <span class="text-amber-400 text-lg">🍱</span>
                    <span class="text-white/90 text-sm font-medium tracking-wide">Premium Japanese Cuisine</span>
                </div>
                <h1 class="text-6xl md:text-8xl font-bold font-english text-white mb-6 leading-tight reveal" style="transition-delay: 200ms;">
                    PREMIUM <span class="gradient-text-animate">BENTO</span>
                </h1>
                <p class="text-white/70 text-center text-xl md:text-2xl mb-8 max-w-3xl mx-auto reveal" style="transition-delay: 300ms;">
                    Authentic Japanese flavors in one beautiful box
                </p>
            </div>
        </div>
        
        <!-- Bento Banner Carousel - Aligned with Nav -->
        <div class="container mx-auto px-4">
            <div x-data="{ 
                currentSlide: 0,
                bentos: [
                    {
                        name: 'Character/Decorative Bento (Kyaraben)',
                        description: 'Bento designed with creative food art, especially popular for kids',
                        image: 'https://static1.squarespace.com/static/6217a6968b376a434418ae8b/t/6416043616fc5e2dca82c202/1679164471002/Show%2BYour%2BLove%2Bwith%2Bour%2BMiso%2BTasty%2BBento%2BBox%2BLunch%2BIdeas.jpg?format=1500w',
                        price: 299,
                        isCustomBento: false
                    },
                    {
                        name: 'Makunouchi Bento',
                        description: 'Classic lunch box with rice, grilled fish, egg, and pickles',
                        image: 'https://www.webstaurantstore.com/uploads/blog/2023/1/bento-box_what-is-bento.jpg',
                        price: 329,
                        isCustomBento: false
                    },
                    {
                        name: 'Premium Bento Box',
                        description: 'Build your own! Choose main dish and 3 sides',
                        image: 'https://m.media-amazon.com/images/I/71E1qGpcb3L.jpg',
                        price: 399,
                        isCustomBento: true
                    }
                ],
                getLink(bento) {
                    return bento.isCustomBento 
                        ? '/bento-builder' 
                        : '/menu/bento-boxes?item=' + encodeURIComponent(bento.name);
                },
                autoRotate() {
                    setInterval(() => {
                        this.currentSlide = (this.currentSlide + 1) % this.bentos.length;
                    }, 5000);
                }
            }" 
            x-init="autoRotate()"
            class="relative">
                
                <!-- Banner Container - With Border -->
                <div class="relative overflow-hidden rounded-2xl border border-white/20 shadow-2xl">
                    
                        <!-- Left Arrow -->
                        <button 
                            @click="currentSlide = (currentSlide - 1 + bentos.length) % bentos.length" 
                            class="absolute left-4 md:left-6 top-1/2 -translate-y-1/2 z-20 w-10 h-10 md:w-12 md:h-12 rounded-full bg-black/40 backdrop-blur-sm border border-white/20 hover:bg-black/60 hover:border-amber-400/50 transition-all duration-300 flex items-center justify-center group shadow-lg">
                            <svg class="w-5 h-5 md:w-6 md:h-6 text-white/90 group-hover:text-amber-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        
                        <!-- Right Arrow -->
                        <button 
                            @click="currentSlide = (currentSlide + 1) % bentos.length" 
                            class="absolute right-4 md:right-6 top-1/2 -translate-y-1/2 z-20 w-10 h-10 md:w-12 md:h-12 rounded-full bg-black/40 backdrop-blur-sm border border-white/20 hover:bg-black/60 hover:border-amber-400/50 transition-all duration-300 flex items-center justify-center group shadow-lg">
                            <svg class="w-5 h-5 md:w-6 md:h-6 text-white/90 group-hover:text-amber-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                        
                        <!-- Banner Slides -->
                        <div class="relative w-full h-[350px] md:h-[450px] lg:h-[500px] overflow-hidden">
                            <template x-for="(bento, index) in bentos" :key="index">
                                <div 
                                    x-show="currentSlide === index"
                                    x-transition.opacity.duration.500ms
                                    class="absolute inset-0 w-full h-full">
                                    
                                    <!-- Background Image -->
                                    <img :src="bento.image" :alt="bento.name" 
                                         class="w-full h-full object-cover object-center"
                                         onerror="this.onerror=null; this.src='https://via.placeholder.com/1200x450/1a1a1a/9ca3af?text=Bento';">
                                    
                                    <!-- Gradient Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-transparent"></div>
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                    
                                    <!-- Content Overlay -->
                                    <div class="absolute inset-0 flex items-center">
                                        <div class="px-8 md:px-16 lg:px-20 max-w-2xl">
                                            <!-- Badge -->
                                            <div class="inline-flex items-center gap-2 bg-amber-400/20 backdrop-blur-sm px-4 py-2 rounded-full mb-4 border border-amber-400/30">
                                                <span class="text-amber-400 text-sm font-semibold">Featured Bento</span>
                                            </div>
                                            
                                            <!-- Title -->
                                            <h3 class="text-2xl md:text-4xl lg:text-5xl font-bold text-white mb-3 leading-tight" x-text="bento.name"></h3>
                                            
                                            <!-- Description -->
                                            <p class="text-white/70 text-sm md:text-lg mb-6 max-w-md" x-text="bento.description"></p>
                                            
                                            <!-- Price & CTA -->
                                            <div class="flex flex-wrap items-center gap-4">
                                                <div class="bg-white/10 backdrop-blur-sm px-5 py-3 rounded-xl border border-white/10">
                                                    <span class="text-white/60 text-sm">Starting at</span>
                                                    <span class="text-amber-400 font-bold text-2xl md:text-3xl ml-2">₱<span x-text="bento.price"></span></span>
                                                </div>
                                                <a :href="getLink(bento)" 
                                                   class="group inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white font-bold px-6 py-3 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                                                    <span x-text="bento.isCustomBento ? 'Build Now' : 'Order Now'"></span>
                                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                        
                        <!-- Dots Indicator (inside banner) -->
                        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex gap-2">
                            <template x-for="(bento, index) in bentos" :key="index">
                                <button 
                                    @click="currentSlide = index"
                                    :class="currentSlide === index ? 'w-8 bg-amber-400' : 'w-3 bg-white/40 hover:bg-white/60'"
                                    class="h-3 rounded-full transition-all duration-300">
                                </button>
                            </template>
                        </div>
                    </div>
                
                <!-- CTA Button Below Banner -->
                <div class="text-center mt-10 pb-12">
                    <a href="/bento-builder" 
                       class="group relative inline-flex items-center gap-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white font-bold text-xl px-12 py-5 rounded-full transition-all duration-300 shadow-xl hover:shadow-red-900/40 hover:scale-105 overflow-hidden border border-red-500/30">
                        <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-700 bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
                        <span class="relative">Build Your Bento</span>
                        <svg class="relative w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    <p class="text-white/50 text-sm mt-4">Starting at ₱299 • Customize to your taste</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bottom Gold Accent -->
    <div class="absolute bottom-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-amber-400/40 to-transparent"></div>
</section>

<!-- Stats Bar - Dark Theme with Count-Up -->
<section class="relative bg-gradient-to-r from-[#1a1a1a] via-[#252525] to-[#1a1a1a] py-16 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03] seigaiha-pattern"></div>
    
    <!-- Decorative elements -->
    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-32 h-32 bg-red-500/10 rounded-full blur-2xl"></div>
    <div class="absolute right-0 top-1/2 -translate-y-1/2 w-32 h-32 bg-amber-500/10 rounded-full blur-2xl"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 stagger-children">
            <div class="text-center group relative">
                <div class="absolute inset-0 bg-gradient-to-b from-amber-400/5 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative p-6">
                    <div class="text-4xl md:text-5xl font-bold font-english text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-300 mb-2 group-hover:scale-110 transition-transform">
                        <span data-count-up="10" data-suffix="K+">0K+</span>
                    </div>
                    <div class="text-white/60 font-medium">Happy Customers</div>
                    <div class="w-12 h-1 bg-gradient-to-r from-amber-400/50 to-transparent mx-auto mt-4 rounded-full group-hover:w-20 transition-all duration-500"></div>
                </div>
            </div>
            <div class="text-center group relative">
                <div class="absolute inset-0 bg-gradient-to-b from-amber-400/5 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative p-6">
                    <div class="text-4xl md:text-5xl font-bold font-english text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-300 mb-2 group-hover:scale-110 transition-transform">
                        <span data-count-up="50" data-suffix="+">0+</span>
                    </div>
                    <div class="text-white/60 font-medium">Menu Items</div>
                    <div class="w-12 h-1 bg-gradient-to-r from-amber-400/50 to-transparent mx-auto mt-4 rounded-full group-hover:w-20 transition-all duration-500"></div>
                </div>
            </div>
            <div class="text-center group relative">
                <div class="absolute inset-0 bg-gradient-to-b from-amber-400/5 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative p-6">
                    <div class="text-4xl md:text-5xl font-bold font-english text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-300 mb-2 group-hover:scale-110 transition-transform">
                        4.9<svg class="w-8 h-8 inline-block text-amber-400 -mt-2 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <div class="text-white/60 font-medium">Average Rating</div>
                    <div class="w-12 h-1 bg-gradient-to-r from-amber-400/50 to-transparent mx-auto mt-4 rounded-full group-hover:w-20 transition-all duration-500"></div>
                </div>
            </div>
            <div class="text-center group relative">
                <div class="absolute inset-0 bg-gradient-to-b from-amber-400/5 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative p-6">
                    <div class="text-4xl md:text-5xl font-bold font-english text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-300 mb-2 group-hover:scale-110 transition-transform">24/7</div>
                    <div class="text-white/60 font-medium">Order Support</div>
                    <div class="w-12 h-1 bg-gradient-to-r from-amber-400/50 to-transparent mx-auto mt-4 rounded-full group-hover:w-20 transition-all duration-500"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Japanese Wave Divider -->
<div class="wave-divider bg-gradient-to-r from-[#1a1a1a] via-[#252525] to-[#1a1a1a]">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="fill-[#f8f5f0]">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"></path>
    </svg>
</div>

<!-- Featured Categories - With Images -->
<section class="bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] py-24 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-red-100/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-amber-100/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-4 reveal">
            <div>
                <p class="text-red-600 font-semibold text-sm tracking-wider uppercase mb-3">Our Menu</p>
                <h2 class="text-4xl md:text-5xl font-bold font-english text-gray-800 underline-animate inline-block">Featured Categories</h2>
                <p class="text-gray-500 mt-3">Explore our diverse selection of authentic Japanese dishes</p>
            </div>
            <a href="/menu" class="group inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white font-semibold px-6 py-3 rounded-full transition-all shadow-lg hover:shadow-xl hover:scale-105 glow-red">
                <span>View All</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5 stagger-children">
            <?php
            $categories = [
                ['name' => 'Build Your Bento', 'slug' => 'build-your-bento', 'image' => 'https://imgs.search.brave.com/WWSv1pHBLW6u_iNhuV9iH_sBPXCQSGrEkyyP_H_qjQE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvNTQw/NTMwODcwL3Bob3Rv/L2tpZHMtYmVudG8t/Zm9vZC5qcGc_cz02/MTJ4NjEyJnc9MCZr/PTIwJmM9d3o2NlNB/VXVlREFWU25BSUVZ/di0yTUVCbi0tcnRW/VVkySFRSVlEzdl9n/WT0'],
                ['name' => 'Bento Sets', 'slug' => 'bento-boxes', 'image' => 'https://imgs.search.brave.com/cyO9guESIT2aE2gj1IPXal82LeUN6NWYhD-mJZITdCY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90aHVt/YnMuZHJlYW1zdGlt/ZS5jb20vYi92YXJp/ZXR5LWNvbG9yZnVs/LWJlbnRvLWJveGVz/LWZpbGxlZC1zdXNo/aS1yb2xscy10ZW1w/dXJhLXNocmltcC1y/aWNlLXBpY2tsZWQt/dmVnZXRhYmxlcy12/YXJpZXR5LWNvbG9y/ZnVsLWJlbnRvLWJv/eGVzLTM4MDY5OTI1/Mi5qcGc'],
                ['name' => 'Ramen', 'slug' => 'ramen', 'image' => 'https://imgs.search.brave.com/newkFCOdy73B_l6faYPFCBXcJ0aTiI14sIGommgr2kM/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5nZXR0eWltYWdl/cy5jb20vaWQvMTM0/MDA5MTkzNi9waG90/by9yYW1lbi1zb3Vw/LXNlcnZlZC1hdC10/aGUtcmVzdGF1cmFu/dC1kaXJlY3RseS1h/Ym92ZS12aWV3Lmpw/Zz9zPTYxMng2MTIm/dz0wJms9MjAmYz02/STJNN0p5c28wNzBD/em8xM0stejYyUV9r/dVNrdzh5eDhVbkxj/d0hFalpZPQ'],
                ['name' => 'Sushi Rolls', 'slug' => 'sushi', 'image' => 'https://images.pexels.com/photos/1052189/pexels-photo-1052189.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop'],
                ['name' => 'Donburi Bowls', 'slug' => 'donburi', 'image' => 'https://imgs.search.brave.com/ptGDXp2CbPuai3lAB9MhxkWahWTgQGxcDLnQpjt3Jbg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tdXN1/YmlraWxuLmNvbS9j/ZG4vc2hvcC9maWxl/cy9mdWt1aG91LWtp/bG4tdG9rdXNhLWhh/c2FtaS1kb25idXJp/LWJvd2wtcy1tdXN1/Ymkta2lsbi1xdWFs/aXR5LWphcGFuZXNl/LXRhYmxld2FyZXMt/YW5kLWdpZnRzLTQ1/MjMwMy5qcGc_dj0x/NzU4NzY0ODI1Jndp/ZHRoPTIwMDA'],
                ['name' => 'Tempura', 'slug' => 'tempura', 'image' => 'https://imgs.search.brave.com/dgGD3ZERAmKb4LIY4zyo1pRjtuOoadjFWsfKOYfrm_0/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5nZXR0eWltYWdl/cy5jb20vaWQvODY4/MDA0ODc2L3Bob3Rv/L2Zvb2Qtc2FtcGxl/LW9mLXRlbXB1cmEu/anBnP3M9NjEyeDYx/MiZ3PTAmaz0yMCZj/PW9tWlNrMm0xYjNh/WGVaUHN0c1JzOExi/UHY3T3lQdjBjazE0/eFhkUXhqNUU9']
            ];
            ?>
            
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($category['slug'] === 'build-your-bento' ? '/bento-builder' : '/menu/' . $category['slug']); ?>" 
                   class="group block">
                    <div class="tilt-card relative bg-white rounded-2xl shadow-lg card-shadow-hover overflow-hidden border border-gray-100 hover:border-red-200">
                        
                        <!-- Image -->
                        <div class="aspect-square overflow-hidden">
                            <img src="<?php echo e($category['image']); ?>" 
                                 alt="<?php echo e($category['name']); ?>"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                 loading="lazy"
                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=<?php echo e(urlencode($category['name'])); ?>';">
                            
                            <!-- Overlay on hover -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            
                            <!-- Shimmer on hover -->
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <div class="absolute inset-0 shimmer"></div>
                            </div>
                        </div>
                        
                        <!-- Title -->
                        <div class="p-4 text-center bg-white group-hover:bg-gradient-to-br group-hover:from-[#1a1a1a] group-hover:to-[#2d1f1f] transition-all duration-500">
                            <h3 class="text-sm font-bold text-gray-800 group-hover:text-white transition-colors duration-500">
                                <?php echo e($category['name']); ?>

                            </h3>
                        </div>
                        
                        <!-- Bottom Accent -->
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-red-500 via-amber-500 to-red-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- Japanese Wave Divider (Top) -->
<div class="wave-divider wave-divider-top bg-gradient-to-br from-[#f5f1e8] to-[#ebe5d9]">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="fill-[#f8f5f0]">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"></path>
    </svg>
</div>

<!-- Customer Favorites - Refined Cards -->
<section class="bg-gradient-to-br from-[#f5f1e8] to-[#ebe5d9] py-24 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-red-100/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-amber-100/20 rounded-full blur-3xl"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-4 reveal">
            <div>
                <p class="text-red-600 font-semibold text-sm tracking-wider uppercase mb-3">Best Sellers</p>
                <h2 class="text-4xl md:text-5xl font-bold font-english text-gray-800 underline-animate inline-block">Customer Favorites</h2>
                <p class="text-gray-500 mt-3">Most loved dishes by our customers</p>
            </div>
            <a href="/menu" class="group inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white font-semibold px-6 py-3 rounded-full transition-all shadow-lg hover:shadow-xl hover:scale-105 glow-red">
                <span>View All</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 stagger-children">
            <?php
            $bestsellers = [
                ['id' => 1, 'name' => 'Teriyaki Chicken Bento w/ Miso Soup', 'price' => 249, 'image' => 'https://imgs.search.brave.com/Cvb7g7a0VAcBfUEp0dI_m6H4Q3XgyCbH6C0piHnGQjY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS1jZG4udHJpcGFk/dmlzb3IuY29tL21l/ZGlhL3Bob3RvLW8v/MTEvZmEvMzIvM2Mv/Y2hpY2tlbi10ZXJp/eWFraS1zZXQuanBn', 'badge' => 'Popular', 'rating' => 4.9],
                ['id' => 2, 'name' => 'Salmon Sashimi Set w/ Rice & Salad', 'price' => 389, 'image' => 'https://images.pexels.com/photos/1052189/pexels-photo-1052189.jpeg?auto=compress&cs=tinysrgb&w=600&h=450&fit=crop', 'badge' => 'Fresh', 'rating' => 5.0],
                ['id' => 3, 'name' => 'Tonkatsu Pork Cutlet w/ Curry Rice', 'price' => 299, 'image' => 'https://imgs.search.brave.com/DFfVbZCzKExcxxXIIoBdkrSYEZQi2MUiLk78XbVBUqY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/a2l0Y2hlbnNhbmN0/dWFyeS5jb20vd3At/Y29udGVudC91cGxv/YWRzLzIwMTUvMTAv/a2F0c3Vkb24tUG9y/ay10YWxsMS53ZWJw', 'badge' => 'Chef Special', 'rating' => 4.8],
                ['id' => 4, 'name' => 'Custom Bento Box (4 compartments)', 'price' => 399, 'image' => 'https://imgs.search.brave.com/KlkAiQ3hziE8jrVJSZAued2Oy283CHc4qpjvJH5KGjI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTI1/MjczODI0Ni9waG90/by9yZWQtYW5kLWJs/YWNrLWVtcHR5LWJl/bnRvLWJveC10cmFk/aXRpb25hbC1qYXBh/bmVzZS10cmF5LW1h/ZGUtZm9yLWx1bmNo/LmpwZz9zPTYxMng2/MTImdz0wJms9MjAm/Yz0tbndGT1MyaXlZ/SW5Henc3QmFQcndU/bWpuT2tHRmFBbUtP/NUhjLU1KUmZRPQ', 'badge' => 'Customizable', 'rating' => 4.9, 'link' => '/bento-builder']
            ];
            ?>
            
            <?php $__currentLoopData = $bestsellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($item['link'])): ?>
                <a href="<?php echo e($item['link']); ?>" class="group block">
                <?php else: ?>
                <div class="group">
                <?php endif; ?>
                    <div class="tilt-card relative bg-white rounded-2xl shadow-lg overflow-hidden card-shadow-hover border border-gray-100 hover:border-red-200">
                        
                        <!-- Image -->
                        <div class="relative h-48 overflow-hidden">
                            <img src="<?php echo e($item['image']); ?>" 
                                 alt="<?php echo e($item['name']); ?>"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                 loading="lazy"
                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/600x450/f3f4f6/9ca3af?text=Japanese+Food';">
                            
                            <!-- Badge -->
                            <div class="absolute top-3 left-3">
                                <span class="inline-block bg-gradient-to-r from-red-600 to-red-700 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                                    <?php echo e($item['badge']); ?>

                                </span>
                            </div>
                            
                            <!-- Rating -->
                            <div class="absolute top-3 right-3 bg-white/95 backdrop-blur-sm px-2.5 py-1 rounded-full shadow-lg">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-amber-400 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <span class="text-xs font-bold text-gray-700"><?php echo e($item['rating']); ?></span>
                                </div>
                            </div>
                            
                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-5">
                            <h3 class="font-bold text-gray-800 mb-3 line-clamp-2 min-h-[3rem] group-hover:text-red-600 transition-colors">
                                <?php echo e($item['name']); ?>

                            </h3>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-400 text-xs mb-0.5">Starting at</p>
                                    <span class="text-2xl font-bold text-red-600">₱<?php echo e(number_format($item['price'], 0)); ?></span>
                                </div>
                                <?php if(isset($item['link'])): ?>
                                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                </div>
                                <?php else: ?>
                                <button 
                                    @click="$store.cart.addToCart(<?php echo e($item['id']); ?>, '<?php echo e(addslashes($item['name'])); ?>', <?php echo e($item['price']); ?>, '<?php echo e($item['image']); ?>')"
                                    class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 hover:from-red-400 hover:to-red-500 rounded-xl flex items-center justify-center shadow-lg hover:scale-110 transition-all">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php if(isset($item['link'])): ?>
                </a>
                <?php else: ?>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- About Section - Japanese Decorative Elements -->
<section class="bg-gradient-to-br from-[#f8f5f0] to-[#f5f1e8] py-24 relative overflow-hidden">
    <!-- Decorative Torii Gate Silhouette -->
    <div class="absolute top-10 right-10 opacity-[0.03]">
        <svg class="w-64 h-64" viewBox="0 0 100 100" fill="currentColor">
            <rect x="10" y="20" width="6" height="70" rx="1"/>
            <rect x="84" y="20" width="6" height="70" rx="1"/>
            <rect x="5" y="15" width="90" height="8" rx="2"/>
            <rect x="0" y="8" width="100" height="6" rx="2"/>
            <rect x="16" y="35" width="68" height="5" rx="1"/>
        </svg>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            
            <!-- Image -->
            <div class="relative group reveal-left">
                <div class="absolute -inset-4 bg-gradient-to-br from-red-200/50 via-amber-100/50 to-red-100/50 rounded-3xl transform -rotate-2 group-hover:rotate-0 transition-transform duration-500"></div>
                <div class="relative aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl">
                    <img src="https://images.pexels.com/photos/1267320/pexels-photo-1267320.jpeg?auto=compress&cs=tinysrgb&w=1200&h=900&fit=crop" 
                         alt="Japanese Restaurant Interior"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                         loading="lazy"
                         onerror="this.onerror=null; this.src='https://via.placeholder.com/1200x900/f3f4f6/9ca3af?text=Japanese+Restaurant';">
                </div>
                
                <!-- Floating Badge with pulse -->
                <div class="absolute -bottom-4 -right-4 bg-gradient-to-br from-[#1a1a1a] to-[#2d1f1f] text-white px-6 py-4 rounded-2xl shadow-xl pulse-glow">
                    <div class="text-amber-400 text-3xl font-bold font-display">5+</div>
                    <div class="text-white/70 text-sm">Years of Excellence</div>
                </div>
            </div>
            
            <!-- Content -->
            <div class="reveal-right">
                <p class="text-red-600 font-semibold text-sm tracking-wider uppercase mb-3">Since 2020</p>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                    <span class="font-japanese gradient-text-animate">和食</span> <span class="font-english">Washoku</span>
                </h2>
                <h3 class="text-xl font-semibold text-gray-600 mb-6">
                    Authentic Japanese Restaurant
                </h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Welcome to Washoku, your destination for authentic Japanese cuisine delivered to your doorstep. 
                    Experience the art of Japanese culinary tradition with every meal.
                </p>
                <p class="text-gray-500 leading-relaxed mb-8">
                    Our menu serves up many of your favorite comfort foods, including premium bento boxes, 
                    authentic ramen, fresh sushi, and savory teriyaki dishes prepared by our expert chefs.
                </p>
                
                <!-- Features -->
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-gray-700 font-medium">Fresh Daily</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-gray-700 font-medium">Authentic Recipes</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-gray-700 font-medium">Fast Delivery</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-gray-700 font-medium">Best Quality</span>
                    </div>
                </div>
                
                <div class="flex flex-wrap gap-4">
                    <a href="/menu" 
                       class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white font-bold px-8 py-4 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                        <span>Explore Menu</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    <a href="/bento-builder" 
                       class="inline-flex items-center gap-2 bg-white text-red-600 border-2 border-red-200 hover:border-red-300 font-bold px-8 py-4 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl">
                        <span>Build Bento</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>





















<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/home.blade.php ENDPATH**/ ?>