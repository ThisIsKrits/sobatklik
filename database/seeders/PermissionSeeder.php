<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            "fullname" => "superadmin",
            "email" => "superadmin@example.com",
            "phone" => '0892132456789',
            "birthdate" => "2002-02-02",
            "password" => Hash::make('password'),
        ]);

        $user2 = User::create([
            "fullname" => "admin",
            "email" => "admin@example.com",
            "phone" => '0892132456789',
            "birthdate" => "2002-02-02",
            "password" => Hash::make('password'),
        ]);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $arrayOfPermissionNames = [
            'phone-index',
            'phone-create',
            'phone-edit',
            'phone-delete',
            'report-index',
            'report-create',
            'report-edit',
            'report-delete',
            'customer-index',
            'customer-create',
            'customer-edit',
            'customer-delete',
            'setting-index',
            'setting-create',
            'setting-edit',
            'setting-delete',
            'master-index',
            'master-create',
            'master-edit',
            'master-delete',
            'user-index',
            'user-create',
            'user-edit',
            'user-delete',
            'log-index',
            'log-create',
            'log-edit',
            'log-delete',
            'profile-index',
            'profile-create',
            'profile-edit',
            'profile-delete',
        ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());

        $role = Role::create(['name' => 'superadmin'])
            ->givePermissionTo([
                'phone-index',
                'phone-create',
                'phone-edit',
                'phone-delete',
                'report-index',
                'report-create',
                'report-edit',
                'report-delete',
                'customer-index',
                'customer-create',
                'customer-edit',
                'customer-delete',
                'setting-index',
                'setting-create',
                'setting-edit',
                'setting-delete',
                'master-index',
                'master-create',
                'master-edit',
                'master-delete',
                'user-index',
                'user-create',
                'user-edit',
                'user-delete',
                'log-index',
                'log-create',
                'log-edit',
                'log-delete',
                'profile-index',
                'profile-create',
                'profile-edit',
                'profile-delete',
            ]);

            $role = Role::create(['name' => 'admin']);
            $role = Role::create(['name' => 'customer']);

            $user1 = $user1->fresh();
            $user1->syncRoles(['superadmin']);

    }
}
