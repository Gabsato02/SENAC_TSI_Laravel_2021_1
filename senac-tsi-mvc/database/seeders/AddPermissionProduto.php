<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AddPermissionProduto extends Seeder
{
    public function run()
    {
        $permissions = ['product-list',
                        'product-create',
                        'product-edit',
                        'product-delete'];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
