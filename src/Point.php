<?php

namespace AlexPechkarev\GeometryLibrary;

class Point
{
    public float $lat;
    public float $lng;

    public function __construct(float $lat, float $lng)
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
}
