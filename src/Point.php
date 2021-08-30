<?php

namespace AlexPechkarev\GeometryLibrary;

use JsonSerializable;

class Point implements JsonSerializable
{
    public float $lat = 0;
    public float $lng = 0;

    public function __construct(float $lat = 0, float $lng = 0)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public static function fromArray(array $point): static
    {
        return new static($point['lat'], $point['lng']);
    }

    public function toArray(): array
    {
        return [
            'lat' => $this->lat,
            'lng' => $this->lng,
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
