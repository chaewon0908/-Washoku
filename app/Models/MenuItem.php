<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'image',
        'image_url',
        'type',
        'category_id',
        'is_available',
        'is_featured',
        'is_bestseller',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'is_featured' => 'boolean',
        'is_bestseller' => 'boolean',
        'price' => 'decimal:2',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
