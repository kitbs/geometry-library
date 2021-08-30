<?php

namespace AlexPechkarev\GeometryLibrary;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use Traversable;

class Path implements ArrayAccess, Countable, IteratorAggregate, JsonSerializable
{
    public array $points = [];

    public function __construct(array $points = [])
    {
        foreach ($points as $point) {
            $this->append($point);
        }
    }

    public function fromArray(array $points): static
    {
        return new Path($points);
    }

    public function toArray(): array
    {
        return $this->points;
    }

    public function prepend(Point $point): void
    {
        array_unshift($this->points, $point);
    }

    public function append(Point $point): void
    {
        $this->points[] = $point;
    }

    public function pop(): Point
    {
        return array_pop($this->points);
    }

    public function shift(): Point
    {
        return array_shift($this->points);
    }

    public function first(): Point
    {
        return reset($this->points);
    }

    public function last(): Point
    {
        return end($this->points);
    }

    public function merge(Path $path): static
    {
        $points = array_merge($this->points, $path->points);

        return new Path($points);
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

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->points);
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
