<?php

namespace Database\Seeders;

use App\Models\Art;
use App\Models\Client;
use App\Models\ClientSubscription;
use App\Models\Instructor;
use App\Models\Lesson;
use App\Models\School;
use App\Models\Status;
use App\Models\Task;
use App\Models\Teacher;
use App\Models\User;
use Database\Factories\ClientSubscriptionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Task::factory(6)->create();
        Status::factory(4)->create();
        School::factory(3)->create();
        Art::factory(10)->create();
        Instructor::factory(15)->create();
        Client::factory(30)->create();
        Lesson::factory(3)->create();
        $this->call([UserSeeder::class]);
        $this->call([SubscriptionSeeder::class]);
        ClientSubscription::factory(50)->create();
    }
}
