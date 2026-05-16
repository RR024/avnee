@php
    $isJewellery = request()->is('jewellery*') || (isset($theme) && $theme === 'jewellery');
    $bgColor = $isJewellery
? 'bg-[#2a0038]'
    : 'bg-[#F8C8DC]';
    $headingColor = $isJewellery ? 'text-[#f3d9ff]' : 'text-mulberry';
    $subtitleColor = $isJewellery ? 'text-[#e9d5ff]/50' : 'text-gray-500';
    $textColor = $isJewellery ? 'text-[#ead9f1]/90' : 'text-gray-800/90';
    $borderColor = $isJewellery ? 'border-[#350047]' : 'border-gray-100';
    $italicColor = $isJewellery ? 'text-[#f3d9ff]/90' : 'text-mulberry/80';
    $innerCardBg = $isJewellery ? 'bg-[#350047]/40' : 'bg-white/40';
    $innerCardBorder = $isJewellery ? 'border-white/10' : 'border-white/60';
@endphp

<section id="about-story"
class="py-20 sm:py-28 relative overflow-hidden bg-[#2a0038]">
<!-- Luxury Background Texture -->
<div class="absolute inset-0 opacity-40 pointer-events-none"
style="
background-image:
radial-gradient(circle at 20% 20%, rgba(255,255,255,0.08) 0%, transparent 25%),
radial-gradient(circle at 80% 30%, rgba(212,175,55,0.10) 0%, transparent 30%),
radial-gradient(circle at 50% 80%, rgba(255,255,255,0.05) 0%, transparent 35%),
url('https://www.transparenttextures.com/patterns/stardust.png');
background-size: cover;
">
</div>
<div class="flex items-center justify-center py-6">
    <div class="w-24 h-px bg-[#d4af37]/40"></div>
    <div class="mx-3 text-[#d4af37] text-sm">✦</div>
    <div class="w-24 h-px bg-[#d4af37]/40"></div>
</div>
    <!-- Subtle Background Elements -->
    <div class="absolute top-0 left-0 w-64 h-64 {{ $isJewellery ? 'bg-[#350047]/20' : 'bg-[#F8C8DC]/20' }} rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 {{ $isJewellery ? 'bg-[##8b4c6e]/5' : 'bg-mulberry/5' }} rounded-full blur-3xl translate-x-1/3 translate-y-1/3"></div>

    <div class="max-w-[1240px] mx-auto px-6 sm:px-10 py-14 relative z-10 border border-[#d4af37]/50 bg-[rgba(58,0,78,0.65)] shadow-[0_0_80px_rgba(212,175,55,0.08)]">
        <div class="text-center mb-16">
            @if($isJewellery)
            <h2 class="font-heading text-5xl sm:text-7xl text-[#f5d76e] font-normal tracking-[0.14em] mb-6 uppercase">
                AVNEE <span class="block text-2xl sm:text-3xl mt-3 tracking-[0.35em] font-light text-[#d4af37] border-y border-[#d4af37]/60 inline-block px-4 py-1">
    Our Story
</span>
            </h2>
            <div class="w-40 h-[1px] bg-[#d4af37]/60 mx-auto mt-6 shadow-[0_0_15px_rgba(212,175,55,0.5)]"></div>
            @else
            <h2 class="studio-section-heading mb-4">
                <span class="block"style = "color: #C75B6E;">Avnee</span>
                <span class="mt-3 block text-2xl sm:text-3xl font-light tracking-[0.28em] text-mulberry/85">Our Story</span>
            </h2>
            @endif
        </div>

        <div class="space-y-10 text-center font-body">
            <div class="space-y-6">
                <h3 class="text-2xl sm:text-[42px] font-heading italic text-[#d9c0a5] leading-[1.6] max-w-5xl mx-auto">
    "AVNEE Collections was born from a mother’s love for finding the perfect balance between comfort, style, and meaning in what her child wears."
</h3>
                <p class="{{ $textColor }} leading-relaxed text-lg sm:text-2xl max-w-3xl mx-auto">
                    What began as a personal journey to discover beautiful, wearable pieces soon grew into a thoughtfully curated space for kidswear and accessories. The love for dressing up little moments - rooted in childhood memories of playful makeovers, dressing dolls, and the simple joy of getting ready together.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-14 lg:gap-16 pt-10 border-t {{ $borderColor }} items-start">
                <div class="text-left space-y-6">
                    <p class="{{ $textColor }} leading-relaxed text-base sm:text-lg lg:text-xl">
                        Inspired by that feeling, AVNEE is a thoughtfully curated space for kidswear and accessories, where every piece reflects comfort, charm, and a sense of celebration. From everyday essentials to occasion-ready outfits, and delicate jewelry for little girls, mothers, and women - each collection is chosen with care and intention.
                    </p>
                    <p class="{{ $textColor }} leading-relaxed text-base sm:text-lg lg:text-xl">
                        Alongside dressing little ones, AVNEE also celebrates the woman behind it all. In the midst of caring for everyone else, women often place themselves last. AVNEE gently reminds them to take a moment for themselves - to feel beautiful, confident, and seen.
                    </p>
                </div>
                <div class="text-left space-y-6">
                    <p class="{{ $textColor }} leading-relaxed text-base sm:text-lg lg:text-xl">
                        With simple, elegant, everyday jewelry designed to be effortless and lasting, it brings back the joy of self-expression in the smallest, most meaningful ways. At its heart, AVNEE is a reflection of a quiet dream - one that lives in every mother who finds happiness in dressing her child, and in every woman who deserves to feel just as special.
                    </p>
                    <p class="{{ $textColor }} leading-relaxed text-base sm:text-lg lg:text-xl font-semibold italic {{ $isJewellery ? 'text-[#f3d9ff]/90' : 'text-mulberry/90' }}">
                        At AVNEE, every piece is chosen with care - whether it’s playful everyday outfits, special occasion styles, or charming jewelry for little girls, mothers, and women.
                    </p>
                </div>
            </div>

            <div class="pt-16 pb-8">
                <div class="bg-[#3a014d]/70 backdrop-blur-md p-10 sm:p-14 rounded-sm border border-[#d4af37]/30 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    </div>
                    <p class="text-[#d8b98d] text-xl sm:text-[34px] font-heading leading-relaxed max-w-3xl mx-auto italic relative z-10 tracking-wide">
                        "More than just a collection, AVNEE is about celebrating little moments, big smiles, and the bond between mothers and their children - through styles that are made to be loved, worn, and remembered."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
