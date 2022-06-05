<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class InstructorObserver
{
    public function created()
    {
        Cache::forget('instructors');
    }
}
