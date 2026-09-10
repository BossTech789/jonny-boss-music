<?php

namespace App\Mail;

use App\Models\NewsletterCampaign;
use App\Models\NewsletterSubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterCampaignMail extends Mailable
{
    use Queueable, SerializesModels;

    public NewsletterCampaign $campaign;
    public NewsletterSubscriber $subscriber;

    public function __construct(
        NewsletterCampaign $campaign,
        NewsletterSubscriber $subscriber
    ) {
        $this->campaign = $campaign;
        $this->subscriber = $subscriber;
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
