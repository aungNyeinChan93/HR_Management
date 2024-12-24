<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\UserLoginMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserLoginJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        // logger("User {$this->user->name} logged in");

        logger('login !');

        // Mail::to($this->user->email)->send(new UserLoginMail($this->user));

    }
}
