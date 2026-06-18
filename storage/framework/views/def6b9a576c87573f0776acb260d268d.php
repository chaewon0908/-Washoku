

<?php $__env->startSection('title', 'Completed Orders - Admin Panel'); ?>

<?php $__env->startSection('content'); ?>

<!-- Hero Section - Dark Theme -->
<section class="relative bg-gradient-to-br from-[#1a1a1a] via-[#2d1f1f] to-[#1a1a1a] py-8 sm:py-10 md:py-12 overflow-hidden">
    <!-- Seigaiha Pattern -->
    <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
    
    <!-- Decorative Glows - Responsive -->
    <div class="absolute top-0 left-1/4 w-48 h-48 sm:w-64 sm:h-64 md:w-80 md:h-80 lg:w-96 lg:h-96 bg-green-600/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-40 h-40 sm:w-56 sm:h-56 md:w-64 md:h-64 lg:w-80 lg:h-80 bg-amber-400/10 rounded-full blur-3xl"></div>
    
    <!-- Gold Accent Lines -->
    <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-green-400/50 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-amber-400/30 to-transparent"></div>
    
    <div class="container mx-auto px-4 sm:px-6 relative z-10">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 md:gap-0">
            <div>
                <p class="text-green-400/80 text-xs sm:text-sm font-medium tracking-widest uppercase mb-2 sm:mb-3 reveal-scale">Order History</p>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-2 sm:mb-3 font-english reveal">
                    Completed <span class="gradient-text-animate">Orders</span>
                </h1>
                <p class="text-white/60 text-base sm:text-lg reveal px-2 md:px-0" style="transition-delay: 200ms;">View all successfully fulfilled orders</p>
            </div>
            <!-- Navigation Links - Responsive -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-3 md:gap-4 mt-4 md:mt-0">
                <a href="<?php echo e(route('admin.orders.cancelled')); ?>" class="flex items-center gap-1.5 sm:gap-2 text-white/70 hover:text-red-400 transition-colors text-sm sm:text-base">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    <span class="whitespace-nowrap">Cancelled Orders</span>
                </a>
                <span class="text-white/30 hidden sm:inline">|</span>
                <a href="<?php echo e(route('admin.orders')); ?>" class="flex items-center gap-1.5 sm:gap-2 text-white/70 hover:text-amber-400 transition-colors text-sm sm:text-base">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <span class="whitespace-nowrap">Active Orders</span>
                </a>
                <span class="text-white/30 hidden sm:inline">|</span>
                <a href="<?php echo e(route('admin.index')); ?>" class="flex items-center gap-1.5 sm:gap-2 text-white/70 hover:text-amber-400 transition-colors text-sm sm:text-base">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span class="whitespace-nowrap">Back to Admin Panel</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] py-8 sm:py-10 md:py-12 relative overflow-hidden min-h-screen">
    <!-- Background Decorations - Responsive -->
    <div class="absolute top-0 right-0 w-[200px] h-[200px] sm:w-[300px] sm:h-[300px] md:w-[400px] md:h-[400px] bg-green-100/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[150px] h-[150px] sm:w-[250px] sm:h-[250px] md:w-[300px] md:h-[300px] bg-amber-100/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <div class="container mx-auto px-4 sm:px-6 relative z-10">
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-xl overflow-hidden border border-gray-100 reveal" x-data="{ searchQuery: '<?php echo e(request('search')); ?>' }">
            
            <!-- Search Bar -->
            <div class="p-4 sm:p-6 border-b border-gray-100 bg-gradient-to-r from-green-50/50 to-white">
                <form method="GET" action="<?php echo e(route('admin.orders.completed')); ?>" class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                    <div class="relative flex-1 max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="search" 
                            value="<?php echo e(request('search')); ?>"
                            placeholder="Search by Order #" 
                            class="w-full pl-10 sm:pl-12 pr-3 sm:pr-4 py-2.5 sm:py-3 border-2 border-gray-200 rounded-lg sm:rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition-all text-sm sm:text-base text-gray-700 placeholder-gray-400"
                        >
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="px-4 sm:px-6 py-2.5 sm:py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-500 hover:to-green-600 text-white text-sm sm:text-base font-semibold rounded-lg sm:rounded-xl transition-all shadow-lg hover:shadow-xl flex items-center gap-1.5 sm:gap-2">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <span class="hidden sm:inline">Search</span>
                            <span class="sm:hidden">Search</span>
                        </button>
                        <?php if(request('search')): ?>
                        <a href="<?php echo e(route('admin.orders.completed')); ?>" class="px-4 sm:px-6 py-2.5 sm:py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm sm:text-base font-semibold rounded-lg sm:rounded-xl transition-all flex items-center gap-1.5 sm:gap-2">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            <span class="hidden sm:inline">Clear</span>
                        </a>
                        <?php endif; ?>
                    </div>
                </form>
                <?php if(request('search')): ?>
                <p class="mt-3 text-xs sm:text-sm text-gray-500">
                    Showing results for: <span class="font-semibold text-gray-700">"<?php echo e(request('search')); ?>"</span>
                    <span class="ml-2">(<?php echo e($orders->total()); ?> <?php echo e(Str::plural('order', $orders->total())); ?> found)</span>
                </p>
                <?php endif; ?>
            </div>
            
            <?php if(session('success')): ?>
            <div class="m-6 mb-0 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center gap-3">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>

            <?php if($orders->count() > 0): ?>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[800px]">
                    <thead>
                        <tr class="bg-gradient-to-r from-green-50/50 to-white border-b border-gray-100">
                            <th class="text-left py-3 sm:py-4 px-3 sm:px-6 font-semibold font-english text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Order #</th>
                            <th class="text-left py-3 sm:py-4 px-3 sm:px-6 font-semibold font-english text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Customer</th>
                            <th class="text-left py-3 sm:py-4 px-3 sm:px-6 font-semibold font-english text-gray-700 text-xs sm:text-sm uppercase tracking-wider hidden md:table-cell">Items</th>
                            <th class="text-left py-3 sm:py-4 px-3 sm:px-6 font-semibold font-english text-gray-700 text-xs sm:text-sm uppercase tracking-wider hidden lg:table-cell">Date Completed</th>
                            <th class="text-left py-3 sm:py-4 px-3 sm:px-6 font-semibold font-english text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Total</th>
                            <th class="text-left py-3 sm:py-4 px-3 sm:px-6 font-semibold font-english text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Status</th>
                            <th class="text-left py-3 sm:py-4 px-3 sm:px-6 font-semibold font-english text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-gradient-to-r hover:from-green-50/30 hover:to-white/50 transition-all duration-200 reveal-scale" style="transition-delay: <?php echo e($loop->index * 30); ?>ms;">
                            <td class="py-3 sm:py-4 px-3 sm:px-6">
                                <span class="font-bold text-xs sm:text-sm text-gray-800"><?php echo e($order->order_number); ?></span>
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6">
                                <div>
                                    <p class="font-semibold text-xs sm:text-sm text-gray-800"><?php echo e($order->customer_name ?? ($order->user->name ?? 'Guest')); ?></p>
                                    <?php if($order->customer_email): ?>
                                    <p class="text-[10px] sm:text-xs text-gray-500"><?php echo e($order->customer_email); ?></p>
                                    <?php endif; ?>
                                    <?php if($order->customer_phone): ?>
                                    <p class="text-[10px] sm:text-xs text-gray-500"><?php echo e($order->customer_phone); ?></p>
                                    <?php endif; ?>
                                    <?php if($order->delivery_address): ?>
                                    <p class="text-[10px] sm:text-xs text-gray-500 mt-1"><?php echo e(\Illuminate\Support\Str::limit($order->delivery_address, 30)); ?></p>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 hidden md:table-cell">
                                <div class="space-y-1 max-w-[200px]">
                                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="text-xs sm:text-sm text-gray-600">
                                        <span class="font-medium text-gray-800"><?php echo e($item->quantity); ?>x</span> <?php echo e($item->item_name); ?>

                                    </p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 hidden lg:table-cell">
                                <p class="text-xs sm:text-sm text-gray-600"><?php echo e($order->updated_at->format('M d, Y')); ?></p>
                                <p class="text-[10px] sm:text-xs text-gray-400"><?php echo e($order->updated_at->format('H:i')); ?></p>
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6">
                                <span class="text-sm sm:text-lg font-bold text-green-600">₱<?php echo e(number_format($order->total, 2)); ?></span>
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6">
                                <span class="px-2 sm:px-3 py-1 sm:py-1.5 rounded-full text-[10px] sm:text-xs font-semibold bg-green-100 text-green-700 flex items-center gap-1 w-fit">
                                    <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Completed
                                </span>
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6">
                                <form method="POST" action="<?php echo e(route('admin.orders.update-status', $order)); ?>" class="inline-block">
                                    <?php echo csrf_field(); ?>
                                    <select name="status" onchange="this.form.submit()" class="px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm border-2 border-gray-200 rounded-lg sm:rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none bg-white cursor-pointer">
                                        <option value="pending" <?php echo e($order->status === 'pending' ? 'selected' : ''); ?>>Pending</option>
                                        <option value="confirmed" <?php echo e($order->status === 'confirmed' ? 'selected' : ''); ?>>Confirmed</option>
                                        <option value="preparing" <?php echo e($order->status === 'preparing' ? 'selected' : ''); ?>>Preparing</option>
                                        <option value="delivering" <?php echo e($order->status === 'delivering' ? 'selected' : ''); ?>>Delivering</option>
                                        <option value="completed" <?php echo e($order->status === 'completed' ? 'selected' : ''); ?>>Completed</option>
                                        <option value="cancelled" <?php echo e($order->status === 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="px-4 sm:px-6 py-3 sm:py-4 bg-green-50/30 border-t border-gray-100">
                <?php echo e($orders->links()); ?>

            </div>
            <?php else: ?>
            <div class="text-center py-10 sm:py-12 md:py-16">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p class="text-gray-500 text-base sm:text-lg">No completed orders yet</p>
                <p class="text-gray-400 text-xs sm:text-sm mt-2 px-4">Orders will appear here once they are marked as completed</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/admin/completed-orders.blade.php ENDPATH**/ ?>