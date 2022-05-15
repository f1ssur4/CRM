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
        for ($i = 1; $i <= 3; $i++) {
            DB::table('users')->insert([
                'login' => 'admin' . $i,
                'password' => Hash::make('admin' . $i),
                'color' => 'color' . $i
            ]);
        };
    }
}
