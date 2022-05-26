<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function addView()
    {
        return view('statuses.add');
    }

    public function add(Request $request)
    {
        Status::create(['title' => $request->post('title')]);
        return $this->returnWithMessage(config('messages.add_status_success'));
    }
}
