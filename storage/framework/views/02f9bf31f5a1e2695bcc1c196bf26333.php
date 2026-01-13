

<?php $__env->startSection('title', 'Contact Us - Washoku Japanese Restaurant'); ?>

<?php $__env->startSection('content'); ?>

<section class="bg-gradient-to-br from-red-700 via-red-600 to-red-800 py-20 relative overflow-hidden">
    
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    <div class="absolute top-20 left-10 w-32 h-32 bg-white/5 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-40 h-40 bg-white/5 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center">
            <div class="inline-block bg-white/10 backdrop-blur-sm px-6 py-2 rounded-full mb-6">
                <span class="text-white/90 text-sm font-semibold">📞 Get In Touch</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-bold font-serif text-white mb-6">Contact Us</h1>
            <p class="text-white/90 text-xl max-w-2xl mx-auto">Have questions? We'd love to hear from you.</p>
        </div>
    </div>
</section>


<section class="container mx-auto px-4 py-24">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-red-200 group">
            <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-red-600 transition-colors">
                <svg class="w-8 h-8 text-red-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-primary-dark mb-2">Phone</h3>
            <p class="text-gray-600 mb-4">Give us a call anytime</p>
            <a href="tel:+6321234567" class="text-red-600 font-semibold text-lg hover:text-red-700">(02) 1234-5678</a>
        </div>

        
        <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-red-200 group">
            <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-red-600 transition-colors">
                <svg class="w-8 h-8 text-red-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-primary-dark mb-2">Email</h3>
            <p class="text-gray-600 mb-4">Send us an email</p>
            <a href="mailto:info@washoku.ph" class="text-red-600 font-semibold text-lg hover:text-red-700">info@washoku.ph</a>
        </div>

        
        <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-red-200 group">
            <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-red-600 transition-colors">
                <svg class="w-8 h-8 text-red-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-primary-dark mb-2">Hours</h3>
            <p class="text-gray-600 mb-4">We're open daily</p>
            <span class="text-red-600 font-semibold text-lg">10AM - 10PM</span>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/contact.blade.php ENDPATH**/ ?>