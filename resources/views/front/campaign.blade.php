@extends('layouts.front.studio')

@section('content')
<section class="py-6 sm:py-10 bg-[#FCEFF5] border-b border-[#e8d2da]">
  <div class="max-w-[1320px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
      <div>
        <p class="text-xs sm:text-sm uppercase tracking-[0.24em] text-[#7a4b60]">Featured Campaign</p>
        <h1 class="mt-3 font-heading text-3xl sm:text-5xl text-[#2B003A]">{{ $campaignTitle }}</h1>
        <p class="mt-4 text-base sm:text-lg text-[#5a3a4b]">{{ $campaignSubtitle }}</p>
        <a
          href="#campaign-products"
          class="mt-6 inline-flex items-center justify-center bg-[#2B003A] text-white text-sm sm:text-base font-semibold px-6 py-3 hover:bg-[#3d0b4e] transition-colors"
        >
          Shop This Edit
        </a>
      </div>
      <div class="overflow-hidden border border-[#d8bcc8] bg-white">
        <img src="{{ $campaignImage }}" alt="{{ $campaignTitle }}" class="w-full h-full object-cover" />
      </div>
    </div>
  </div>
</section>

<section id="campaign-products" class="py-10 sm:py-14 bg-[#FCEFF5]">
  <div class="max-w-[1320px] mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="studio-section-heading mb-8">{{ $campaignTitle }} Collection</h2>

    @if($products->isEmpty())
      <div class="border border-[#d8bcc8] bg-white p-8 text-center text-[#5a3a4b]">
        No products found in this campaign right now.
      </div>
    @else
      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
        @foreach($products as $product)
          <article class="bg-white border border-[#e0ccd5] shadow-sm overflow-hidden group">
            <a href="{{ route('front.product.detail', $product->slug) }}" class="block aspect-[3/4] overflow-hidden bg-[#f7eef2]">
              <img
                src="{{ $product->image ? asset('storage/' . ltrim($product->image, '/')) : asset('images/hero-slider/summer-classics.png') }}"
                alt="{{ $product->name }}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
              />
            </a>
            <div class="p-3 sm:p-4">
              <h3 class="text-sm sm:text-base font-semibold text-[#2B003A] line-clamp-2">{{ $product->name }}</h3>
              <p class="mt-2 text-sm sm:text-base font-bold text-[#C75B6E]">Rs {{ number_format((float) $product->price, 0) }}</p>
            </div>
          </article>
        @endforeach
      </div>
    @endif
  </div>
</section>
@endsection
