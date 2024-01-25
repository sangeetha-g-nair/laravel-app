<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([

            'name' => 'Super Admin', 

            'email' => 'sadmin@gmail.com',

            'password' => bcrypt('123456')

        ]);

        $role = Role::create(['name' => 'Super Admin']);
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
