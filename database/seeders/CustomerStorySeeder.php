<?php

namespace Database\Seeders;

use App\Models\CustomerStory;
use Illuminate\Database\Seeder;

class CustomerStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stories = [
            [
                'title' => 'Latha Iyer',
                'subtitle' => 'Absolutely love the quality and design! My daughter felt like a princess in her birthday dress.',
                'button_text' => 'View Product',
                'button_link' => null,
                'product_id' => 1, // Elegant Silk Saree
                'image_path' => 'customer-stories/latha-iyer.png',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Aishwarya Rao',
                'subtitle' => 'Beautiful collection and excellent customer service. The outfits are perfect for special occasions.',
                'button_text' => 'View Product',
                'button_link' => null,
                'product_id' => 2, // Diamond Studded Necklace
                'image_path' => 'customer-stories/aishwarya-rao.png',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Divya Menon',
                'subtitle' => 'The fabric quality is amazing and the designs are so unique. Highly recommend!',
                'button_text' => 'View Product',
                'button_link' => null,
                'product_id' => 3, // Festive Wear
                'image_path' => 'customer-stories/divya-menon.png',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Kavya Nair',
                'subtitle' => 'My daughter loves her new dress! The fit is perfect and the colors are vibrant.',
                'button_text' => 'View Product',
                'button_link' => null,
                'product_id' => 4, // Festive Wear (different variant)
                'image_path' => 'customer-stories/kavya-nair.png',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Meena Sharma',
                'subtitle' => 'Great value for money and the quality exceeded my expectations. Will definitely order again!',
                'button_text' => 'View Product',
                'button_link' => null,
                'product_id' => 5, // Fun Trinkets
                'image_path' => 'customer-stories/meena-sharma.png',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Pooja Verma',
                'subtitle' => 'The customer service is exceptional and the dresses are simply beautiful!',
                'button_text' => 'View Products',
                'button_link' => route('front.products.index'),
                'product_id' => null, // No specific product, goes to general products
                'image_path' => 'customer-stories/pooja-verma.png',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'title' => 'Priya Patel',
                'subtitle' => 'Stunning designs and comfortable fabric. My daughter looks adorable in every outfit!',
                'button_text' => 'View Product',
                'button_link' => null,
                'product_id' => 1, // Elegant Silk Saree (reuse for demo)
                'image_path' => 'customer-stories/priya-patel.png',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'title' => 'Riya Mehta',
                'subtitle' => 'The attention to detail is impressive. Every dress is a masterpiece!',
                'button_text' => 'View Product',
                'button_link' => null,
                'product_id' => 2, // Diamond Studded Necklace (reuse for demo)
                'image_path' => 'customer-stories/riya-mehta.png',
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'title' => 'Sneha Reddy',
                'subtitle' => 'Absolutely gorgeous collection! The quality and craftsmanship are outstanding.',
                'button_text' => 'View Products',
                'button_link' => route('front.products.index'),
                'product_id' => null, // No specific product, goes to general products
                'image_path' => 'customer-stories/sneha-reddy.png',
                'is_active' => true,
                'sort_order' => 9,
            ],
        ];

        foreach ($stories as $story) {
            CustomerStory::create($story);
        }
    }
}
