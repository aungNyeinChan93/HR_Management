<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\CheckInCheckOutMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckInCheckOutJob implements ShouldQueue
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
        logger("{$this->user->name} checkIn success | " . Carbon::now() );

        Mail::to($this->user->email)->send(new CheckInCheckOutMail($this->user ,Carbon::now()));
    }
}
