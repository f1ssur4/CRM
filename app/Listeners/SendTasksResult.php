<?php

namespace App\Listeners;

use App\Events\ReadyTask;
use App\Mail\TasksResultMail;
use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendTasksResult implements ShouldQueue
{
    public $connection = 'database';

    public $queue = 'email';

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ReadyTask  $event
     * @return void
     */
    public function handle(ReadyTask $event)
    {
        Mail::to('example@gmail.com')->send(new TasksResultMail($event->username, Task::find($event->taskId)));
    }
}
