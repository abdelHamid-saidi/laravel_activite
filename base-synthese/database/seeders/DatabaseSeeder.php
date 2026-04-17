<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'saidiabdelhamid.office@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $adminRole = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'manage notes']);

        $adminRole->givePermissionTo($permission);

        $user = User::factory()->create([
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('admin');
    }
}
