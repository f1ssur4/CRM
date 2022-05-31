<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstructorUpdateRequest;
use App\Http\Requests\InstructorRequest;
use App\Models\Art;
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

    public function update(InstructorUpdateRequest $request)
    {
        Instructor::edit($request->validated());
        return $this->returnWithMessage(config('messages.update_client_success'));
    }

    public function addView()
    {
        return view('instructors.add', ['arts' => Art::all()]);
    }

    public function add(InstructorRequest $request)
    {
        Instructor::create($request->validated());
        return $this->returnWithMessage(config('messages.add_instructor_success'));
    }
}
