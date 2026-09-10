<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SubscriberController extends Controller
{
    public function index(): View
    {
        $subscribers = NewsletterSubscriber::latest()
            ->paginate(20);

        return view(
            'admin.subscribers.index',
            compact('subscribers')
        );
    }

    public function show(
        NewsletterSubscriber $subscriber
    ): View {
        return view(
            'admin.subscribers.show',
            compact('subscriber')
        );
    }

    public function update(
        Request $request,
        NewsletterSubscriber $subscriber
    ): RedirectResponse {

        $validated = $request->validate([
            'status' => [
                'required',
                'in:active,unsubscribed',
            ],
        ]);

        $subscriber->update($validated);

        return back()
            ->with('success', 'Subscriber updated.');
    }

    public function destroy(
        NewsletterSubscriber $subscriber
    ): RedirectResponse {

        $subscriber->delete();

        return redirect()
            ->route('admin.subscribers.index')
            ->with('success', 'Subscriber deleted.');
    }
}
