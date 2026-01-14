@extends('layouts.app')

@section('title', 'Terms of Service - Washoku Japanese Restaurant')

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
            <p class="text-amber-400/80 text-sm font-medium tracking-widest uppercase mb-4">Legal</p>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 font-serif">
                Terms of <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-300">Service</span>
            </h1>
            <p class="text-white/60 text-lg max-w-2xl mx-auto">Please read these terms carefully.</p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] py-20 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-red-100/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-amber-100/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-gray-100">
            <p class="text-gray-400 text-sm mb-8">Last updated: January 2025</p>
            
            <div class="space-y-8">
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center gap-3">
                        <span class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center text-red-600 font-bold text-sm">1</span>
                        Acceptance of Terms
                    </h2>
                    <p class="text-gray-600 leading-relaxed pl-11">By accessing and using the Washoku Japanese Restaurant website and services, you accept and agree to be bound by these Terms of Service. If you do not agree to these terms, please do not use our services.</p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center gap-3">
                        <span class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center text-red-600 font-bold text-sm">2</span>
                        Use of Services
                    </h2>
                    <p class="text-gray-600 leading-relaxed pl-11">Our services are intended for personal, non-commercial use. You agree to use our website and services only for lawful purposes and in accordance with these terms.</p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center gap-3">
                        <span class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center text-red-600 font-bold text-sm">3</span>
                        Orders and Payment
                    </h2>
                    <div class="pl-11">
                        <p class="text-gray-600 mb-3">When placing an order through our website:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-2 text-gray-600">
                                <span class="w-1.5 h-1.5 bg-red-400 rounded-full mt-2 flex-shrink-0"></span>
                                All prices are in Philippine Pesos (₱) and include applicable taxes
                            </li>
                            <li class="flex items-start gap-2 text-gray-600">
                                <span class="w-1.5 h-1.5 bg-red-400 rounded-full mt-2 flex-shrink-0"></span>
                                We reserve the right to refuse or cancel orders at our discretion
                            </li>
                            <li class="flex items-start gap-2 text-gray-600">
                                <span class="w-1.5 h-1.5 bg-red-400 rounded-full mt-2 flex-shrink-0"></span>
                                Payment must be completed before order processing
                            </li>
                            <li class="flex items-start gap-2 text-gray-600">
                                <span class="w-1.5 h-1.5 bg-red-400 rounded-full mt-2 flex-shrink-0"></span>
                                Delivery times are estimates and may vary based on location and demand
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center gap-3">
                        <span class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center text-red-600 font-bold text-sm">4</span>
                        Account Registration
                    </h2>
                    <p class="text-gray-600 leading-relaxed pl-11">To access certain features, you may need to create an account. You are responsible for maintaining the confidentiality of your account credentials and for all activities under your account.</p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center gap-3">
                        <span class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center text-red-600 font-bold text-sm">5</span>
                        Intellectual Property
                    </h2>
                    <p class="text-gray-600 leading-relaxed pl-11">All content on this website, including text, graphics, logos, images, and software, is the property of Washoku Japanese Restaurant and is protected by intellectual property laws.</p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center gap-3">
                        <span class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center text-red-600 font-bold text-sm">6</span>
                        Limitation of Liability
                    </h2>
                    <p class="text-gray-600 leading-relaxed pl-11">Washoku Japanese Restaurant shall not be liable for any indirect, incidental, special, or consequential damages arising from your use of our services.</p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center gap-3">
                        <span class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center text-red-600 font-bold text-sm">7</span>
                        Changes to Terms
                    </h2>
                    <p class="text-gray-600 leading-relaxed pl-11">We reserve the right to modify these terms at any time. Continued use of our services after changes constitutes acceptance of the new terms.</p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center gap-3">
                        <span class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center text-red-600 font-bold text-sm">8</span>
                        Contact Information
                    </h2>
                    <div class="pl-11">
                        <p class="text-gray-600 mb-2">For questions about these Terms of Service, please contact us at:</p>
                        <p class="text-gray-600">Email: <a href="mailto:info@washoku.ph" class="text-red-600 hover:text-red-700 font-medium">info@washoku.ph</a></p>
                        <p class="text-gray-600">Phone: <span class="font-medium">(02) 1234-5678</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
