<?php

namespace Kolirt\CrossDomainSession;

use Illuminate\Support\ServiceProvider;

class CrossDomainSessionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/cross-domain-session.php', 'cross-domain-session');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'cross-domain-session');

        view()->composer('cross-domain-session::render', function($view){
            $view->with('domains', cd_session()->domains->filter(function($q){
                return request()->root() != $q;
            }));

            $view->with('params', cd_session()->request());
        });

        $this->publishes([
            __DIR__ . '/config/cross-domain-session.php' => config_path('cross-domain-session.php'),
        ]);
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
