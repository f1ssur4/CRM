<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class SchoolObserver
{
    public function created()
    {
        Cache::forget('schools');
    }
}
