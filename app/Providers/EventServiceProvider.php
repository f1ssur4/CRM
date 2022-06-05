<?php

namespace App\Providers;

use App\Events\AddSubscription;
use App\Events\ReadyTask;
use App\Listeners\SendMailNewSubscription;
use App\Listeners\DeleteTask;
use App\Listeners\SendTasksResult;
use App\Listeners\UpdateStatisticSubscriptionsIncome;
use App\Models\Art;
use App\Models\Instructor;
use App\Models\School;
use App\Models\Subscription;
use App\Observers\ArtObserver;
use App\Observers\InstructorObserver;
use App\Observers\SchoolObserver;
use App\Observers\SubscriptionObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ReadyTask::class => [
            SendTasksResult::class,
            DeleteTask::class
        ],
        AddSubscription::class => [
            SendMailNewSubscription::class,
            UpdateStatisticSubscriptionsIncome::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Art::observe(ArtObserver::class);
        Instructor::observe(InstructorObserver::class);
        School::observe(SchoolObserver::class);
        Subscription::observe(SubscriptionObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
