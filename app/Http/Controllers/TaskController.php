<?php

namespace App\Http\Controllers;

use App\Events\ReadyTask;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index', ['tasks' => Task::all()]);
    }

    public function formCreate(UserController $controller)
    {
        return view('tasks.create-form', ['users' => $controller->getUsersList(new User())]);
    }

    public function delete($id)
    {
        Task::where('id', $id)->delete();
    }

    public function create(TaskRequest $taskRequest)
    {
        return $taskRequest->validated()
            ? $this->save($taskRequest)
            : $this->returnWithMessage(config('messages.create_task_error'));
    }

    public function ready(Request $request)
    {
        //php artisan queue:work --queue=email,deleteTask
        ReadyTask::dispatch($request->post('id'), $request->user()->login);
        return $this->returnWithMessage();
    }

    private function save(TaskRequest $taskRequest)
    {
        return Task::create($taskRequest->validated())
            ? $this->returnWithMessage(config('messages.create_task_success'))
            : $this->returnWithMessage(config('messages.create_task_error'));
    }
}
