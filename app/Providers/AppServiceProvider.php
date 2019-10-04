<?php

namespace App\Providers;

use App\Category;
use App\FooterMenu;
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
                $prams['system'] = SystemInfo::first(); 
                $prams['socialIcons'] = SocialMedia::where('publicationStatus',1)->orderBy('position','ASC')->get();
                $prams['categories'] = Category::where('publicationStatus',1)->where('is_delete',0)->orderBy('position','ASC')->get();
                $prams['footerMenus'] = FooterMenu::where('publicationStatus',1)->orderBy('position','ASC')->get();
                
                $view->with($prams);
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
