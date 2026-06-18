@extends('layouts.app')

@section('title', 'Find a Store')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-warm-cream via-warm-beige to-warm-cream py-12">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl md:text-6xl font-english font-bold text-primary-dark mb-4 relative inline-block reveal underline-animate">
                <span class="relative z-10">Find a Store</span>
                <span class="absolute -bottom-2 left-0 right-0 h-3 bg-gradient-to-r from-red-400 via-red-500 to-red-600 opacity-20 rounded-full transform -skew-x-12"></span>
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto reveal" style="transition-delay: 200ms;">Visit us at one of our convenient locations</p>
        </div>
        
        <!-- Stores Grid -->
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8 mb-12 stagger-children">
            <!-- Manila Branch -->
            <div class="tilt-card group relative bg-white rounded-3xl shadow-lg card-shadow-hover overflow-hidden border-2 border-transparent hover:border-red-200">
                <!-- Gradient Background Overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-red-400 to-orange-500 opacity-0 group-hover:opacity-5 transition-opacity duration-500"></div>
                
                <!-- Content -->
                <div class="relative p-8">
                    <!-- Icon Header -->
                    <div class="flex items-center justify-center mb-6">
                        <div class="relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-red-400 to-orange-500 rounded-full blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-500 transform group-hover:scale-150"></div>
                            <div class="relative w-20 h-20 bg-gradient-to-br from-red-50 to-orange-50 rounded-full flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg group-hover:shadow-xl">
                                <span class="text-4xl transform group-hover:scale-110 transition-transform duration-500">📍</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Branch Title -->
                    <h3 class="text-2xl font-bold text-center mb-6 text-primary-dark group-hover:text-red-600 transition-colors duration-300">
                        Manila Branch
                    </h3>
                    
                    <!-- Branch Details -->
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-red-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div>
                                <p class="text-gray-700 font-semibold">123 Makati Avenue</p>
                                <p class="text-gray-600">Makati City, Metro Manila</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <p class="text-gray-700 font-semibold">(02) 1234-5678</p>
                        </div>
                        
                        <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                            <svg class="w-6 h-6 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-gray-700 font-semibold">Open Daily: 10AM - 10PM</p>
                        </div>
                    </div>
                    
                    <!-- Decorative Corner Element -->
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-red-400 to-orange-500 opacity-0 group-hover:opacity-10 rounded-bl-full transition-opacity duration-500"></div>
                </div>
            </div>
            
            <!-- Quezon City Branch -->
            <div class="tilt-card group relative bg-white rounded-3xl shadow-lg card-shadow-hover overflow-hidden border-2 border-transparent hover:border-red-200">
                <!-- Gradient Background Overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-red-400 to-orange-500 opacity-0 group-hover:opacity-5 transition-opacity duration-500"></div>
                
                <!-- Content -->
                <div class="relative p-8">
                    <!-- Icon Header -->
                    <div class="flex items-center justify-center mb-6">
                        <div class="relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-red-400 to-orange-500 rounded-full blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-500 transform group-hover:scale-150"></div>
                            <div class="relative w-20 h-20 bg-gradient-to-br from-red-50 to-orange-50 rounded-full flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg group-hover:shadow-xl">
                                <span class="text-4xl transform group-hover:scale-110 transition-transform duration-500">📍</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Branch Title -->
                    <h3 class="text-2xl font-bold text-center mb-6 text-primary-dark group-hover:text-red-600 transition-colors duration-300">
                        Quezon City Branch
                    </h3>
                    
                    <!-- Branch Details -->
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-red-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div>
                                <p class="text-gray-700 font-semibold">456 Commonwealth Ave</p>
                                <p class="text-gray-600">Quezon City, Metro Manila</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <p class="text-gray-700 font-semibold">(02) 8765-4321</p>
                        </div>
                        
                        <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                            <svg class="w-6 h-6 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-gray-700 font-semibold">Open Daily: 10AM - 10PM</p>
                        </div>
                    </div>
                    
                    <!-- Decorative Corner Element -->
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-red-400 to-orange-500 opacity-0 group-hover:opacity-10 rounded-bl-full transition-opacity duration-500"></div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Decorative Element -->
        <div class="mt-16 text-center">
            <div class="inline-block px-8 py-4 bg-white/80 backdrop-blur-sm rounded-full shadow-lg border border-red-100">
                <p class="text-gray-600 text-sm">
                    <span class="font-semibold text-primary-dark">🚗</span> Free parking available • <span class="font-semibold text-primary-dark">🍽️</span> Dine-in & Takeout • <span class="font-semibold text-primary-dark">❤️</span> We can't wait to serve you!
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
