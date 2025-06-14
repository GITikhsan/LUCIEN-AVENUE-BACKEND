<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // <-- Import model User
use Illuminate\Support\Facades\Hash; // <-- Import Hash

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gunakan firstOrCreate agar tidak ada duplikasi jika seeder dijalankan berkali-kali
        User::firstOrCreate(
            [
                'email' => 'admin@lucien.com', // Tentukan email unik untuk admin
            ],
            [
                'first_name' => 'Admin',
                'last_name' => 'Lucien',
                'password' => Hash::make('admin123'), // Ganti dengan password yang aman
                'role' => 'admin', // <-- Menetapkan role sebagai admin
                'no_telepon' => '082281899371',
            ]
        );

        // Anda bisa menambahkan user lain di sini jika perlu
        // Contoh user biasa:
        // User::firstOrCreate(
        //     ['email' => 'user@lucien.com'],
        //     [
        //         'first_name' => 'Regular',
        //         'last_name' => 'User',
        //         'password' => Hash::make('password'),
        //         'role' => 'user',
        //         'no_telepon' => '089876543210',
        //     ]
        // );
    }
}