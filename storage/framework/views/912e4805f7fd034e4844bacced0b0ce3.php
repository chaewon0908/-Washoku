<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="auth-check" content="<?php echo e(auth()->check() ? 'true' : 'false'); ?>">
    <?php if(auth()->guard()->check()): ?>
    <meta name="user-id" content="<?php echo e(auth()->id()); ?>">
    <?php endif; ?>
    <title><?php echo $__env->yieldContent('title', 'Washoku'); ?> - Japanese Restaurant</title>
    
    <!-- Fonts - Added Shippori Mincho for distinctive Japanese aesthetic -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&family=Noto+Serif+JP:wght@400;700&family=Shippori+Mincho:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Vite CSS & JS -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-warm-cream font-sans" x-data>
    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    
    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <!-- Back to Top Button -->
    <button 
        id="backToTop" 
        class="back-to-top"
        aria-label="Back to top">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>
    
    <!-- Toast Notification -->
    <div x-data="toastNotification()" 
         x-on:show-toast.window="showToast($event.detail)"
         class="fixed bottom-6 right-6 z-[100] flex flex-col gap-3">
        <template x-for="(toast, index) in toasts" :key="toast.id">
            <div x-show="toast.visible"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-x-8 scale-95"
                 x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                 x-transition:leave-end="opacity-0 translate-x-8 scale-95"
                 class="flex items-center gap-4 bg-white rounded-2xl shadow-2xl border border-gray-100 p-4 min-w-[320px] max-w-md">
                
                <!-- Success Icon -->
                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-green-400 to-green-500 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                
                <!-- Content -->
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-gray-800" x-text="toast.title || 'Added to Cart!'"></p>
                    <p class="text-sm text-gray-500 truncate" x-text="toast.message"></p>
                </div>
                
                <!-- Close Button -->
                <button @click="removeToast(toast.id)" class="flex-shrink-0 text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </template>
    </div>
    
    <script>
    function toastNotification() {
        return {
            toasts: [],
            
            showToast(detail) {
                const id = Date.now();
                const toast = {
                    id: id,
                    title: detail.title || 'Added to Cart!',
                    message: detail.message || 'Item added successfully',
                    visible: true
                };
                
                this.toasts.push(toast);
                
                // Auto remove after 3 seconds
                setTimeout(() => {
                    this.removeToast(id);
                }, 3000);
            },
            
            removeToast(id) {
                const toast = this.toasts.find(t => t.id === id);
                if (toast) {
                    toast.visible = false;
                    setTimeout(() => {
                        this.toasts = this.toasts.filter(t => t.id !== id);
                    }, 300);
                }
            }
        }
    }
    </script>
    
    <!-- Scroll Reveal & Count-Up Animation Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // ============================================
        // SCROLL REVEAL ANIMATION
        // ============================================
        const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale, .stagger-children');
        
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        revealElements.forEach(el => revealObserver.observe(el));
        
        // ============================================
        // COUNT-UP ANIMATION
        // ============================================
        const countUpElements = document.querySelectorAll('[data-count-up]');
        
        const countUp = (element, target, suffix = '', duration = 2000) => {
            const start = 0;
            const increment = target / (duration / 16);
            let current = start;
            
            const updateCount = () => {
                current += increment;
                if (current < target) {
                    element.textContent = Math.floor(current) + suffix;
                    requestAnimationFrame(updateCount);
                } else {
                    element.textContent = target + suffix;
                }
            };
            
            updateCount();
        };
        
        const countObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                    entry.target.classList.add('counted');
                    const target = parseInt(entry.target.dataset.countUp);
                    const suffix = entry.target.dataset.suffix || '';
                    countUp(entry.target, target, suffix);
                }
            });
        }, { threshold: 0.5 });
        
        countUpElements.forEach(el => countObserver.observe(el));
        
        // ============================================
        // BACK TO TOP BUTTON
        // ============================================
        const backToTopBtn = document.getElementById('backToTop');
        
        if (backToTopBtn) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 500) {
                    backToTopBtn.classList.add('visible');
                } else {
                    backToTopBtn.classList.remove('visible');
                }
            });
            
            backToTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
        
        // ============================================
        // 3D TILT EFFECT FOR CARDS
        // ============================================
        const tiltCards = document.querySelectorAll('.tilt-card');
        
        tiltCards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                const rotateX = (y - centerY) / 20;
                const rotateY = (centerX - x) / 20;
                
                card.style.setProperty('--rotateX', `${rotateX}deg`);
                card.style.setProperty('--rotateY', `${rotateY}deg`);
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.setProperty('--rotateX', '0deg');
                card.style.setProperty('--rotateY', '0deg');
            });
        });
        
        // ============================================
        // PARALLAX EFFECT
        // ============================================
        const parallaxElements = document.querySelectorAll('.parallax-slow');
        
        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY;
            parallaxElements.forEach(el => {
                const speed = parseFloat(el.dataset.speed) || 0.5;
                el.style.transform = `translateY(${scrollY * speed}px)`;
            });
        });
    });
    </script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/layouts/app.blade.php ENDPATH**/ ?>