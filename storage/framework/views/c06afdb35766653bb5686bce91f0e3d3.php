<?php
    $isJewellery = ($theme ?? session('theme', 'studio')) === 'jewellery';
?>




<section class="mt-14 mb-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-[1320px] mx-auto <?php echo e($isJewellery ? 'bg-[#3b1a63] border-[#a47dab]/35' : 'bg-[#efedf0] border-[#e2dde2]'); ?> border px-4 sm:px-6 lg:px-10 py-8 sm:py-10 lg:py-12">
        <h2 class="text-center font-heading text-3xl sm:text-4xl lg:text-5xl leading-tight <?php echo e($isJewellery ? 'text-[#c7a4cc]' : 'text-[#2f2725]'); ?> mb-6 sm:mb-8">Explore More</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-4 auto-rows-fr">

            
            <a href="<?php echo e($isJewellery ? route('front.products.index', ['category' => 'jewellery-gallery', 'force_theme' => 'jewellery']) : route('front.products.collection', ['collection' => 'party-frocks'])); ?>"
               class="lg:col-span-6 relative min-h-[230px] sm:min-h-[260px] overflow-hidden group <?php echo e($isJewellery ? 'bg-[#44206f]' : 'bg-white'); ?>">
                <img src="<?php echo e($isJewellery ? 'https://images.unsplash.com/photo-1617038220319-276d3cfab638?auto=format&fit=crop&w=1400&q=80' : 'https://images.unsplash.com/photo-1519340241574-2cec6aef0c01?auto=format&fit=crop&w=1400&q=80'); ?>"
                     alt="<?php echo e($isJewellery ? 'Jewellery Edit' : 'Party Edit'); ?>"
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-r from-black/65 via-black/35 to-transparent"></div>
                <div class="relative z-10 p-6 sm:p-8 max-w-[66%]">
                    <h3 class="font-heading text-2xl sm:text-3xl lg:text-4xl leading-[1.06]" style="color:<?php echo e($isJewellery ? '#f7d7aa' : '#312725'); ?>">
                        <?php echo e($isJewellery ? 'Jewellery Edit' : 'Party Frocks Edit'); ?>

                    </h3>
                    <p class="mt-2 text-sm sm:text-base lg:text-lg leading-snug" style="color:<?php echo e($isJewellery ? 'rgba(233,213,255,0.85)' : '#3d322f'); ?>">
                        <?php echo e($isJewellery ? 'All That Jewels You Must Own' : 'Statement looks for birthdays &amp; celebrations'); ?>

                    </p>
                    <p class="mt-5 text-base sm:text-lg lg:text-xl font-medium" style="color:<?php echo e($isJewellery ? '#f0c58f' : '#231b19'); ?>">Shop Now</p>
                </div>
            </a>

            <a href="<?php echo e($isJewellery ? route('front.products.index', ['category' => 'earrings', 'force_theme' => 'jewellery']) : route('front.products.index', ['category' => 'girls-dresses'])); ?>"
               class="lg:col-span-6 relative min-h-[230px] sm:min-h-[260px] overflow-hidden group <?php echo e($isJewellery ? 'bg-[#44206f]' : 'bg-white'); ?>">
                <img src="<?php echo e($isJewellery ? 'https://images.unsplash.com/photo-1573408301185-9146fe634ad0?auto=format&fit=crop&w=1400&q=80' : 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=1400&q=80'); ?>"
                     alt="<?php echo e($isJewellery ? 'Earrings Edit' : 'Girls Dresses'); ?>"
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-r from-black/65 via-black/35 to-transparent"></div>
                <div class="relative z-10 p-6 sm:p-8 max-w-[66%]">
                    <h3 class="font-heading text-2xl sm:text-3xl lg:text-4xl leading-[1.06]" style="color:<?php echo e($isJewellery ? '#f7d7aa' : '#312725'); ?>">
                        <?php echo e($isJewellery ? 'Earrings Edit' : 'Girls Dresses Edit'); ?>

                    </h3>
                    <p class="mt-2 text-sm sm:text-base lg:text-lg leading-snug" style="color:<?php echo e($isJewellery ? 'rgba(233,213,255,0.85)' : '#3d322f'); ?>">
                        <?php echo e($isJewellery ? 'Jhumkas | Chandbalis | Studs' : 'Everyday comfort with elegant detailing'); ?>

                    </p>
                    <p class="mt-5 text-base sm:text-lg lg:text-xl font-medium" style="color:<?php echo e($isJewellery ? '#f0c58f' : '#231b19'); ?>">Shop Now</p>
                </div>
            </a>

            
            <div class="lg:col-span-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-1 lg:grid-rows-2 h-full">
                <a href="<?php echo e($isJewellery ? route('front.products.collection', ['collection' => 'gifting']) : route('front.products.collection', ['collection' => 'festive-wear'])); ?>"
                   class="relative min-h-[210px] sm:min-h-[230px] lg:min-h-[250px] overflow-hidden group <?php echo e($isJewellery ? 'bg-[#44206f]' : 'bg-white'); ?>">
                    <img src="<?php echo e($isJewellery ? 'https://images.unsplash.com/photo-1513885535751-8b9238bd345a?auto=format&fit=crop&w=900&q=80' : 'https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=900&q=80'); ?>"
                         alt="<?php echo e($isJewellery ? 'Gifting Edit' : 'Festive Edit'); ?>"
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 p-5 sm:p-6">
                        <h3 class="font-heading text-xl sm:text-2xl lg:text-3xl leading-[1.08] text-white"><?php echo e($isJewellery ? 'Gifting Edit' : 'Festive Edit'); ?></h3>
                        <p class="mt-2 text-sm sm:text-base leading-snug" style="color:rgba(255,255,255,0.8)"><?php echo e($isJewellery ? 'Thoughtful gifts for every occasion' : 'Traditional sets for every festive moment'); ?></p>
                        <p class="mt-4 text-base sm:text-lg font-semibold text-white">Shop Now</p>
                    </div>
                </a>

                <a href="<?php echo e($isJewellery ? route('front.products.collection', ['collection' => 'organizers']) : route('front.products.index', ['category' => '2-4-years'])); ?>"
                   class="relative min-h-[210px] sm:min-h-[230px] lg:min-h-[250px] overflow-hidden group <?php echo e($isJewellery ? 'bg-[#44206f]' : 'bg-white'); ?>">
                    <img src="<?php echo e($isJewellery ? 'https://images.unsplash.com/photo-1579022273876-132b63f7f5cb?auto=format&fit=crop&w=900&q=80' : 'https://images.unsplash.com/photo-1515488042361-ee00e0ddd4e4?auto=format&fit=crop&w=900&q=80'); ?>"
                         alt="<?php echo e($isJewellery ? 'Organizers Edit' : 'Toddler Edit'); ?>"
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 p-5 sm:p-6">
                        <h3 class="font-heading text-xl sm:text-2xl lg:text-3xl leading-[1.08] text-white"><?php echo e($isJewellery ? 'Organizers Edit' : 'Toddler Edit'); ?></h3>
                        <p class="mt-2 text-sm sm:text-base leading-snug" style="color:rgba(255,255,255,0.8)"><?php echo e($isJewellery ? 'Keep Your Precious Jewels Organized' : 'Special picks for 2–4 years'); ?></p>
                        <p class="mt-4 text-base sm:text-lg font-semibold text-white">Shop Now</p>
                    </div>
                </a>
            </div>

            <a href="<?php echo e($isJewellery ? route('front.products.index', ['category' => 'hair-accessories', 'force_theme' => 'jewellery']) : route('front.products.index', ['category' => 'infant-sets'])); ?>"
               class="lg:col-span-6 relative min-h-[230px] sm:min-h-[260px] lg:min-h-[520px] overflow-hidden group <?php echo e($isJewellery ? 'bg-[#44206f]' : 'bg-white'); ?>">
                <img src="<?php echo e($isJewellery ? 'https://images.unsplash.com/photo-1563170351-be82bc888aa4?auto=format&fit=crop&w=1400&q=80' : 'https://images.unsplash.com/photo-1472162072942-cd5147eb3902?auto=format&fit=crop&w=1400&q=80'); ?>"
                     alt="<?php echo e($isJewellery ? 'Hair Accessories Edit' : 'Infant Sets Edit'); ?>"
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/20 to-transparent"></div>
                <div class="relative z-10 p-6 sm:p-8 max-w-[66%]">
                    <h3 class="font-heading text-2xl sm:text-3xl lg:text-4xl leading-[1.06]" style="color:<?php echo e($isJewellery ? '#f7d7aa' : '#312725'); ?>">
                        <?php echo e($isJewellery ? 'Hair Accessories Edit' : 'Infant Sets Edit'); ?>

                    </h3>
                    <p class="mt-2 text-sm sm:text-base lg:text-lg leading-snug" style="color:<?php echo e($isJewellery ? 'rgba(233,213,255,0.85)' : '#3d322f'); ?>">
                        <?php echo e($isJewellery ? 'Elegant pieces to adorn your locks' : 'Soft, playful and occasion-ready baby styles'); ?>

                    </p>
                    <p class="mt-5 text-base sm:text-lg lg:text-xl font-medium" style="color:<?php echo e($isJewellery ? '#f0c58f' : '#231b19'); ?>">Shop Now</p>
                </div>
            </a>

        </div>
    </div>
</section>
<?php /**PATH D:\My projects\CP\avnee\avnee_files\resources\views/partials/front/explore-grid.blade.php ENDPATH**/ ?>