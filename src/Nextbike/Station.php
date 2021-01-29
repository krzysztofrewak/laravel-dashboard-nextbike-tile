<?php

namespace KrzysztofRewak\NextbikeTile\Nextbike;

class Station
{
    private array $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function shortName(): string
    {
        return substr($this->attributes["name"], 4);
    }

    public function numberOfBikesAvailable(): int
    {
        return $this->attributes["bikes"];
    }

    public function displayClass(): string
    {
        if ($this->isEmpty()) {
            return "line-through";
        }

        if ($this->isNearlyEmpty()) {
            return "text-danger";
        }

        return "";
    }

    public function isEmpty(): bool
    {
        return $this->numberOfBikesAvailable() === 0;
    }

    public function isNearlyEmpty(): bool
    {
        return $this->numberOfBikesAvailable() < 3;
    }
}
