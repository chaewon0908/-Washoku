

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] py-12 relative overflow-hidden">
    
    <!-- Decorative Background Elements -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-red-100/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-amber-100/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <!-- Subtle Pattern Overlay -->
    <div class="absolute inset-0 opacity-[0.02]" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23000000' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);"></div>

    <div class="container mx-auto px-4 relative z-10">
        
        <!-- Welcome Header Card -->
        <div class="relative bg-gradient-to-br from-[#1a1a1a] via-[#2d1f1f] to-[#1a1a1a] rounded-3xl shadow-2xl p-8 md:p-10 mb-8 overflow-hidden">
            
            <!-- Card Decorations -->
            <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-amber-400/10 rounded-full blur-3xl"></div>
            
            <!-- Gold Accent Lines -->
            <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-amber-400/50 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-amber-400/30 to-transparent"></div>
            
            <!-- Cherry Blossom Decoration -->
            <div class="absolute top-6 right-8 opacity-20">
                <svg class="w-24 h-24 text-pink-300" viewBox="0 0 100 100" fill="currentColor">
                    <circle cx="50" cy="30" r="12"/>
                    <circle cx="30" cy="50" r="12"/>
                    <circle cx="70" cy="50" r="12"/>
                    <circle cx="35" cy="75" r="12"/>
                    <circle cx="65" cy="75" r="12"/>
                    <circle cx="50" cy="50" r="8" fill="#fbbf24"/>
                </svg>
            </div>
            
            <div class="relative z-10">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div>
                        <p class="text-amber-400/80 text-sm font-medium tracking-wider uppercase mb-2">Welcome back</p>
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-3">
                            <?php echo e(Auth::user()->name); ?>

                            <span class="text-amber-400">!</span>
                        </h1>
                        <p class="text-white/60 text-lg">Manage your orders and explore our delicious menu.</p>
                    </div>
                    
                    <?php if(Auth::user()->isAdmin() || Auth::user()->isOrderProcessor()): ?>
                    <a href="<?php echo e(route('admin.index')); ?>" class="inline-flex items-center gap-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-6 py-4 rounded-2xl font-bold transition-all duration-300 shadow-lg hover:shadow-red-900/40 hover:scale-105 group border border-red-500/30">
                        <div class="p-2 bg-white/10 rounded-xl group-hover:bg-white/20 transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <span>Admin Panel</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- Quick Action Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            
            <!-- My Orders Card -->
            <a href="<?php echo e(route('dashboard.orders')); ?>" class="group relative bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                <!-- Card Background -->
                <div class="absolute inset-0 bg-gradient-to-br from-red-600 to-red-800 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative p-8">
                    <div class="flex items-center gap-5">
                        <div class="relative">
                            <div class="absolute inset-0 bg-red-500/20 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="relative bg-gradient-to-br from-red-500 to-red-700 group-hover:from-white/20 group-hover:to-white/10 rounded-2xl p-4 transition-all duration-300">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 group-hover:text-white transition-colors">My Orders</h3>
                            <p class="text-gray-500 group-hover:text-white/80 transition-colors">Track your order status</p>
                        </div>
                    </div>
                    
                    <!-- Arrow indicator -->
                    <div class="absolute top-8 right-8 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-x-4 group-hover:translate-x-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </div>
                </div>
                
                <!-- Decorative bottom line -->
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-red-500 via-red-600 to-red-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
            </a>
            
            <!-- Shopping Cart Card -->
            <a href="<?php echo e(route('cart')); ?>" class="group relative bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                <!-- Card Background -->
                <div class="absolute inset-0 bg-gradient-to-br from-amber-500 to-amber-700 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative p-8">
                    <div class="flex items-center gap-5">
                        <div class="relative">
                            <div class="absolute inset-0 bg-amber-500/20 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="relative bg-gradient-to-br from-amber-500 to-amber-700 group-hover:from-white/20 group-hover:to-white/10 rounded-2xl p-4 transition-all duration-300">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 group-hover:text-white transition-colors">Shopping Cart</h3>
                            <p class="text-gray-500 group-hover:text-white/80 transition-colors">Continue shopping</p>
                        </div>
                    </div>
                    
                    <!-- Arrow indicator -->
                    <div class="absolute top-8 right-8 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-x-4 group-hover:translate-x-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </div>
                </div>
                
                <!-- Decorative bottom line -->
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-500 via-amber-600 to-amber-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
            </a>
        </div>
        
        <!-- Recent Orders Section -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            
            <!-- Section Header -->
            <div class="bg-gradient-to-r from-gray-50 to-white px-8 py-6 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-700 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Recent Orders</h2>
                            <p class="text-gray-500 text-sm">Your latest order activity</p>
                        </div>
                    </div>
                    
                    <?php if($orders->count() > 0): ?>
                    <a href="<?php echo e(route('dashboard.orders')); ?>" class="hidden sm:flex items-center gap-2 text-red-600 hover:text-red-700 font-semibold transition-colors group">
                        <span>View All</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="p-8">
                <?php if($orders->count() > 0): ?>
                <div class="space-y-4">
                    <?php $__currentLoopData = $orders->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group relative bg-gradient-to-r from-gray-50 to-white border border-gray-100 rounded-2xl p-5 hover:shadow-lg hover:border-red-100 transition-all duration-300">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <!-- Order Icon -->
                                <div class="w-12 h-12 bg-gradient-to-br from-gray-100 to-gray-50 rounded-xl flex items-center justify-center group-hover:from-red-50 group-hover:to-red-100 transition-all">
                                    <svg class="w-6 h-6 text-gray-400 group-hover:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                
                                <div>
                                    <h3 class="font-bold text-lg text-gray-800 group-hover:text-red-600 transition-colors"><?php echo e($order->order_number); ?></h3>
                                    <div class="flex items-center gap-3 text-sm text-gray-500">
                                        <span><?php echo e($order->created_at->format('M d, Y H:i')); ?></span>
                                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                        <span class="font-semibold text-gray-700">₱<?php echo e(number_format($order->total, 2)); ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Status Badge -->
                            <div class="flex items-center gap-3">
                                <span class="px-4 py-2 rounded-full text-sm font-bold
                                    <?php if($order->status === 'pending'): ?> bg-amber-100 text-amber-700 border border-amber-200
                                    <?php elseif($order->status === 'confirmed'): ?> bg-blue-100 text-blue-700 border border-blue-200
                                    <?php elseif($order->status === 'preparing'): ?> bg-purple-100 text-purple-700 border border-purple-200
                                    <?php elseif($order->status === 'delivering'): ?> bg-indigo-100 text-indigo-700 border border-indigo-200
                                    <?php elseif($order->status === 'completed'): ?> bg-green-100 text-green-700 border border-green-200
                                    <?php else: ?> bg-red-100 text-red-700 border border-red-200
                                    <?php endif; ?>">
                                    <?php echo e(ucfirst($order->status)); ?>

                                </span>
                                
                                <svg class="w-5 h-5 text-gray-300 group-hover:text-red-400 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <div class="mt-6 text-center sm:hidden">
                    <a href="<?php echo e(route('dashboard.orders')); ?>" class="inline-flex items-center gap-2 text-red-600 hover:text-red-700 font-semibold">
                        <span>View All Orders</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
                <?php else: ?>
                
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="relative inline-block mb-6">
                        <div class="absolute inset-0 bg-red-100 rounded-full blur-2xl opacity-50"></div>
                        <div class="relative w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-50 rounded-full flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-700 mb-2">No orders yet</h3>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto">Start your culinary journey with our authentic Japanese cuisine. Build your perfect bento or explore our menu!</p>
                    
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="<?php echo e(route('bento.builder')); ?>" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-8 py-4 rounded-full font-bold transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Build Your Bento
                        </a>
                        <a href="/menu" class="inline-flex items-center gap-2 bg-white text-red-600 border-2 border-red-200 hover:border-red-300 px-8 py-4 rounded-full font-bold transition-all duration-300 hover:shadow-lg">
                            Explore Menu
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/dashboard/index.blade.php ENDPATH**/ ?>