<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UnsubscribeController extends Controller
{
    public function unsubscribe(
        Request $request,
        string $token
    ): View {

        $subscriber = NewsletterSubscriber::where(
            'unsubscribe_token',
            $token
        )->first();

        if (!$subscriber) {

            return view(
                'newsletter.unsubscribe',
                [
                    'success' => false,
                    'message' => 'This unsubscribe link is invalid or has expired.',
                ]
            );
        }

        $subscriber->update([
            'status' => 'unsubscribed',
            'unsubscribed_at' => now(),
        ]);

        return view(
            'newsletter.unsubscribe',
            [
                'success' => true,
                'message' => 'You have been successfully unsubscribed from the Jonny Boss newsletter.',
            ]
        );
    }
}
