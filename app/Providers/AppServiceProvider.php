<?php

namespace App\Providers;

use App\Category;
use App\SocialMedia;
use App\SystemInfo;
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

        View::composer('frontEnd.include.menu',function($view){
            $categories = Category::where('publicationStatus',1)->orderBy('position','ASC')->get();
            $view->with(['categories' => $categories]);
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
