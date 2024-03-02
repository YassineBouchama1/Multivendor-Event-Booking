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

        // Permissions for managing event
        Permission::create(['name' => 'create event']); // For  admin / organizer
        Permission::create(['name' => 'edit event']); // For  admin / organizer
        Permission::create(['name' => 'delete event']); // For  admin / organizer
        Permission::create(['name' => 'read event']); // For  admin /organizer

        // Permissions for managing categories
        Permission::create(['name' => 'create categories']); // For  admin
        Permission::create(['name' => 'edit categories']); // For  admin
        Permission::create(['name' => 'delete categories']); // For  admin
        Permission::create(['name' => 'read categories']); // For  admin



        // Permissions for managing users
        Permission::create(['name' => 'create users']); // For admin
        Permission::create(['name' => 'edit users']); // For admin
        Permission::create(['name' => 'delete users']); // For admin
        Permission::create(['name' => 'read users']); // For admin

        // Permissions for managing reservation
        Permission::create(['name' => 'create reservation']); // For user
        Permission::create(['name' => 'edit reservation']); // For user
        Permission::create(['name' => 'delete reservation']); // For user
        Permission::create(['name' => 'read reservation']); // For user



        //2- assign relevant permissions & create roles

        // Create admin role and assign all permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->syncPermissions(Permission::all());


        // creste role user
        $userRole = Role::create(['name' => 'user']);
        $userRole->syncPermissions([
            'create reservation',
            'edit reservation',
            'delete reservation',
            'read reservation',
        ]);
        // creste role organizer
        $organizerRole = Role::create(['name' => 'organizer']);
        $organizerRole->syncPermissions([
            'create event',
            'edit event',
            'delete event',
            'read event',
            'edit reservation',
            'read reservation',
        ]);
    }
}
