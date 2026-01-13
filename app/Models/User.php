<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    
    public function isOrderProcessor()
    {
        return $this->role === 'order_processor' || $this->role === 'admin';
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
