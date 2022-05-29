<?php

namespace App\Listeners;

use App\Models\Statistic;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class UpdateStatisticSubscriptionsIncome
{
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Statistic::updateSubscriptions();
        Statistic::updateIncome($event->subscription[0]->price);
    }
}
