<?php

namespace App\Mail;

use App\Models\NewsletterCampaign;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public NewsletterCampaign $campaign;

    public function __construct(NewsletterCampaign $campaign)
    {
        $this->campaign = $campaign;
    }

    public function build()
    {
        return $this
            ->from(
                config('mail.from.address'),
                config('mail.from.name')
            )
            ->subject($this->campaign->subject)
            ->view('emails.newsletter');
    }
}
