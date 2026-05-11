<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Customer Stories Management
            </h2>
            <a href="{{ route('admin.customer-stories.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                <span class="material-symbols-outlined text-sm">add</span>
                Add Story
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative dark:bg-green-900/50 dark:border-green-800 dark:text-green-300" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3">Image</th>
                                <th class="px-6 py-3">Title</th>
                                <th class="px-6 py-3">Subtitle</th>
                                <th class="px-6 py-3">Button</th>
                                <th class="px-6 py-3">Link</th>
                                <th class="px-6 py-3 text-center">Status</th>
                                <th class="px-6 py-3 text-center">Order</th>
                                <th class="px-6 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($stories as $story)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-750">
                                    <td class="px-6 py-4">
                                        <div class="w-16 h-12 rounded overflow-hidden bg-gray-100">
                                            @if($story->image_path)
                                                <img src="{{ asset('storage/' . $story->image_path) }}" alt="{{ $story->title }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                                    <span class="material-symbols-outlined">image</span>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-900 dark:text-white">{{ $story->title }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-xs text-gray-500 dark:text-gray-400 max-w-xs truncate">
                                            {{ $story->subtitle ?: 'No subtitle' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-xs text-gray-500">{{ $story->button_text }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-xs text-gray-500 max-w-xs truncate">
                                            {{ $story->button_link ?: 'No link' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if($story->is_active)
                                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-green-100 text-green-800 uppercase tracking-widest">Active</span>
                                        @else
                                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-gray-100 text-gray-800 uppercase tracking-widest">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="text-xs text-gray-500">{{ $story->sort_order }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-right space-x-2 whitespace-nowrap">
                                        <form action="{{ route('admin.customer-stories.toggle-status', $story) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="text-{{ $story->is_active ? 'orange' : 'green' }}-600 hover:text-{{ $story->is_active ? 'orange' : 'green' }}-900 font-medium" title="{{ $story->is_active ? 'Deactivate' : 'Activate' }}">
                                                <span class="material-symbols-outlined text-lg">{{ $story->is_active ? 'visibility_off' : 'visibility' }}</span>
                                            </button>
                                        </form>

                                        <a href="{{ route('admin.customer-stories.edit', $story) }}" 
                                            class="text-amber-600 hover:text-amber-900 font-medium" title="Edit">
                                            <span class="material-symbols-outlined text-lg">edit</span>
                                        </a>

                                        <form action="{{ route('admin.customer-stories.destroy', $story) }}" method="POST" class="inline" onsubmit="return confirm('Delete this customer story permanently?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-medium" title="Delete">
                                                <span class="material-symbols-outlined text-lg">delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                                        No customer stories found. <a href="{{ route('admin.customer-stories.create') }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Create one</a> to get started.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
