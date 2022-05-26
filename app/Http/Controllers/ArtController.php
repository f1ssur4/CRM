<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtRequest;
use App\Models\Art;
use App\Models\Instructor;
use App\Models\School;
use Illuminate\Http\Request;

class ArtController extends Controller
{
    public function index()
    {
        return view('arts.index', ['arts' => Art::all()]);
    }

    public function show($id)
    {
        return view('arts.show', ['art' => Art::findOrFail($id), 'instructors' => Instructor::where('art_id', $id)->get()]);
    }

    public function addView()
    {
        return view('arts.add', ['schools' => School::all()]);
    }

    public function add(ArtRequest $request)
    {
        Art::create($request->validated());
        return $this->returnWithMessage(config('messages.add_art_success'));
    }
}
