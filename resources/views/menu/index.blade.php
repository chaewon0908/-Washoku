@extends('layouts.app')

@section('title', 'Menu')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] relative overflow-hidden">
    
    <!-- Background Decorations -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-red-100/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-amber-100/20 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <!-- Hero Header Section -->
    <div class="relative bg-gradient-to-br from-[#1a1a1a] via-[#2d1f1f] to-[#1a1a1a] py-16 overflow-hidden">
        <!-- Pattern Overlay -->
        <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
        
        <!-- Decorative Glows -->
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-red-600/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-amber-400/10 rounded-full blur-3xl"></div>
        
        <!-- Gold Accent Lines -->
        <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-amber-400/50 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-amber-400/30 to-transparent"></div>
        
        <div class="container mx-auto px-4 relative z-10 text-center">
            <p class="text-amber-400/80 text-sm font-medium tracking-widest uppercase mb-4 reveal-scale">Discover Our Cuisine</p>
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 font-display reveal">
                Our <span class="gradient-text-animate">Menu</span>
            </h1>
            <div class="flex items-center justify-center gap-3 mb-6 reveal-scale" style="transition-delay: 200ms;">
                <div class="h-[2px] w-16 bg-gradient-to-r from-transparent to-red-500"></div>
                <div class="w-2 h-2 bg-amber-400 rounded-full"></div>
                <div class="h-[2px] w-16 bg-gradient-to-l from-transparent to-red-500"></div>
            </div>
            <p class="text-white/60 text-lg max-w-2xl mx-auto reveal" style="transition-delay: 300ms;">
                Authentic Japanese cuisine, crafted with passion and tradition
            </p>
        </div>
    </div>
    
    <!-- Categories Grid -->
    <div class="container mx-auto px-4 py-16 relative z-10">
        @if($categories->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto stagger-children">
            @php
                $categoryStyles = [
                    'Bento Boxes' => ['icon' => 'bento', 'color' => 'red'],
                    'Sushi' => ['icon' => 'sushi', 'color' => 'pink'],
                    'Ramen' => ['icon' => 'ramen', 'color' => 'amber'],
                    'Drinks' => ['icon' => 'drinks', 'color' => 'blue'],
                    'Appetizers' => ['icon' => 'appetizer', 'color' => 'green'],
                    'Tempura' => ['icon' => 'tempura', 'color' => 'orange'],
                    'Desserts' => ['icon' => 'dessert', 'color' => 'purple'],
                    'Donburi' => ['icon' => 'donburi', 'color' => 'red'],
                ];
                $defaultStyle = ['icon' => 'bento', 'color' => 'gray'];
            @endphp
            
            @foreach($categories as $category)
                @php
                    $style = $categoryStyles[$category->name] ?? $defaultStyle;
                    $categorySlug = $category->slug ?? \Illuminate\Support\Str::slug($category->name);
                @endphp
                @if($categorySlug)
                <a href="{{ route('menu.category', $categorySlug) }}" class="group block">
                    <div class="tilt-card relative bg-white rounded-2xl shadow-lg card-shadow-hover overflow-hidden border border-gray-100 hover:border-red-200">
                        
                        <!-- Hover Background -->
                        <div class="absolute inset-0 bg-gradient-to-br from-[#1a1a1a] to-[#2d1f1f] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <!-- Content -->
                        <div class="relative p-8 text-center">
                            <!-- Icon -->
                            <div class="mb-6 flex justify-center">
                                <div class="relative w-20 h-20 bg-gradient-to-br from-red-50 to-amber-50 group-hover:from-red-600 group-hover:to-red-700 rounded-2xl flex items-center justify-center transition-all duration-500 shadow-lg group-hover:shadow-red-900/30">
                                    @switch($style['icon'])
                                        @case('bento')
                                            <svg class="w-10 h-10 text-red-500 group-hover:text-white transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <rect x="3" y="5" width="18" height="14" rx="2"/>
                                                <line x1="3" y1="12" x2="21" y2="12"/>
                                                <line x1="12" y1="5" x2="12" y2="19"/>
                                            </svg>
                                            @break
                                        @case('sushi')
                                            <svg class="w-10 h-10 text-pink-500 group-hover:text-white transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <ellipse cx="12" cy="12" rx="9" ry="5"/>
                                                <ellipse cx="12" cy="12" rx="5" ry="2.5"/>
                                                <path d="M12 7v10"/>
                                            </svg>
                                            @break
                                        @case('ramen')
                                            <svg class="w-10 h-10 text-amber-500 group-hover:text-white transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <path d="M4 11h16c0 5-3.5 9-8 9s-8-4-8-9z"/>
                                                <path d="M8 6c0-1 .5-2 .5-2M12 5c0-1 .5-2 .5-2M16 6c0-1 .5-2 .5-2"/>
                                                <line x1="2" y1="11" x2="22" y2="11"/>
                                            </svg>
                                            @break
                                        @case('drinks')
                                            <svg class="w-10 h-10 text-blue-500 group-hover:text-white transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <path d="M8 2h8l-1 10H9L8 2z"/>
                                                <path d="M9 12h6v2a4 4 0 01-4 4h-2"/>
                                                <line x1="12" y1="18" x2="12" y2="22"/>
                                                <line x1="9" y1="22" x2="15" y2="22"/>
                                            </svg>
                                            @break
                                        @case('appetizer')
                                            <svg class="w-10 h-10 text-green-500 group-hover:text-white transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <circle cx="12" cy="14" r="6"/>
                                                <path d="M12 8V4M9 6l3-2 3 2"/>
                                            </svg>
                                            @break
                                        @case('tempura')
                                            <svg class="w-10 h-10 text-orange-500 group-hover:text-white transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <path d="M12 3c3 0 6 3 6 8s-3 10-6 10-6-5-6-10 3-8 6-8z"/>
                                                <line x1="12" y1="21" x2="12" y2="24"/>
                                            </svg>
                                            @break
                                        @case('dessert')
                                            <svg class="w-10 h-10 text-purple-500 group-hover:text-white transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <path d="M8 14h8l1 6H7l1-6z"/>
                                                <path d="M6 14c0-4 2-6 6-6s6 2 6 6"/>
                                                <circle cx="12" cy="5" r="2"/>
                                            </svg>
                                            @break
                                        @case('donburi')
                                            <svg class="w-10 h-10 text-red-500 group-hover:text-white transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <path d="M4 12h16c0 5-3.5 8-8 8s-8-3-8-8z"/>
                                                <ellipse cx="12" cy="12" rx="8" ry="3"/>
                                                <circle cx="9" cy="11" r="1" fill="currentColor"/>
                                                <circle cx="15" cy="11" r="1" fill="currentColor"/>
                                            </svg>
                                            @break
                                        @default
                                            <svg class="w-10 h-10 text-gray-500 group-hover:text-white transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <rect x="3" y="5" width="18" height="14" rx="2"/>
                                                <line x1="3" y1="12" x2="21" y2="12"/>
                                            </svg>
                                    @endswitch
                                </div>
                            </div>
                            
                            <!-- Title -->
                            <h2 class="text-xl font-bold text-gray-800 group-hover:text-white mb-2 transition-colors duration-500">
                                {{ $category->name }}
                            </h2>
                            
                            <!-- Description -->
                            @if($category->description)
                                <p class="text-gray-500 group-hover:text-white/70 text-sm mb-6 line-clamp-2 transition-colors duration-500">
                                    {{ $category->description }}
                                </p>
                            @else
                                <p class="text-gray-400 group-hover:text-white/60 text-sm mb-6 transition-colors duration-500">
                                    Explore our selection
                                </p>
                            @endif
                            
                            <!-- CTA Button -->
                            <div class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 group-hover:from-amber-500 group-hover:to-amber-600 text-white text-sm font-semibold rounded-full transition-all duration-500 shadow-lg">
                                <span>View Items</span>
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Bottom Accent Line -->
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-red-500 via-amber-500 to-red-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    </div>
                </a>
                @endif
            @endforeach
        </div>
        @else
        <div class="text-center py-16">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-700 mb-2">No categories available</h2>
            <p class="text-gray-500">Categories will appear here once added.</p>
        </div>
        @endif
        
        <!-- Bottom Info Bar -->
        <div class="mt-16 text-center">
            <div class="inline-flex items-center gap-6 px-8 py-4 bg-white rounded-2xl shadow-lg border border-gray-100">
                <div class="flex items-center gap-2 text-gray-600">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                    </svg>
                    <span class="text-sm font-medium">Fresh daily</span>
                </div>
                <div class="w-px h-5 bg-gray-200"></div>
                <div class="flex items-center gap-2 text-gray-600">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                    <span class="text-sm font-medium">Authentic recipes</span>
                </div>
                <div class="w-px h-5 bg-gray-200"></div>
                <div class="flex items-center gap-2 text-gray-600">
                    <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-sm font-medium">Made with love</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
