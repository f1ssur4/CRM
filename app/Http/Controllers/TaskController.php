<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function get()
    {
        $tasks = Task::all();
        return view('tasks', ['tasks' => $tasks]);
    }

    public function create(TaskRequest $taskRequest)
    {
        return $taskRequest->validated()
            ? $this->save($taskRequest)
            : $this->redirectWithError(config('messages.create_task_error'));
    }

    private function redirectWithError($message)
    {
        return back()->withErrors($message);
    }

    private function redirectWithSuccess($message)
    {
        return back()->withErrors($message);
    }

    private function save(TaskRequest $taskRequest)
    {
        return Task::create($taskRequest->validated())
            ? $this->redirectWithSuccess(config('messages.create_task_success'))
            : $this->redirectWithError(config('messages.create_task_error'));
    }
}
