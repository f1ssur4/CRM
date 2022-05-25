<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstructorRequest;
use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index()
    {
        return view('instructors.index', ['instructors' => Instructor::all()]);
    }

    public function show($id)
    {
        return view('instructors.show', [
            'instructor' => Instructor::findOrFail($id),
        ]);
    }

    public function update(InstructorRequest $request)
    {
        Instructor::edit($request->validated());
        return $this->returnWithMessage(config('messages.update_client_success'));
    }

    private function returnWithMessage($message = null)
    {
        return back()->withErrors($message);
    }
}
