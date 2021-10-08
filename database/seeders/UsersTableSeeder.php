<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // Admin
            DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
            DB::table('users')->insert([
                'name' => 'super Admin',
                'email' => 'hamzaaboufatama@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]);

            // Encadrant

            // RH

            DB::table('users')->insert([
                'name' => 'aida FATHI',
                'email' => 'a.fathi@gmail.com',
                'role' => 'RH',
                'password' => Hash::make('password'),
            ]);
    }
}
