<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed roles & permissions (spatie) if package is installed
        if (class_exists(\Database\Seeders\PermissionSeeder::class)) {
            $this->call(\Database\Seeders\PermissionSeeder::class);
        }
        
        // Create admin user
        if (class_exists(\Database\Seeders\AdminUserSeeder::class)) {
            $this->call(\Database\Seeders\AdminUserSeeder::class);
        }

        // Seed sample events for calendar
        if (class_exists(\Database\Seeders\EventSeeder::class)) {
            $this->call(\Database\Seeders\EventSeeder::class);
        }
    }
}
