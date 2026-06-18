<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuItemCalorieSeeder extends Seeder
{
    private const OVERRIDES = [
        'Tonkotsu Ramen' => 680,
        'Shoyu Ramen' => 520,
        'Shio Ramen' => 480,
        'Miso Ramen' => 540,
        'Spicy Miso Ramen' => 560,
        'Vegetable Ramen' => 420,
        'California Roll (8 pcs)' => 280,
        'California Roll' => 280,
        'Spicy Tuna Roll (8 pcs)' => 310,
        'Spicy Tuna Roll' => 310,
        'Dragon Roll (8 pcs)' => 340,
        'Dragon Roll' => 340,
        'Rainbow Roll' => 360,
        'Teriyaki Chicken Bento w/ Miso Soup' => 620,
        'Salmon Sashimi Set w/ Rice & Salad' => 480,
        'Tonkatsu Pork Cutlet w/ Curry Rice' => 750,
        'Custom Bento Box (4 compartments)' => 650,
        'Makunouchi Bento' => 580,
        'Traditional Japanese Bento Box' => 600,
        'Character/Decorative Bento (Kyaraben)' => 620,
        'Gyūdon (Beef Bowl)' => 720,
        'Oyakodon (Chicken & Egg Bowl)' => 650,
        'Unadon (Eel Bowl) (spicy)' => 680,
        'Una Don (Eel Bowl)' => 670,
        'Katsudon (Pork Cutlet Bowl)' => 780,
        'Ebi Tempura' => 380,
        'Yasai Tempura (Vegetable Tempura)' => 320,
        'Kisu Tempura (Japanese Whiting)' => 350,
        'Gyoza (6 pcs)' => 240,
        'Gyoza (3 pcs)' => 180,
        'Takoyaki (6 pcs)' => 280,
        'Chicken Karaage' => 420,
        'Yakitori (2 skewers)' => 260,
        'Agedashi Tofu' => 180,
        'Mochi' => 150,
        'Dorayaki' => 220,
        'Taiyaki' => 210,
        'Matcha Ice Cream' => 190,
        'Japanese Green Tea' => 5,
        'Matcha Latte' => 180,
        'Ramune (Japanese Soda)' => 90,
        'Calpico (Calpis)' => 120,
        'Sake (Hot/Cold)' => 110,
        'Umeshu (Plum Wine)' => 130,
        'Japanese Iced Coffee' => 80,
        'Yuzu Lemonade (fresh lemon)' => 95,
    ];

    public function run(): void
    {
        MenuItem::with('category')->each(function (MenuItem $item) {
            if (isset(self::OVERRIDES[$item->name])) {
                $item->update(['calories' => self::OVERRIDES[$item->name]]);

                return;
            }

            $item->update(['calories' => $this->estimateCalories($item)]);
        });
    }

    private function estimateCalories(MenuItem $item): int
    {
        $name = Str::lower($item->name);
        $slug = $item->category?->slug ?? '';

        if ($slug === 'drinks' || $item->type === 'drink') {
            return 100;
        }

        if ($slug === 'desserts' || $item->type === 'dessert') {
            return 200;
        }

        if ($slug === 'ramen' || Str::contains($name, 'ramen')) {
            return 550;
        }

        if ($slug === 'sushi' || Str::contains($name, ['roll', 'sashimi'])) {
            return 300;
        }

        if ($slug === 'bento-boxes' || Str::contains($name, 'bento')) {
            return 600;
        }

        if ($slug === 'donburi' || Str::contains($name, ['don', 'bowl'])) {
            return 680;
        }

        if ($slug === 'tempura' || Str::contains($name, 'tempura')) {
            return 360;
        }

        if ($slug === 'appetizers') {
            return 250;
        }

        return 400;
    }
}
