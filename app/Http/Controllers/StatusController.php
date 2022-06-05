<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StatusController extends Controller
{
    public function addView()
    {
        return view('statuses.add');
    }

    public function add(Request $request)
    {
        try {
            Status::create(['title' => $request->post('title')]);
            return $this->returnWithMessage(config('messages.add_status_success'));
        }catch (\Exception $exception){
            Log::error(config('messages.add_status_error.add_status_error'), [$exception->getMessage()]);
            return $this->returnWithMessage(config('messages.add_status_error'));
        }
    }
}
