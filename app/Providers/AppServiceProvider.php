<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Http\View\Composers\ChannelsComposer;
use App\Models\Channel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {

            if (request()->has('credit')) {
                return new CreditPaymentGateway('euro');
            }
            return new BankPaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // 1- all
       // View::share('channels', Channel::orderBy('name')->get());

        // 2- only specific blade template
/*        View::composer(['post.*','channel.index'],function ($view){
            $view->with('channels', Channel::orderBy('name')->get());
        });*/

// 3 - the best solution
      //  View::composer(['post.*','channel.index'],ChannelsComposer::class);
        View::composer('partials.channels.*',ChannelsComposer::class);

    }
}
