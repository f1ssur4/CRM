<?php

namespace App\Mail;

use App\Models\Task;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendResult extends Mailable
{
    use Queueable, SerializesModels;

    protected $username;
    protected $task;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $task)
    {
        $this->username = $username;
        $this->task = $task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        sleep(5);
        return $this->view('mail.result-mail', ['username' => $this->username, 'task' => $this->task]);
    }
}
