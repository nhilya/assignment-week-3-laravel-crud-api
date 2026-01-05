<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Users
        User::factory()->create([
            'name' => 'Nuha Ilya',
            'email' => 'nuhailya@gmail.com',
            'password' => Hash::make('password@123'),
        ]);

        User::factory()->create([
            'name' => 'Alia Maisarah',
            'email' => 'aliamaisarah@gmail.com',
            'password' => Hash::make('password@123'),
        ]);

        User::factory()->create([
            'name' => 'Anis Sofia',
            'email' => 'anissofia@gmail.com',
            'password' => Hash::make('password@123'),
        ]);

        /**
         * Role & Permission Seeder for Product
         */
        $permissions = [
            'product-view',
            'product-create',
            'product-update',
            'product-delete',
        ];

        $roles = [
            'admin',
            'staff',
            'viewer',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        /**
         * Assign Permission to Admin Role
         */
        $adminRole = Role::whereName('admin')->first();
        $adminRole->givePermissionTo(Permission::all());

        /**
         * Assign Permission to Staff Role
         */
        $staffRole = Role::whereName('staff')->first();
        $staffRole->givePermissionTo([
            'product-view',
            'product-create',
            'product-update',
        ]);

        /**
         * Assign Permission to Viewer Role
         */
        $viewerRole = Role::whereName('viewer')->first();
        $viewerRole->givePermissionTo([
            'product-view',
        ]);

        /**
         * Assign Admin Role to Nuha Ilya
         */
        $adminUser = User::whereEmail('nuhailya@gmail.com')->first();
        $adminUser->assignRole('admin');

        /**
         * Assign Staff Role to Alia Maisarah
         */
        $staffUser = User::whereEmail('aliamaisarah@gmail.com')->first();
        $staffUser->assignRole('staff');

        /**
         * Assign Viewer Role to Anis Sofia
         */
        $viewerUser = User::whereEmail('anissofia@gmail.com')->first();
        $viewerUser->assignRole('viewer');
    }
}
