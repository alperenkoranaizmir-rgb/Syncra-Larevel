<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only run if Spatie classes exist (package installed)
        if (! class_exists(\Spatie\Permission\Models\Role::class)) {
            $this->command->info('Spatie permission package not installed, skipping PermissionSeeder.');
            return;
        }

        $this->command->info('Seeding roles and permissions (spatie)');

        $roleAdmin = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin']);
        $roleUser = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'user']);

        $permManageUsers = \Spatie\Permission\Models\Permission::firstOrCreate(['name' => 'manage users']);
        $permManageContent = \Spatie\Permission\Models\Permission::firstOrCreate(['name' => 'manage content']);

        $roleAdmin->givePermissionTo([$permManageUsers, $permManageContent]);

        // Assign admin role to the first user if present
        $user = \App\Models\User::first();
        if ($user && method_exists($user, 'assignRole')) {
            $user->assignRole($roleAdmin);
            $this->command->info('Assigned admin role to first user: ' . $user->email);
        }
    }
}
