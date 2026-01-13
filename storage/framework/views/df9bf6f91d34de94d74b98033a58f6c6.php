<?php $__env->startSection('title', $category->name . ' - Washoku'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-warm-cream to-warm-beige py-12">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="mb-6">
            <nav class="flex items-center gap-2 text-sm text-gray-600">
                <a href="<?php echo e(route('home')); ?>" class="hover:text-red-600 transition-colors">Home</a>
                <span>/</span>
                <a href="<?php echo e(route('menu.index')); ?>" class="hover:text-red-600 transition-colors">Menu</a>
                <span>/</span>
                <span class="text-primary-dark font-semibold"><?php echo e($category->name); ?></span>
            </nav>
        </div>

        <!-- Category Header -->
        <div class="text-center mb-12">
            <div class="inline-block bg-gradient-to-br from-red-100 to-red-50 rounded-full p-6 mb-6">
                <div class="text-6xl">🍱</div>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold mb-4 text-primary-dark font-serif"><?php echo e($category->name); ?></h1>
            <?php if($category->description): ?>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg"><?php echo e($category->description); ?></p>
            <?php endif; ?>
        </div>

        <!-- Category Tabs and Menu Items Grid for Bento Boxes -->
        <?php if($category->slug === 'bento-boxes'): ?>
        <div x-data="{ 
            activeTab: 'all',
            filterItems(item) {
                if (this.activeTab === 'all') return true;
                if (this.activeTab === 'featured') return item.is_featured === true;
                if (this.activeTab === 'traditional') {
                    const name = item.name.toLowerCase();
                    return name.includes('traditional') || name.includes('makunouchi') || 
                           name.includes('tonkatsu') || name.includes('teriyaki') || 
                           name.includes('sukiyaki') || name.includes('salmon teriyaki');
                }
                if (this.activeTab === 'character') {
                    const name = item.name.toLowerCase();
                    return name.includes('character') || name.includes('decorative') || 
                           name.includes('kyaraben') || name.includes('kyara');
                }
                return true;
            }
        }">
            <!-- Category Tabs -->
            <div class="mb-8">
                <div class="flex flex-wrap justify-center gap-3 mb-8">
                    <button 
                        @click="activeTab = 'all'"
                        :class="activeTab === 'all' ? 'bg-red-600 text-white shadow-lg scale-105' : 'bg-white text-gray-700 hover:bg-red-50'"
                        class="px-6 py-3 rounded-full font-semibold transition-all duration-300 border-2 border-red-200">
                        All
                    </button>
                    <button 
                        @click="activeTab = 'featured'"
                        :class="activeTab === 'featured' ? 'bg-red-600 text-white shadow-lg scale-105' : 'bg-white text-gray-700 hover:bg-red-50'"
                        class="px-6 py-3 rounded-full font-semibold transition-all duration-300 border-2 border-red-200">
                        ⭐ Featured
                    </button>
                    <button 
                        @click="activeTab = 'traditional'"
                        :class="activeTab === 'traditional' ? 'bg-red-600 text-white shadow-lg scale-105' : 'bg-white text-gray-700 hover:bg-red-50'"
                        class="px-6 py-3 rounded-full font-semibold transition-all duration-300 border-2 border-red-200">
                        Traditional
                    </button>
                    <button 
                        @click="activeTab = 'character'"
                        :class="activeTab === 'character' ? 'bg-red-600 text-white shadow-lg scale-105' : 'bg-white text-gray-700 hover:bg-red-50'"
                        class="px-6 py-3 rounded-full font-semibold transition-all duration-300 border-2 border-red-200">
                        Character/Decorative
                    </button>
                </div>
            </div>

            <!-- Menu Items Grid -->
            <?php if($items->count() > 0): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div 
                        <?php if($category->slug === 'bento-boxes'): ?>
                        x-show="filterItems(<?php echo \Illuminate\Support\Js::from([
                            'name' => $item->name,
                            'is_featured' => $item->is_featured ?? false
                        ])->toHtml() ?>)"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-90"
                        <?php endif; ?>
                        class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
                        <div class="relative overflow-hidden" style="height: 250px;">
                            <img 
                                src="<?php echo e($item->image_url ?? $item->image ?? 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food'); ?>" 
                                alt="<?php echo e($item->name); ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                onerror="this.onerror=null; this.src='https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food';">
                            <?php if($item->is_featured): ?>
                                <div class="absolute top-3 left-3 bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-xs font-bold">
                                    ⭐ Featured
                                </div>
                            <?php endif; ?>
                            <?php if($item->is_bestseller): ?>
                                <div class="absolute top-3 right-3 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    🔥 Bestseller
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-primary-dark mb-2 font-serif"><?php echo e($item->name); ?></h3>
                            <?php if($item->description): ?>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2"><?php echo e(\Illuminate\Support\Str::limit($item->description, 80)); ?></p>
                            <?php endif; ?>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-red-600">₱<?php echo e(number_format($item->price, 2)); ?></span>
                                <?php if($category->slug === 'bento-boxes' && $item->name === 'Custom Bento Box (4 compartments)'): ?>
                                    <a href="/bento-builder"
                                       class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors duration-300 shadow-md hover:shadow-lg inline-block text-center">
                                        Customize
                                    </a>
                                <?php else: ?>
                                    <button 
                                        @click="$store.cart.addToCart(<?php echo e($item->id); ?>, '<?php echo e(addslashes($item->name)); ?>', <?php echo e($item->price); ?>, '<?php echo e(addslashes($item->image_url ?? $item->image ?? '')); ?>')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors duration-300 shadow-md hover:shadow-lg">
                                        Add to Cart
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="text-center py-16">
                    <div class="text-6xl mb-4">🍽️</div>
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">No items available</h2>
                    <p class="text-gray-600 mb-6">This category doesn't have any menu items yet.</p>
                    <a href="<?php echo e(route('menu.index')); ?>" class="inline-block bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition-colors">
                        Browse Other Categories
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <?php else: ?>
        <!-- Menu Items Grid (Non-Bento Categories) -->
        <?php if($items->count() > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
                        <div class="relative overflow-hidden" style="height: 250px;">
                            <img 
                                src="<?php echo e($item->image_url ?? $item->image ?? 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food'); ?>" 
                                alt="<?php echo e($item->name); ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                onerror="this.onerror=null; this.src='https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Food';">
                            <?php if($item->is_featured): ?>
                                <div class="absolute top-3 left-3 bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-xs font-bold">
                                    ⭐ Featured
                                </div>
                            <?php endif; ?>
                            <?php if($item->is_bestseller): ?>
                                <div class="absolute top-3 right-3 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    🔥 Bestseller
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-primary-dark mb-2 font-serif"><?php echo e($item->name); ?></h3>
                            <?php if($item->description): ?>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2"><?php echo e(\Illuminate\Support\Str::limit($item->description, 80)); ?></p>
                            <?php endif; ?>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-red-600">₱<?php echo e(number_format($item->price, 2)); ?></span>
                                <button 
                                    @click="$store.cart.addToCart(<?php echo e($item->id); ?>, '<?php echo e(addslashes($item->name)); ?>', <?php echo e($item->price); ?>, '<?php echo e(addslashes($item->image_url ?? $item->image ?? '')); ?>')"
                                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors duration-300 shadow-md hover:shadow-lg">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="text-center py-16">
                <div class="text-6xl mb-4">🍽️</div>
                <h2 class="text-2xl font-bold text-gray-700 mb-2">No items available</h2>
                <p class="text-gray-600 mb-6">This category doesn't have any menu items yet.</p>
                <a href="<?php echo e(route('menu.index')); ?>" class="inline-block bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition-colors">
                    Browse Other Categories
                </a>
            </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/menu/category.blade.php ENDPATH**/ ?>