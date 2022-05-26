<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\School;
use App\Models\Status;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        return view('info', [
            'arts' => Art::all(),
            'schools' => School::all(),
            'statuses' => Status::all(),
            'subscriptions' => Subscription::all(),
            'users' => User::all()
        ]);
    }
}
