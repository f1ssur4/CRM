<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Instructor;
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

    public function create()
    {
        return view('arts.create');
    }
}
