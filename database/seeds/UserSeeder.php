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
        //ADMINISTRADOR
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => '3',
            'password' => Hash::make('123456'),
        ]);

        //COMITÊ
        DB::table('users')->insert([
            'name' => 'comite',
            'email' => 'comite@gmail.com',
            'role' => '2',
            'password' => Hash::make('123456'),
        ]);

        //USUÁRIO COMUM
        DB::table('users')->insert([
            'name' => 'usuario',
            'email' => 'usuario@gmail.com',
            'role' => '1',
            'password' => Hash::make('123456'),
        ]);
    }
}
