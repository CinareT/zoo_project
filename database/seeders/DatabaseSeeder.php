<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        if (!User::where('is_admin', true)->first()?->is_admin) {
            User::factory()->create([
                'name' => 'Admin Super',
                'email' => 'admin@email.com',
                'password' => 'password',
                'is_admin' => true,
            ]);
        }
    }
}
