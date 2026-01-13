

<?php $__env->startSection('title', 'Meet the Developers - Washoku Japanese Restaurant'); ?>

<?php $__env->startSection('content'); ?>

<section class="bg-gradient-to-br from-red-700 via-red-600 to-red-800 py-20 relative overflow-hidden">
    
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    <div class="absolute top-20 left-10 w-32 h-32 bg-white/5 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-40 h-40 bg-white/5 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center">
            <div class="inline-block bg-white/10 backdrop-blur-sm px-6 py-2 rounded-full mb-6">
                <span class="text-white/90 text-sm font-semibold">👨‍💻 Our Team</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-bold font-serif text-white mb-6">Meet the Developers</h1>
            <p class="text-white/90 text-xl max-w-2xl mx-auto">The talented team behind this project</p>
        </div>
    </div>
</section>


<section class="bg-gradient-to-b from-warm-cream via-warm-beige to-warm-cream py-24 relative overflow-hidden">
    
    <div class="absolute top-0 left-0 w-96 h-96 bg-red-100/30 rounded-full blur-3xl -translate-y-1/2 -translate-x-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-red-100/30 rounded-full blur-3xl translate-y-1/2 translate-x-1/2"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            $placeholderImage = 'https://scontent.fmnl17-3.fna.fbcdn.net/v/t39.30808-6/605733820_2335300180269297_7169209866634883314_n.jpg?stp=cp6_dst-jpg_tt6&_nc_cat=103&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeEcrrX6cmFE_5SFKJoKSjcTlYudFcXJi2SVi50VxcmLZJV5TgF3rvHoi85Nusg-lccJkQZgn3IUaV1bDGUASgt-&_nc_ohc=NNT8aMGlKncQ7kNvwG36zxj&_nc_oc=Adng14c36r07ZpHVa33X470DnqJm4uB0LbPHVnkLDt3HgRe8FV7a0wCQgbgNqDzpa0I&_nc_zt=23&_nc_ht=scontent.fmnl17-3.fna&_nc_gid=rkMQpypeJZUN6RUFoH7tUg&oh=00_AfqFKXH_6SREgIefb9ACCCXQmV-LRgiLhmXDAsbZ5k3BnQ&oe=696A2A97';
            $developers = [
                ['name' => 'Josh Matthew Almoite', 'role' => 'Full Stack Developer', 'icon' => '👨‍💻', 'image' => '/images/josh.png'],
                ['name' => 'Miguel Gascon', 'role' => 'Project Manager', 'icon' => '🎨', 'image' => '/images/miguel.png'],
                ['name' => 'Krystel Callo', 'role' => 'Technical Writer', 'icon' => '⚙️', 'image' => '/images/callo.png'],
                ['name' => 'Jana Buan', 'role' => 'Paper Documentation Handler', 'icon' => '📝', 'image' => '/images/jana.jpg']
            ];
            ?>
            
            <?php $__currentLoopData = $developers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $developer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border-2 border-transparent hover:border-red-200">
                    
                    <div class="relative aspect-square overflow-hidden bg-gradient-to-br from-gray-100 to-gray-50">
                        <img src="<?php echo e($developer['image']); ?>" 
                             alt="<?php echo e($developer['name']); ?>"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                             loading="lazy"
                             onerror="this.onerror=null; this.src='https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=Developer';">
                        
                        <div class="absolute top-4 right-4 text-3xl opacity-80 group-hover:opacity-100 transition-opacity">
                            <?php echo e($developer['icon']); ?>

                        </div>
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    
                    <div class="p-6 text-center relative">
                        <h3 class="font-bold text-lg text-primary-dark group-hover:text-red-600 transition-colors mb-2">
                            <?php echo e($developer['name']); ?>

                        </h3>
                        <p class="text-gray-600 text-sm">
                            <?php echo e($developer['role']); ?>

                        </p>
                        
                        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-1 bg-red-600 group-hover:w-20 transition-all duration-300 rounded-full"></div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Josh Almoite\Documents\Laravel\japanese-restaurant\resources\views/developers.blade.php ENDPATH**/ ?>