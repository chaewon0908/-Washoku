<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrNew(['email' => 'admin123@gmail.com']);
        $admin->name = 'Admin';
        $admin->role = 'admin';

        if (! $admin->exists) {
            $admin->password = Hash::make('password123');
        }

        $admin->save();
    }
}
