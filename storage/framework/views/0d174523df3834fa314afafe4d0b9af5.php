

<?php $__env->startSection('title', 'Manage Orders - Admin Panel'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-warm-cream to-warm-beige py-12">
    <div class="container mx-auto px-4">
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-serif font-bold text-primary-dark mb-2">Manage Orders</h1>
                <p class="text-gray-600">View and update order status</p>
            </div>
            <a href="<?php echo e(route('admin.index')); ?>" class="text-red-600 hover:text-red-700 font-semibold">
                ← Back to Admin Panel
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-8">
            <?php if(session('success')): ?>
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>

            <?php if($orders->count() > 0): ?>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b-2 border-gray-200">
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Order #</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Customer</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Items</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Date</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Total</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4">
                                <span class="font-semibold text-primary-dark"><?php echo e($order->order_number); ?></span>
                            </td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-semibold"><?php echo e($order->customer_name ?? ($order->user->name ?? 'Guest')); ?></p>
                                    <?php if($order->customer_email): ?>
                                    <p class="text-sm text-gray-600"><?php echo e($order->customer_email); ?></p>
                                    <?php endif; ?>
                                    <?php if($order->customer_phone): ?>
                                    <p class="text-sm text-gray-600"><?php echo e($order->customer_phone); ?></p>
                                    <?php endif; ?>
                                    <?php if($order->delivery_address): ?>
                                    <p class="text-sm text-gray-600"><?php echo e(\Illuminate\Support\Str::limit($order->delivery_address, 30)); ?></p>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="space-y-1">
                                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="text-sm">
                                        <?php echo e($item->quantity); ?>x <?php echo e($item->item_name); ?>

                                    </p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-gray-600">
                                <?php echo e($order->created_at->format('M d, Y')); ?><br>
                                <span class="text-xs"><?php echo e($order->created_at->format('H:i')); ?></span>
                            </td>
                            <td class="py-4 px-4 font-semibold text-lg">₱<?php echo e(number_format($order->total, 2)); ?></td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 rounded-full text-sm font-semibold
                                    <?php if($order->status === 'pending'): ?> bg-yellow-100 text-yellow-800
                                    <?php elseif($order->status === 'confirmed'): ?> bg-blue-100 text-blue-800
                                    <?php elseif($order->status === 'preparing'): ?> bg-purple-100 text-purple-800
                                    <?php elseif($order->status === 'delivering'): ?> bg-indigo-100 text-indigo-800
                                    <?php elseif($order->status === 'completed'): ?> bg-green-100 text-green-800
                                    <?php else: ?> bg-red-100 text-red-800
                                    <?php endif; ?>">
                                    <?php echo e(ucfirst($order->status)); ?>

                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <form method="POST" action="<?php echo e(route('admin.orders.update-status', $order)); ?>" class="inline-block">
                                    <?php echo csrf_field(); ?>
                                    <select name="status" onchange="this.form.submit()" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-red-600 outline-none">
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

            <div class="mt-6">
                <?php echo e($orders->links()); ?>

            </div>
            <?php else: ?>
            <div class="text-center py-12">
                <p class="text-gray-600 text-lg">No orders found</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/admin/orders.blade.php ENDPATH**/ ?>