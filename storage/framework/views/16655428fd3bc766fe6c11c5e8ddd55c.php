

<?php $__env->startSection('title', 'Register - Washoku Japanese Restaurant'); ?>

<?php $__env->startSection('content'); ?>
<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-warm-cream to-warm-beige py-16 px-4">
    <div class="w-full max-w-md">
        
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            
            <div class="bg-gradient-to-br from-red-700 via-red-600 to-red-800 px-8 py-12 text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 rounded-full mb-4 backdrop-blur-sm">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold font-serif text-white mb-2">Create Account</h1>
                <p class="text-white/90">Join us for authentic Japanese cuisine</p>
            </div>

            
            <div class="px-8 py-8">
                <form method="POST" action="<?php echo e(route('register')); ?>" class="space-y-6">
                    <?php echo csrf_field(); ?>

                    
                    <div>
                        <label for="name" class="block text-sm font-semibold text-primary-dark mb-2">
                            Full Name
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="<?php echo e(old('name')); ?>"
                            required 
                            autofocus
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-red-600 focus:ring-2 focus:ring-red-600/20 transition-all duration-300 outline-none <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Your Name">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div>
                        <label for="email" class="block text-sm font-semibold text-primary-dark mb-2">
                            Email Address
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="<?php echo e(old('email')); ?>"
                            required
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-red-600 focus:ring-2 focus:ring-red-600/20 transition-all duration-300 outline-none <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="your@email.com">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div>
                        <label for="password" class="block text-sm font-semibold text-primary-dark mb-2">
                            Password
                        </label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-red-600 focus:ring-2 focus:ring-red-600/20 transition-all duration-300 outline-none <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="••••••••">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-primary-dark mb-2">
                            Confirm Password
                        </label>
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            required
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-red-600 focus:ring-2 focus:ring-red-600/20 transition-all duration-300 outline-none"
                            placeholder="••••••••">
                    </div>

                    
                    <button 
                        type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-[1.02] transform">
                        Create Account
                    </button>
                </form>

                
                <div class="my-8 flex items-center">
                    <div class="flex-1 border-t border-gray-200"></div>
                    <span class="px-4 text-sm text-gray-500">or</span>
                    <div class="flex-1 border-t border-gray-200"></div>
                </div>

                
                <div class="text-center">
                    <p class="text-gray-600">
                        Already have an account?
                        <a href="<?php echo e(route('login')); ?>" class="text-red-600 hover:text-red-700 font-semibold transition-colors">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>
        </div>

        
        <div class="text-center mt-6">
            <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center gap-2 text-gray-600 hover:text-primary-dark transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Back to home</span>
            </a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/auth/register.blade.php ENDPATH**/ ?>