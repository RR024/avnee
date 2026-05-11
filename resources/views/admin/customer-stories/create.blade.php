<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Create Customer Story
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative dark:bg-green-900/50 dark:border-green-800 dark:text-green-300" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg border border-gray-200 dark:border-gray-700">
                <form action="{{ route('admin.customer-stories.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" required
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Customer name or story title">
                    </div>

                    <div>
                        <label for="subtitle" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Subtitle
                        </label>
                        <textarea name="subtitle" id="subtitle" rows="3"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Customer testimonial or story description"></textarea>
                    </div>

                    <div>
                        <label for="button_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Button Text <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="button_text" id="button_text" value="View Product" required
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="product_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Link to Product
                        </label>
                        <select name="product_id" id="product_id"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Select a product (optional)</option>
                            @php
                                $products = \App\Models\Product::where('is_active', true)->orderBy('name')->get();
                            @endphp
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->sku }}</option>
                            @endforeach
                        </select>
                        <p class="mt-1 text-xs text-gray-500">Select a specific product, or leave empty to use custom link below.</p>
                    </div>

                    <div>
                        <label for="button_link" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Custom Button Link
                        </label>
                        <input type="text" name="button_link" id="button_link"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Custom URL (used only if no product selected)">
                        <p class="mt-1 text-xs text-gray-500">Only used if no product is selected above.</p>
                    </div>

                    <div>
                        <label for="image_path" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Image <span class="text-red-500">*</span>
                        </label>
                        <input type="file" name="image_path" id="image_path" accept="image/*" required
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <p class="mt-1 text-xs text-gray-500">Recommended size: 400x300px. Max file size: 2MB.</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="sort_order" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Sort Order
                            </label>
                            <input type="number" name="sort_order" id="sort_order" value="0" min="0"
                                class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div class="flex items-center">
                            <label for="is_active" class="flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" id="is_active" value="1" checked
                                    class="rounded border-gray-300 dark:border-gray-700 dark:bg-gray-800 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Active</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('admin.customer-stories.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-650 text-gray-700 dark:text-gray-300 rounded text-sm font-medium transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded text-sm font-medium transition-colors">
                            Create Story
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
