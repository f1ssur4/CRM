<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SchoolController extends Controller
{
    public function addView()
    {
        return view('schools.add');
    }

    public function add(Request $request)
    {
        try {
            School::create(['address' => $request->post('address')]);
            return $this->returnWithMessage(config('messages.add_school_success'));
        }catch (\Exception $exception){
            Log::error(config('messages.add_school_error.add_school_error'), [$exception->getMessage()]);
            return $this->returnWithMessage(config('messages.add_school_error'));
        }
    }
}
