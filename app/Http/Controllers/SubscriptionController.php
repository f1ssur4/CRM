<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubscriptionController extends Controller
{
    public function addView()
    {
        return view('subscription.add');
    }

    public function add(SubscriptionRequest $request)
    {
        try {
            Subscription::create($request->validated());
            return $this->returnWithMessage(config('messages.add_subscription_success'));
        }catch (\Exception $exception){
            Log::error(config('messages.add_subscription_error.add_subscription_error'), [$exception->getMessage()]);
            return $this->returnWithMessage(config('messages.add_subscription_error'));
        }
    }

}
