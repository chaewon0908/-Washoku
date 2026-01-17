

<?php $__env->startSection('title', 'Completed Orders - Admin Panel'); ?>

<?php $__env->startSection('content'); ?>

<!-- Hero Section - Dark Theme -->
<section class="relative bg-gradient-to-br from-[#1a1a1a] via-[#2d1f1f] to-[#1a1a1a] py-12 overflow-hidden">
    <!-- Seigaiha Pattern -->
    <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
    
    <!-- Decorative Glows -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-green-600/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-amber-400/10 rounded-full blur-3xl"></div>
    
    <!-- Gold Accent Lines -->
    <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-green-400/50 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-amber-400/30 to-transparent"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-green-400/80 text-sm font-medium tracking-widest uppercase mb-3">Order History</p>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-3 font-serif">
                    Completed <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-green-300">Orders</span>
                </h1>
                <p class="text-white/60 text-lg">View all successfully fulfilled orders</p>
            </div>
            <div class="hidden md:flex items-center gap-4">
                <a href="<?php echo e(route('admin.orders')); ?>" class="flex items-center gap-2 text-white/70 hover:text-amber-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Active Orders
                </a>
                <span class="text-white/30">|</span>
                <a href="<?php echo e(route('admin.index')); ?>" class="flex items-center gap-2 text-white/70 hover:text-amber-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Admin Panel
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] py-12 relative overflow-hidden min-h-screen">
    <!-- Background Decorations -->
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-green-100/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-amber-100/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100" x-data="{ searchQuery: '<?php echo e(request('search')); ?>' }">
            
            <!-- Search Bar -->
            <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-green-50/50 to-white">
                <form method="GET" action="<?php echo e(route('admin.orders.completed')); ?>" class="flex flex-col sm:flex-row gap-4">
                    <div class="relative flex-1 max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="search" 
                            value="<?php echo e(request('search')); ?>"
                            placeholder="Search by Order # (e.g., ORD-F2MP9CRB)" 
                            class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition-all text-gray-700 placeholder-gray-400"
                        >
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-500 hover:to-green-600 text-white font-semibold rounded-xl transition-all shadow-lg hover:shadow-xl flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Search
                        </button>
                        <?php if(request('search')): ?>
                        <a href="<?php echo e(route('admin.orders.completed')); ?>" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition-all flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Clear
                        </a>
                        <?php endif; ?>
                    </div>
                </form>
                <?php if(request('search')): ?>
                <p class="mt-3 text-sm text-gray-500">
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
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-green-50/50 to-white border-b border-gray-100">
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Order #</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Customer</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Items</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Date Completed</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Total</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Status</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-green-50/30 transition-colors">
                            <td class="py-4 px-6">
                                <span class="font-bold text-gray-800"><?php echo e($order->order_number); ?></span>
                            </td>
                            <td class="py-4 px-6">
                                <div>
                                    <p class="font-semibold text-gray-800"><?php echo e($order->customer_name ?? ($order->user->name ?? 'Guest')); ?></p>
                                    <?php if($order->customer_email): ?>
                                    <p class="text-xs text-gray-500"><?php echo e($order->customer_email); ?></p>
                                    <?php endif; ?>
                                    <?php if($order->customer_phone): ?>
                                    <p class="text-xs text-gray-500"><?php echo e($order->customer_phone); ?></p>
                                    <?php endif; ?>
                                    <?php if($order->delivery_address): ?>
                                    <p class="text-xs text-gray-500 mt-1"><?php echo e(\Illuminate\Support\Str::limit($order->delivery_address, 30)); ?></p>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="space-y-1 max-w-[200px]">
                                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="text-sm text-gray-600">
                                        <span class="font-medium text-gray-800"><?php echo e($item->quantity); ?>x</span> <?php echo e($item->item_name); ?>

                                    </p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-sm text-gray-600"><?php echo e($order->updated_at->format('M d, Y')); ?></p>
                                <p class="text-xs text-gray-400"><?php echo e($order->updated_at->format('H:i')); ?></p>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-lg font-bold text-green-600">₱<?php echo e(number_format($order->total, 2)); ?></span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1.5 rounded-full text-xs font-semibold bg-green-100 text-green-700 flex items-center gap-1 w-fit">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Completed
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <form method="POST" action="<?php echo e(route('admin.orders.update-status', $order)); ?>" class="inline-block">
                                    <?php echo csrf_field(); ?>
                                    <select name="status" onchange="this.form.submit()" class="px-3 py-2 text-sm border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none bg-white cursor-pointer">
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

            <div class="px-6 py-4 bg-green-50/30 border-t border-gray-100">
                <?php echo e($orders->links()); ?>

            </div>
            <?php else: ?>
            <div class="text-center py-16">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p class="text-gray-500 text-lg">No completed orders yet</p>
                <p class="text-gray-400 text-sm mt-2">Orders will appear here once they are marked as completed</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/admin/completed-orders.blade.php ENDPATH**/ ?>