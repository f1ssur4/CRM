<?php

namespace App\Listeners;

use App\Events\AddSubscription;
use App\Mail\NewSubscriptionMail;
use App\Mail\SendResult;
use App\Mail\TasksResultMail;
use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewSubscription implements ShouldQueue
{
    public $connection = 'database';

    public $queue = 'new_subscription';
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AddSubscription  $event
     * @return void
     */
    public function handle(AddSubscription $event)
    {
        Mail::to('example@gmail.com')->send(new NewSubscriptionMail($event->username, $event->client_name, $event->subscription));

    }
}
