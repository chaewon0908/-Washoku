

<?php $__env->startSection('title', 'Login - Washoku Japanese Restaurant'); ?>

<?php $__env->startSection('content'); ?>
<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-warm-cream to-warm-beige py-16 px-4">
    <div class="w-full max-w-md">
        
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            
            <div class="bg-gradient-to-br from-red-700 via-red-600 to-red-800 px-8 py-12 text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 rounded-full mb-4 backdrop-blur-sm">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold font-serif text-white mb-2">Welcome Back</h1>
                <p class="text-white/90">Sign in to your account</p>
            </div>

            
            <div class="px-8 py-8">
                <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-6">
                    <?php echo csrf_field(); ?>

                    
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
                            autofocus
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

                    
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input 
                                type="checkbox" 
                                name="remember" 
                                class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-600 focus:ring-2">
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                        <a href="#" class="text-sm text-red-600 hover:text-red-700 font-medium transition-colors">
                            Forgot password?
                        </a>
                    </div>

                    
                    <button 
                        type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-[1.02] transform">
                        Sign In
                    </button>
                </form>

                
                <div class="my-8 flex items-center">
                    <div class="flex-1 border-t border-gray-200"></div>
                    <span class="px-4 text-sm text-gray-500">or</span>
                    <div class="flex-1 border-t border-gray-200"></div>
                </div>

                
                <div class="text-center">
                    <p class="text-gray-600">
                        Don't have an account?
                        <a href="<?php echo e(route('register')); ?>" class="text-red-600 hover:text-red-700 font-semibold transition-colors">
                            Sign up here
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/auth/login.blade.php ENDPATH**/ ?>