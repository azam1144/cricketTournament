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
        $this->app->bind(\App\Repositories\StaduimRepository::class, \App\Repositories\StaduimRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PlayerRoleRepository::class, \App\Repositories\PlayerRoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TotalTeamsRepository::class, \App\Repositories\TotalTeamsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PlayerRepository::class, \App\Repositories\PlayerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TeamInfoRepository::class, \App\Repositories\TeamInfoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MatchRepository::class, \App\Repositories\MatchRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MatchStatsRepository::class, \App\Repositories\MatchStatsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BowllerRepository::class, \App\Repositories\BowllerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BatsmanRepository::class, \App\Repositories\BatsmanRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BallStatsRepository::class, \App\Repositories\BallStatsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\WicketStatsRepository::class, \App\Repositories\WicketStatsRepositoryEloquent::class);
        //:end-bindings:
    }
}
