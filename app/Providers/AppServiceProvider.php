<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('*',function($view){            
            if(file_exists('config/setup.php')){
                $system = SystemInfo::first(); 
                $socialIcon = SocialMedia::where('publicationStatus',1)->orderBy('position','ASC')->get();
                $view->with(['system' => $system,'socialIcon'=>$socialIcon]);
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
