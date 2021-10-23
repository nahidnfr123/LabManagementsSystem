<?php

namespace Database\Seeders;

use App\Models\BloodGroup;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('admin@gmail.com'),
            'dob' => '1996-08-21',
            'phone' => '01857823870',
            'blood_groups_id' => 1,
            'gender' => 'male',
            'avatar' => '/storage/user_data/admin/Admin.gif',
            'created_at' => Carbon::now()
        ]);
        $user->assignRole(['admin']);


        $users = User::factory(3)->create();
        foreach ($users as $user) {
            $user->assignRole(['patient']);
        }


        $user = User::create([
            'name' => 'Admin User',
            'email' => 'sohel@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('sohel@gmail.com'),
            'dob' => '1996-08-21',
            'phone' => '0122334454',
            'blood_groups_id' => 1,
            'gender' => 'male',
            'avatar' => '/storage/user_data/admin/Admin.gif',
            'created_at' => Carbon::now()
        ]);
        $user->assignRole(['admin']);

    }
}
