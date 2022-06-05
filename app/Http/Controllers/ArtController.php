<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtRequest;
use App\Models\Art;
use App\Models\Instructor;
use App\Models\School;
use Illuminate\Support\Facades\Log;

class ArtController extends Controller
{
    public function index()
    {
        Log::info('Showing all arts');
        return view('arts.index', ['arts' => Art::getAll()]);
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
        try {
            Art::create($request->post());
            return $this->returnWithMessage(config('messages.add_art_success'));
        }catch (\Exception $exception){
            Log::error(config('messages.add_art_error.add_art_error'), [$exception->getMessage()]);
            return $this->returnWithMessage(config('messages.add_art_error'));
        }
    }
}
