<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Helpers\Helper;

class SendSMSJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $phoneNumber;
    protected $message;
    protected $subject;

    public function __construct($phoneNumber, $message, $subject)
    {
        $this->phoneNumber = $phoneNumber;
        $this->message = $message;
        $this->subject = $subject;
    }

    public function handle()
    {
       
        Helper::sendMessage($this->phoneNumber, $this->message, $this->subject);
    }
}
