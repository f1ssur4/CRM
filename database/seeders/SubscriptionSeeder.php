<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            'title' => 'individual',
            'minutes' => 45,
            'count_lessons' => 4,
            'price' => 2000
        ]);
        DB::table('subscriptions')->insert([
            'title' => 'group',
            'minutes' => 45,
            'count_lessons' => 4,
            'price' => 1000
        ]);
        DB::table('subscriptions')->insert([
            'title' => 'individual',
            'minutes' => 60,
            'count_lessons' => 4,
            'price' => 2500
        ]);
        DB::table('subscriptions')->insert([
            'title' => 'group',
            'minutes' => 60,
            'count_lessons' => 4,
            'price' => 1250
        ]);
        DB::table('subscriptions')->insert([
            'title' => 'individual',
            'minutes' => 45,
            'count_lessons' => 8,
            'price' => 4000
        ]);
        DB::table('subscriptions')->insert([
            'title' => 'group',
            'minutes' => 45,
            'count_lessons' => 8,
            'price' => 2000
        ]);
        DB::table('subscriptions')->insert([
            'title' => 'individual',
            'minutes' => 60,
            'count_lessons' => 8,
            'price' => 5000
        ]);
        DB::table('subscriptions')->insert([
            'title' => 'group',
            'minutes' => 60,
            'count_lessons' => 8,
            'price' => 2500
        ]);
    }
}
