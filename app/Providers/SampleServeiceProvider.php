<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SampleServeiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('serviceProviderTest',function(){
            return 'サービスプロバイダが登録されているかのテスト';

        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
