<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BentoBuilderController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{slug}', [MenuController::class, 'category'])->name('menu.category');

// Bento Builder
Route::get('/bento-builder', [BentoBuilderController::class, 'index'])->name('bento.builder');

// Stores
Route::get('/stores', function () {
    return view('stores');
})->name('stores');

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Developers
Route::get('/developers', function () {
    return view('developers');
})->name('developers');

// FAQ
Route::get('/faq', function () {
    return view('faq');
})->name('faq');

// Terms of Service
Route::get('/terms', function () {
    return view('terms');
})->name('terms');

// Privacy Policy
Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

// Cart
Route::get('/cart', function () {
    return view('cart');
})->name('cart');

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login', function () {
    $credentials = request()->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials, request()->boolean('remember'))) {
        request()->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
})->name('login.post');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout')->middleware('auth');

Route::get('/register', function () {
    return view('auth.register');
})->name('register')->middleware('guest');

Route::post('/register', function () {
    $validated = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = \App\Models\User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
        'role' => 'customer',
    ]);

    \Illuminate\Support\Facades\Auth::login($user);
    request()->session()->regenerate();

    return redirect()->intended('/dashboard');
})->name('register.post')->middleware('guest');

// Dashboard Routes (Protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $orders = Auth::user()->orders()->latest()->get();
        return view('dashboard.index', compact('orders'));
    })->name('dashboard');

    Route::get('/dashboard/orders', function () {
        $orders = Auth::user()->orders()->latest()->get();
        return view('dashboard.orders', compact('orders'));
    })->name('dashboard.orders');
});

// Admin Routes (Protected - Admin/Order Processor only)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::post('/orders/{order}/status', [AdminController::class, 'updateOrderStatus'])->name('orders.update-status');
    
    // Menu Items CRUD
    Route::get('/menu-items', [AdminController::class, 'menuItems'])->name('menu-items.index');
    Route::get('/menu-items/create', [AdminController::class, 'createMenuItem'])->name('menu-items.create');
    Route::post('/menu-items', [AdminController::class, 'storeMenuItem'])->name('menu-items.store');
    Route::get('/menu-items/{menuItem}/edit', [AdminController::class, 'editMenuItem'])->name('menu-items.edit');
    Route::put('/menu-items/{menuItem}', [AdminController::class, 'updateMenuItem'])->name('menu-items.update');
    Route::delete('/menu-items/{menuItem}', [AdminController::class, 'destroyMenuItem'])->name('menu-items.destroy');
});
