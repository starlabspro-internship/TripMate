<?php

namespace App\Jobs;


use App\Mail\SosMail;
use App\Models\SosAlert;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class SendSosMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public SosAlert $sosAlert;

    public function __construct(SosAlert $sosAlert)
    {
        $this->sosAlert = $sosAlert;
    }


    public function handle(): void{
        $authorityEmail = 'tripmate73@gmail.com';

        $mail = new SosMail($this->sosAlert);

        Mail::to($authorityEmail)->send($mail);
    }
}