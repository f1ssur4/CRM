<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLessonRequest;
use App\Models\Client;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        return view('lessons.index', ['lessons' => Lesson::all(), 'clients' => Client::all()]);
    }

    public function add(CreateLessonRequest $request)
    {
        $lesson = Lesson::create($request->validated());
        return $this->returnWithMessage(config('messages.add_lesson_success'));
    }

    public function delete(Request $request)
    {
        Lesson::destroy($request->post('id'));
        return back();
    }

    private function startJob()
    {
        //создать ивент -> 2 слушателя, первый: отправка уведомления клиенту за час до урока, второй: удаление урока во время его начала
    }

}
