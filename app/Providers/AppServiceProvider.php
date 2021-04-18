<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        Schema::defaultStringLength(191);
       
        $charts->register([
            \App\Charts\StockChart::class
        ]);
        
        Paginator::useBootstrap();
        // Override the email notification for verifying email
        VerifyEmail::toMailUsing(function ($notifiable) {
            $verifyUrl = URL::temporarySignedRoute('verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 10)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification())
                ]
            );

            return (new MailMessage)
                ->subject(Lang::get('Verify Your Email Address'))
                ->markdown('emails.verify-email', ["url" => $verifyUrl, 'user' => $notifiable]);
        });
    }
}
