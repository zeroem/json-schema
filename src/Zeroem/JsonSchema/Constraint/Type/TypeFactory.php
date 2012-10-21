<?php

namespace Zeroem\JsonSchema\Constraint\Type;

class TypeFactory implements TypeFactoryInterface
{
    private $types;

    public function __construct(array $types = array()) {
        $this->types = $types;
    }

    public function addType($key, $class) {
        $this->types[$key] = $class;
    }

    public function getType($key) {
        return new $this->types[$key];
    }
}
