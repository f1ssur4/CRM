<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class ArtObserver
{
    public function created()
    {
        Cache::forget('arts');
    }
}
