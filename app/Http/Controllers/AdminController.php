<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::check() || (!Auth::user()->isAdmin() && !Auth::user()->isOrderProcessor())) {
                abort(403, 'Unauthorized access');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $stats = [
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'completed_orders' => Order::where('status', 'completed')->count(),
            'total_revenue' => Order::where('status', 'completed')->sum('total'),
            'total_menu_items' => MenuItem::count(),
            'total_categories' => Category::count(),
        ];

        $recentOrders = Order::with('user')->latest()->take(10)->get();

        return view('admin.index', compact('stats', 'recentOrders'));
    }

    public function orders(Request $request)
    {
        $search = $request->get('search', '');
        
        $query = Order::with('user', 'items');
        
        // Add search functionality for order number
        if ($search) {
            $query->where('order_number', 'like', '%' . $search . '%');
        }
        
        $orders = $query->latest()->paginate(20)->appends($request->query());
        
        return view('admin.orders', compact('orders', 'search'));
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,preparing,delivering,completed,cancelled',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Order status updated successfully.');
    }

    // Menu Item CRUD Operations
    public function menuItems(Request $request)
    {
        $perPage = $request->get('per_page', 50); // Default to 50 items per page, allow override
        $search = $request->get('search', '');
        
        $query = MenuItem::with('category');
        
        // Add search functionality
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhereHas('category', function($categoryQuery) use ($search) {
                      $categoryQuery->where('name', 'like', '%' . $search . '%');
                  });
            });
        }
        
        $menuItems = $query->latest()->paginate($perPage)->appends($request->query());
        return view('admin.menu-items.index', compact('menuItems', 'search'));
    }

    public function createMenuItem()
    {
        $categories = Category::all();
        return view('admin.menu-items.create', compact('categories'));
    }

    public function storeMenuItem(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_url' => 'nullable|url',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Generate slug from name (handle duplicates)
        $baseSlug = Str::slug($validated['name']);
        $slug = $baseSlug;
        $counter = 1;
        while (MenuItem::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }
        $validated['slug'] = $slug;

        // Set default type (database column still exists but we don't use it for filtering)
        $validated['type'] = 'main'; // Default value for database compatibility

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menu-items', 'public');
            $validated['image'] = $imagePath;
        }

        // Handle boolean fields - checkboxes only send value when checked
        // Checkbox sends "1" when checked, nothing when unchecked
        $validated['is_available'] = $request->has('is_available') && $request->input('is_available') == '1';
        $validated['is_featured'] = $request->has('is_featured') && $request->input('is_featured') == '1';
        $validated['is_bestseller'] = $request->has('is_bestseller') && $request->input('is_bestseller') == '1';

        MenuItem::create($validated);

        return redirect()->route('admin.menu-items.index')
            ->with('success', 'Menu item created successfully.');
    }

    public function editMenuItem(MenuItem $menuItem)
    {
        $categories = Category::all();
        return view('admin.menu-items.edit', compact('menuItem', 'categories'));
    }

    public function updateMenuItem(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_url' => 'nullable|url',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Generate slug from name if name changed (handle duplicates)
        if ($validated['name'] !== $menuItem->name) {
            $baseSlug = Str::slug($validated['name']);
            $slug = $baseSlug;
            $counter = 1;
            while (MenuItem::where('slug', $slug)->where('id', '!=', $menuItem->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }
            $validated['slug'] = $slug;
        }

        // Category is now required, no need to handle empty

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menu-items', 'public');
            $validated['image'] = $imagePath;
        }

        // Handle boolean fields - checkboxes only send value when checked
        // Checkbox sends "1" when checked, nothing when unchecked
        $validated['is_available'] = $request->has('is_available') && $request->input('is_available') == '1';
        $validated['is_featured'] = $request->has('is_featured') && $request->input('is_featured') == '1';
        $validated['is_bestseller'] = $request->has('is_bestseller') && $request->input('is_bestseller') == '1';

        // Update the menu item with all validated data
        $menuItem->update($validated);

        return redirect()->route('admin.menu-items.index')
            ->with('success', 'Menu item updated successfully.');
    }

    public function destroyMenuItem(MenuItem $menuItem)
    {
        $menuItem->delete();

        return redirect()->route('admin.menu-items.index')
            ->with('success', 'Menu item deleted successfully.');
    }
}
