<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'     => 'Admin',
                'email'    => 'admin@gmail.com',
                'role_id'  => '1',
                'address'  => 'Badda',
                'phone'    => '01941697253',
                'image'    => 'admin.png',
                'password' => Hash::make('admin'),
            ],[
                'name'     => 'user',
                'email'    => 'user@gmail.com',
                'role_id'  => '2',
                'address'  => 'Badda',
                'phone'    => '01941697253',
                'image'    => 'admin.png',
                'password' => Hash::make('user'),
            ],[
                'name'     => 'Delivery Boy',
                'email'    => 'boy@gmail.com',
                'role_id'  => '3',
                'address'  => 'Badda',
                'phone'    => '01941697253',
                'image'    => 'admin.png',
                'password' => Hash::make('boy'),
            ],
        ]);
    }
}
