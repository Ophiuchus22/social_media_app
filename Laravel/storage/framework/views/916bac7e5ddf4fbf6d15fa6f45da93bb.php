<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('User Profile')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 relative">
                    <!-- Edit Button -->
                    <a href="<?php echo e(route('profile.edit')); ?>" class="absolute top-4 right-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Edit Profile
                    </a>
                    
                    <div class="flex items-center space-x-4 mb-6">
                        <!-- Profile Picture -->
                        <div class="w-24 h-24 rounded-full overflow-hidden">
                            <img src="<?php echo e(asset('storage/' . Auth::user()->profile_picture)); ?>" alt="Profile Picture" width="150" height="150">
                        </div>
                        <div>
                            <!-- Name -->
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                <?php echo e(Auth::user()->name); ?>

                            </h3>
                            <!-- Email -->
                            <p class="text-gray-600 dark:text-gray-400">
                                <?php echo e(Auth::user()->email); ?>

                            </p>
                        </div>
                    </div>
                    
                    <!-- Bio -->
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Bio</h4>
                        <p class="text-gray-700 dark:text-gray-300">
                            <?php echo e(Auth::user()->bio ?? 'No bio available. Add your bio to tell others about yourself!'); ?>

                        </p>
                    </div>
                </div>
            </div>

            <!-- Posts -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Posts</h4>
                    <?php $__empty_1 = true; $__currentLoopData = Auth::user()->posts ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg mb-4">
                            <p class="text-gray-800 dark:text-gray-200"><?php echo e($post->content); ?></p>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Posted on <?php echo e($post->created_at->format('M d, Y')); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-gray-700 dark:text-gray-300">No posts yet. Share your thoughts!</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\social_media_app\resources\views/profile/user-profile.blade.php ENDPATH**/ ?>