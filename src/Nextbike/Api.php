<?php

namespace KrzysztofRewak\NextbikeTile\Nextbike;

use Illuminate\Support\Facades\Http;

class Api
{
    public const API_URL = "https://www.velo-antwerpen.be/availability_map/getJsonObject";

    public function getStations(array $stationIds = []): array
    {
        $stations = Http::get(static::API_URL)->json();

        return collect($stations)
            ->filter(fn ($station) => in_array($station["id"], $stationIds))
            ->values()
            ->mapWithKeys(function ($station) use ($stationIds) {
                $key = array_search($station["id"], $stationIds);

                return [$key => $station];
            })->toArray();
    }
}
