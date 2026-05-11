<?php $__env->startSection('content'); ?>
<?php 
    $isDark = $theme === 'jewellery'; 
    $textColor = $isDark ? 'text-[#fdf2f8]' : 'text-gray-900';
    $mutedColor = $isDark ? 'text-[#a8998a]' : 'text-gray-500';
    $borderColor = $isDark ? 'border-[#4f006a]' : 'border-gray-200';
    $bgColor = $isDark ? 'bg-[#2B003A]' : 'bg-white';
    $accentColor = $isDark ? 'text-[#f3d9ff]' : 'text-[#b87333]';
    $accentBg = $isDark ? 'bg-[#d4af37]' : 'bg-[#b87333]';
    $accentHoverBg = $isDark ? 'hover:bg-[#6d28d9]' : 'hover:bg-[#9a5a1f]';
    $cardBg = $isDark ? 'bg-[#350047]' : 'bg-gray-50';
    
    $subtotal = 0;
?>

<div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-16 <?php echo e($textColor); ?> font-body">
    <h1 class="font-heading text-3xl sm:text-4xl font-normal tracking-wide text-center mb-10">Your Cart</h1>
    
    <?php if(session('success')): ?>
    <div class="mb-8 p-4 bg-green-100/10 border border-green-500/30 text-green-600 dark:text-green-400 rounded-sm text-sm text-center">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <?php if($cart->items->count() == 0): ?>
    <div class="text-center py-16">
        <svg class="w-16 h-16 mx-auto <?php echo e($mutedColor); ?> mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
        <p class="text-xl mb-6">Your cart is currently empty.</p>
        <a href="<?php echo e(route($isDark ? 'front.jewellery' : 'front.home')); ?>" class="inline-block px-8 py-3 <?php echo e($accentBg); ?> <?php echo e($accentHoverBg); ?> text-white text-sm font-bold tracking-[0.2em] uppercase rounded-sm transition-colors">Continue Shopping</a>
    </div>
    <?php else: ?>
    <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
        <!-- Cart Items List -->
        <div class="w-full lg:w-2/3">
            <div class="hidden sm:grid grid-cols-12 gap-4 pb-4 border-b <?php echo e($borderColor); ?> text-sm font-semibold tracking-wider uppercase <?php echo e($mutedColor); ?>">
                <div class="col-span-6">Product</div>
                <div class="col-span-3 text-center">Quantity</div>
                <div class="col-span-3 text-right">Total</div>
            </div>
            
            <div class="mt-4 space-y-6">
                <?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $itemPrice = $item->product->price;
                    $itemTotal = $itemPrice * $item->quantity;
                    $subtotal += $itemTotal;
                ?>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 py-4 border-b <?php echo e($borderColor); ?> group p-2 hover:<?php echo e($cardBg); ?> transition-colors">
                    <!-- Image & Name -->
                    <div class="flex items-center gap-4 sm:w-1/2">
                        <a href="<?php echo e(route('front.product.detail', $item->product?->slug ?: $item->product?->id)); ?>" class="flex-shrink-0 w-20 sm:w-24 aspect-[3/4] overflow-hidden <?php echo e($borderColor); ?> border rounded-sm">
                            <img src="<?php echo e(asset('storage/' . $item->product->image)); ?>" alt="<?php echo e($item->product->name); ?>" class="w-full h-full object-cover object-top" />
                        </a>
                        <div class="flex-1">
                            <a href="<?php echo e(route('front.product.detail', $item->product?->slug ?: $item->product?->id)); ?>" class="text-sm sm:text-base font-semibold hover:<?php echo e($accentColor); ?> transition-colors block mb-1">
                                <?php echo e($item->product->name); ?>

                            </a>
                            <div class="text-sm <?php echo e($mutedColor); ?> space-y-1">
                                <p>₹<?php echo e(number_format($itemPrice, 2)); ?></p>
                                <?php if($item->variant): ?>
                                <p>Size: <?php echo e($item->variant->size); ?></p>
                                <?php endif; ?>
                                <!-- Mobile Only remove -->
                                <form action="<?php echo e(route('front.cart.remove', $item->id)); ?>" method="POST" class="sm:hidden mt-2">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-xs tracking-wider uppercase text-red-500 hover:text-red-400">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quantity & Actions -->
                    <div class="flex items-center justify-between sm:w-1/2 mt-4 sm:mt-0">
                        <div class="flex items-center border <?php echo e($borderColor); ?> rounded-sm sm:mx-auto">
                            <form action="<?php echo e(route('front.cart.update', $item->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                <input type="hidden" name="quantity" value="<?php echo e($item->quantity - 1); ?>" />
                                <button type="submit" class="px-3 py-1 text-lg hover:<?php echo e($accentColor); ?> transition-colors" <?php echo e($item->quantity <= 1 ? 'disabled' : ''); ?>>−</button>
                            </form>
                            <span class="px-2 text-sm font-semibold w-8 text-center"><?php echo e($item->quantity); ?></span>
                            <form action="<?php echo e(route('front.cart.update', $item->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                <input type="hidden" name="quantity" value="<?php echo e($item->quantity + 1); ?>" />
                                <button type="submit" class="px-3 py-1 text-lg hover:<?php echo e($accentColor); ?> transition-colors">+</button>
                            </form>
                        </div>
                        
                        <div class="text-right flex items-center gap-4">
                            <span class="font-semibold sm:text-lg">₹<?php echo e(number_format($itemTotal, 2)); ?></span>
                            <!-- Desktop Only Remove -->
                            <form action="<?php echo e(route('front.cart.remove', $item->id)); ?>" method="POST" class="hidden sm:block">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-[#a8998a] hover:text-red-500 transition-colors p-2" title="Remove">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div class="mt-8 flex justify-between items-center bg-gray-50/5 dark:bg-[#350047]/30 p-4 rounded-sm border <?php echo e($borderColor); ?>">
                <div class="flex items-center gap-2 <?php echo e($mutedColor); ?>">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    <span class="text-sm">Secure checkout</span>
                </div>
                <a href="<?php echo e(route($isDark ? 'front.jewellery' : 'front.home')); ?>" class="text-sm tracking-wider uppercase font-semibold <?php echo e($accentColor); ?> border-b border-current hover:opacity-80 transition-opacity">Continue Shopping</a>
            </div>
        </div>
        
        <!-- Order Summary Sidebar -->
        <div class="w-full lg:w-1/3">
            <div class="sticky top-24 <?php echo e($cardBg); ?> border <?php echo e($borderColor); ?> p-6 sm:p-8 rounded-sm">
                <h2 class="font-heading text-xl font-medium tracking-wide border-b <?php echo e($borderColor); ?> pb-4 mb-6">Order Summary</h2>
                
                <div class="space-y-4 text-sm mb-6 border-b <?php echo e($borderColor); ?> pb-6">
                    <div class="flex justify-between">
                        <span class="<?php echo e($mutedColor); ?>">Subtotal</span>
                        <span class="font-semibold">₹<?php echo e(number_format($subtotal, 2)); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="<?php echo e($mutedColor); ?>">Shipping</span>
                        <span class="font-semibold"><?php echo e($subtotal > 1499 ? 'Free' : 'Calculated at next step'); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="<?php echo e($mutedColor); ?>">Tax</span>
                        <span class="font-semibold">Included</span>
                    </div>
                </div>
                
                <div class="flex justify-between items-end mb-8">
                    <span class="text-base font-semibold tracking-wider uppercase">Total</span>
                    <span class="text-2xl font-semibold <?php echo e($accentColor); ?>">₹<?php echo e(number_format($subtotal, 2)); ?></span>
                </div>
                
                <a href="<?php echo e(route('front.checkout.index')); ?>" class="block w-full <?php echo e($accentBg); ?> <?php echo e($accentHoverBg); ?> text-white text-center py-4 text-sm font-bold tracking-[0.2em] uppercase rounded-sm transition-colors shadow-md">
                    Proceed to Checkout
                </a>
                
                <p class="text-xs <?php echo e($mutedColor); ?> text-center mt-4">Safe & secure payments. 100% authentic products.</p>
                <div class="flex justify-center gap-3 mt-4 opacity-80 items-center flex-wrap">
                    
                    <div class="bg-white rounded px-1.5 py-0.5 flex items-center justify-center" style="width:42px;height:26px;" title="Visa">
                        <svg viewBox="0 0 42 14" fill="none" xmlns="http://www.w3.org/2000/svg" width="38" height="12">
                            <text x="0" y="12" font-family="Arial,sans-serif" font-size="13" font-weight="800" fill="#1A1F71" letter-spacing="0.5">VISA</text>
                        </svg>
                    </div>
                    
                    <div class="bg-white rounded flex items-center justify-center" style="width:42px;height:26px;padding:3px;" title="Mastercard">
                        <svg viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" width="38" height="24">
                            <circle cx="14" cy="12" r="10" fill="#EB001B"/>
                            <circle cx="24" cy="12" r="10" fill="#F79E1B"/>
                            <path d="M19 5.3a10 10 0 0 1 0 13.4A10 10 0 0 1 19 5.3z" fill="#FF5F00"/>
                        </svg>
                    </div>
                    
                    <div class="bg-white rounded flex items-center justify-center" style="width:42px;height:26px;padding:3px;" title="UPI">
                        <svg viewBox="0 0 48 24" xmlns="http://www.w3.org/2000/svg" width="42" height="21">
                            <text x="2" y="18" font-family="Arial,sans-serif" font-size="13" font-weight="700" fill="#5F259F">UPI</text>
                        </svg>
                    </div>
                    
                    <div class="bg-white rounded flex items-center justify-center" style="width:48px;height:26px;padding:3px;" title="RuPay">
                        <svg viewBox="0 0 56 20" xmlns="http://www.w3.org/2000/svg" width="48" height="18">
                            <text x="0" y="15" font-family="Arial,sans-serif" font-size="12" font-weight="700" fill="#0070BA">Ru</text>
                            <text x="18" y="15" font-family="Arial,sans-serif" font-size="12" font-weight="700" fill="#E31837">Pay</text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.' . $theme, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\My projects\CP\avnee\avnee_files\resources\views/front/cart/index.blade.php ENDPATH**/ ?>