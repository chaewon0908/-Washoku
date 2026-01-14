

<?php $__env->startSection('title', 'Manage Menu Items - Admin Panel'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-warm-cream to-warm-beige py-12">
    <div class="container mx-auto px-4">
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-serif font-bold text-primary-dark mb-2">Manage Menu Items</h1>
                <p class="text-gray-600">Create, edit, and delete menu items</p>
            </div>
            <div class="flex gap-4">
                <a href="<?php echo e(route('admin.index')); ?>" class="text-red-600 hover:text-red-700 font-semibold">
                    ← Back to Admin Panel
                </a>
                <a href="<?php echo e(route('admin.menu-items.create')); ?>" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors">
                    + Add New Item
                </a>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-8">
            <?php if(session('success')): ?>
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>

            <!-- Search Bar -->
            <div class="mb-6">
                <form method="GET" action="<?php echo e(route('admin.menu-items.index')); ?>" class="flex gap-4">
                    <div class="flex-1 relative">
                        <input type="text" 
                               name="search" 
                               value="<?php echo e($search ?? ''); ?>" 
                               placeholder="Search by name, description, or category..." 
                               class="w-full px-4 py-3 pl-12 border-2 border-gray-300 rounded-lg focus:border-red-500 focus:outline-none transition-colors">
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                        Search
                    </button>
                    <?php if($search ?? ''): ?>
                    <a href="<?php echo e(route('admin.menu-items.index')); ?>" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-semibold transition-colors">
                        Clear
                    </a>
                    <?php endif; ?>
                </form>
            </div>

            <?php if($menuItems->count() > 0): ?>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b-2 border-gray-200">
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Image</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Name</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Category</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Price</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Flags</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4">
                                <?php
                                    $imageSrc = null;
                                    $placeholder = 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"><rect width="64" height="64" fill="#e5e7eb"/><text x="50%" y="50%" text-anchor="middle" dy=".3em" fill="#9ca3af" font-size="10" font-family="Arial">' . htmlspecialchars(substr($item->name, 0, 3)) . '</text></svg>');
                                    
                                    // Try to get image from storage first
                                    if ($item->image) {
                                        $storagePath = asset('storage/' . $item->image);
                                        // Check if file exists
                                        $filePath = storage_path('app/public/' . $item->image);
                                        if (file_exists($filePath)) {
                                            $imageSrc = $storagePath;
                                        }
                                    }
                                    
                                    // If no storage image or it doesn't exist, try image_url
                                    if (!$imageSrc && $item->image_url) {
                                        $imageSrc = $item->image_url;
                                    }
                                ?>
                                
                                <div class="w-16 h-16 rounded-lg overflow-hidden bg-gray-200 flex items-center justify-center relative">
                                    <?php if($imageSrc): ?>
                                        <img src="<?php echo e($imageSrc); ?>" 
                                             alt="<?php echo e($item->name); ?>" 
                                             class="w-full h-full object-cover"
                                             onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="w-full h-full bg-gray-200 flex items-center justify-center hidden">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    <?php else: ?>
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-semibold text-primary-dark"><?php echo e($item->name); ?></p>
                                    <?php if($item->description): ?>
                                    <p class="text-sm text-gray-600 mt-1"><?php echo e(\Illuminate\Support\Str::limit($item->description, 50)); ?></p>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-gray-700"><?php echo e($item->category->name ?? 'Uncategorized'); ?></span>
                            </td>
                            <td class="py-4 px-4 font-semibold text-lg">₱<?php echo e(number_format($item->price, 2)); ?></td>
                            <td class="py-4 px-4">
                                <?php if($item->is_available): ?>
                                    <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                        Available
                                    </span>
                                <?php else: ?>
                                    <span class="px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-800">
                                        Unavailable
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex gap-2">
                                    <?php if($item->is_featured): ?>
                                    <span class="px-2 py-1 rounded text-xs font-semibold bg-yellow-100 text-yellow-800" title="Featured">
                                        ⭐
                                    </span>
                                    <?php endif; ?>
                                    <?php if($item->is_bestseller): ?>
                                    <span class="px-2 py-1 rounded text-xs font-semibold bg-orange-100 text-orange-800" title="Bestseller">
                                        🔥
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex gap-2">
                                    <a href="<?php echo e(route('admin.menu-items.edit', $item)); ?>" class="text-blue-600 hover:text-blue-700 font-semibold">
                                        Edit
                                    </a>
                                    <form method="POST" action="<?php echo e(route('admin.menu-items.destroy', $item)); ?>" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this menu item?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-red-600 hover:text-red-700 font-semibold">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex items-center justify-between">
                <div class="text-sm text-gray-600">
                    Showing <?php echo e($menuItems->firstItem()); ?> to <?php echo e($menuItems->lastItem()); ?> of <?php echo e($menuItems->total()); ?> items
                </div>
                <div>
                    <?php echo e($menuItems->links()); ?>

                </div>
            </div>
            <?php else: ?>
            <div class="text-center py-12">
                <?php if($search ?? ''): ?>
                    <p class="text-gray-600 text-lg mb-4">No menu items found matching "<?php echo e($search); ?>"</p>
                    <a href="<?php echo e(route('admin.menu-items.index')); ?>" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-lg font-semibold transition-colors mr-2">
                        Clear Search
                    </a>
                <?php else: ?>
                    <p class="text-gray-600 text-lg mb-4">No menu items found</p>
                <?php endif; ?>
                <a href="<?php echo e(route('admin.menu-items.create')); ?>" class="inline-block bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors">
                    Create Your First Menu Item
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/admin/menu-items/index.blade.php ENDPATH**/ ?>