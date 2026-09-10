<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendNewsletterCampaign;
use App\Models\NewsletterCampaign;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NewsletterController extends Controller
{
    public function index(): View
    {
        $campaigns = NewsletterCampaign::latest()
            ->paginate(10);

        return view(
            'admin.newsletters.index',
            compact('campaigns')
        );
    }

    public function create(): View
    {
        return view('admin.newsletters.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'subject' => [
                'required',
                'string',
                'max:255',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'content' => [
                'required',
                'string',
            ],
        ]);

        NewsletterCampaign::create($validated);

        return redirect()
            ->route('admin.newsletters.index')
            ->with(
                'success',
                'Newsletter campaign created.'
            );
    }

    public function edit(
        NewsletterCampaign $newsletter
    ): View {
        return view(
            'admin.newsletters.edit',
            compact('newsletter')
        );
    }

    public function update(
        Request $request,
        NewsletterCampaign $newsletter
    ): RedirectResponse {

        $validated = $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $newsletter->update($validated);

        return redirect()
            ->route('admin.newsletters.index')
            ->with(
                'success',
                'Newsletter updated.'
            );
    }


    /**
     * Send newsletter to all active subscribers.
     */
    public function send(
        NewsletterCampaign $newsletter
    ): RedirectResponse {

        if ($newsletter->status !== 'draft') {

            return redirect()
                ->route('admin.newsletters.index')
                ->with(
                    'error',
                    'Only draft newsletters can be sent.'
                );
        }

        SendNewsletterCampaign::dispatch($newsletter);

        return redirect()
            ->route('admin.newsletters.index')
            ->with(
                'success',
                'Newsletter has been queued for sending.'
            );
    }


    public function destroy(
        NewsletterCampaign $newsletter
    ): RedirectResponse {

        $newsletter->delete();

        return redirect()
            ->route('admin.newsletters.index')
            ->with(
                'success',
                'Newsletter deleted.'
            );
    }
}
