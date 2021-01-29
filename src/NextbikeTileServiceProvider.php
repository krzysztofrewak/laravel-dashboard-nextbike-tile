<?php

namespace KrzysztofRewak\NextbikeTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class NextbikeTileServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands(
                [
                    Commands\FetchStations::class,
                ]
            );
        }

        $this->publishes(
            [
                __DIR__ . "/../resources/views" => resource_path("views/vendor/dashboard-nextbike-tile"),
            ],
            "dashboard-nextbike-tile-views"
        );

        $this->loadViewsFrom(__DIR__ . "/../resources/views", "dashboard-nextbike-tile");

        Livewire::component("nextbike-tile", Components\NextbikeTileComponent::class);
    }
}
