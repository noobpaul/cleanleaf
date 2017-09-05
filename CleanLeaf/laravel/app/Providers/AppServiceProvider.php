<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Notifications;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extend('old_password', function ($attribute, $value, $parameters, $validator) {
            return \Hash::check($value, current($parameters));
        });

        if (Schema::hasTable('notifications')) {

            view()->composer('*', function ($view) 
            {
                if (Auth::user()) {

                    $notifs = Notifications::where('user_id', Auth::user()->id)->where('status', 1)->get();
                    $view->with('notifs', $notifs);    

                }
            });  

        }

        View::composer('auth.admin.job_order', function($view)
        {
            $notifs = Auth::user()->notifications->where('status',1);

            foreach($notifs as $notif) {
                $notif->status = 0;
                $notif->update();
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
