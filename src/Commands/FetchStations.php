<?php

namespace KrzysztofRewak\NextbikeTile\Commands;

use Illuminate\Console\Command;

class FetchStations extends Command
{
    protected $signature = "dashboard:fetch-next-stations";
    protected $description = "Fetch Nextbike Stations";

    public function handle(NextbikeApi $velo): void
    {
        $this->info("Fetching Velo stations...");

        $stations = $velo->getStations(config("dashboard.tiles.velo.stations") ?? []);
        VeloStore::make()->setStations($stations);

        $this->info("All done!");
    }
}
