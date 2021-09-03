<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // - Super Admin
        //     - *

        // - System Manager
        //     - manage_users
        //     - manage_payment

        // - Membership Admin
        //     - membership_request
        //     -

        // - Finance Admin
        //     - manage_payment

        // - Member User
        //     - view_profile
        //     - view_payment_history

        $permissions = [
            //Super Admin
            'system-user',

            //System Manager
            'membership-approve',
            'manage-users',

            //System Manager + Finance Admin
            'manage-payment',

            //Membership Admin
            'membership-request',

            //Member User
            'view-profile',
            'view-payment-history',
            'update-profile',

            'member-activate-account',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // create roles and assign created permissions

        // this can be done as separate statements

        $role = Role::create(['name' => 'system-manager'])
            ->givePermissionTo([
                'membership-approve',
                'manage-users',
                'membership-request',
                'manage-payment',
            ]);
        $role = Role::create(['name' => 'membership-admin'])
            ->givePermissionTo([
                'membership-request',
            ]);
        $role = Role::create(['name' => 'finance-admin'])
            ->givePermissionTo([
                'manage-payment',
            ]);
        $role = Role::create(['name' => 'member-user'])
            ->givePermissionTo([
                'view-profile',
                'update-profile',
                'view-payment-history',
            ]);

        //Gets permission in the Gate::before method...
        $role = Role::create(['name' => 'super-admin']);

    }
}
