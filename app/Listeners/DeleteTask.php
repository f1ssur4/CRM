<?php

namespace App\Listeners;

use App\Events\ReadyTask;
use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteTask implements ShouldQueue
{
    use InteractsWithQueue;

    public $afterCommit = true;
    public $queue = 'deleteTask';

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
        Task::destroy($event->taskId);
    }
}
