<?php

namespace Zeroem\JsonSchema\Constraint\Type;

class TypeFactoryFlyweightDecorator implements TypeFactoryInterface
{
    private $factory;
    private $cache;

    public function __construct(TypeFactoryInterface $factory) {
        $this->factory = $factory;
    }

    public function getType($key) {
        if(!isset($this->cache[$key])) {
            $this->cache[$key] = $this->factory->getType($key);
        }

        return $this->cache[$key];
    }
}
