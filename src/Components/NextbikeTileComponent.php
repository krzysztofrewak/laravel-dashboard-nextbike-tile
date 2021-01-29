<?php

namespace KrzysztofRewak\NextbikeTile\Components;

use Illuminate\Contracts\View\View;
use KrzysztofRewak\NextbikeTile\Nextbike\Store;
use Livewire\Component;

class NextbikeTileComponent extends Component
{
    /** @var string */
    public string $position;

    public function mount(string $position): void
    {
        $this->position = $position;
    }

    public function render(): View
    {
        return view("dashboard-velo-tile::tile", [
            "stations" => Store::make()->stations(),
            "refreshIntervalInSeconds" => config("dashboard.tiles.velo.refresh_interval_in_seconds") ?? 60,
        ]);
    }
}
