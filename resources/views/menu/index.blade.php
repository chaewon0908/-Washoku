@extends('layouts.app')

@section('title', 'Menu')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-red-50/30 to-amber-50/40 py-16 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-red-200/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-orange-200/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-amber-100/10 rounded-full blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <div class="inline-block mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-red-400 via-orange-400 to-amber-400 rounded-full blur-2xl opacity-30 animate-pulse"></div>
                <h1 class="relative text-6xl md:text-7xl font-serif font-extrabold bg-gradient-to-r from-red-600 via-orange-500 to-amber-500 bg-clip-text text-transparent mb-6 tracking-tight">
                    Our Menu
                </h1>
            </div>
            <div class="flex items-center justify-center gap-2 mb-4">
                <div class="h-1 w-16 bg-gradient-to-r from-transparent via-red-400 to-red-500 rounded-full"></div>
                <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                <div class="h-1 w-16 bg-gradient-to-l from-transparent via-orange-400 to-orange-500 rounded-full"></div>
            </div>
            <p class="text-xl text-gray-700 max-w-2xl mx-auto font-light leading-relaxed">
                Discover our authentic Japanese cuisine, crafted with passion and tradition
            </p>
        </div>
        
        <!-- Categories Grid -->
        @if($categories->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
            @php
                $categoryIcons = [
                    'Bento Boxes' => [
                        'icon' => '🍱', 
                        'gradient' => 'from-orange-500 via-red-500 to-rose-600', 
                        'bg' => 'bg-gradient-to-br from-orange-100 via-red-50 to-rose-50',
                        'hoverGradient' => 'from-orange-400 via-red-400 to-rose-500',
                        'textColor' => 'text-orange-600'
                    ],
                    'Sushi' => [
                        'icon' => '🍣', 
                        'gradient' => 'from-pink-500 via-rose-500 to-red-500', 
                        'bg' => 'bg-gradient-to-br from-pink-100 via-rose-50 to-red-50',
                        'hoverGradient' => 'from-pink-400 via-rose-400 to-red-400',
                        'textColor' => 'text-pink-600'
                    ],
                    'Ramen' => [
                        'icon' => '🍜', 
                        'gradient' => 'from-amber-500 via-orange-500 to-red-500', 
                        'bg' => 'bg-gradient-to-br from-amber-100 via-orange-50 to-red-50',
                        'hoverGradient' => 'from-amber-400 via-orange-400 to-red-400',
                        'textColor' => 'text-amber-600'
                    ],
                    'Drinks' => [
                        'icon' => '🥤', 
                        'gradient' => 'from-blue-500 via-cyan-500 to-teal-500', 
                        'bg' => 'bg-gradient-to-br from-blue-100 via-cyan-50 to-teal-50',
                        'hoverGradient' => 'from-blue-400 via-cyan-400 to-teal-400',
                        'textColor' => 'text-blue-600'
                    ],
                    'Appetizers' => [
                        'icon' => '🥟', 
                        'gradient' => 'from-green-500 via-emerald-500 to-teal-500', 
                        'bg' => 'bg-gradient-to-br from-green-100 via-emerald-50 to-teal-50',
                        'hoverGradient' => 'from-green-400 via-emerald-400 to-teal-400',
                        'textColor' => 'text-green-600'
                    ],
                    'Tempura' => [
                        'icon' => '🍤', 
                        'gradient' => 'from-yellow-500 via-amber-500 to-orange-500', 
                        'bg' => 'bg-gradient-to-br from-yellow-100 via-amber-50 to-orange-50',
                        'hoverGradient' => 'from-yellow-400 via-amber-400 to-orange-400',
                        'textColor' => 'text-yellow-600'
                    ],
                    'Desserts' => [
                        'icon' => '🍰', 
                        'gradient' => 'from-purple-500 via-pink-500 to-rose-500', 
                        'bg' => 'bg-gradient-to-br from-purple-100 via-pink-50 to-rose-50',
                        'hoverGradient' => 'from-purple-400 via-pink-400 to-rose-400',
                        'textColor' => 'text-purple-600'
                    ],
                    'Donburi' => [
                        'icon' => '🍚', 
                        'gradient' => 'from-red-500 via-orange-500 to-amber-500', 
                        'bg' => 'bg-gradient-to-br from-red-100 via-orange-50 to-amber-50',
                        'hoverGradient' => 'from-red-400 via-orange-400 to-amber-400',
                        'textColor' => 'text-red-600'
                    ],
                ];
                
                $defaultIcon = [
                    'icon' => '🍱', 
                    'gradient' => 'from-gray-400 to-gray-500', 
                    'bg' => 'bg-gradient-to-br from-gray-50 to-gray-100',
                    'hoverGradient' => 'from-gray-300 to-gray-400',
                    'textColor' => 'text-gray-600'
                ];
            @endphp
            
            @foreach($categories as $category)
                @php
                    $categoryData = $categoryIcons[$category->name] ?? $defaultIcon;
                    // Ensure slug exists to prevent errors
                    $categorySlug = $category->slug ?? \Illuminate\Support\Str::slug($category->name);
                @endphp
                @if($categorySlug)
                <a href="{{ route('menu.category', $categorySlug) }}" 
                   class="group relative block h-full">
                    <!-- Card Container with Glassmorphism -->
                    <div class="relative h-full bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-700 overflow-hidden transform hover:-translate-y-3 border border-white/50 hover:border-opacity-100">
                        <!-- Animated Gradient Background -->
                        <div class="absolute inset-0 bg-gradient-to-br {{ $categoryData['gradient'] }} opacity-0 group-hover:opacity-10 transition-opacity duration-700"></div>
                        
                        <!-- Shimmer Effect -->
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                        
                        <!-- Content -->
                        <div class="relative p-8 h-full flex flex-col z-10">
                            <!-- Icon Container with Enhanced Effects -->
                            <div class="mb-8 flex justify-center">
                                <div class="relative">
                                    <!-- Outer Glow -->
                                    <div class="absolute inset-0 bg-gradient-to-br {{ $categoryData['gradient'] }} rounded-full blur-2xl opacity-0 group-hover:opacity-40 transition-opacity duration-700 transform group-hover:scale-150"></div>
                                    
                                    <!-- Middle Glow -->
                                    <div class="absolute inset-0 bg-gradient-to-br {{ $categoryData['gradient'] }} rounded-full blur-lg opacity-0 group-hover:opacity-30 transition-opacity duration-700 transform group-hover:scale-125"></div>
                                    
                                    <!-- Icon Container -->
                                    <div class="relative w-28 h-28 {{ $categoryData['bg'] }} rounded-full flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-700 shadow-2xl group-hover:shadow-3xl border-4 border-white/50 group-hover:border-white">
                                        <!-- Inner Glow -->
                                        <div class="absolute inset-2 bg-gradient-to-br {{ $categoryData['gradient'] }} rounded-full opacity-0 group-hover:opacity-20 blur-md transition-opacity duration-700"></div>
                                        <span class="relative text-6xl transform group-hover:scale-110 group-hover:rotate-[-12deg] transition-all duration-700 filter drop-shadow-lg">{{ $categoryData['icon'] }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Title with Gradient -->
                            <h2 class="text-2xl font-extrabold text-center mb-4 {{ $categoryData['textColor'] }} group-hover:bg-gradient-to-r {{ $categoryData['gradient'] }} group-hover:bg-clip-text group-hover:text-transparent transition-all duration-500 tracking-tight">
                                {{ $category->name }}
                            </h2>
                            
                            <!-- Description -->
                            @if($category->description)
                                <p class="text-gray-600 text-center text-sm mb-8 flex-grow line-clamp-2 leading-relaxed group-hover:text-gray-700 transition-colors duration-300">
                                    {{ $category->description }}
                                </p>
                            @endif
                            
                            <!-- Enhanced CTA Button -->
                            <div class="mt-auto">
                                <div class="relative inline-flex items-center justify-center w-full px-6 py-4 bg-gradient-to-r {{ $categoryData['gradient'] }} text-white font-bold rounded-2xl shadow-lg group-hover:shadow-2xl transform group-hover:scale-105 transition-all duration-500 overflow-hidden">
                                    <!-- Button Shimmer -->
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                                    
                                    <span class="relative mr-2 tracking-wide">View Items</span>
                                    <svg class="relative w-5 h-5 transform group-hover:translate-x-2 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Decorative Corner Elements -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br {{ $categoryData['gradient'] }} opacity-0 group-hover:opacity-15 rounded-bl-full transition-opacity duration-700"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr {{ $categoryData['gradient'] }} opacity-0 group-hover:opacity-10 rounded-tr-full transition-opacity duration-700"></div>
                        
                        <!-- Border Glow Effect -->
                        <div class="absolute inset-0 rounded-3xl border-2 border-transparent group-hover:border-gradient-to-br {{ $categoryData['gradient'] }} opacity-0 group-hover:opacity-30 transition-opacity duration-700 pointer-events-none"></div>
                    </div>
                </a>
                @endif
            @endforeach
        </div>
        @else
        <div class="text-center py-16">
            <div class="text-6xl mb-4">🍽️</div>
            <h2 class="text-2xl font-bold text-gray-700 mb-2">No categories available</h2>
            <p class="text-gray-600 mb-6">Categories will appear here once they are added to the system.</p>
        </div>
        @endif
        
        <!-- Enhanced Bottom Decorative Element -->
        <div class="mt-20 text-center">
            <div class="relative inline-block px-10 py-6 bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/50 overflow-hidden">
                <!-- Background Gradient -->
                <div class="absolute inset-0 bg-gradient-to-r from-red-50/50 via-orange-50/50 to-amber-50/50 opacity-50"></div>
                
                <p class="relative text-gray-700 text-base font-medium">
                    <span class="text-2xl mr-2">🍽️</span> Fresh ingredients daily 
                    <span class="mx-3 text-gray-300">•</span> 
                    <span class="text-2xl mr-2">✨</span> Authentic recipes 
                    <span class="mx-3 text-gray-300">•</span> 
                    <span class="text-2xl mr-2">❤️</span> Made with love
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
