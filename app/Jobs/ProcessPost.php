<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuuminate\Support\Facades\Log;

class ProcessPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     * 
     *
     */

     protected $post;
    public function __construct($post)
    {
        //
        $this->post=$post;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Lomg::info($this->post);
    }

    public function failed(){


        Log::emergency('FAILED JOB!!!!!!');
    }
}
