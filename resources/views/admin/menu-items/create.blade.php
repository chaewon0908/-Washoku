@extends('layouts.app')

@section('title', 'Create Menu Item - Admin Panel')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-warm-cream to-warm-beige py-12">
    <div class="container mx-auto px-4">
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-serif font-bold text-primary-dark mb-2">Create Menu Item</h1>
                <p class="text-gray-600">Add a new item to your menu</p>
            </div>
            <a href="{{ route('admin.menu-items.index') }}" class="text-red-600 hover:text-red-700 font-semibold">
                ← Back to Menu Items
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-8 max-w-4xl mx-auto">
            @if($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('admin.menu-items.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Name *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-red-600 outline-none">
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                        <textarea id="description" name="description" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-red-600 outline-none">{{ old('description') }}</textarea>
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Price (₱) *</label>
                        <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" min="0" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-red-600 outline-none">
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">Category *</label>
                        <select id="category_id" name="category_id" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-red-600 outline-none">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Image Upload</label>
                        <input type="file" id="image" name="image" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-red-600 outline-none">
                        <p class="text-xs text-gray-500 mt-1">Max size: 2MB (JPEG, PNG, JPG, GIF)</p>
                    </div>

                    <!-- Image URL -->
                    <div>
                        <label for="image_url" class="block text-sm font-semibold text-gray-700 mb-2">Image URL</label>
                        <input type="url" id="image_url" name="image_url" value="{{ old('image_url') }}"
                            placeholder="https://example.com/image.jpg"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-red-600 outline-none">
                        <p class="text-xs text-gray-500 mt-1">Use URL or upload (URL takes priority if both provided)</p>
                    </div>

                    <!-- Checkboxes -->
                    <div class="md:col-span-2">
                        <div class="space-y-3">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_available" value="1" {{ old('is_available', true) ? 'checked' : '' }}
                                    class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-600">
                                <span class="ml-2 text-sm font-semibold text-gray-700">Available</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                                    class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-600">
                                <span class="ml-2 text-sm font-semibold text-gray-700">Featured</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="is_bestseller" value="1" {{ old('is_bestseller') ? 'checked' : '' }}
                                    class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-600">
                                <span class="ml-2 text-sm font-semibold text-gray-700">Bestseller</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="mt-8 flex gap-4">
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                        Create Menu Item
                    </button>
                    <a href="{{ route('admin.menu-items.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-8 py-3 rounded-lg font-semibold transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
