<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class NewsletterController extends Controller
{
    public function subscribe(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],

            'email' => [
                'required',
                'email',
                'max:255',
            ],
        ]);

        NewsletterSubscriber::updateOrCreate(
            [
                'email' => $validated['email'],
            ],
            [
                'name' => $validated['name'] ?? null,
                'status' => 'active',
                'subscribed_at' => now(),
                'unsubscribed_at' => null,
            ]
        );

        return back()->with(
            'success',
            'You are now subscribed to Jonny Boss updates.'
        );
    }
}
