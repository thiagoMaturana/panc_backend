<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'thiago',
            'email' => 'thiago@gmail.com',
            'role' => '3',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'harry',
            'email' => 'harry@gmail.com',
            'role' => '2',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'niall',
            'email' => 'niall@gmail.com',
            'role' => '1',
            'password' => Hash::make('123456'),
        ]);
    }
}
