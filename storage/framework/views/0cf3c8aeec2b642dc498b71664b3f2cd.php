

<?php $__env->startSection('title', 'Manage Menu Items - Admin Panel'); ?>

<?php $__env->startSection('content'); ?>

<!-- Hero Section - Dark Theme -->
<section class="relative bg-gradient-to-br from-[#1a1a1a] via-[#2d1f1f] to-[#1a1a1a] py-12 overflow-hidden">
    <!-- Seigaiha Pattern -->
    <div class="absolute inset-0 opacity-[0.05] seigaiha-pattern"></div>
    
    <!-- Decorative Glows -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-red-600/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-amber-400/10 rounded-full blur-3xl"></div>
    
    <!-- Gold Accent Lines -->
    <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-amber-400/50 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-amber-400/30 to-transparent"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <p class="text-amber-400/80 text-sm font-medium tracking-widest uppercase mb-3">Admin Panel</p>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-3 font-serif">
                    Manage <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-300">Menu</span>
                </h1>
                <p class="text-white/60 text-lg">Create, edit, and delete menu items</p>
            </div>
            <div class="flex items-center gap-4">
                <a href="<?php echo e(route('admin.index')); ?>" class="flex items-center gap-2 text-white/70 hover:text-amber-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span class="hidden md:inline">Back</span>
                </a>
                <a href="<?php echo e(route('admin.menu-items.create')); ?>" class="flex items-center gap-2 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-black font-bold px-5 py-2.5 rounded-xl transition-all shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add New Item
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] py-12 relative overflow-hidden min-h-screen">
    <!-- Background Decorations -->
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-red-100/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-amber-100/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <?php if(session('success')): ?>
            <div class="m-6 mb-0 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center gap-3">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>

            <!-- Search Bar -->
            <div class="p-6 border-b border-gray-100">
                <form method="GET" action="<?php echo e(route('admin.menu-items.index')); ?>" class="flex gap-3">
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text" 
                               name="search" 
                               value="<?php echo e($search ?? ''); ?>" 
                               placeholder="Search by name, description, or category..." 
                               class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition-all">
                    </div>
                    <button type="submit" class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-6 py-3 rounded-xl font-semibold transition-all shadow-lg">
                        Search
                    </button>
                    <?php if($search ?? ''): ?>
                    <a href="<?php echo e(route('admin.menu-items.index')); ?>" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-semibold transition-colors">
                        Clear
                    </a>
                    <?php endif; ?>
                </form>
            </div>

            <?php if($menuItems->count() > 0): ?>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-gray-50 to-white border-b border-gray-100">
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Image</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Name</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Category</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Price</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Status</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Flags</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-600 text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-6">
                                <?php
                                    $imageSrc = null;
                                    if ($item->image) {
                                        $filePath = storage_path('app/public/' . $item->image);
                                        if (file_exists($filePath)) {
                                            $imageSrc = asset('storage/' . $item->image);
                                        }
                                    }
                                    if (!$imageSrc && $item->image_url) {
                                        $imageSrc = $item->image_url;
                                    }
                                ?>
                                
                                <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100 flex items-center justify-center border-2 border-gray-100">
                                    <?php if($imageSrc): ?>
                                        <img src="<?php echo e($imageSrc); ?>" 
                                             alt="<?php echo e($item->name); ?>" 
                                             class="w-full h-full object-cover"
                                             onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="w-full h-full bg-gray-100 flex items-center justify-center hidden">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    <?php else: ?>
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div>
                                    <p class="font-bold text-gray-800"><?php echo e($item->name); ?></p>
                                    <?php if($item->description): ?>
                                    <p class="text-xs text-gray-500 mt-1"><?php echo e(\Illuminate\Support\Str::limit($item->description, 50)); ?></p>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-gray-600 text-sm"><?php echo e($item->category->name ?? 'Uncategorized'); ?></span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="font-bold text-red-600">₱<?php echo e(number_format($item->price, 2)); ?></span>
                            </td>
                            <td class="py-4 px-6">
                                <?php if($item->is_available): ?>
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                        Available
                                    </span>
                                <?php else: ?>
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                        Unavailable
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex gap-1">
                                    <?php if($item->is_featured): ?>
                                    <span class="w-7 h-7 rounded-lg bg-amber-100 flex items-center justify-center" title="Featured">
                                        <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    </span>
                                    <?php endif; ?>
                                    <?php if($item->is_bestseller): ?>
                                    <span class="w-7 h-7 rounded-lg bg-red-100 flex items-center justify-center" title="Bestseller">
                                        <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"/>
                                        </svg>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <a href="<?php echo e(route('admin.menu-items.edit', $item)); ?>" class="text-blue-600 hover:text-blue-700 font-semibold text-sm">
                                        Edit
                                    </a>
                                    <form method="POST" action="<?php echo e(route('admin.menu-items.destroy', $item)); ?>" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this menu item?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-red-600 hover:text-red-700 font-semibold text-sm">
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

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    Showing <?php echo e($menuItems->firstItem()); ?> to <?php echo e($menuItems->lastItem()); ?> of <?php echo e($menuItems->total()); ?> items
                </div>
                <div>
                    <?php echo e($menuItems->links()); ?>

                </div>
            </div>
            <?php else: ?>
            <div class="text-center py-16">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <?php if($search ?? ''): ?>
                    <p class="text-gray-500 text-lg mb-4">No menu items found matching "<?php echo e($search); ?>"</p>
                    <a href="<?php echo e(route('admin.menu-items.index')); ?>" class="inline-block bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2 rounded-xl font-semibold transition-colors mr-2">
                        Clear Search
                    </a>
                <?php else: ?>
                    <p class="text-gray-500 text-lg mb-4">No menu items found</p>
                <?php endif; ?>
                <a href="<?php echo e(route('admin.menu-items.create')); ?>" class="inline-block bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-6 py-2 rounded-xl font-semibold transition-all shadow-lg">
                    Create Your First Menu Item
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/admin/menu-items/index.blade.php ENDPATH**/ ?>