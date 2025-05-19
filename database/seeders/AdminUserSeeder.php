<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'full_name' => 'Admin User',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);
    }
}
