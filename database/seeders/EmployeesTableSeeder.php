<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('employees')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('employees')->insert([
          'Name' => 'Abdenacer BENCHRIFA',
          'Email' => 'a.benchrifa@mascir.com',
        ]);

        DB::table('employees')->insert([
          'Name' => 'ABU SHELEIH SAID',
          'Email' => 's.abusheleih@mascir.com',
        ]);

        DB::table('employees')->insert([
            'Name' => 'ZARI NADIA',
            'Email' => 'n.zari@mascir.com',
        ]);

        DB::table('employees')->insert([
            'Name' => 'Walid Ziad',
            'Email' => 'w.ziad@mascir.ma',
        ]);

        DB::table('employees')->insert([
          'Name' => 'Hamza ABOUFATAMA',
          'Email' => 'hamzaaboufatama07@gmail.com',
      ]);

      }
}
