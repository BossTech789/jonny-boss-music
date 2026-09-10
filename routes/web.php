<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SmartLinkController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\UnsubscribeController;


use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MusicController as AdminMusicController;
use App\Http\Controllers\Admin\VideoController as AdminVideoController;
use App\Http\Controllers\Admin\SmartLinkController as AdminSmartLinkController;
use App\Http\Controllers\Admin\HeroController as AdminHeroController;
use App\Http\Controllers\Admin\NewsletterController as AdminNewsletterController;
use App\Http\Controllers\Admin\SubscriberController as AdminSubscriberController;
use App\Http\Controllers\Admin\SocialLinkController as AdminSocialLinkController;
use App\Http\Controllers\Admin\SiteSettingController as AdminSiteSettingController;


/*
|--------------------------------------------------------------------------
| PUBLIC WEBSITE
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


/*
|--------------------------------------------------------------------------
| PUBLIC MUSIC
|--------------------------------------------------------------------------
*/

Route::get('/music', [MusicController::class, 'index'])
    ->name('music');


/*
|--------------------------------------------------------------------------
| PUBLIC VIDEOS
|--------------------------------------------------------------------------
*/

Route::get('/video', [VideoController::class, 'index'])
    ->name('video');


/*
|--------------------------------------------------------------------------
| SMART LINKS
|--------------------------------------------------------------------------
*/

Route::get('/listen/{smartLink:slug}', [
    SmartLinkController::class,
    'show'
])->name('smart-links.show');


/*
|--------------------------------------------------------------------------
| NEWSLETTER SUBSCRIPTION
|--------------------------------------------------------------------------
*/

Route::post('/subscribe', [
    NewsletterController::class,
    'subscribe'
])->name('subscribe');

Route::get(
    '/unsubscribe/{token}',
    [UnsubscribeController::class, 'unsubscribe']
)->name('newsletter.unsubscribe');

Route::get('/email', function () {

    Mail::raw(
        'This is a email from the Jonny Boss website.',
        function ($message) {
            $message
                ->to('jonnyboss.bookings@gmail.com')
                ->subject('Jonny Boss Email');
        }
    );

    return 'Email sent successfully.';
});




/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [
            AdminDashboardController::class,
            'index'
        ])->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | MUSIC
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'music',
            AdminMusicController::class
        );


        /*
        |--------------------------------------------------------------------------
        | VIDEOS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'videos',
            AdminVideoController::class
        );


        /*
        |--------------------------------------------------------------------------
        | SMART LINKS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'smart-links',
            AdminSmartLinkController::class
        );


        /*
        |--------------------------------------------------------------------------
        | HERO
        |--------------------------------------------------------------------------
        */

        Route::get('/hero/edit', [
            AdminHeroController::class,
            'edit'
        ])->name('hero.edit');

        Route::put('/hero', [
            AdminHeroController::class,
            'update'
        ])->name('hero.update');


       /*
|--------------------------------------------------------------------------
| NEWSLETTERS
|--------------------------------------------------------------------------
*/

Route::resource(
    'newsletters',
    AdminNewsletterController::class
);

Route::post(
    '/newsletters/{newsletter}/send',
    [AdminNewsletterController::class, 'send']
)->name('newsletters.send');

        /*
        |--------------------------------------------------------------------------
        | SUBSCRIBERS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'subscribers',
            AdminSubscriberController::class
        )->only([
            'index'
        ]);


        Route::get('/subscribers/{subscriber}', [
    AdminSubscriberController::class,
    'show'
])->name('subscribers.show');

        /*
        |--------------------------------------------------------------------------
        | SOCIAL LINKS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'social-links',
            AdminSocialLinkController::class
        )->except([
            'create',
            'index'
        ]);


        /*
        |--------------------------------------------------------------------------
        | SETTINGS
        |--------------------------------------------------------------------------
        */

        Route::get('/settings', [
            AdminSiteSettingController::class,
            'edit'
        ])->name('settings.edit');

        Route::put('/settings', [
            AdminSiteSettingController::class,
            'update'
        ])->name('settings.update');

    });
