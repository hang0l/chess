<?php

namespace App\Providers;

use App\Http\Repositories\Classes\Player\PlayerRepository;
use App\Http\Repositories\Classes\Player\PlayerTokensRepository;
use App\Http\Repositories\Interfaces\Player\IPlayerRepository;
use App\Http\Repositories\Interfaces\Player\IPlayerTokensRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(
            IPlayerRepository::class,
            PlayerRepository::class,
        );

        $this->app->bind(
            IPlayerTokensRepository::class,
            PlayerTokensRepository::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        //
    }
}
