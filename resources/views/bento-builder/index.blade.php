@extends('layouts.app')

@section('title', 'Build Your Bento Box - Washoku')

@section('content')
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.3);
        }
        50% {
            opacity: 1;
            transform: scale(1.05);
        }
        70% {
            transform: scale(0.9);
        }
        100% {
            transform: scale(1);
        }
    }
    
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
    }
    
    @keyframes glow {
        0%, 100% {
            box-shadow: 0 0 5px rgba(239, 68, 68, 0.5);
        }
        50% {
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.8), 0 0 30px rgba(239, 68, 68, 0.6);
        }
    }
    
    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }
        100% {
            background-position: 1000px 0;
        }
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0px) rotate(-25deg);
        }
        50% {
            transform: translateY(-10px) rotate(-25deg);
        }
    }
    
    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    
    .animate-fade-in {
        animation: fadeIn 0.8s ease-out forwards;
    }
    
    .animate-slide-in-left {
        animation: slideInLeft 0.6s ease-out forwards;
    }
    
    .animate-slide-in-right {
        animation: slideInRight 0.6s ease-out forwards;
    }
    
    .animate-scale-in {
        animation: scaleIn 0.4s ease-out forwards;
    }
    
    .animate-bounce-in {
        animation: bounceIn 0.6s ease-out forwards;
    }
    
    .animate-pulse-slow {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    .animate-glow {
        animation: glow 2s ease-in-out infinite;
    }
    
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
    
    .animate-shimmer {
        animation: shimmer 2s infinite;
        background-size: 200% 100%;
    }
    
    .item-enter {
        animation: bounceIn 0.5s ease-out forwards;
    }
    
    .progress-glow {
        position: relative;
    }
    
    .progress-glow::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(239, 68, 68, 0.4), transparent);
        animation: shimmer 2s infinite;
    }
    
    .confetti {
        position: fixed;
        width: 10px;
        height: 10px;
        background: #f59e0b;
        position: fixed;
        animation: confetti-fall linear forwards;
        z-index: 9999;
    }
    
    @keyframes confetti-fall {
        to {
            transform: translateY(100vh) rotate(720deg);
            opacity: 0;
        }
    }
    
    .stagger-item {
        opacity: 0;
        animation: fadeInUp 0.5s ease-out forwards;
    }
    
    .empty-slot-pulse {
        animation: pulse 2s ease-in-out infinite;
    }
</style>

<div class="min-h-screen bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] relative overflow-hidden" 
     x-data="bentoBuilder()"
     x-init="init()">
    
    <!-- Background Decorations -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-red-100/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 animate-pulse-slow"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-amber-100/20 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2 animate-pulse-slow" style="animation-delay: 1s;"></div>
    
    <!-- Page Header - Dark Theme -->
    <div class="relative bg-gradient-to-br from-[#1a1a1a] via-[#2d1f1f] to-[#1a1a1a] py-12 overflow-hidden animate-fade-in">
        <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-red-600/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-amber-400/10 rounded-full blur-3xl"></div>
        <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-amber-400/50 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-amber-400/30 to-transparent"></div>
        
        <div class="container mx-auto px-4 relative z-10 text-center">
            <p class="text-amber-400/80 text-sm font-medium tracking-widest uppercase mb-3 animate-fade-in-up" style="animation-delay: 0.1s;">Customize Your Meal</p>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-3 font-serif animate-fade-in-up" style="animation-delay: 0.2s;">
                Build Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-300">Bento</span>
            </h1>
            <p class="text-white/60 text-lg animate-fade-in-up" style="animation-delay: 0.3s;">Select 1 main dish and 3 sides to complete your box</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8 relative z-10">
        <div class="grid lg:grid-cols-3 gap-6">
            
            <!-- Left Column: Bento Box Builder -->
            <div class="lg:col-span-2">
                <!-- Realistic Bento Box Container -->
                <div class="relative flex items-start gap-6">
                    <!-- Chopsticks Decoration - Left side -->
                    <div class="hidden md:flex flex-col items-center pt-8 animate-slide-in-left" style="animation-delay: 0.4s;">
                        <div class="flex gap-1.5 transform -rotate-[25deg] animate-float">
                            <div class="w-2 h-44 rounded-full shadow-lg" style="background: linear-gradient(to bottom, #E8D4B8 0%, #D4A574 10%, #8B5A2B 30%, #6B4423 70%, #4A3728 100%);"></div>
                            <div class="w-2 h-44 rounded-full shadow-lg" style="background: linear-gradient(to bottom, #E8D4B8 0%, #D4A574 10%, #8B5A2B 30%, #6B4423 70%, #4A3728 100%);"></div>
                        </div>
                        <p class="text-xs text-gray-400 mt-6 -rotate-90 whitespace-nowrap origin-center">お箸 Chopsticks</p>
                    </div>
                    
                    <!-- Bento Box -->
                    <div class="flex-1 relative animate-scale-in" style="animation-delay: 0.5s;">
                    <!-- Bento Box Outer Frame (Wood/Lacquer Style) -->
                    <div class="bg-gradient-to-br from-[#8B4513] via-[#A0522D] to-[#8B4513] p-3 rounded-2xl shadow-2xl">
                        <!-- Wood Grain Texture Overlay -->
                        <div class="absolute inset-0 opacity-20 rounded-2xl" style="background-image: url('data:image/svg+xml,%3Csvg width=\"100\" height=\"100\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M0 50 Q25 45 50 50 T100 50\" stroke=\"%23000\" stroke-width=\"0.5\" fill=\"none\" opacity=\"0.3\"/%3E%3Cpath d=\"M0 30 Q25 25 50 30 T100 30\" stroke=\"%23000\" stroke-width=\"0.3\" fill=\"none\" opacity=\"0.2\"/%3E%3Cpath d=\"M0 70 Q25 65 50 70 T100 70\" stroke=\"%23000\" stroke-width=\"0.3\" fill=\"none\" opacity=\"0.2\"/%3E%3C/svg%3E');"></div>
                        
                        <!-- Inner Lacquer Border -->
                        <div class="bg-gradient-to-br from-[#1a1a1a] to-[#2d1f1f] p-1 rounded-xl">
                            <!-- Red Lacquer Accent -->
                            <div class="bg-gradient-to-br from-[#8B0000] via-[#B22222] to-[#8B0000] p-0.5 rounded-lg">
                                <!-- Bento Interior -->
                                <div class="bg-[#1a1a1a] rounded-lg overflow-hidden">
                                    <!-- Bento Grid with Dividers -->
                                    <div class="relative" style="height: 380px;">
                                        
                                        <!-- Wooden Dividers -->
                                        <div class="absolute top-0 bottom-[90px] left-1/2 w-1.5 bg-gradient-to-b from-[#8B4513] via-[#A0522D] to-[#8B4513] transform -translate-x-1/2 z-10 rounded-full shadow-lg"></div>
                                        <div class="absolute top-0 right-0 left-1/2 h-1.5 top-[calc(50%-45px)] bg-gradient-to-r from-[#8B4513] via-[#A0522D] to-[#8B4513] z-10 rounded-full shadow-lg ml-1"></div>
                                        <div class="absolute left-0 right-0 bottom-[90px] h-1.5 bg-gradient-to-r from-[#8B4513] via-[#A0522D] to-[#8B4513] z-10 rounded-full shadow-lg"></div>
                                        
                                        <!-- Slot 1: Main Dish (Large - Left Side) -->
                                        <button 
                                            x-on:click="openModal('main', 0)"
                                            class="absolute top-0 left-0 w-[calc(50%-3px)] h-[calc(100%-93px)] overflow-hidden transition-all group"
                                            :class="bentoBox[0] ? '' : 'hover:bg-white/5 hover:scale-[1.02]'">
                                            
                                            <template x-if="bentoBox[0]">
                                                <div class="absolute inset-0 item-enter">
                                                    <img :src="bentoBox[0]?.image || 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food'" 
                                                         :alt="bentoBox[0]?.name || ''"
                                                         class="w-full h-full object-cover"
                                                         onerror="this.onerror=null; this.src='https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food';">
                                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/60 to-transparent p-3">
                                                        <span class="text-amber-400 text-[10px] font-bold uppercase tracking-wider">Main</span>
                                                        <p class="text-white font-bold text-sm" x-text="bentoBox[0].name"></p>
                                                    </div>
                                                    <button 
                                                        x-on:click.stop="removeItem(0)"
                                                        class="absolute top-2 right-2 bg-black/50 hover:bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center shadow-lg transition-colors z-10 backdrop-blur-sm">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </template>
                                            
                                            <template x-if="!bentoBox[0]">
                                                <div class="h-full flex flex-col items-center justify-center p-4 text-center">
                                                    <div class="w-16 h-16 border-2 border-dashed border-amber-600/40 rounded-full flex items-center justify-center mb-3 group-hover:border-amber-500 group-hover:bg-amber-500/10 transition-all empty-slot-pulse group-hover:scale-110">
                                                        <svg class="w-8 h-8 text-amber-600/60 group-hover:text-amber-500 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"/>
                                                        </svg>
                                                    </div>
                                                    <p class="font-bold text-amber-600/80 text-sm">Main Dish</p>
                                                    <p class="text-xs text-white/40 mt-1">Tap to select</p>
                                                </div>
                                            </template>
                                        </button>

                                        <!-- Slot 2: Side 1 (Top Right) -->
                                        <button 
                                            x-on:click="openModal('side', 1)"
                                            class="absolute top-0 right-0 w-[calc(50%-3px)] h-[calc(50%-48px)] overflow-hidden transition-all group"
                                            :class="bentoBox[1] ? '' : 'hover:bg-white/5 hover:scale-[1.02]'">
                                            
                                            <template x-if="bentoBox[1]">
                                                <div class="absolute inset-0 item-enter">
                                                    <img :src="bentoBox[1].image || 'https://via.placeholder.com/300x200/f3f4f6/9ca3af?text=Food'" 
                                                         :alt="bentoBox[1].name"
                                                         class="w-full h-full object-cover"
                                                         onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200/f3f4f6/9ca3af?text=Food';">
                                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 to-transparent p-2">
                                                        <p class="text-white font-semibold text-xs truncate" x-text="bentoBox[1].name"></p>
                                                    </div>
                                                    <button 
                                                        x-on:click.stop="removeItem(1)"
                                                        class="absolute top-1.5 right-1.5 bg-black/50 hover:bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-lg transition-colors z-10 backdrop-blur-sm">
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </template>
                                            
                                            <template x-if="!bentoBox[1]">
                                                <div class="h-full flex flex-col items-center justify-center p-2">
                                                    <div class="w-10 h-10 border-2 border-dashed border-amber-600/40 rounded-full flex items-center justify-center mb-2 group-hover:border-amber-500 group-hover:bg-amber-500/10 transition-all empty-slot-pulse group-hover:scale-110">
                                                        <svg class="w-5 h-5 text-amber-600/60 group-hover:text-amber-500 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"/>
                                                        </svg>
                                                    </div>
                                                    <p class="text-xs font-semibold text-amber-600/70">Side 1</p>
                                                </div>
                                            </template>
                                        </button>

                                        <!-- Slot 3: Side 2 (Bottom Right) -->
                                        <button 
                                            x-on:click="openModal('side', 2)"
                                            class="absolute right-0 w-[calc(50%-3px)] h-[calc(50%-48px)] overflow-hidden transition-all group"
                                            style="top: calc(50% - 45px);"
                                            :class="bentoBox[2] ? '' : 'hover:bg-white/5 hover:scale-[1.02]'">
                                            
                                            <template x-if="bentoBox[2]">
                                                <div class="absolute inset-0 item-enter">
                                                    <img :src="bentoBox[2].image || 'https://via.placeholder.com/300x200/f3f4f6/9ca3af?text=Food'" 
                                                         :alt="bentoBox[2].name"
                                                         class="w-full h-full object-cover"
                                                         onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200/f3f4f6/9ca3af?text=Food';">
                                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 to-transparent p-2">
                                                        <p class="text-white font-semibold text-xs truncate" x-text="bentoBox[2].name"></p>
                                                    </div>
                                                    <button 
                                                        x-on:click.stop="removeItem(2)"
                                                        class="absolute top-1.5 right-1.5 bg-black/50 hover:bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-lg transition-colors z-10 backdrop-blur-sm">
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </template>
                                            
                                            <template x-if="!bentoBox[2]">
                                                <div class="h-full flex flex-col items-center justify-center p-2">
                                                    <div class="w-10 h-10 border-2 border-dashed border-amber-600/40 rounded-full flex items-center justify-center mb-2 group-hover:border-amber-500 group-hover:bg-amber-500/10 transition-all empty-slot-pulse group-hover:scale-110">
                                                        <svg class="w-5 h-5 text-amber-600/60 group-hover:text-amber-500 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"/>
                                                        </svg>
                                                    </div>
                                                    <p class="text-xs font-semibold text-amber-600/70">Side 2</p>
                                                </div>
                                            </template>
                                        </button>

                                        <!-- Slot 4: Side 3 (Bottom Full Width) -->
                                        <button 
                                            x-on:click="openModal('side', 3)"
                                            class="absolute bottom-0 left-0 right-0 h-[87px] overflow-hidden transition-all group"
                                            :class="bentoBox[3] ? '' : 'hover:bg-white/5 hover:scale-[1.01]'">
                                            
                                            <template x-if="bentoBox[3]">
                                                <div class="absolute inset-0 item-enter">
                                                    <img :src="bentoBox[3].image || 'https://via.placeholder.com/500x150/f3f4f6/9ca3af?text=Food'" 
                                                         :alt="bentoBox[3].name"
                                                         class="w-full h-full object-cover"
                                                         onerror="this.onerror=null; this.src='https://via.placeholder.com/500x150/f3f4f6/9ca3af?text=Food';">
                                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 to-transparent p-2">
                                                        <p class="text-white font-semibold text-sm" x-text="bentoBox[3].name"></p>
                                                    </div>
                                                    <button 
                                                        x-on:click.stop="removeItem(3)"
                                                        class="absolute top-1.5 right-1.5 bg-black/50 hover:bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-lg transition-colors z-10 backdrop-blur-sm">
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </template>
                                            
                                            <template x-if="!bentoBox[3]">
                                                <div class="h-full flex items-center justify-center gap-3 p-3">
                                                    <div class="w-10 h-10 border-2 border-dashed border-amber-600/40 rounded-full flex items-center justify-center group-hover:border-amber-500 group-hover:bg-amber-500/10 transition-all empty-slot-pulse group-hover:scale-110">
                                                        <svg class="w-5 h-5 text-amber-600/60 group-hover:text-amber-500 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"/>
                                                        </svg>
                                                    </div>
                                                    <p class="text-sm font-semibold text-amber-600/70">Side 3</p>
                                                </div>
                                            </template>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>

            <!-- Right Column: Order Summary -->
            <div class="lg:col-span-1 animate-slide-in-right" style="animation-delay: 0.6s;">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden sticky top-24">
                    <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-800">Your Order</h3>
                    </div>
                    
                    <div class="p-5">
                        <!-- Progress Bar -->
                        <div class="mb-5">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium text-gray-600">Bento Progress</span>
                                <span class="text-sm font-bold text-red-600 transition-all duration-300" 
                                      :class="filledSlots === 4 ? 'scale-110' : ''"
                                      x-text="filledSlots + '/4'"></span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden progress-glow">
                                <div class="bg-gradient-to-r from-red-500 to-red-600 h-full rounded-full transition-all duration-500 relative overflow-hidden" 
                                     :class="filledSlots === 4 ? 'animate-glow' : ''"
                                     :style="'width: ' + (filledSlots / 4 * 100) + '%'">
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent animate-shimmer" 
                                         x-show="filledSlots > 0"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Order Items -->
                        <div class="bg-gray-50 rounded-xl p-3 mb-4 min-h-[120px]">
                            <template x-if="filledSlots === 0">
                                <div class="text-center py-6">
                                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                    </div>
                                    <p class="text-gray-700 font-medium text-sm">Start Building</p>
                                    <p class="text-xs text-gray-500">Click any compartment</p>
                                </div>
                            </template>

                            <div class="space-y-2">
                                <template x-for="(item, index) in bentoBox" :key="index">
                                    <div x-show="item" 
                                         x-transition:enter="transition ease-out duration-300"
                                         x-transition:enter-start="opacity-0 transform translate-x-4"
                                         x-transition:enter-end="opacity-100 transform translate-x-0"
                                         x-transition:leave="transition ease-in duration-200"
                                         x-transition:leave-start="opacity-100 transform translate-x-0"
                                         x-transition:leave-end="opacity-0 transform -translate-x-4"
                                         class="flex items-center gap-2 p-2 bg-white rounded-lg border border-gray-100 hover:shadow-md transition-all">
                                        <img :src="item?.image || 'https://via.placeholder.com/40x40/f3f4f6/9ca3af?text=Food'" 
                                             :alt="item?.name"
                                             class="w-10 h-10 object-cover rounded-lg"
                                             onerror="this.onerror=null; this.src='https://via.placeholder.com/40x40/f3f4f6/9ca3af?text=Food';">
                                        <div class="flex-1 min-w-0">
                                            <p class="font-medium text-gray-800 text-xs truncate" x-text="item?.name"></p>
                                            <p class="text-[10px] text-gray-500" x-text="index === 0 ? 'Main' : 'Side'"></p>
                                        </div>
                                        <button x-on:click="removeItem(index)" class="text-gray-400 hover:text-red-600 p-1 transition-colors flex-shrink-0">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl mb-3">
                            <span class="text-gray-600 font-medium text-sm">Bento Box Base</span>
                            <span class="text-gray-800 font-bold">₱399</span>
                        </div>

                        <!-- Total -->
                        <div class="bg-gradient-to-r from-[#1a1a1a] to-[#2d1f1f] rounded-xl p-4 mb-4">
                            <div class="flex justify-between items-center">
                                <span class="text-white font-bold">Total</span>
                                <span class="text-2xl font-bold text-amber-400" x-text="'₱' + calculateTotal()"></span>
                            </div>
                        </div>

                        <!-- Complete Order Button -->
                        <button 
                            x-on:click="completeOrder"
                            :disabled="filledSlots < 4"
                            :class="filledSlots < 4 ? 'opacity-50 cursor-not-allowed bg-gray-400' : 'bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 hover:scale-[1.02] animate-pulse-slow'"
                            class="w-full text-white font-bold py-3.5 px-6 rounded-xl transition-all shadow-lg"
                            x-show="filledSlots >= 4"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100">
                            <span x-show="filledSlots >= 4" class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Add to Cart
                            </span>
                            <span x-show="filledSlots < 4" 
                                  x-transition:enter="transition ease-out duration-300"
                                  x-transition:enter-start="opacity-0"
                                  x-transition:enter-end="opacity-100"
                                  class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                Fill All Slots First
                            </span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Selection Modal -->
    <div x-show="showModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 p-4"
         x-on:click.self="closeModal"
         x-on:keydown.escape.window="closeModal">
        
        <div x-show="showModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-90"
             class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[85vh] overflow-hidden">
            
            <!-- Modal Header - Dark Theme -->
            <div class="relative bg-gradient-to-br from-[#1a1a1a] via-[#2d1f1f] to-[#1a1a1a] p-6 overflow-hidden">
                <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
                <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-amber-400/50 to-transparent"></div>
                
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-amber-400/80 text-xs font-medium tracking-widest uppercase mb-1" x-text="modalTitle"></p>
                        <h3 class="text-2xl font-bold text-white" x-text="modalSubtitle"></h3>
                    </div>
                    <button x-on:click="closeModal" class="text-white/70 hover:text-white transition-colors p-2 hover:bg-white/10 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="p-6 overflow-y-auto max-h-[calc(85vh-120px)] bg-gradient-to-br from-[#f8f5f0] to-[#f5f1e8]">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <template x-for="(item, index) in modalItems" :key="item.id">
                        <button 
                            type="button"
                            x-on:click.stop="selectItem(item)"
                            x-init="setTimeout(() => { $el.style.opacity = '1'; $el.style.animation = 'fadeInUp 0.4s ease-out forwards'; $el.style.animationDelay = (index * 0.05) + 's'; }, 10)"
                            style="opacity: 0;"
                            class="bg-white border-2 border-gray-200 rounded-xl overflow-hidden transition-all hover:border-red-500 hover:shadow-xl group text-left cursor-pointer hover:scale-105">
                            
                            <div class="aspect-square overflow-hidden bg-gray-100 relative">
                                <img :src="(item.image || item.image_url || 'https://placehold.co/400x400/f3f4f6/9ca3af?text=' + encodeURIComponent(item.name))" 
                                     :alt="item.name"
                                     x-on:error="$event.target.src='https://placehold.co/400x400/f3f4f6/9ca3af?text=' + encodeURIComponent(item.name)"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                     loading="lazy"
                                     onerror="this.onerror=null; this.src='https://placehold.co/400x400/f3f4f6/9ca3af?text=Food';">
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors"></div>
                            </div>
                            
                            <div class="p-3">
                                <p class="font-bold text-gray-800 text-sm mb-1 line-clamp-1" x-text="item.name"></p>
                                <p class="text-xs text-gray-500 mb-2 line-clamp-1" x-text="item.description || 'Delicious Japanese dish'"></p>
                                <span class="inline-block bg-gradient-to-r from-red-600 to-red-700 text-white font-semibold px-3 py-1.5 rounded-full text-xs">
                                    Select
                                </span>
                            </div>
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
function bentoBuilder() {
    return {
        bentoBox: [null, null, null, null],
        showModal: false,
        modalItems: [],
        modalType: '',
        currentSlot: null,
        modalTitle: '',
        modalSubtitle: '',
        
        mainDishes: @json($mainDishes),
        sideDishes: @json($sideDishes),
        
        init() {
            console.log('Bento Builder initialized');
            // Add stagger animation to modal items
            this.$watch('modalItems', () => {
                if (this.modalItems.length > 0) {
                    setTimeout(() => {
                        const items = document.querySelectorAll('[x-for*="modalItems"]');
                        items.forEach((item, index) => {
                            item.style.setProperty('--i', index);
                        });
                    }, 100);
                }
            });
        },
        
        get filledSlots() {
            return this.bentoBox.filter(item => item !== null).length;
        },
        
        openModal(type, slot) {
            this.modalType = type;
            this.currentSlot = slot;
            
            if (type === 'main') {
                this.modalItems = this.mainDishes;
                this.modalTitle = 'メインディッシュ';
                this.modalSubtitle = 'Choose Your Main Dish';
            } else {
                this.modalItems = this.sideDishes;
                this.modalTitle = '副菜';
                this.modalSubtitle = 'Choose Your Side Dish';
            }
            
            this.showModal = true;
        },
        
        closeModal() {
            this.showModal = false;
            setTimeout(() => {
                this.modalItems = [];
                this.modalType = '';
                this.currentSlot = null;
            }, 200);
        },
        
        selectItem(item) {
            if (this.currentSlot === null || this.currentSlot === undefined) {
                return;
            }
            
            const imagePath = item.image || item.image_url || 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food';
            
            const newItem = {
                id: parseInt(item.id) || 0,
                name: item.name || 'Unknown',
                image: imagePath,
                image_url: imagePath,
                type: item.type || 'main'
            };
            
            // Trigger animation by temporarily clearing and setting
            const oldValue = this.bentoBox[this.currentSlot];
            this.bentoBox[this.currentSlot] = null;
            
            setTimeout(() => {
                this.bentoBox[this.currentSlot] = newItem;
                
                // Check if all slots are filled for celebration
                if (this.filledSlots === 4) {
                    setTimeout(() => {
                        this.celebrateCompletion();
                    }, 500);
                }
            }, 50);
            
            this.closeModal();
        },
        
        celebrateCompletion() {
            // Create confetti effect
            const colors = ['#f59e0b', '#ef4444', '#10b981', '#3b82f6', '#8b5cf6'];
            const confettiCount = 50;
            
            for (let i = 0; i < confettiCount; i++) {
                setTimeout(() => {
                    const confetti = document.createElement('div');
                    confetti.className = 'confetti';
                    confetti.style.left = Math.random() * 100 + '%';
                    confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.animationDelay = Math.random() * 0.5 + 's';
                    confetti.style.animationDuration = (Math.random() * 2 + 2) + 's';
                    confetti.style.width = (Math.random() * 8 + 6) + 'px';
                    confetti.style.height = (Math.random() * 8 + 6) + 'px';
                    document.body.appendChild(confetti);
                    
                    setTimeout(() => {
                        confetti.remove();
                    }, 4000);
                }, i * 20);
            }
        },
        
        removeItem(slot) {
            this.bentoBox[slot] = null;
        },
        
        calculateTotal() {
            return '399';
        },
        
        async completeOrder() {
            if (this.filledSlots < 4) {
                alert('Please fill all 4 bento compartments before adding to cart.');
                return;
            }
            
            // Celebration animation
            this.celebrateCompletion();
            
            const bentoName = 'Custom Bento Box';
            const bentoItems = this.bentoBox.filter(item => item !== null).map(item => item.name).join(', ');
            const fullName = `${bentoName} (${bentoItems})`;
            const totalPrice = 399;
            const bentoId = 'bento_' + Date.now();
            
            try {
                let cartStore = null;
                let attempts = 0;
                const maxAttempts = 20;
                
                while (!cartStore && attempts < maxAttempts) {
                    if (typeof window.getCartStore === 'function') {
                        cartStore = window.getCartStore();
                    } else if (window.Alpine && typeof window.Alpine.store === 'function') {
                        try { cartStore = window.Alpine.store('cart'); } catch (e) {}
                    }
                    if (!cartStore) {
                        await new Promise(resolve => setTimeout(resolve, 100));
                        attempts++;
                    }
                }
                
                if (cartStore && typeof cartStore.add === 'function') {
                    await cartStore.add({
                        id: bentoId,
                        name: fullName,
                        price: totalPrice,
                        image: this.bentoBox[0]?.image || 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Bento',
                        quantity: 1
                    });
                    // Animate clearing the box
                    setTimeout(() => {
                        this.bentoBox = [null, null, null, null];
                    }, 300);
                    // Toast is shown by cart store's add function
                } else {
                    const authCheck = document.querySelector('meta[name="auth-check"]')?.content;
                    const userId = document.querySelector('meta[name="user-id"]')?.content;
                    const cartKey = authCheck === 'true' && userId ? `cart_user_${userId}` : 'cart_guest';
                    const existingCart = JSON.parse(localStorage.getItem(cartKey) || '{"items":[],"count":0}');
                    existingCart.items.push({
                        id: bentoId,
                        name: fullName,
                        price: totalPrice,
                        image: this.bentoBox[0]?.image || 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Bento',
                        quantity: 1
                    });
                    existingCart.count = existingCart.items.reduce((sum, item) => sum + (item.quantity || 1), 0);
                    localStorage.setItem(cartKey, JSON.stringify(existingCart));
                    // Animate clearing the box
                    setTimeout(() => {
                        this.bentoBox = [null, null, null, null];
                    }, 300);
                    window.dispatchEvent(new CustomEvent('cart-updated'));
                    // Show toast notification
                    window.dispatchEvent(new CustomEvent('show-toast', {
                        detail: {
                            title: 'Added to Cart!',
                            message: 'Custom Bento Box'
                        }
                    }));
                }
            } catch (error) {
                console.error('Error adding to cart:', error);
                // Show error toast
                window.dispatchEvent(new CustomEvent('show-toast', {
                    detail: {
                        title: 'Error',
                        message: 'Failed to add item. Please try again.'
                    }
                }));
            }
        }
    }
}
</script>

@endsection
