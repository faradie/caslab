<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(['name' => 'view exam']);
        Permission::create(['name' => 'add exam']);
        Permission::create(['name' => 'edit exam']);
        Permission::create(['name' => 'delete exam']);
        Permission::create(['name' => 'report exam']);
        Permission::create(['name' => 'do exam']);
        Permission::create(['name' => 'view report']);
        Permission::create(['name' => 'acc caslab']);
        Permission::create(['name' => 'viewMyReport']);
        Permission::create(['name' => 'view caslab']);

        $role = Role::create(['name' => 'admin']);
        $role -> givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'caslab'])
        ->givePermissionTo(['view exam', 'do exam','viewMyReport']);

        $role = Role::create(['name' => 'asisten'])
        ->givePermissionTo(['view exam','report exam','view report','acc caslab']);
    }
}
