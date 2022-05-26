<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function addView()
    {
        return view('schools.add');
    }

    public function add(Request $request)
    {
        School::create(['address' => $request->post('address')]);
        return $this->returnWithMessage(config('messages.add_school_success'));
    }
}
