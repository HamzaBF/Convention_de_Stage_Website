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

            // DB::table('users')->insert([
            //     'name' => 'Abdenacer BENCHRIFA',
            //     'email' => 'a.benchrifa@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'ZARI NADIA',
            //     'email' => 'n.zari@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza 1',
            //     'email' => 'hamza1@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);
            
            // DB::table('users')->insert([
            //     'name' => 'hamza 2',
            //     'email' => 'hamza2@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza 3',
            //     'email' => 'hamza3@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza 4',
            //     'email' => 'hamza4@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza 5',
            //     'email' => 'hamza5@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza6',
            //     'email' => 'hamza6@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza 7',
            //     'email' => 'hamza7@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza8',
            //     'email' => 'hamza8@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza 9',
            //     'email' => 'hamza9@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza 10',
            //     'email' => 'hamza10@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza 11',
            //     'email' => 'hamza 11',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza 12',
            //     'email' => 'hamza12@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza 13',
            //     'email' => 'hamza13@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza 14',
            //     'email' => 'hamza14@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza 15',
            //     'email' => 'hamza15@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza 16',
            //     'email' => 'hamza16@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // DB::table('users')->insert([
            //     'name' => 'hamza 17',
            //     'email' => 'hamza17@mascir.com',
            //     'role' => 'encadrant',
            //     'password' => Hash::make('password'),
            // ]);

            // RH

            DB::table('users')->insert([
                'name' => 'aida FATHI',
                'email' => 'a.fathi@gmail.com',
                'role' => 'RH',
                'password' => Hash::make('password'),
            ]);
    }
}
