<?php

namespace App\Jobs;

use App\Mail\sendEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class JobMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $senderemail;
    private $content;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $senderemail, $content)
    {
        $this->senderemail = $senderemail;
        $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(new sendEmail($this->senderemail,$this->content));
    }
}
