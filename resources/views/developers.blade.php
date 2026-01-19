@extends('layouts.app')

@section('title', 'Meet the Developers - Washoku Japanese Restaurant')

@section('content')

<!-- Hero Section - Dark Theme -->
<section class="relative bg-gradient-to-br from-[#1a1a1a] via-[#2d1f1f] to-[#1a1a1a] py-16 overflow-hidden">
    <!-- Seigaiha Pattern -->
    <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
    
    <!-- Decorative Glows -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-red-600/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-amber-400/10 rounded-full blur-3xl"></div>
    
    <!-- Gold Accent Lines -->
    <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-amber-400/50 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-amber-400/30 to-transparent"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center">
            <p class="text-amber-400/80 text-sm font-medium tracking-widest uppercase mb-4 reveal-scale">Our Team</p>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 font-english reveal">
                Meet the <span class="gradient-text-animate">Developers</span>
            </h1>
            <p class="text-white/60 text-lg max-w-2xl mx-auto reveal" style="transition-delay: 200ms;">The talented team behind this project</p>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] py-20 relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-red-100/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-amber-100/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 stagger-children">
            @php
            $developers = [
                ['name' => 'Josh Matthew Almoite', 'role' => 'Full Stack Developer', 'icon' => '💻', 'image' => '/images/josh.png'],
                ['name' => 'Miguel Gascon', 'role' => 'Project Manager', 'icon' => '📊', 'image' => '/images/miguel.png'],
                ['name' => 'Krystel Callo', 'role' => 'Technical Writer', 'icon' => '✍️', 'image' => '/images/callo.png'],
                ['name' => 'Jana Buan', 'role' => 'Paper Documentation Handler', 'icon' => '📝', 'image' => '/images/jana.jpg']
            ];
            @endphp
            
            @foreach($developers as $developer)
                <div class="tilt-card group bg-white rounded-2xl overflow-hidden shadow-lg card-shadow-hover border border-gray-100 hover:border-red-200 relative">
                    <!-- Dark hover overlay for entire card -->
                    <div class="absolute inset-0 bg-gradient-to-br from-[#1a1a1a] to-[#2d1f1f] opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-0"></div>
                    
                    <!-- Image Section -->
                    <div class="relative aspect-square overflow-hidden">
                        <img src="{{ $developer['image'] }}" 
                             alt="{{ $developer['name'] }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                             loading="lazy"
                             onerror="this.onerror=null; this.src='https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Developer';">
                        
                        <!-- Icon Badge -->
                        <div class="absolute top-3 right-3 w-10 h-10 bg-white/90 group-hover:bg-amber-400 rounded-xl flex items-center justify-center text-xl shadow-lg transition-all duration-300 z-10">
                            {{ $developer['icon'] }}
                        </div>
                        
                        <!-- Dark overlay on image hover -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    
                    <!-- Info Section -->
                    <div class="p-5 text-center relative z-10">
                        <h3 class="font-bold text-lg text-gray-800 group-hover:text-white transition-colors mb-1">
                            {{ $developer['name'] }}
                        </h3>
                        <p class="text-gray-500 group-hover:text-amber-400 text-sm font-medium transition-colors">
                            {{ $developer['role'] }}
                        </p>
                    </div>
                    
                    <!-- Bottom accent line -->
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-red-500 via-amber-500 to-red-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                </div>
            @endforeach
        </div>
        
        <!-- Team Values Section -->
        <div class="mt-16 max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100 relative overflow-hidden">
                <!-- Decorative corner -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-red-50 to-amber-50 rounded-bl-full"></div>
                
                <div class="relative z-10">
                    <div class="text-center mb-8">
                        <span class="inline-block px-4 py-1.5 bg-gradient-to-r from-red-50 to-amber-50 text-red-600 text-xs font-bold uppercase tracking-wider rounded-full mb-3">Our Mission</span>
                        <h2 class="text-2xl font-bold text-gray-800">Built with Passion & Excellence</h2>
                    </div>
                    
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="text-center p-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-100 to-red-50 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-1">Innovation</h3>
                            <p class="text-sm text-gray-500">Pushing boundaries with modern tech</p>
                        </div>
                        
                        <div class="text-center p-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-amber-100 to-amber-50 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-1">Dedication</h3>
                            <p class="text-sm text-gray-500">Committed to quality delivery</p>
                        </div>
                        
                        <div class="text-center p-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-100 to-amber-50 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-1">Teamwork</h3>
                            <p class="text-sm text-gray-500">Collaboration at its finest</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
