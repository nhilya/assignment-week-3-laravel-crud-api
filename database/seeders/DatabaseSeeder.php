<?php

namespace Database\Seeders;

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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Reset cached roles and permissions (using this method as I wanna just run migrate:fresh --seed command without running cache:clear command)
        // app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /**
         * Move RolePermissionSeeder to a new dedicated seeder files for granular control, readability, and maintainability
         */
        $this->call([
            ProductSeeder::class,
            RolePermissionSeeder::class,
        ]);
    }
}
