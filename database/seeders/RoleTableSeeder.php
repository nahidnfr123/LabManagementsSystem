<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);

        foreach (\Spatie\Permission\Models\Permission::all() as $permission) {
            $adminRole->givePermissionTo($permission->name);
        }

        Role::create(['name' => 'patient']);
        Role::create(['name' => 'staff']);
        Role::create(['name' => 'laboratorian']);
    }
}
