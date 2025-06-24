<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        // Cek jika user dengan email ini sudah ada
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123') // Password terenkripsi
            ]);
        }
    }
    
}