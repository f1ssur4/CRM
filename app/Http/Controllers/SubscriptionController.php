<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function addView()
    {
        return view('subscription.add');
    }

    public function add(SubscriptionRequest $request)
    {
        Subscription::create($request->validated());
        return $this->returnWithMessage(config('messages.add_subscription_success'));
    }

}
