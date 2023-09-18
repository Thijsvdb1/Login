<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Thijs van den Berg',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);
        // Hier word de ADMIN user aangemaakt door een seeder

        $role = Role::create(['name' => 'Admin']); // hier krijgt hij de rol Admin mee

        $permissions = Permission::pluck('id','id')->all(); // hier krijgt hij alle permissions mee

        $role->syncPermissions($permissions); // ?

        $user->assignRole([$role->id]);  // ?
    }
}
