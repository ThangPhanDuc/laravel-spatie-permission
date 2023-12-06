<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'add_products',
            'edit_products',
            'delete_products',
            'add_categories',
            'edit_categories',
            'delete_categories',
            'change_roles',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $employeeRole = Role::create(['name' => 'employee']);
        $employeeRole->givePermissionTo(['add_products', 'edit_products', 'delete_products', 'add_categories', 'edit_categories', 'delete_categories']);

        $customerRole = Role::create(['name' => 'customer']);

        // Create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($adminRole);

        $user = \App\Models\User::factory()->create([
            'name' => 'Employee User',
            'email' => 'employee@example.com',
        ]);
        $user->assignRole($employeeRole);

        $user = \App\Models\User::factory()->create([
            'name' => 'Customer User',
            'email' => 'customer@example.com',
        ]);
        $user->assignRole($customerRole);
    }
}
