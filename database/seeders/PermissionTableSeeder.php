<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'product-list',
           'product-create',
           'product-edit',
           'product-delete'
        ];
            // hier heb je alle permission namen

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
        // Hier worden de Permissions aangemaakt en door de seeder inde database gedaan
        //  en in de controller word aangegeven wat deze permissions mogen doen/ waar ze mogen komen
    }
}
