<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create articles']);
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);    

        $contributor = Role::create(['name' => 'contributor']);
        $contributor->givePermissionTo('create articles');
        $contributor->givePermissionTo('edit articles');
        $contributor->givePermissionTo('delete articles');

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo(['publish articles']);
        $editor->givePermissionTo(['unpublish articles']);
        $editor->givePermissionTo(['delete articles']);

        $user = Role::create(['name' => 'user']);
        $supa_admin = Role::create(['name' => 'Supa-Admin']);

        $admin = User::create([
            'name' => 'supa admin',
            'email' => 'admin@localhost',
            'password' => Hash::make('admin123'),
        ]);

        $admin->assignRole($supa_admin);
    }
}
