<?php

namespace App\Providers;

use App\Models\settings;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        if(!app()->runningInConsole()){
            $setting=settings::firstOr(function(){

                return settings::create([
                    'name'=>'siteName',
                    'description'=>'laravel'
                ]);
            });
            // dd($setting,$setting->id);
            view()->share('setting',$setting);
        }
    }
}
