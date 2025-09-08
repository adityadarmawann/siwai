<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed User untuk testing
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        // Jalankan seeder lainnya
        $this->call([
            JabatanSeeder::class,
            SkpdSeeder::class,
        ]);
    }
}