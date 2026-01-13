<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Custom image URLs for specific menu items
    private $customImages = [
        'Tekkadon (Tuna Sashimi Bowl)' => 'https://imgs.search.brave.com/HA9aMT9Zs6dMJGQzoPMSD2CxL2uCu5Ly8N3zLYEe0JY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9qYXBh/bmVzZXRhc3RlLmNv/bS9jZG4vc2hvcC9h/cnRpY2xlcy9ob3ct/dG8tbWFrZS10ZWtr/YWRvbi1qYXBhbmVz/ZS10dW5hLXNhc2hp/bWktcmljZS1ib3ds/LXJlY2lwZS1qYXBh/bmVzZS10YXN0ZS5q/cGc_dj0xNzU5ODg0/Njc0JndpZHRoPTYw/MA',
        'Ramune' => 'https://imgs.search.brave.com/KoN1NGhtUpnL6zYIq2_rLa0kI9u_pV8uWgBq5ByEbsg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/c2hvcGlmeS5jb20v/cy9maWxlcy8xLzA3/MTMvOTc5MC8wNTg0/L2ZpbGVzL1JhbXVu/ZS10YXN0ZS0xX2Nv/cHkuanBnP3Y9MTcw/ODMyMzQ1OA',
        'Ramune (Japanese Soda)' => 'https://imgs.search.brave.com/KoN1NGhtUpnL6zYIq2_rLa0kI9u_pV8uWgBq5ByEbsg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/c2hvcGlmeS5jb20v/cy9maWxlcy8xLzA3/MTMvOTc5MC8wNTg0/L2ZpbGVzL1JhbXVu/ZS10YXN0ZS0xX2Nv/cHkuanBnP3Y9MTcw/ODMyMzQ1OA',
        'Mochi' => 'https://imgs.search.brave.com/oInvuGxOAgkeSC6-Re3vUNpt1QPw7NjfyDEXefv1Rb8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zdGF0/aWMudmVjdGVlenku/Y29tL3N5c3RlbS9y/ZXNvdXJjZXMvdGh1/bWJuYWlscy8wNDgv/MDcxLzA5NC9zbWFs/bC9kZWxpY2lvdXMt/c3dlZXQtY2hpbGxl/ZC1tb2NoaS1kZXNz/ZXJ0cy13aXRoLWZy/dWl0LWZpbGxpbmct/cGhvdG8uSlBH',
        'Dorayaki' => 'https://imgs.search.brave.com/roamWBGDzjQPlpBta_g5DmKWJL-4VqhRy3sk8R7B3ZQ/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/Y3JlYXRlLnZpc3Rh/LmNvbS9hcGkvbWVk/aWEvc21hbGwvODA0/Nzg0NS9zdG9jay1w/aG90by1kb3JheWFr/aS1qYXBhbmVzZS1j/b25mZWN0aW9uZXJ5',
        'Taiyaki' => 'https://imgs.search.brave.com/BKxUYzENokfWU4rZOKBL5kehiaM69mqHYoziZz2WXM4/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMjE1/Mzg5Nzg1Mi9waG90/by9qYXBhbmVzZS1z/d2VldHMtdGFpeWFr/aS5qcGc_cz02MTJ4/NjEyJnc9MCZrPTIw/JmM9eDhvVkxJWDNs/andnMDVCV0o1a3py/N3I1ZUZjaDRFYnVP/NFdoR3I5VUNGbz0',
        'Matcha Ice Cream' => 'https://imgs.search.brave.com/EWNKwdKkLy8Qm4Y60GxT1yI33NuRl8RWoZsdsnPUT6M/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMuc3F1YXJlc3Bh/Y2UtY2RuLmNvbS9j/b250ZW50L3YxLzUz/M2Y1ODRmZTRiMGY3/N2UxYmQyZTRkMS8x/NjE5NDk2OTU2ODk4/LVBER1paNjBRQ0pF/MkYyRzVSMkozL01h/dGNoYStJY2UrQ3Jl/YW0wMDI1LmpwZw',
    ];

    // Category-level default images
    private $categoryImages = [
    ];

    private function getImagePath($item, $categorySlug = null)
    {
        // Check if there's a custom image URL for this item (highest priority)
        if (isset($this->customImages[$item->name])) {
            return $this->customImages[$item->name];
        }
        
        // Check if there's a category-level default image (use for all items in category)
        if ($categorySlug && isset($this->categoryImages[$categorySlug])) {
            return $this->categoryImages[$categorySlug];
        }
        
        // Otherwise, use the image_url from database
        return $item->image_url ?? $item->image ?? 'https://via.placeholder.com/400x400/f3f4f6/9ca3af?text=' . urlencode($item->name);
    }

    public function index()
    {
        // Get all categories, ordered by name to ensure consistent display
        // This ensures all categories appear, even newly added ones
        $categories = Category::orderBy('name', 'asc')->get();
        return view('menu.index', compact('categories'));
    }
    
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        // Items to exclude from Bento Boxes category (these are for Bento Builder only)
        $bentoBuilderItems = [
            'Teriyaki Chicken',  // This is a component, not a complete bento
            'Beef Teriyaki',
            'Tonkatsu',
            'Chicken Katsu',
            'Salmon Grilled',
            'Ebi Tempura',
        ];
        
        // Items to exclude from Tempura category
        $excludedTempuraItems = [
            'Tempura Vegetables',  // This is a side dish for Bento Builder, not a tempura dish
            'Mixed Tempura Platter',
            'Shrimp Tempura (5 pcs)',
            'Vegetable Tempura',
        ];
        
        // Items to exclude from Drinks category
        $excludedDrinks = [
            'Green Tea',
            'Iced Coffee',
            'Fresh Lemonade',
            'Soda',
            'Katsudon (Pork Cutlet Bowl)',
            'Una Don (Eel Bowl)',
        ];
        
        // Items to exclude from Sushi category
        $excludedSushiItems = [
            'California Roll (8 pcs)',
            'Spicy Tuna Roll (8 pcs)',
            'Dragon Roll (8 pcs)',
            'Rainbow Roll (8 pcs)',
        ];
        
        // Items to exclude from Desserts category
        $excludedDesserts = [
            'Seaweed Salad',
            'Steamed Rice',
            'Green Tea',
            'Iced Coffee',
            'Fresh Lemonade',
            'Soda',
            'Spring Rolls (4 pcs)',
            'Gyoza (3 pcs)',
        ];
        
        // Items to exclude from Appetizers category
        $excludedAppetizers = [
            'Gyoza',
            'Gyoza (3 pcs)',
            'Edamame',
            'Miso Soup',
            'Pickled Vegetables',
            'Salad',
            'Mixed Tempura Platter',
            'Shrimp Tempura (5 pcs)',
            'Vegetable Tempura',
        ];
        
        // Build query - show ALL items assigned to the category (no type filtering)
        $query = $category->menuItems()->where('is_available', true);
        
        // For Sushi, exclude specific items
        if ($slug === 'sushi') {
            $query->whereNotIn('name', $excludedSushiItems);
        }
        
        // For Desserts, exclude specific items
        if ($slug === 'desserts') {
            $query->whereNotIn('name', $excludedDesserts);
        }
        
        // For Bento Boxes, exclude items that are components (price 0 or in builder list)
        if ($slug === 'bento-boxes') {
            $query->where('price', '>', 0)  // Exclude items with price 0
                  ->whereNotIn('name', $bentoBuilderItems);  // Exclude builder components
        }
        
        // For Tempura, exclude specific items
        if ($slug === 'tempura') {
            $query->whereNotIn('name', $excludedTempuraItems);
        }
        
        // For Drinks, exclude specific items
        if ($slug === 'drinks') {
            $query->whereNotIn('name', $excludedDrinks);
        }
        
        // For Appetizers, exclude specific items
        if ($slug === 'appetizers') {
            $query->whereNotIn('name', $excludedAppetizers);
        }
        
        $items = $query->get()
            ->map(function($item) use ($slug) {
                // Apply custom image if available
                $item->image_url = $this->getImagePath($item, $slug);
                return $item;
            });
        
        return view('menu.category', compact('category', 'items'));
    }
}
