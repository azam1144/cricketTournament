<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\SeriesRepository::class, \App\Repositories\SeriesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StadiumRepository::class, \App\Repositories\StadiumRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PlayerRoleRepository::class, \App\Repositories\PlayerRoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TeamRepository::class, \App\Repositories\TeamRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PlayerRepository::class, \App\Repositories\PlayerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MatchRepository::class, \App\Repositories\MatchRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MatchStatRepository::class, \App\Repositories\MatchStatRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OverRepository::class, \App\Repositories\OverRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BattingRepository::class, \App\Repositories\BattingRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BallStatRepository::class, \App\Repositories\BallStatRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\WicketStatRepository::class, \App\Repositories\WicketStatRepositoryEloquent::class);
        //:end-bindings:
    }
}
