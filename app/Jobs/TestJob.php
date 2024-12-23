<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TestJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public string $name)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        logger('TestJob is running with name: ' . $this->name);
    }
}
