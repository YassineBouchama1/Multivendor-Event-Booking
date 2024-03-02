<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //1- create permissions

        // Permissions for managing Assosiations
        Permission::create(['name' => 'create association']); // For Super admin
        Permission::create(['name' => 'edit association']); // For Super admin
        Permission::create(['name' => 'delete association']); // For Super admin
        Permission::create(['name' => 'read association']); // For Super admin

        // Permissions for managing Operatores
        Permission::create(['name' => 'create operator']); // For Super admin
        Permission::create(['name' => 'edit operator']); // For Super admin
        Permission::create(['name' => 'delete operator']); // For Super admin
        Permission::create(['name' => 'read operator']); // For Super admin



        // Permissions for managing Cases
        Permission::create(['name' => 'create case']); // For association Operator
        Permission::create(['name' => 'edit case']); // For association Operator
        Permission::create(['name' => 'delete case']); // For association Operator
        Permission::create(['name' => 'read case']); // For association Operator



        //2- assign relevant permissions & create roles

        // Create admin role and assign all permissions
        $adminRole = Role::create(['name' => 'super admin']);
        $adminRole->syncPermissions(Permission::all());


        // creste role user
        $adminRole = Role::create(['name' => 'user']);
        // $adminRole->syncPermissions(Permission::all());

        // Create restaurant owner role and assign relevant permissions
        // $restaurantOwnerRole = Role::create(['name' => 'restaurant owner']);
        // $restaurantOwnerRole->syncPermissions([
        //     'create menu',
        //     'edit menu',
        //     'delete menu',
        //     'select subscription plan',
        //     'manage restaurant information',
        //     'manage operators'
        // ]);

        // Create operator role and assign permissions for managing menus
        // $operatorRole = Role::create(['name' => 'operator']);
        // $operatorRole->syncPermissions([
        //     'create menu',
        //     'edit menu',
        //     'delete menu'
        // ]);
    }
}
