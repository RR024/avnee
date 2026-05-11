<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerStory;
use Illuminate\Http\Request;

class CustomerStoryController extends Controller
{
    /**
     * Display a listing of customer stories.
     */
    public function index()
    {
        $stories = CustomerStory::ordered()->get();
        return view('admin.customer-stories.index', compact('stories'));
    }

    /**
     * Show the form for creating a new customer story.
     */
    public function create()
    {
        return view('admin.customer-stories.create');
    }

    /**
     * Store a newly created customer story.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'button_text' => 'required|string|max:255',
            'button_link' => 'nullable|string|max:500',
            'product_id' => 'nullable|exists:products,id',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('customer-stories', 'public');
            $validated['image_path'] = $imagePath;
        }

        CustomerStory::create($validated);

        return redirect()->route('admin.customer-stories.index')
            ->with('success', 'Customer story created successfully.');
    }

    /**
     * Show the form for editing the specified customer story.
     */
    public function edit(CustomerStory $customerStory)
    {
        return view('admin.customer-stories.edit', compact('customerStory'));
    }

    /**
     * Update the specified customer story.
     */
    public function update(Request $request, CustomerStory $customerStory)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'button_text' => 'required|string|max:255',
            'button_link' => 'nullable|string|max:500',
            'product_id' => 'nullable|exists:products,id',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
            'remove_image' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image_path')) {
            if ($customerStory->image_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($customerStory->image_path);
            }
            $imagePath = $request->file('image_path')->store('customer-stories', 'public');
            $validated['image_path'] = $imagePath;
        } elseif ($request->remove_image) {
            if ($customerStory->image_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($customerStory->image_path);
            }
            $validated['image_path'] = null;
        }

        $customerStory->update($validated);

        return redirect()->route('admin.customer-stories.index')
            ->with('success', 'Customer story updated successfully.');
    }

    /**
     * Remove the specified customer story.
     */
    public function destroy(CustomerStory $customerStory)
    {
        if ($customerStory->image_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($customerStory->image_path);
        }

        $customerStory->delete();

        return redirect()->route('admin.customer-stories.index')
            ->with('success', 'Customer story deleted successfully.');
    }

    /**
     * Toggle the status of a customer story.
     */
    public function toggleStatus(CustomerStory $customerStory)
    {
        $customerStory->update([
            'is_active' => !$customerStory->is_active
        ]);

        return redirect()->back()
            ->with('success', 'Customer story status updated successfully.');
    }
}
