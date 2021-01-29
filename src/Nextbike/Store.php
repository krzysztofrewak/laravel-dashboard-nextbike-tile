<?php

namespace KrzysztofRewak\NextbikeTile\Nextbike;

use Illuminate\Support\Collection;
use Spatie\Dashboard\Models\Tile;

class Store
{
    private Tile $tile;

    public static function make(): static
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName("nextbike");
    }

    public function setStations(array $stations): self
    {
        $this->tile->putData("stations", $stations);
        return $this;
    }

    public function stations(): Collection
    {
        return collect($this->tile->getData("stations") ?? [])
            ->map(fn (array $attributes) => new Station($attributes));
    }
}
