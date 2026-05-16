@extends('layouts.front.jewellery')

@section('content')
@php
    $textColor   = 'text-[#fdf2f8]';
    $mutedColor  = 'text-[#e9d5ff]';
    $borderColor = 'border-[#4f006a]';
    $bgColor     = 'bg-[#230030]';
    $cardBg      = 'bg-[#350047]';
    $accentGold  = '#d4af37';

    // Build image set – use hair-accessories local images as demo gallery
    $galleryImages = $product['images'] ?? [
        asset('images/hair-accessories/ha-src-1.jpeg'),
        asset('images/hair-accessories/ha-src-2.jpeg'),
        asset('images/hair-accessories/ha-src-3.jpeg'),
    ];
    $mainImage = $galleryImages[0] ?? asset('images/hero-slider/3.png');

    $price        = $product['price']       ?? 699;
    $comparePrice = $product['compare_price'] ?? round($price * 1.3);
    $title        = $product['title']       ?? 'AVNEE Organizer';
    $description  = $product['description'] ?? 'Premium AVNEE organizer collection product. Beautifully crafted for smart storage and neat daily display.';
    $styleNo      = $product['style_no']    ?? ('AVN-ORG-' . strtoupper(substr(md5($title), 0, 6)));
    $discount     = $comparePrice > $price  ? round((($comparePrice - $price) / $comparePrice) * 100) : 0;

    // Similar products using local organizer images
    $similarProducts = collect(range(1, 4))->map(fn($i) => [
        'title'  => 'AVNEE Organizer Style ' . $i,
        'price'  => 699 + ($i * 120),
        'image'  => asset('images/hair-accessories/ha-src-' . $i . '.jpeg'),
        'slug'   => 'avnee-organizer-style-' . $i,
        'discount' => 20,
    ]);
@endphp

{{-- Breadcrumb --}}
<div class="bg-[#1a0025] border-b border-[#4f006a]">
    <div class="max-w-7xl mx-auto px-4 py-3">
        <nav class="flex items-center gap-2 text-xs text-[#e9d5ff] font-semibold uppercase tracking-widest">
            <a href="{{ route('front.home') }}" class="hover:text-[#d4af37] transition-colors">Home</a>
            <span class="opacity-40">/</span>
            <a href="{{ route('front.products.index', ['collection' => 'organizers']) }}" class="hover:text-[#d4af37] transition-colors">Organizers</a>
            <span class="opacity-40">/</span>
            <span class="text-[#d4af37] truncate max-w-[180px]">{{ $title }}</span>
        </nav>
    </div>
</div>

{{-- Announcement bar --}}
<div class="bg-[#2e0040] border-b border-[#4f006a] px-4 py-2 flex items-center justify-between text-xs text-[#f3d9ff]">
    <span class="font-bold tracking-widest uppercase text-[#d4af37]">Limited Festive Edit</span>
    <span class="hidden sm:block opacity-80">Exclusive handcrafted styles with premium finishing and fast shipping support.</span>
</div>

{{-- Main Product Section --}}
<div class="bg-[#230030] min-h-screen">
    <div class="max-w-7xl mx-auto px-4 py-8 lg:py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-start">

            {{-- LEFT: Image Gallery --}}
            <div class="flex flex-row gap-3 lg:gap-4" id="product-gallery">

                {{-- Vertical Thumbnails --}}
                <div class="flex flex-col gap-2 flex-shrink-0 w-[64px] lg:w-[80px]" id="thumb-rail">
                    @foreach($galleryImages as $idx => $img)
                        <button
                            type="button"
                            class="thumb-btn block border-2 rounded-md overflow-hidden aspect-[3/4] transition-all duration-200 {{ $idx === 0 ? 'border-[#d4af37]' : 'border-[#4f006a] hover:border-[#d4af37]' }}"
                            data-index="{{ $idx }}"
                            data-src="{{ $img }}"
                            onclick="selectImage({{ $idx }}, '{{ $img }}')"
                        >
                            <img src="{{ $img }}" alt="View {{ $idx + 1 }}" class="w-full h-full object-cover" onerror="this.onerror=null;this.src='{{ asset('images/hero-slider/3.png') }}';" />
                        </button>
                    @endforeach
                </div>

                {{-- Main Image --}}
                <div class="relative flex-1 aspect-[3/4] overflow-hidden rounded-xl border border-[#4f006a] bg-[#350047] group">
                    @if($discount > 0)
                        <div class="absolute top-3 left-3 z-10 bg-[#d4af37] text-[#1a0025] text-[11px] font-black px-3 py-1 rounded-sm tracking-widest uppercase">
                            {{ $discount }}% OFF
                        </div>
                    @endif
                    <img
                        id="main-product-image"
                        src="{{ $mainImage }}"
                        alt="{{ $title }}"
                        class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105"
                        onerror="this.onerror=null;this.src='{{ asset('images/hero-slider/3.png') }}';"
                    />

                    {{-- Prev / Next arrows --}}
                    <button type="button" onclick="prevImage()" class="absolute left-3 top-1/2 -translate-y-1/2 z-20 w-9 h-9 rounded-full bg-black/50 border border-white/20 flex items-center justify-center text-white hover:bg-black/80 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button type="button" onclick="nextImage()" class="absolute right-3 top-1/2 -translate-y-1/2 z-20 w-9 h-9 rounded-full bg-black/50 border border-white/20 flex items-center justify-center text-white hover:bg-black/80 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>

                    {{-- Counter --}}
                    <div class="absolute bottom-3 right-3 bg-black/60 text-white text-xs px-2.5 py-1 rounded-full font-bold tracking-wide" id="img-counter">
                        1 / {{ count($galleryImages) }}
                    </div>
                </div>
            </div>

            {{-- RIGHT: Product Info --}}
            <div class="flex flex-col gap-5">

                {{-- Brand + Actions --}}
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-[0.3em] text-[#d4af37] mb-1">AVNEE ORGANIZERS ARCHIVE</p>
                        <h1 class="text-xl lg:text-3xl font-black uppercase tracking-wide text-[#fdf2f8] leading-tight">{{ $title }}</h1>
                    </div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <button type="button" class="w-9 h-9 flex items-center justify-center rounded-full border border-[#4f006a] text-[#e9d5ff] hover:border-[#d4af37] hover:text-[#d4af37] transition" title="Wishlist">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                        <button type="button" class="w-9 h-9 flex items-center justify-center rounded-full border border-[#4f006a] text-[#e9d5ff] hover:border-[#d4af37] hover:text-[#d4af37] transition" title="Share">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                        </button>
                    </div>
                </div>

                {{-- Style No --}}
                <p class="text-xs font-semibold tracking-widest text-[#e9d5ff] opacity-60 uppercase">Style No: {{ $styleNo }}</p>

                {{-- Price --}}
                <div>
                    @if($comparePrice > $price)
                        <p class="text-sm text-[#e9d5ff] line-through opacity-50 font-medium">₹{{ number_format($comparePrice, 0) }}</p>
                    @endif
                    <p class="text-3xl font-black text-[#fdf2f8] tracking-tight">₹{{ number_format($price, 0) }}</p>
                    <p class="text-xs text-[#e9d5ff] opacity-70 mt-0.5">Inclusive of all taxes</p>
                </div>

                {{-- Size Selector --}}
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <p class="text-xs font-bold uppercase tracking-widest text-[#e9d5ff]">Size:</p>
                        <button type="button" class="text-xs text-[#d4af37] underline underline-offset-2 hover:no-underline transition font-semibold">Size Guide</button>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" class="size-btn px-5 py-2 border-2 border-[#d4af37] bg-[#d4af37]/10 text-[#fdf2f8] text-xs font-bold uppercase tracking-wider rounded-sm hover:bg-[#d4af37]/20 transition active-size">Free Size</button>
                        <button type="button" class="size-btn px-5 py-2 border border-[#4f006a] text-[#e9d5ff] text-xs font-bold uppercase tracking-wider rounded-sm hover:border-[#d4af37] hover:text-[#fdf2f8] transition">S</button>
                        <button type="button" class="size-btn px-5 py-2 border border-[#4f006a] text-[#e9d5ff] text-xs font-bold uppercase tracking-wider rounded-sm hover:border-[#d4af37] hover:text-[#fdf2f8] transition">M</button>
                        <button type="button" class="size-btn px-5 py-2 border border-[#4f006a] text-[#e9d5ff] text-xs font-bold uppercase tracking-wider rounded-sm hover:border-[#d4af37] hover:text-[#fdf2f8] transition">L</button>
                    </div>
                    <p class="text-[11px] text-[#d4af37] mt-2 font-semibold">Select your preferred size before adding to cart.</p>
                </div>

                {{-- Express Delivery Check --}}
                <div class="flex items-center gap-3">
                    <input type="text" placeholder="Express Delivery? Start with your PIN" class="flex-1 h-10 px-4 text-sm bg-[#2B003A] border border-[#4f006a] text-white rounded-sm focus:outline-none focus:border-[#d4af37] placeholder-[#e9d5ff]/40" />
                    <button type="button" class="h-10 px-5 border-2 border-[#d4af37] text-[#d4af37] text-xs font-black uppercase tracking-widest hover:bg-[#d4af37] hover:text-[#1a0025] transition-all rounded-sm">
                        Check Service
                    </button>
                </div>
                <p class="text-[11px] text-[#d4af37] -mt-2 font-semibold">Valid 6-digit PIN required</p>

                {{-- Quantity + Add to Cart --}}
                <div class="flex items-center gap-3">
                    <div class="flex items-center border border-[#4f006a] rounded-sm">
                        <button type="button" onclick="changeQty(-1)" class="w-10 h-11 text-[#e9d5ff] text-lg font-bold hover:bg-[#4f006a] transition flex items-center justify-center">−</button>
                        <span id="qty-display" class="w-10 text-center text-[#fdf2f8] text-sm font-bold">1</span>
                        <button type="button" onclick="changeQty(1)" class="w-10 h-11 text-[#e9d5ff] text-lg font-bold hover:bg-[#4f006a] transition flex items-center justify-center">+</button>
                    </div>
                    <button type="button" class="flex-1 h-11 bg-[#350047] border border-[#d4af37] text-[#d4af37] text-sm font-black uppercase tracking-widest hover:bg-[#d4af37] hover:text-[#1a0025] transition-all rounded-sm">
                        ADD TO CART &bull; ₹{{ number_format($price, 0) }}
                    </button>
                </div>

                {{-- Buy Now --}}
                <button type="button" class="w-full h-11 bg-[#d4af37] text-[#1a0025] text-sm font-black uppercase tracking-widest hover:bg-[#c49c2a] transition-all rounded-sm">
                    BUY IT NOW
                </button>

                {{-- Trust badges --}}
                <div class="grid grid-cols-2 gap-3 pt-1">
                    <div class="flex items-start gap-2">
                        <span class="text-[#d4af37] text-base mt-0.5">✓</span>
                        <p class="text-xs text-[#e9d5ff] leading-snug font-semibold">100% Purchase Protection</p>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="text-[#d4af37] text-base mt-0.5">✓</span>
                        <p class="text-xs text-[#e9d5ff] leading-snug font-semibold">Assured Quality</p>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="text-[#d4af37] text-base mt-0.5">↩</span>
                        <p class="text-xs text-[#e9d5ff] leading-snug font-semibold">This product is returnable</p>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="text-[#d4af37] text-base mt-0.5">✈</span>
                        <p class="text-xs text-[#e9d5ff] leading-snug font-semibold">Free shipping*</p>
                    </div>
                </div>

                {{-- Accordion: Product Details --}}
                <div class="border-t border-[#4f006a] pt-4 space-y-px">

                    {{-- Product Details --}}
                    <details class="group/acc border-b border-[#4f006a]" open>
                        <summary class="flex items-center justify-between py-3.5 cursor-pointer select-none">
                            <span class="text-sm font-black uppercase tracking-widest text-[#d4af37]">Product Details</span>
                            <span class="text-[#d4af37] text-xl leading-none group-open/acc:hidden">+</span>
                            <span class="text-[#d4af37] text-xl leading-none hidden group-open/acc:inline">×</span>
                        </summary>
                        <div class="pb-4 text-sm text-[#e9d5ff] leading-relaxed opacity-90">
                            {{ $description }}
                        </div>
                    </details>

                    {{-- Style & Fit Tips --}}
                    <details class="group/acc border-b border-[#4f006a]">
                        <summary class="flex items-center justify-between py-3.5 cursor-pointer select-none">
                            <span class="text-sm font-black uppercase tracking-widest text-[#d4af37]">Style & Fit Tips</span>
                            <span class="text-[#d4af37] text-xl leading-none group-open/acc:hidden">+</span>
                            <span class="text-[#d4af37] text-xl leading-none hidden group-open/acc:inline">×</span>
                        </summary>
                        <div class="pb-4 text-sm text-[#e9d5ff] leading-relaxed opacity-90">
                            Store your jewellery pieces in separate compartments to prevent tangling. The velvet-lined trays are designed for daily access with an elegant display. Ideal for dressing tables, wardrobes, and travel cases.
                        </div>
                    </details>

                    {{-- Shipping & Returns --}}
                    <details class="group/acc border-b border-[#4f006a]">
                        <summary class="flex items-center justify-between py-3.5 cursor-pointer select-none">
                            <span class="text-sm font-black uppercase tracking-widest text-[#d4af37]">Shipping & Returns</span>
                            <span class="text-[#d4af37] text-xl leading-none group-open/acc:hidden">+</span>
                            <span class="text-[#d4af37] text-xl leading-none hidden group-open/acc:inline">×</span>
                        </summary>
                        <div class="pb-4 text-sm text-[#e9d5ff] leading-relaxed opacity-90">
                            Free shipping on all orders above ₹999. Express delivery available in select pincodes. Easy 7-day returns — no questions asked on defective products.
                        </div>
                    </details>

                    {{-- FAQs --}}
                    <details class="group/acc border-b border-[#4f006a]">
                        <summary class="flex items-center justify-between py-3.5 cursor-pointer select-none">
                            <span class="text-sm font-black uppercase tracking-widest text-[#d4af37]">FAQs</span>
                            <span class="text-[#d4af37] text-xl leading-none group-open/acc:hidden">+</span>
                            <span class="text-[#d4af37] text-xl leading-none hidden group-open/acc:inline">×</span>
                        </summary>
                        <div class="pb-4 text-sm text-[#e9d5ff] leading-relaxed opacity-90 space-y-3">
                            <p><strong class="text-[#fdf2f8]">Q: Can I use this organizer for bracelets?</strong><br>Yes, the compartments are sized to fit most bracelets, bangles, and layered necklaces comfortably.</p>
                            <p><strong class="text-[#fdf2f8]">Q: Is the lining anti-tarnish?</strong><br>The inner lining is soft velvet which minimizes friction — ideal for preserving gold-plated and silver-toned pieces.</p>
                        </div>
                    </details>
                </div>

                {{-- Gallery note + Back link --}}
                <p class="text-[11px] text-[#e9d5ff] opacity-60 italic leading-relaxed mt-2">
                    Main image is shown first, and all remaining photos from this product folder are available in the gallery above.
                </p>
                <a href="{{ route('front.products.index', ['collection' => 'organizers']) }}" class="text-xs font-black uppercase tracking-[0.25em] text-[#d4af37] hover:opacity-70 transition">
                    ← Back to Organizers
                </a>

            </div>
        </div>
    </div>

    {{-- Divider --}}
    <div class="border-t border-[#4f006a] mx-4 lg:mx-16"></div>

    {{-- Similar Products --}}
    <section class="max-w-7xl mx-auto px-4 py-12">
        <h2 class="text-center text-xl font-black uppercase tracking-[0.35em] text-[#fdf2f8] mb-10">Similar Products</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
            @foreach($similarProducts as $sim)
                @php
                    $simSlug = $sim['slug'] ?? \Illuminate\Support\Str::slug($sim['title']);
                    $simUrl  = route('front.demo.product', ['slug' => $simSlug, 'price' => $sim['price']]);
                @endphp
                <div class="group relative flex flex-col">
                    <a href="{{ $simUrl }}" class="relative block overflow-hidden bg-[#350047] aspect-[3/4] border border-[#4f006a] rounded-lg hover:border-[#d4af37]/50 transition-colors">
                        @if(!empty($sim['discount']))
                            <div class="absolute top-2 left-2 z-10 bg-white text-black text-[10px] font-black px-2 py-0.5 tracking-widest uppercase">-{{ $sim['discount'] }}%</div>
                        @endif
                        <img src="{{ $sim['image'] }}" alt="{{ $sim['title'] }}" class="w-full h-full object-cover object-top transition-transform duration-[2.5s] group-hover:scale-110" onerror="this.onerror=null;this.src='{{ asset('images/hero-slider/3.png') }}';" />
                    </a>
                    <div class="pt-3">
                        <a href="{{ $simUrl }}" class="block">
                            <h3 class="text-xs font-semibold text-[#fdf2f8] uppercase tracking-wide line-clamp-2 hover:text-[#d4af37] transition-colors">{{ $sim['title'] }}</h3>
                        </a>
                        <p class="text-sm font-bold text-[#fdf2f8] mt-1">₹{{ number_format($sim['price'], 0) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Divider --}}
    <div class="border-t border-[#4f006a] mx-4 lg:mx-16"></div>

    {{-- Recently Viewed --}}
    <section class="max-w-7xl mx-auto px-4 py-12">
        <h2 class="text-center text-xl font-black uppercase tracking-[0.35em] text-[#fdf2f8] mb-10">Recently Viewed</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-5" id="recently-viewed-grid">
            {{-- Populated by JS from localStorage --}}
            <div class="group relative flex flex-col">
                <a href="#" class="relative block overflow-hidden bg-[#350047] aspect-[3/4] border border-[#4f006a] rounded-lg hover:border-[#d4af37]/50 transition-colors">
                    <img src="{{ $mainImage }}" alt="{{ $title }}" class="w-full h-full object-cover object-top transition-transform duration-[2.5s] group-hover:scale-110" onerror="this.onerror=null;this.src='{{ asset('images/hero-slider/3.png') }}';" />
                </a>
                <div class="pt-3">
                    <h3 class="text-xs font-semibold text-[#fdf2f8] uppercase tracking-wide line-clamp-2">{{ \Illuminate\Support\Str::limit($title, 28) }}</h3>
                    <p class="text-sm font-bold text-[#fdf2f8] mt-1">₹{{ number_format($price, 0) }}</p>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- ===================== STYLES ===================== --}}
<style>
    .size-btn.active-size {
        border-color: #d4af37 !important;
        background-color: rgba(212,175,55,0.12);
    }
    details summary::-webkit-details-marker { display:none; }
    details summary { list-style: none; }

    @media (max-width: 640px) {
        #product-gallery { flex-direction: column-reverse; }
        #thumb-rail { flex-direction: row; width: 100%; }
        #thumb-rail button { width: 60px; height: 80px; }
    }
</style>

{{-- ===================== SCRIPTS ===================== --}}
<script>
(function () {
    const images = @json($galleryImages);
    let current = 0;

    function selectImage(idx, src) {
        current = idx;
        document.getElementById('main-product-image').src = src;
        document.getElementById('img-counter').textContent = (idx + 1) + ' / ' + images.length;
        document.querySelectorAll('.thumb-btn').forEach((btn, i) => {
            btn.classList.toggle('border-[#d4af37]', i === idx);
            btn.classList.toggle('border-[#4f006a]', i !== idx);
        });
    }

    window.selectImage = selectImage;

    window.nextImage = function () {
        const next = (current + 1) % images.length;
        selectImage(next, images[next]);
    };

    window.prevImage = function () {
        const prev = (current - 1 + images.length) % images.length;
        selectImage(prev, images[prev]);
    };

    // Quantity
    let qty = 1;
    window.changeQty = function (delta) {
        qty = Math.max(1, qty + delta);
        document.getElementById('qty-display').textContent = qty;
    };

    // Size buttons
    document.querySelectorAll('.size-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active-size', 'border-[#d4af37]'));
            this.classList.add('active-size', 'border-[#d4af37]');
        });
    });
})();
</script>
@endsection
