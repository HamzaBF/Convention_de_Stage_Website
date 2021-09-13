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
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]);

            // Encadrant

            DB::table('users')->insert([
                'name' => 'Abdenacer BENCHRIFA',
                'email' => 'a.benchrifa@mascir.com',
                'role' => 'encadrant',
                'password' => Hash::make('password'),
            ]);

            DB::table('users')->insert([
                'name' => 'ZARI NADIA',
                'email' => 'n.zari@mascir.com',
                'role' => 'encadrant',
                'password' => Hash::make('password'),
            ]);

            // RH

            DB::table('users')->insert([
                'name' => 'aida FATHI',
                'email' => 'a.fathi@gmail.com',
                'role' => 'RH',
                'password' => Hash::make('password'),
            ]);
    }
}
