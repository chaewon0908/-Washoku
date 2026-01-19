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
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&family=Noto+Serif+JP:wght@400;700&display=swap" rel="stylesheet">
    
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
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/layouts/app.blade.php ENDPATH**/ ?>