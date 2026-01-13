<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        // Get categories
        $bentoCategory = Category::where('slug', 'bento-boxes')->first();
        $sushiCategory = Category::where('slug', 'sushi')->first();
        $ramenCategory = Category::where('slug', 'ramen')->first();
        $appetizerCategory = Category::where('slug', 'appetizers')->first();
        $tempuraCategory = Category::where('slug', 'tempura')->first();
        $dessertsCategory = Category::where('slug', 'desserts')->first();

        // Main Dishes (for Bento Builder)
        $mainDishes = [
            [
                'name' => 'Teriyaki Chicken',
                'description' => 'Grilled chicken glazed with sweet teriyaki sauce',
                'price' => 249.00,
                'image' => 'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
                'type' => 'main',
                'category_id' => $bentoCategory?->id,
            ],
            [
                'name' => 'Salmon Teriyaki',
                'description' => 'Fresh salmon with teriyaki glaze',
                'price' => 289.00,
                'image' => 'https://images.pexels.com/photos/1640774/pexels-photo-1640774.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
                'type' => 'main',
                'category_id' => $bentoCategory?->id,
            ],
            [
                'name' => 'Tonkatsu Pork',
                'description' => 'Breaded and fried pork cutlet',
                'price' => 279.00,
                'image' => 'https://images.pexels.com/photos/1640770/pexels-photo-1640770.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
                'type' => 'main',
                'category_id' => $bentoCategory?->id,
            ],
            [
                'name' => 'Beef Sukiyaki',
                'description' => 'Thinly sliced beef in sweet soy sauce',
                'price' => 329.00,
                'image' => 'https://images.pexels.com/photos/1640772/pexels-photo-1640772.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&fit=crop',
                'type' => 'main',
                'category_id' => $bentoCategory?->id,
            ],
        ];

        // Side Dishes (for Bento Builder)
        $sideDishes = [
            [
                'name' => 'Miso Soup',
                'description' => 'Traditional Japanese miso soup',
                'price' => 0.00,
                'image' => 'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&fit=crop',
                'type' => 'side',
                'category_id' => $appetizerCategory?->id,
            ],
            [
                'name' => 'Edamame',
                'description' => 'Steamed soybeans with salt',
                'price' => 0.00,
                'image' => 'https://images.pexels.com/photos/1640774/pexels-photo-1640774.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&fit=crop',
                'type' => 'side',
                'category_id' => $appetizerCategory?->id,
            ],
            [
                'name' => 'Gyoza',
                'description' => 'Pan-fried Japanese dumplings',
                'price' => 0.00,
                'image' => 'https://images.pexels.com/photos/1640770/pexels-photo-1640770.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&fit=crop',
                'type' => 'side',
                'category_id' => $appetizerCategory?->id,
            ],
            [
                'name' => 'Tempura Vegetables',
                'description' => 'Assorted vegetables in tempura batter',
                'price' => 0.00,
                'image' => 'https://images.pexels.com/photos/1640772/pexels-photo-1640772.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&fit=crop',
                'type' => 'side',
                'category_id' => $tempuraCategory?->id,
            ],
            [
                'name' => 'Salad',
                'description' => 'Fresh garden salad with Japanese dressing',
                'price' => 0.00,
                'image' => 'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&fit=crop',
                'type' => 'side',
                'category_id' => $appetizerCategory?->id,
            ],
            [
                'name' => 'Pickled Vegetables',
                'description' => 'Traditional Japanese pickles',
                'price' => 0.00,
                'image' => 'https://images.pexels.com/photos/1640774/pexels-photo-1640774.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&fit=crop',
                'type' => 'side',
                'category_id' => $appetizerCategory?->id,
            ],
        ];

        // Create main dishes
        foreach ($mainDishes as $dish) {
            $slug = Str::slug($dish['name']);
            MenuItem::updateOrCreate(
                ['slug' => $slug],
                array_merge($dish, [
                    'image_url' => $dish['image'],
                    'slug' => $slug,
                    'is_available' => true,
                ])
            );
        }

        // Create side dishes
        foreach ($sideDishes as $dish) {
            $slug = Str::slug($dish['name']);
            MenuItem::updateOrCreate(
                ['slug' => $slug],
                array_merge($dish, [
                    'image_url' => $dish['image'],
                    'slug' => $slug,
                    'is_available' => true,
                ])
            );
        }

        // Desserts
        $desserts = [
            [
                'name' => 'Mochi',
                'description' => 'Soft and chewy Japanese rice cake with sweet filling',
                'price' => 89.00,
                'image' => 'https://imgs.search.brave.com/oInvuGxOAgkeSC6-Re3vUNpt1QPw7NjfyDEXefv1Rb8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zdGF0/aWMudmVjdGVlenku/Y29tL3N5c3RlbS9y/ZXNvdXJjZXMvdGh1/bWJuYWlscy8wNDgv/MDcxLzA5NC9zbWFs/bC9kZWxpY2lvdXMt/c3dlZXQtY2hpbGxl/ZC1tb2NoaS1kZXNz/ZXJ0cy13aXRoLWZy/dWl0LWZpbGxpbmct/cGhvdG8uSlBH',
                'type' => 'dessert',
                'category_id' => $dessertsCategory?->id,
            ],
            [
                'name' => 'Dorayaki',
                'description' => 'Sweet red bean paste sandwiched between two fluffy pancakes',
                'price' => 99.00,
                'image' => 'https://imgs.search.brave.com/roamWBGDzjQPlpBta_g5DmKWJL-4VqhRy3sk8R7B3ZQ/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/Y3JlYXRlLnZpc3Rh/LmNvbS9hcGkvbWVk/aWEvc21hbGwvODA0/Nzg0NS9zdG9jay1w/aG90by1kb3JheWFr/aS1qYXBhbmVzZS1j/b25mZWN0aW9uZXJ5',
                'type' => 'dessert',
                'category_id' => $dessertsCategory?->id,
            ],
            [
                'name' => 'Taiyaki',
                'description' => 'Fish-shaped cake filled with sweet red bean paste or custard',
                'price' => 109.00,
                'image' => 'https://imgs.search.brave.com/BKxUYzENokfWU4rZOKBL5kehiaM69mqHYoziZz2WXM4/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMjE1/Mzg5Nzg1Mi9waG90/by9qYXBhbmVzZS1z/d2VldHMtdGFpeWFr/aS5qcGc_cz02MTJ4/NjEyJnc9MCZrPTIw/JmM9eDhvVkxJWDNs/andnMDVCV0o1a3py/N3I1ZUZjaDRFYnVP/NFdoR3I5VUNGbz0',
                'type' => 'dessert',
                'category_id' => $dessertsCategory?->id,
            ],
            [
                'name' => 'Matcha Ice Cream',
                'description' => 'Creamy green tea ice cream with authentic matcha flavor',
                'price' => 129.00,
                'image' => 'https://imgs.search.brave.com/EWNKwdKkLy8Qm4Y60GxT1yI33NuRl8RWoZsdsnPUT6M/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMuc3F1YXJlc3Bh/Y2UtY2RuLmNvbS9j/b250ZW50L3YxLzUz/M2Y1ODRmZTRiMGY3/N2UxYmQyZTRkMS8x/NjE5NDk2OTU2ODk4/LVBER1paNjBRQ0pF/MkYyRzVSMkozL01h/dGNoYStJY2UrQ3Jl/YW0wMDI1LmpwZw',
                'type' => 'dessert',
                'category_id' => $dessertsCategory?->id,
            ],
        ];

        // Create desserts
        foreach ($desserts as $dessert) {
            $slug = Str::slug($dessert['name']);
            $imageUrl = $dessert['image'];
            unset($dessert['image']); // Remove 'image' to avoid column length issues
            MenuItem::updateOrCreate(
                ['slug' => $slug],
                array_merge($dessert, [
                    'image_url' => $imageUrl,
                    'slug' => $slug,
                    'is_available' => true,
                ])
            );
        }
    }
}
