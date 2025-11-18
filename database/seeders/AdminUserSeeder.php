<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = 'alperen.korana@outlook.com';

        $user = User::where('email', $email)->first();
        if (! $user) {
            $user = User::create([
                'name' => 'alperen korana',
                'username' => 'admin',
                'email' => $email,
                'password' => Hash::make('benq2535Aa.'),
                'company' => 'Korana Yazılım',
                'birthdate' => '1988-03-16',
                'tckn' => '38194814660',
                'phone' => '5513442440',
                'address_city' => null,
                'address_district' => null,
                'address_line' => null,
                'education' => null,
                'is_admin' => true,
            ]);
        } else {
            $user->update([
                'username' => 'admin',
                'company' => 'Korana Yazılım',
                'birthdate' => '1988-03-16',
                'tckn' => '38194814660',
                'phone' => '5513442440',
                'address_city' => null,
                'address_district' => null,
                'address_line' => null,
                'education' => null,
                'password' => Hash::make('benq2535Aa.'),
                'is_admin' => true,
            ]);
        }

        // Ensure admin role exists and assign to user if the HasRoles trait is available on User
        if (class_exists(\Spatie\Permission\Models\Role::class)) {
            $role = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin']);
            $perms = \Spatie\Permission\Models\Permission::all();
            if ($perms->isNotEmpty()) {
                $role->givePermissionTo($perms);
            }

            if (method_exists($user, 'assignRole')) {
                $user->assignRole($role);
            } else {
                // Fallback: ensure is_admin flag is set (already done above)
                $this->command->info('User model does not implement HasRoles; assigned is_admin flag instead.');
            }
        }
    }
}
