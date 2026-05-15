<?php if(isset($reviews) && $reviews->count() > 0): ?>
<?php
    $isJewellery = request()->is('jewellery*') || (isset($theme) && $theme === 'jewellery');
    $bgColor = $isJewellery ? 'bg-[#2B003A]' : 'bg-[#F8C8DC]';
    $accentColor = $isJewellery ? 'text-[#d4af37]' : 'text-mulberry';
    $headingColor = $isJewellery ? 'text-[#f3d9ff]' : 'text-gray-900';
    $subtitleColor = $isJewellery ? 'text-[#e9d5ff]/70' : 'text-mulberry/70';
    $captionColor = $isJewellery ? 'text-[#e9d5ff]/50' : 'text-gray-500';
    $cardBg = $isJewellery ? 'bg-[#350047]/20 border-white/5' : 'bg-white border-mulberry/5';
    $primaryNavColor = $isJewellery ? '#d4af37' : '#770737';
    $displayReviews = $reviews->take(9);

    $staticStories = [
        [
            'name' => 'Aishwarya Rao',
            'image' => asset('storage/customer-stories/aishwarya-rao.png'),
            'quote' => 'Got this outfit from Avnee Collections for our family celebration and honestly it looked even prettier in real life ❤️ The fabric was so soft and comfortable, she wore it for hours without any fuss. Everyone at home kept asking where we bought it from! The fit, colors and finishing were just perfect. Thank you for making her feel so special 🥰',
        ],
        [
            'name' => 'Divya Menon',
            'image' => asset('storage/customer-stories/divya-menon.png'),
            'quote' => 'Absolutely loved this frock from Avnee Collections 💕 The quality, stitching and finishing were beyond expectations. My daughter felt like a little princess and didn’t want to take it off even after the party 😄 The dress looked so elegant in pictures and was super comfortable at the same time. Thank you for making special moments even more beautiful ✨',
        ],
        [
            'name' => 'Kavya Nair',
            'image' => asset('storage/customer-stories/kavya-nair.png'),
            'quote' => 'Ordered this traditional outfit from Avnee Collections for a family function and we are genuinely so happy with the purchase 💛 The dress looked absolutely beautiful and the quality was amazing. My daughter usually gets uncomfortable in festive wear, but this one was so soft and easy for her to wear all evening. We received so many compliments from family members 😍 Will definitely shop again!',
        ],
        [
            'name' => 'Latha Iyer',
            'image' => asset('storage/customer-stories/latha-iyer.png'),
            'quote' => 'One of the prettiest dresses we’ve purchased for our daughter 💜 The colors were so elegant and unique, and the dress looked exactly like the pictures. What impressed me most was the comfort - light, soft and perfect for kids to wear during long functions. My little one felt so confident and happy wearing it 🥹✨ Thank you Avnee Collections for such beautiful designs and quality!',
        ],
        [
            'name' => 'Meena Sharma',
            'image' => asset('storage/customer-stories/meena-sharma.png'),
            'quote' => 'Couldn’t resist buying this tiny pattu pavadai from Avnee Collections for our little princess ❤️ The outfit was so soft, lightweight and baby-friendly while still looking super traditional and festive. She was comfortable the entire time and we got endless compliments from everyone at home 😍 The quality and detailing are honestly beautiful. Definitely one of our favorite purchases for her so far!',
        ],
        [
            'name' => 'Pooja Verma',
            'image' => asset('storage/customer-stories/pooja-verma.png'),
            'quote' => 'My daughter absolutely loved this dress from Avnee Collections 💜 It has such a classy and trendy look while still being age-appropriate and comfortable. The material felt premium, the fit was perfect and the color looked even more beautiful in natural light. She kept getting compliments everywhere we went 😊 Definitely coming back for more western collections!',
        ],
        [
            'name' => 'Priya Patel',
            'image' => asset('storage/customer-stories/priya-patel.png'),
            'quote' => 'Bought this lovely dress from Avnee Collections for my granddaughter and it was such a beautiful choice 🌸 The fabric felt very soft on her skin and the design was simple, elegant and perfect for everyday special moments. Seeing her so happy and comfortable in it made my heart full ❤️ Truly loved the quality and attention to detail. Thank you Avnee Collections!',
        ],
        [
            'name' => 'Riya Mehta',
            'image' => asset('storage/customer-stories/riya-mehta.png'),
            'quote' => 'This outfit from Avnee Collections made my daughter feel so confident and special ✨ She wore it for a festive get-together with her friends and everyone kept complimenting her look 💜 The dress had such rich colors and beautiful detailing while still being very comfortable for kids. Loved how elegant and unique it looked in photos too 😍 Definitely one of our favorite festive purchases!',
        ],
        [
            'name' => 'Sneha Reddy',
            'image' => asset('storage/customer-stories/sneha-reddy.png'),
            'quote' => 'Absolutely loved this dress from Avnee Collections ❤️ It has such a simple, elegant and comfortable look - perfect for casual outings, birthdays or even family dinners. The fabric was super breathable and the fit was just perfect for my daughter. She felt so confident and comfortable wearing it all day 😊 Definitely recommending Avnee Collections to other moms!',
        ],
    ];
    $storyCount = count($staticStories);
?>

<section id="customer-stories" class="py-16 sm:py-24 <?php echo e($bgColor); ?> relative overflow-hidden transition-colors duration-700">
    <!-- Decorative Sparkles -->
    <div class="absolute top-20 left-[10%] <?php echo e($accentColor); ?> opacity-10 animate-pulse">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0l2.5 9.5 9.5 2.5-9.5 2.5-2.5 9.5-2.5-9.5-9.5-2.5 9.5-2.5z"/></svg>
    </div>
    <div class="absolute top-40 right-[8%] <?php echo e($accentColor); ?> opacity-10 animate-bounce delay-700">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0l2.5 9.5 9.5 2.5-9.5 2.5-2.5 9.5-2.5-9.5-9.5-2.5 9.5-2.5z"/></svg>
    </div>
    <div class="absolute bottom-20 left-[5%] <?php echo e($accentColor); ?> opacity-5">
        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0l2.5 9.5 9.5 2.5-9.5 2.5-2.5 9.5-2.5-9.5-9.5-2.5 9.5-2.5z"/></svg>
    </div>

    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12 sm:mb-20">
            <?php if($isJewellery): ?>
            <h3 class="<?php echo e($accentColor); ?> font-logo text-2xl sm:text-3xl uppercase tracking-[0.4em] mb-4" >Customer Stories</h3>
            <h2 class="font-heading text-3xl sm:text-[2.6rem] font-normal <?php echo e($headingColor); ?> mb-12 tracking-[0.2em] uppercase decoration-[#f3d9ff]/30 underline underline-offset-[12px]">
                Cherished Moments...
            </h2>
            <?php else: ?>
            <h2 class="studio-section-heading mb-6 sm:mb-10" style = "color: #C75B6E;">Customer Stories</h2>
            <p class="font-heading text-2xl sm:text-4xl text-mulberry/90 font-normal tracking-[0.12em] mb-10 max-w-2xl mx-auto leading-snug">Loved by Little Princesses...</p>
            <?php endif; ?>
            <div class="max-w-2xl mx-auto space-y-4">
                <p class="<?php echo e($subtitleColor); ?> text-base sm:text-lg leading-relaxed uppercase tracking-wider font-bold">
                    <?php echo e($isJewellery ? 'Explore why customers choose AVNEE for timeless elegance.' : 'Explore why parents love Avnee Collection for their little ones.'); ?>

                </p>
                <p class="<?php echo e($captionColor); ?> text-sm sm:text-base leading-relaxed tracking-wide font-medium">
                    <?php echo e($isJewellery ? 'Authentic stories from our valued customers who found their perfect sparkle.' : 'Heartwarming stories from real customers who chose our curated selection for girls aged 0-12 years.'); ?>

                </p>
            </div>
        </div>

        <div class="relative group px-2 sm:px-12">
            <!-- Custom Navigation Arrows -->
            <button id="stories-prev" class="absolute -left-2 sm:left-0 top-1/2 -translate-y-1/2 z-20 w-12 h-12 flex items-center justify-center <?php echo e($accentColor); ?> hover:scale-125 transition-transform">
                <svg class="w-11 h-11" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 19l-7-7 7-7" /></svg>
            </button>
            <button id="stories-next" class="absolute -right-2 sm:right-0 top-1/2 -translate-y-1/2 z-20 w-12 h-12 flex items-center justify-center <?php echo e($accentColor); ?> hover:scale-125 transition-transform">
                <svg class="w-11 h-11" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5l7 7-7 7" /></svg>
            </button>

            <!-- Swiper Container -->
            <div class="swiper stories-swiper overflow-hidden pb-10">
                <div class="swiper-wrapper items-stretch">
                    
<?php $__currentLoopData = $staticStories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="swiper-slide h-auto self-stretch">
            <div class="<?php echo e($cardBg); ?> rounded-sm overflow-hidden flex flex-col h-[760px] shadow-[0_20px_50px_rgba(0,0,0,0.05)] border group/card hover:shadow-2xl transition-all duration-700 backdrop-blur-sm">
                <!-- Customer Image -->
                <div class="relative aspect-[4/3] overflow-hidden <?php echo e($isJewellery ? 'bg-[#1a0023]' : 'bg-[#fef5f7]'); ?>">
                    <img src="<?php echo e($story['image']); ?>" alt="<?php echo e($story['name']); ?>" class="w-full h-full object-cover transition-transform duration-[2s] group-hover/card:scale-110" />
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/20 opacity-0 group-hover/card:opacity-100 transition-opacity"></div>
                </div>

                <!-- Story Content -->
                <div class="p-8 sm:p-10 flex flex-col items-center text-center flex-1">
                    <p class="<?php echo e($isJewellery ? 'text-[#e9d5ff]/90' : 'text-gray-700'); ?> text-sm sm:text-base leading-relaxed italic mb-8 font-medium tracking-tight px-2 min-h-[260px]">
    <?php echo e($story['quote']); ?>

</p>

                    <div class="space-y-1.5 mt-auto mb-8">`
                        <h4 class="<?php echo e($accentColor); ?> font-bold text-xl tracking-tight uppercase leading-tight"><?php echo e($story['name']); ?></h4>
                        <p class="text-xs <?php echo e($isJewellery ? 'text-[#e9d5ff]/40' : 'text-gray-400'); ?> font-bold uppercase tracking-[0.2em]">Happy Customer</p>
                    </div>

                    <a href="<?php echo e(route('front.products.index')); ?>" class="inline-block text-xs font-black uppercase tracking-[0.3em] text-white bg-[#C75B6E] hover:bg-[#770737] px-6 py-2.5 rounded-sm transition-all shadow-md hover:shadow-lg">
                        View Products
                    </a>
                </div>
            </div>
        </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Mobile Navigation Sync -->
            <div class="flex justify-center gap-16 mt-12 sm:hidden relative z-20">
                <button id="m-stories-prev" class="<?php echo e($accentColor); ?> p-2"><svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" /></svg></button>
                <button id="m-stories-next" class="<?php echo e($accentColor); ?> p-2"><svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" /></svg></button>
            </div>
        </div>
    </div>
</section>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Swiper !== 'undefined') {
            const reviewCount = <?php echo e($storyCount); ?>;
            new Swiper('.stories-swiper', {
                slidesPerView: 1,
                spaceBetween: 16,
                centeredSlides: false,
                loop: reviewCount > 3,
                watchOverflow: true,
                autoplay: { delay: 6000, disableOnInteraction: false },
                navigation: {
                    nextEl: '#stories-next, #m-stories-next',
                    prevEl: '#stories-prev, #m-stories-prev',
                },
                breakpoints: {
                    640: { slidesPerView: 2, slidesPerGroup: 2, spaceBetween: 18 },
                    768: { slidesPerView: 2, slidesPerGroup: 2, spaceBetween: 20 },
                    1024: { slidesPerView: 3, slidesPerGroup: 3, spaceBetween: 24 }
                }
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH D:\My projects\CP\avnee\avnee_files\resources\views/partials/front/reviews.blade.php ENDPATH**/ ?>