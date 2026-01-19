

<?php $__env->startSection('title', 'FAQ - Washoku Japanese Restaurant'); ?>

<?php $__env->startSection('content'); ?>

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
            <p class="text-amber-400/80 text-sm font-medium tracking-widest uppercase mb-4 reveal-scale">Help Center</p>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 font-display reveal">
                Frequently Asked <span class="gradient-text-animate">Questions</span>
            </h1>
            <p class="text-white/60 text-lg max-w-2xl mx-auto reveal" style="transition-delay: 200ms;">Find answers to common questions about our service.</p>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] py-20 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-red-100/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-amber-100/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto space-y-4 stagger-children">
            <?php
            $faqs = [
                [
                    'question' => 'What are your operating hours?',
                    'answer' => 'We are open daily from 10:00 AM to 10:00 PM. Last order is at 9:30 PM.'
                ],
                [
                    'question' => 'Do you offer delivery?',
                    'answer' => 'Yes! We offer delivery through our website. Simply add items to your cart and proceed to checkout. Delivery is available within Metro Manila.'
                ],
                [
                    'question' => 'Can I customize my bento box?',
                    'answer' => 'Absolutely! Our Bento Builder allows you to create your own custom bento box. Choose your main dish and side dishes to create your perfect meal.'
                ],
                [
                    'question' => 'Do you cater for events?',
                    'answer' => 'Yes, we offer catering services for events of all sizes. Please contact us at least 3 days in advance for catering orders.'
                ],
                [
                    'question' => 'Are there vegetarian options available?',
                    'answer' => 'Yes, we have a variety of vegetarian options including vegetable tempura, edamame, miso soup, and vegetable sushi rolls.'
                ],
                [
                    'question' => 'What payment methods do you accept?',
                    'answer' => 'We accept cash, credit/debit cards (Visa, Mastercard), GCash, Maya, and bank transfers.'
                ],
                [
                    'question' => 'How do I track my order?',
                    'answer' => 'Once your order is confirmed, you can track it through your account dashboard under "My Orders".'
                ],
                [
                    'question' => 'Can I cancel or modify my order?',
                    'answer' => 'Orders can be cancelled or modified within 5 minutes of placing them. After that, please contact our customer service for assistance.'
                ]
            ];
            ?>
            
            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div x-data="{ open: false }" class="group bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:border-red-200 transition-all duration-300 hover:shadow-xl">
                <button @click="open = !open" class="w-full px-6 py-5 text-left flex items-center justify-between gap-4">
                    <span class="font-bold text-lg text-gray-800 group-hover:text-red-600 transition-colors"><?php echo e($faq['question']); ?></span>
                    <div class="w-8 h-8 bg-red-50 group-hover:bg-red-600 rounded-lg flex items-center justify-center transition-all duration-300 flex-shrink-0">
                        <svg class="w-5 h-5 text-red-600 group-hover:text-white transform transition-all duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </button>
                <div x-show="open" x-collapse class="px-6 pb-5">
                    <p class="text-gray-600 leading-relaxed"><?php echo e($faq['answer']); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <!-- Still Have Questions -->
        <div class="text-center mt-16">
            <div class="inline-block bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <p class="text-gray-600 mb-4">Still have questions?</p>
                <a href="/contact" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white font-bold px-8 py-4 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                    <span>Contact Us</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/faq.blade.php ENDPATH**/ ?>