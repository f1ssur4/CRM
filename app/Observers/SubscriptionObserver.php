<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class SubscriptionObserver
{
    public function created()
    {
        Cache::forget('subscriptions');
    }
}
