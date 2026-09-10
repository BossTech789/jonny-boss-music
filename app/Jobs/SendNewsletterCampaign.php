<?php

namespace App\Jobs;

use App\Mail\NewsletterCampaignMail;
use App\Models\NewsletterCampaign;
use App\Models\NewsletterSubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendNewsletterCampaign implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public NewsletterCampaign $campaign
    ) {
    }

    public function handle(): void
    {
        $this->campaign->update([
            'status' => 'sending',
            'recipients_count' => 0,
        ]);

        $sentCount = 0;

        $subscribers = NewsletterSubscriber::where(
            'status',
            'active'
        )
        ->whereNotNull('email')
        ->get();

        foreach ($subscribers as $subscriber) {

            try {

                Mail::to($subscriber->email)->send(
                    new NewsletterCampaignMail(
                        $this->campaign,
                        $subscriber
                    )
                );

                $sentCount++;

                $this->campaign->update([
                    'recipients_count' => $sentCount,
                ]);

            } catch (Throwable $exception) {

                Log::error('Newsletter email failed', [
                    'campaign_id' => $this->campaign->id,
                    'subscriber_id' => $subscriber->id,
                    'email' => $subscriber->email,
                    'error' => $exception->getMessage(),
                ]);

                continue;
            }
        }

        $this->campaign->update([
            'status' => 'sent',
            'recipients_count' => $sentCount,
            'sent_at' => now(),
        ]);
    }

    public function failed(Throwable $exception): void
    {
        $this->campaign->update([
            'status' => 'failed',
        ]);

        Log::error('Newsletter campaign job failed', [
            'campaign_id' => $this->campaign->id,
            'error' => $exception->getMessage(),
        ]);
    }
}
