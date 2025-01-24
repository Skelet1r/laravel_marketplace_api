<?php

namespace App\Jobs;

use App\Mail\DeliveredNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;

class SendEmails implements ShouldQueue
{
    use Queueable;
    /**
     * Create a new job instance.
     */

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new DeliveredNotification($this->user));
    }
}
