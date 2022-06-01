<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLessonRequest;
use App\Jobs\ProcessLessonDelete;
use App\Jobs\ProcessLessonMail;
use App\Models\Client;
use App\Models\Lesson;
use App\Models\Statistics;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    public function index()
    {
        return view('lessons.index', ['lessons' => Lesson::all(), 'clients' => Client::getClientIdWithSub()]);
    }

    public function add(CreateLessonRequest $request)
    {
        $lesson = Lesson::create($request->validated());
        $this->startJobs($lesson);
        Statistics::updateLessonsIncrement();
        return $this->returnWithMessage(config('messages.add_lesson_success'));
    }

    public function deleteManually(Request $request)
    {
        Lesson::destroy($request->post('id'));
        Statistics::updateLessonsDecrement();
        return $this->returnWithMessage(config('messages.delete_lesson_success'));
    }

    private function startJobs($lesson)
    {
        $this->mailJob($lesson);
        $this->deleteLessonJob($lesson);
    }

    private function mailJob($lesson)
    {
//        php artisan queue:work --queue=email,deleteTask,new_subscription,default
        ProcessLessonMail::dispatch(config('messages.mail_start_lesson.mail_start_lesson'). $lesson->start_time)
            ->delay(now()->diff(Carbon::parse($lesson->start_time)->subHours(1)));
    }

    private function deleteLessonJob($lesson)
    {
        ProcessLessonDelete::dispatch($lesson->id)->delay(now()->diff(Carbon::parse($lesson->start_time)));
    }

}
