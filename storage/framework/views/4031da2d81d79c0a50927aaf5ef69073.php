

<?php $__env->startSection('title', 'Create Menu Item - Admin Panel'); ?>

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
        <div class="flex justify-between items-center">
            <div>
                <p class="text-amber-400/80 text-sm font-medium tracking-widest uppercase mb-3">Admin Panel</p>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-3 font-serif">
                    Create <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-300">Menu Item</span>
                </h1>
                <p class="text-white/60 text-lg">Add a new item to your menu</p>
            </div>
            <a href="<?php echo e(route('admin.menu-items.index')); ?>" class="hidden md:flex items-center gap-2 text-white/70 hover:text-amber-400 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Menu Items
            </a>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gradient-to-br from-[#f8f5f0] via-[#f5f1e8] to-[#ebe5d9] py-12 relative overflow-hidden min-h-screen">
    <!-- Background Decorations -->
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-red-100/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-amber-100/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 max-w-4xl mx-auto">
            <?php if($errors->any()): ?>
            <div class="m-6 mb-0 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                <ul class="list-disc list-inside text-sm">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('admin.menu-items.store')); ?>" enctype="multipart/form-data" class="p-8">
                <?php echo csrf_field(); ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Name *</label>
                        <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" required
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all">
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                        <textarea id="description" name="description" rows="3"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all resize-none"><?php echo e(old('description')); ?></textarea>
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Price (₱) *</label>
                        <input type="number" id="price" name="price" value="<?php echo e(old('price')); ?>" step="0.01" min="0" required
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all">
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">Category *</label>
                        <select id="category_id" name="category_id" required
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all bg-white">
                            <option value="">Select a category</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                                <?php echo e($category->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Image Upload</label>
                        <input type="file" id="image" name="image" accept="image/*"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-600 hover:file:bg-red-100">
                        <p class="text-xs text-gray-500 mt-2">Max size: 2MB (JPEG, PNG, JPG, GIF)</p>
                    </div>

                    <!-- Image URL -->
                    <div>
                        <label for="image_url" class="block text-sm font-semibold text-gray-700 mb-2">Image URL</label>
                        <input type="url" id="image_url" name="image_url" value="<?php echo e(old('image_url')); ?>"
                            placeholder="https://example.com/image.jpg"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500/20 focus:border-red-500 outline-none transition-all">
                        <p class="text-xs text-gray-500 mt-2">URL or upload (URL takes priority if both provided)</p>
                    </div>

                    <!-- Checkboxes -->
                    <div class="md:col-span-2 bg-gray-50 rounded-xl p-5">
                        <p class="text-sm font-semibold text-gray-700 mb-4">Item Options</p>
                        <div class="flex flex-wrap gap-6">
                            <label class="flex items-center cursor-pointer group">
                                <input type="checkbox" name="is_available" value="1" <?php echo e(old('is_available', true) ? 'checked' : ''); ?>

                                    class="w-5 h-5 text-red-600 border-gray-300 rounded focus:ring-red-500">
                                <span class="ml-3 text-sm font-medium text-gray-700 group-hover:text-gray-900">Available</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="checkbox" name="is_featured" value="1" <?php echo e(old('is_featured') ? 'checked' : ''); ?>

                                    class="w-5 h-5 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                                <span class="ml-3 text-sm font-medium text-gray-700 group-hover:text-gray-900">Featured</span>
                            </label>
                            <label class="flex items-center cursor-pointer group">
                                <input type="checkbox" name="is_bestseller" value="1" <?php echo e(old('is_bestseller') ? 'checked' : ''); ?>

                                    class="w-5 h-5 text-red-600 border-gray-300 rounded focus:ring-red-500">
                                <span class="ml-3 text-sm font-medium text-gray-700 group-hover:text-gray-900">Bestseller</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="mt-8 flex gap-4">
                    <button type="submit" class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-8 py-3 rounded-xl font-bold transition-all shadow-lg hover:shadow-xl">
                        Create Menu Item
                    </button>
                    <a href="<?php echo e(route('admin.menu-items.index')); ?>" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-8 py-3 rounded-xl font-semibold transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/admin/menu-items/create.blade.php ENDPATH**/ ?>