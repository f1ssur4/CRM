<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewSubscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    private $username;
    private $client_name;
    private $subscription;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $client_name, $subscription)
    {
        $this->username = $username;
        $this->client_name = $client_name;
        $this->subscription = $subscription;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.new-subscription', [
            'username' => $this->username,
            'client_name' => $this->client_name,
            'subscription' => $this->subscription
        ]);
    }
}
