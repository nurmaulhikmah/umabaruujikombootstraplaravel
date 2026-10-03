<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Message;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        View::composer('*', function ($view) {
            if (\Schema::hasTable('messages')) {
                $unreadPesan = Message::where('is_read', false)->count();
                $view->with('unreadPesan', $unreadPesan);
            }
        });
    }
}