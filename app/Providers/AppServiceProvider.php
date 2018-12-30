<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Config;
use App\Observers\CommentObserve;
use App\Observers\ConfigObserve;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Comment ::observe (CommentObserve::class);
        Config ::observe (ConfigObserve::class);
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
    }
}
