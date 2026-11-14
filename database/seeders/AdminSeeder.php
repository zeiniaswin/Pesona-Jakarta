<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * AdminSeeder - membuat akun admin awal untuk login panel.
 * Email    : admin@pesonajakarta.com
 * Password : password123
 * Author: Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
class AdminSeeder extends Seeder
{
    /**
     * I.S.: belum ada akun admin.
     * F.S.: akun admin tersimpan dengan password ter-hash (bcrypt).
     */
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@pesonajakarta.com'],
            [
                'name'       => 'Admin PesonaJakarta',
                'password'   => Hash::make('password123'),
                'role'       => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
