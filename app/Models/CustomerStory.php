<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'button_text',
        'button_link',
        'product_id',
        'image_path',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Scope to get only active stories.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('id', 'asc');
    }

    /**
     * Get the associated product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the product URL for the story.
     */
    public function getProductUrlAttribute()
    {
        if ($this->product_id && $this->product) {
            return route('front.product.detail', $this->product->slug);
        }
        return $this->button_link ?: route('front.products.index');
    }
}
