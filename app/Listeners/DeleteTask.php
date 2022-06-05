<?php

namespace App\Listeners;

use App\Events\ReadyTask;
use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use MongoDB\Driver\Exception\ExecutionTimeoutException;

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
        try {
            Task::destroy($event->taskId);
        }catch (\Exception $e){
            Log::error(config('messages.error_autodestroy_task.error_autodestroy_task'), [$e->getMessage()]);
        }
    }
}
