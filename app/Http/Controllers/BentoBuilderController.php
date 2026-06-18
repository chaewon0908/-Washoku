<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class BentoBuilderController extends Controller
{
    // Custom image URLs for bento builder
    private $customImages = [
        // Main Dishes
        'Teriyaki Chicken' => 'https://imgs.search.brave.com/DNfLWQM1jRkKWRv-9TJWQb2pNxTalG2iBQTVUAABGjA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tb2Rl/cm5tZWFsbWFrZW92/ZXIuY29tL3dwLWNv/bnRlbnQvdXBsb2Fk/cy8yMDIwLzEwL3Rl/cml5YWtpLWNoaWNr/ZW4tNi02ODN4MTAy/NC5qcGcud2VicA',
        'Beef Teriyaki' => 'https://imgs.search.brave.com/8wvP2GbCWYoe4FJHsGpuNVVP5t_bK4D0hMkKjqU0yrA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90aGVy/ZWNpcGVjcml0aWMu/Y29tL3dwLWNvbnRl/bnQvdXBsb2Fkcy8y/MDI1LzA2L3Rlcml5/YWtpLWJlZWYtLTEy/MDB4MTc5OS5qcGc',
        'Tonkatsu' => 'https://imgs.search.brave.com/dSpEHDTS8yyGW1CQzhOh5tXB_lJ8fPx3h6ZHf9UlApk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTQ0/MjM3NDYzMC9waG90/by9qYXBhbmVzZS1m/b29kLXRvbmthdHN1/LW9uLWEtcGxhdGUu/anBnP3M9NjEyeDYx/MiZ3PTAmaz0yMCZj/PTUyMFVURkQxMG5r/N2dvb0pRckh3ZWhO/QVpjNGQ1ZU1uQnlZ/N1owcElsa2c9',
        'Chicken Katsu' => 'https://imgs.search.brave.com/QOrrB99m6mkHS3pWt8QUikhwjQFRIHiej4GG7RjkygU/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/c2h1dHRlcnN0b2Nr/LmNvbS9pbWFnZS1w/aG90by9jcmlzcHkt/a2F0c3UtY2hpY2tl/bi1zYXVjZS1yaWNl/LTI2MG53LTIwODYx/Nzg3MDQuanBn',
        // Side Dishes
        'Gyoza (3 pcs)' => 'https://imgs.search.brave.com/Y626V_skyAl0fijbIqt7D3nkERgn9m7L3uxrz7ah8SA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90NC5m/dGNkbi5uZXQvanBn/LzE0Lzc4Lzk2Lzgz/LzM2MF9GXzE0Nzg5/NjgzODhfSjZnVmts/UUs2ZmpzdDUxMlp6/YnpmdHlwVE9HMVd6/YlUuanBn',
        'Edamame' => 'https://imgs.search.brave.com/DJM1rmgxMCW8twsGkRbWWprQMhPxUVov34B2FiVaO-k/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMjIx/NjA0NzQyNC9waG90/by9lZGFtYW1lLmpw/Zz9zPTYxMng2MTIm/dz0wJms9MjAmYz1Y/ZkhMdFJzQUpPSC1N/OUJ2UjZSR21LQ2RY/RHZocW56cmtXdG9B/TktobjkwPQ',
        'Tempura Vegetables' => 'https://imgs.search.brave.com/lsiEeS8a6liFZA542OBq6zL_-RdczAS35AoXiRe1WUA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/anVzdG9uZWNvb2ti/b29rLmNvbS93cC1j/b250ZW50L3VwbG9h/ZHMvMjAyMC8wNS9W/ZWdldGFibGUtVGVt/cHVyYS0xNzA2LUlW/LmpwZw',
        'Miso Soup' => 'https://imgs.search.brave.com/h7GuGAMuNNLMJhyyoU61E7Gbu9OlHMzrmB48AiU0YuE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/anVzdG9uZWNvb2ti/b29rLmNvbS93cC1j/b250ZW50L3VwbG9h/ZHMvMjAyMi8wNi9N/aXNvLVNvdXAtODI1/MS1WLmpwZw',
        'Seaweed Salad' => 'https://imgs.search.brave.com/w-40tWxOWnfKEWiBogOZax2C7PFVT63oy2t1XlR8DOk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9waWNr/bGVkcGx1bS5jb20v/d3AtY29udGVudC91/cGxvYWRzLzIwMjAv/MDUvU2Vhd2VlZC1T/YWxhZC0yLTEyMDAu/anBn',
        'Steamed Rice' => 'https://imgs.search.brave.com/GyKQ55_wTloLJPzgxqmAfTbIddRuFQuHiOnK1saxKWE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvODcy/NDg2Njc0L3Bob3Rv/L3JpY2UuanBnP3M9/NjEyeDYxMiZ3PTAm/az0yMCZjPTVVUW1s/V3NtTjZEWUlSZHNj/c2cyeVU1R3lEN2xV/bWlEbTZrbnN6LVkz/bzA9',
    ];

    private function getImagePath($item)
    {
        // Check if there's a custom image URL for this item in bento builder
        if (isset($this->customImages[$item->name])) {
            return $this->customImages[$item->name];
        }
        
        // Otherwise, use the image_url from database or generate asset URL for uploaded images
        return $item->image_url ?? ($item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=' . urlencode($item->name));
    }

    public function index()
    {
        // Only these specific main dishes allowed
        $allowedMainDishes = [
            'Teriyaki Chicken',
            'Beef Teriyaki',
            'Tonkatsu',
            'Chicken Katsu',
            'Salmon Grilled',
            'Ebi Tempura'
        ];
        
        // Only these specific side dishes allowed
        $allowedSideDishes = [
            'Gyoza (3 pcs)',
            'Edamame',
            'Tempura Vegetables',
            'Miso Soup',
            'Seaweed Salad',
            'Steamed Rice'
        ];
        
        $mainDishes = MenuItem::where('type', 'main')
            ->where('is_available', true)
            ->whereIn('name', $allowedMainDishes)
            ->get()
            ->map(function($item) {
                $imagePath = $this->getImagePath($item);
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'description' => $item->description,
                    'image' => $imagePath,
                    'image_url' => $imagePath,
                    'type' => $item->type
                ];
            });
            
        $sideDishes = MenuItem::where('type', 'side')
            ->where('is_available', true)
            ->whereIn('name', $allowedSideDishes)
            ->get()
            ->map(function($item) {
                $imagePath = $this->getImagePath($item);
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'description' => $item->description,
                    'image' => $imagePath,
                    'image_url' => $imagePath,
                    'type' => $item->type
                ];
            });
            
        $drinks = MenuItem::where('type', 'drink')
            ->where('is_available', true)
            ->get();
        
        return view('bento-builder.index', compact('mainDishes', 'sideDishes', 'drinks'));
    }
}
