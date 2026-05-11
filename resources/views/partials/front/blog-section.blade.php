@php
    $isJewellery = ($theme ?? session('theme', 'studio')) === 'jewellery';
    $iconTone = 'text-[#f0c58f]'; // Golden color for icons
    $iconTextTone = 'text-[#f7d7aa]'; // Light golden for text
    $fallbackCards = $isJewellery
        ? [
            [
                'title' => 'How to Style Traditional Jewellery with Modern Outfits',
                'meta' => 'BY MANSI GUPTA ON APRIL 25, 2024',
                'description' => 'Discover how to effortlessly pair traditional jewellery with modern outfits for a chic and elegant fusion look. Explore styling tips to make a statement with your ethnic jewelry pieces.',
                'image' => 'https://images.unsplash.com/photo-1617038220319-276d3cfab638?auto=format&fit=crop&w=1200&q=80',
                'slug' => 'style-traditional-jewellery-modern-outfits',
            ],
            [
                'title' => '5 Must-Have Statement Earrings for Every Occasion',
                'meta' => 'BY MANSI GUPTA ON APRIL 20, 2024',
                'description' => 'Elevate your accessory game with our top picks of statement earrings perfect for weddings, parties, and festive celebrations. Find out which eye-catching designs you need in your jewelry collection.',
                'image' => 'https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?auto=format&fit=crop&w=1200&q=80',
                'slug' => '5-must-have-statement-earrings',
            ],
        ]
        : [
            [
                'title' => '5 Party Dress Trends for Kids This Season',
                'meta' => 'BY AVNEE STUDIO ON APRIL 25, 2024',
                'description' => 'From pastel tulles to glitter details, discover the top party dress trends that keep kids comfortable and photo-ready for birthdays and special celebrations.',
                'image' => 'https://images.unsplash.com/photo-1519340241574-2cec6aef0c01?auto=format&fit=crop&w=1200&q=80',
                'slug' => '5-party-dress-trends-kids',
            ],
            [
                'title' => 'How to Choose Festive Outfits by Age Group',
                'meta' => 'BY AVNEE STUDIO ON APRIL 20, 2024',
                'description' => 'A practical guide to selecting festive outfits by age, with fit tips, fabric ideas, and styling advice for infants, toddlers, and growing kids.',
                'image' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=1200&q=80',
                'slug' => 'festive-outfits-by-age-group',
            ],
        ];
    $cards = collect($blogPosts ?? [])
        ->filter()
        ->take(2)
        ->map(function ($post) {
            $image = $post->image ? Storage::url($post->image) : null;
            return [
                'title' => $post->title,
                'meta' => 'BY AVNEE JOURNAL ON ' . $post->created_at->format('M d, Y'),
                'description' => \Illuminate\Support\Str::limit(strip_tags((string) $post->content), 180),
                'image' => $image,
                'slug' => $post->slug,
            ];
        })
        ->whenEmpty(function () use ($fallbackCards) {
            return collect($fallbackCards);
        });
@endphp

<section class="mt-10 mb-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-[1320px] mx-auto bg-[#522B6B] border border-[#522B6B]/50 px-4 sm:px-6 lg:px-10 py-8 sm:py-10 lg:py-12">
        <h2 class="text-center font-heading text-3xl sm:text-4xl lg:text-5xl {{ $isJewellery ? 'text-[#c7a4cc]' : 'text-[#2b2320]' }} leading-tight mb-8 sm:mb-10">Read Our Blog</h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
            @foreach($cards as $card)
            <article class="bg-transparent">
                <div class="aspect-[16/10] overflow-hidden {{ $isJewellery ? 'bg-[#44206f]' : 'bg-white' }} rounded-sm">
                    <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105" />
                </div>
                <div class="pt-4 sm:pt-5">
                    <h3 class="font-heading text-xl sm:text-2xl lg:text-[38px] leading-[1.12] text-[#2e2624]">{{ $card['title'] }}</h3>
                    <p class="mt-3 text-[10px] sm:text-[11px] tracking-[0.14em] text-[#6e6663] uppercase">{{ $card['meta'] }}</p>
                    <p class="mt-4 text-sm sm:text-base lg:text-[20px] leading-[1.65] text-[#4f4643]">{{ $card['description'] }}</p>
                    <a href="{{ route('front.blog.show', $card['slug']) }}" class="mt-5 inline-flex items-center gap-2 border border-[#8e8582] rounded-[4px] px-4 py-2 text-sm sm:text-base leading-none text-[#2f2725] {{ $isJewellery ? 'bg-[#4b2a76] hover:bg-[#5a348a] text-[#d3b4d8] border-[#a47dab]/50' : 'bg-white hover:bg-[#f7f7f7]' }} transition-colors">
                        Read More
                        <span aria-hidden="true">&#8250;</span>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <div class="mt-10 pt-2 grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
            <div class="flex flex-col items-center gap-2">
                <!-- Hand Icon for Free Shipping -->
                <svg class="w-10 h-10 text-[#C7B9D9]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5v9a2.5 2.5 0 005 0v-9a2.5 2.5 0 00-5 0z"/>
                </svg>
                <p class="text-[11px] sm:text-xs lg:text-sm tracking-[0.12em] uppercase text-[#C7B9D9]">Free Shipping On Orders Above Rs.1499/-</p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <!-- Circular Arrow Icon for Returns -->
                <svg class="w-10 h-10 text-[#C7B9D9]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9.003 9.003 0 01-5.297-14.973m5.297 14.973L12 12m-5.297 6.027L12 12m0 0l-5.297-6.027"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 12v.01"/>
                </svg>
                <p class="text-[11px] sm:text-xs lg:text-sm tracking-[0.12em] uppercase text-[#C7B9D9]">24 - 48 Hours Free Returns</p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <!-- Cash/Money Icon for Cash on Delivery -->
                <svg class="w-10 h-10 text-[#C7B9D9]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <p class="text-[11px] sm:text-xs lg:text-sm tracking-[0.12em] uppercase text-[#C7B9D9]">Free Cash On Delivery</p>
            </div>
        </div>
    </div>
</section>
