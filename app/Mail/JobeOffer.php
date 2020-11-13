<?php

namespace App\Mail;


use App\JobeOfferData;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobeOffer extends Mailable
{
    use Queueable, SerializesModels;


    public $jobe;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(JobeOfferData $jobe)
    {
        $this->jobe = $jobe;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hafidport@crmef.website')
                    ->view('emails.jobeoffer');
    }
}
