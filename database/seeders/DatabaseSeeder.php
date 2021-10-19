<?php

namespace Database\Seeders;

use App\Models\BloodGroup;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        BloodGroup::create([
            'group_name' => 'Null'
        ]);

        BloodGroup::create([
            'group_name' => 'A+'
        ]);
        BloodGroup::create([
            'group_name' => 'A-'
        ]);
        BloodGroup::create([
            'group_name' => 'B+'
        ]);
        BloodGroup::create([
            'group_name' => 'B-'
        ]);
        BloodGroup::create([
            'group_name' => 'AB+'
        ]);
        BloodGroup::create([
            'group_name' => 'AB-'
        ]);
        BloodGroup::create([
            'group_name' => 'O+'
        ]);
        BloodGroup::create([
            'group_name' => 'O-'
        ]);

        $this->call([
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
        ]);
    }
}
