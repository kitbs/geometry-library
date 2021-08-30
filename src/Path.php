<?php

namespace AlexPechkarev\GeometryLibrary;

use ArrayAccess;
use Countable;

class Path implements ArrayAccess, Countable
{
    public array $points = [];

    public function __construct(array $points = [])
    {
        foreach ($points as $point) {
            $this->addPoint($point);
        }
    }

    public function addPoint(Point $point): static
    {
        $this->points[] = $point;

        return $this;
    }

    public function offsetExists($offset)
    {
        return isset($this->points[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->points[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->points[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->points[$offset]);
    }

    public function count()
    {
        return count($this->points);
    }
}
