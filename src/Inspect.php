<?php

namespace Humans\Inspect;

use ReflectionMethod;
use ReflectionProperty;

class Inspect
{
    private $reference;

    public function __construct($reference)
    {
        $this->reference = $reference;
    }

    public function __call($name, $arguments)
    {
        $method = new ReflectionMethod($this->reference, $name);

        $method->setAccessible(true);

        return $method->invoke($this->reference, ...$arguments);
    }

    public function __get($name)
    {
        $property = new ReflectionProperty($this->reference, $name);

        $property->setAccessible(true);

        return $property->getValue($this->reference);
    }
}