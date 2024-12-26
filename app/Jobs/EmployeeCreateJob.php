<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\EmployeeCreateMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmployeeCreateJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Execute the job.
     */ 
    public function handle(): void
    {
        //
        logger("created employee = {$this->user->name}");
        Mail::to($this->user->email)->send(new EmployeeCreateMail($this->user));
    }
}
