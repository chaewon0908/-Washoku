<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Bento Boxes',
                'slug' => 'bento-boxes',
                'description' => 'Delicious bento boxes with various combinations',
            ],
            [
                'name' => 'Sushi',
                'slug' => 'sushi',
                'description' => 'Fresh sushi rolls and sashimi',
            ],
            [
                'name' => 'Ramen',
                'slug' => 'ramen',
                'description' => 'Authentic Japanese ramen bowls',
            ],
            [
                'name' => 'Drinks',
                'slug' => 'drinks',
                'description' => 'Japanese beverages and soft drinks',
            ],
            [
                'name' => 'Appetizers',
                'slug' => 'appetizers',
                'description' => 'Japanese appetizers and starters',
            ],
            [
                'name' => 'Tempura',
                'slug' => 'tempura',
                'description' => 'Crispy tempura dishes',
            ],
            [
                'name' => 'Desserts',
                'slug' => 'desserts',
                'description' => 'Japanese desserts and sweets',
            ],
            [
                'name' => 'Donburi',
                'slug' => 'donburi',
                'description' => 'Rice bowls with various toppings',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
